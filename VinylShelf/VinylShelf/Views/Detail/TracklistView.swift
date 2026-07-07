import SwiftUI

/// Tracklist per `RecordDetail.jsx`: mono positions and times around the
/// track title, hairline dividers.
struct TracklistView: View {
    let tracks: [Track]

    var body: some View {
        if !tracks.isEmpty {
            VStack(alignment: .leading, spacing: 0) {
                VSSectionLabel(text: "Tracklist")
                    .padding(.bottom, 8)

                ForEach(tracks) { track in
                    HStack(alignment: .firstTextBaseline, spacing: 12) {
                        Text(track.position)
                            .font(.vsMono(12))
                            .foregroundStyle(Color.vsTextMuted)
                            .frame(minWidth: 24, alignment: .leading)

                        Text(track.title)
                            .font(.vsBody(15))
                            .foregroundStyle(Color.vsTextPrimary)

                        Spacer()

                        if let duration = track.duration, !duration.isEmpty {
                            Text(duration)
                                .font(.vsMono(12))
                                .foregroundStyle(Color.vsTextMuted)
                        }
                    }
                    .padding(.vertical, 10)

                    Divider()
                        .overlay(Color.vsBorderSubtle)
                }
            }
        }
    }
}

#Preview {
    TracklistView(tracks: [
        Track(position: "A1", title: "Second Hand News", duration: "2:43"),
        Track(position: "A2", title: "Dreams", duration: "4:14"),
    ])
    .padding()
    .vsScreenBackground()
}
