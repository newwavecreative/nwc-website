import SwiftUI

struct RootTabView: View {
    @State private var isShowingSplash = true
    @State private var subscriptions = SubscriptionService.shared

    var body: some View {
        ZStack {
            TabView {
                CollectionView()
                    .tabItem {
                        // Brand record mark (template asset generated from
                        // Design/assets/logo-mark.svg geometry).
                        Label("My Shelf", image: "TabShelf")
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

            // Hard subscription gate — inert until AppServicesConfig
            // .enforcePaywall is switched on; disappears the moment an
            // entitlement (incl. free trial) becomes active.
            if subscriptions.requiresPaywall, !isShowingSplash {
                PaywallView()
                    .transition(.opacity)
                    .zIndex(1)
            }

            if isShowingSplash {
                WelcomeSplashView {
                    withAnimation(.easeOut(duration: 0.4)) {
                        isShowingSplash = false
                    }
                }
                .transition(.opacity)
                .zIndex(2)
            }
        }
        .task {
            subscriptions.start()
        }
    }
}

#Preview {
    RootTabView()
        .modelContainer(for: VinylRecord.self, inMemory: true)
}
