import SwiftUI

struct RootTabView: View {
    @State private var isShowingSplash = true

    var body: some View {
        ZStack {
            TabView {
                CollectionView()
                    .tabItem {
                        Label("My Shelf", systemImage: "square.grid.2x2.fill")
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

            if isShowingSplash {
                WelcomeSplashView {
                    withAnimation(.easeOut(duration: 0.4)) {
                        isShowingSplash = false
                    }
                }
                .transition(.opacity)
                .zIndex(1)
            }
        }
    }
}

#Preview {
    RootTabView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
}
