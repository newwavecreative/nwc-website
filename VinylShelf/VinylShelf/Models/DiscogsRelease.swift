import Foundation

/// A Discogs release, decodable from both the search endpoint
/// (`/database/search`, items inside `results`) and the detail endpoint
/// (`/releases/{id}`, a bare release object). The two shapes differ:
///
/// - `year` is a String on search results, an Int on detail.
/// - Artist comes from top-level `artists_sort` when present, otherwise the
///   `artists` array (detail); search results embed it in `title` as
///   "Artist - Title".
/// - Barcodes come from the `barcode` array (search) or the `identifiers`
///   array filtered to type "Barcode" (detail).
/// - Cover art is `cover_image` (search) or the first entry of `images` (detail).
struct DiscogsRelease: Codable, Identifiable, Hashable {
    let id: Int
    let title: String
    let artistsSort: String?
    let year: Int?
    let labels: [DiscogsLabel]?
    let formats: [DiscogsFormat]?
    let genres: [String]?
    let styles: [String]?
    let country: String?
    let coverImage: String?
    /// First "secondary" image on the detail endpoint — by Discogs convention
    /// usually the back cover. Always nil for search results (no `images`).
    let backCoverImage: String?
    let thumb: String?
    let tracklist: [DiscogsTrack]?
    let barcodes: [String]?

    private enum CodingKeys: String, CodingKey {
        case id, title, year, labels, formats, genres, styles, country, thumb, tracklist
        case artistsSort = "artists_sort"
        case artists
        case coverImage = "cover_image"
        case images
        case barcode
        case identifiers
    }

    init(
        id: Int,
        title: String,
        artistsSort: String? = nil,
        year: Int? = nil,
        labels: [DiscogsLabel]? = nil,
        formats: [DiscogsFormat]? = nil,
        genres: [String]? = nil,
        styles: [String]? = nil,
        country: String? = nil,
        coverImage: String? = nil,
        backCoverImage: String? = nil,
        thumb: String? = nil,
        tracklist: [DiscogsTrack]? = nil,
        barcodes: [String]? = nil
    ) {
        self.id = id
        self.title = title
        self.artistsSort = artistsSort
        self.year = year
        self.labels = labels
        self.formats = formats
        self.genres = genres
        self.styles = styles
        self.country = country
        self.coverImage = coverImage
        self.backCoverImage = backCoverImage
        self.thumb = thumb
        self.tracklist = tracklist
        self.barcodes = barcodes
    }

    init(from decoder: Decoder) throws {
        let container = try decoder.container(keyedBy: CodingKeys.self)
        id = try container.decode(Int.self, forKey: .id)
        title = try container.decode(String.self, forKey: .title)

        if let sort = try container.decodeIfPresent(String.self, forKey: .artistsSort) {
            artistsSort = sort
        } else if let artists = try container.decodeIfPresent([DiscogsArtist].self, forKey: .artists),
                  !artists.isEmpty {
            artistsSort = artists.compactMap(\.name).joined(separator: ", ")
        } else {
            artistsSort = nil
        }

        if let intYear = try? container.decode(Int.self, forKey: .year) {
            year = intYear
        } else if let stringYear = try? container.decode(String.self, forKey: .year) {
            year = Int(stringYear)
        } else {
            year = nil
        }

        labels = try container.decodeIfPresent([DiscogsLabel].self, forKey: .labels)
        formats = try container.decodeIfPresent([DiscogsFormat].self, forKey: .formats)
        genres = try container.decodeIfPresent([String].self, forKey: .genres)
        styles = try container.decodeIfPresent([String].self, forKey: .styles)
        country = try container.decodeIfPresent(String.self, forKey: .country)
        thumb = try container.decodeIfPresent(String.self, forKey: .thumb)
        tracklist = try container.decodeIfPresent([DiscogsTrack].self, forKey: .tracklist)

        let images = (try? container.decode([DiscogsImage].self, forKey: .images)) ?? []
        if let cover = try container.decodeIfPresent(String.self, forKey: .coverImage) {
            coverImage = cover
        } else {
            let primary = images.first { $0.type?.lowercased() == "primary" } ?? images.first
            coverImage = primary?.uri
        }
        backCoverImage = images.first {
            $0.type?.lowercased() == "secondary" && $0.uri != nil && $0.uri != coverImage
        }?.uri

        if let searchBarcodes = try? container.decode([String].self, forKey: .barcode) {
            barcodes = searchBarcodes
        } else if let identifiers = try? container.decode([DiscogsIdentifier].self, forKey: .identifiers) {
            let values = identifiers
                .filter { $0.type?.lowercased() == "barcode" }
                .compactMap(\.value)
            barcodes = values.isEmpty ? nil : values
        } else {
            barcodes = nil
        }
    }

    func encode(to encoder: Encoder) throws {
        var container = encoder.container(keyedBy: CodingKeys.self)
        try container.encode(id, forKey: .id)
        try container.encode(title, forKey: .title)
        try container.encodeIfPresent(artistsSort, forKey: .artistsSort)
        try container.encodeIfPresent(year, forKey: .year)
        try container.encodeIfPresent(labels, forKey: .labels)
        try container.encodeIfPresent(formats, forKey: .formats)
        try container.encodeIfPresent(genres, forKey: .genres)
        try container.encodeIfPresent(styles, forKey: .styles)
        try container.encodeIfPresent(country, forKey: .country)
        try container.encodeIfPresent(coverImage, forKey: .coverImage)
        try container.encodeIfPresent(thumb, forKey: .thumb)
        try container.encodeIfPresent(tracklist, forKey: .tracklist)
        try container.encodeIfPresent(barcodes, forKey: .barcode)
    }
}

// MARK: - Display helpers

extension DiscogsRelease {
    /// Search-result titles look like "Fleetwood Mac - Rumours"; split them so
    /// the UI can show artist and title separately.
    private var splitTitle: (artist: String, title: String)? {
        guard let range = title.range(of: " - ") else { return nil }
        let artist = String(title[..<range.lowerBound]).trimmingCharacters(in: .whitespaces)
        let rest = String(title[range.upperBound...]).trimmingCharacters(in: .whitespaces)
        guard !artist.isEmpty, !rest.isEmpty else { return nil }
        return (artist, rest)
    }

    var displayArtist: String {
        if let artistsSort, !artistsSort.isEmpty { return artistsSort }
        return splitTitle?.artist ?? ""
    }

    var displayTitle: String {
        if artistsSort != nil { return title }
        return splitTitle?.title ?? title
    }

    var formatSummary: String? {
        guard let formats, !formats.isEmpty else { return nil }
        return formats
            .compactMap { format -> String? in
                guard let name = format.name else { return nil }
                let details = (format.descriptions ?? []).joined(separator: ", ")
                return details.isEmpty ? name : "\(name) (\(details))"
            }
            .joined(separator: " · ")
    }
}

// MARK: - Nested types

struct DiscogsLabel: Codable, Hashable {
    let name: String?
    let catno: String?
}

struct DiscogsFormat: Codable, Hashable {
    let name: String?
    let descriptions: [String]?
}

struct DiscogsTrack: Codable, Hashable {
    let position: String?
    let title: String?
    let duration: String?
}

struct DiscogsArtist: Codable, Hashable {
    let name: String?
}

struct DiscogsImage: Codable, Hashable {
    let type: String?
    let uri: String?
}

struct DiscogsIdentifier: Codable, Hashable {
    let type: String?
    let value: String?
}

struct DiscogsSearchResponse: Codable {
    let results: [DiscogsRelease]
}
