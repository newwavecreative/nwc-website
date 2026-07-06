import SwiftUI

struct TracklistView: View {
    let tracks: [Track]

    var body: some View {
        if !tracks.isEmpty {
            Section("Tracklist") {
                ForEach(tracks) { track in
                    HStack(alignment: .firstTextBaseline) {
                        Text(track.position)
                            .font(.caption.monospaced())
                            .foregroundStyle(.secondary)
                            .frame(minWidth: 28, alignment: .leading)

                        Text(track.title)

                        Spacer()

                        if let duration = track.duration, !duration.isEmpty {
                            Text(duration)
                                .font(.caption.monospaced())
                                .foregroundStyle(.secondary)
                        }
                    }
                }
            }
        }
    }
}

#Preview {
    List {
        TracklistView(tracks: [
            Track(position: "A1", title: "Second Hand News", duration: "2:43"),
            Track(position: "A2", title: "Dreams", duration: "4:14"),
        ])
    }
}
