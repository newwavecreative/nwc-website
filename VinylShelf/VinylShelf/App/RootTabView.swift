import SwiftUI

struct RootTabView: View {
    var body: some View {
        TabView {
            CollectionView()
                .tabItem {
                    Label("Collection", systemImage: "square.grid.2x2.fill")
                }

            WishlistView()
                .tabItem {
                    Label("Wishlist", systemImage: "heart.fill")
                }

            NavigationStack {
                SearchView()
            }
            .tabItem {
                Label("Search", systemImage: "magnifyingglass")
            }
        }
    }
}

#Preview {
    RootTabView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
}
