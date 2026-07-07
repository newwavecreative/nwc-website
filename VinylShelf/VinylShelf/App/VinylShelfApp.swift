import SwiftData
import SwiftUI
import UIKit

@main
struct VinylShelfApp: App {
    let container: ModelContainer

    init() {
        VSTheme.registerFonts()
        Self.configureChromeAppearance()
        container = Self.makeContainer()
    }

    var body: some Scene {
        WindowGroup {
            RootTabView()
                .tint(.vsYellow500)
                // The design system is dark-foundation only.
                .preferredColorScheme(.dark)
        }
        .modelContainer(container)
    }

    /// CloudKit-synced container, falling back to local-only storage when the
    /// iCloud entitlement isn't available (e.g. before signing is configured).
    private static func makeContainer() -> ModelContainer {
        let schema = Schema([VinylRecord.self])
        do {
            let cloud = ModelConfiguration(schema: schema, cloudKitDatabase: .automatic)
            return try ModelContainer(for: schema, configurations: [cloud])
        } catch {
            do {
                let local = ModelConfiguration(schema: schema, cloudKitDatabase: .none)
                return try ModelContainer(for: schema, configurations: [local])
            } catch {
                fatalError("Failed to create ModelContainer: \(error)")
            }
        }
    }

    /// Navigation and tab bars in brand type and ink surfaces:
    /// display font for titles, frosted ink panel for the tab bar with
    /// yellow active / muted cream inactive items.
    private static func configureChromeAppearance() {
        let cream = UIColor(red: 0xF4 / 255, green: 0xF1 / 255, blue: 0xE6 / 255, alpha: 1)
        let creamMuted = UIColor(red: 0x8E / 255, green: 0x90 / 255, blue: 0x99 / 255, alpha: 1)
        let yellow = UIColor(red: 0xFF / 255, green: 0xC9 / 255, blue: 0x3C / 255, alpha: 1)
        let ink800 = UIColor(red: 0x0E / 255, green: 0x14 / 255, blue: 0x28 / 255, alpha: 0.86)

        let nav = UINavigationBarAppearance()
        nav.configureWithTransparentBackground()
        nav.titleTextAttributes = [
            .foregroundColor: cream,
            .font: UIFont(name: "BricolageGrotesque-Bold", size: 17)
                ?? .systemFont(ofSize: 17, weight: .semibold),
        ]
        nav.largeTitleTextAttributes = [
            .foregroundColor: cream,
            .font: UIFont(name: "BricolageGrotesque-ExtraBold", size: 34)
                ?? .systemFont(ofSize: 34, weight: .heavy),
        ]
        UINavigationBar.appearance().standardAppearance = nav
        UINavigationBar.appearance().scrollEdgeAppearance = nav
        UINavigationBar.appearance().compactAppearance = nav

        let item = UITabBarItemAppearance()
        item.normal.iconColor = creamMuted
        item.selected.iconColor = yellow
        let labelFont = UIFont(name: "DMSans-Medium", size: 10) ?? .systemFont(ofSize: 10, weight: .medium)
        item.normal.titleTextAttributes = [.foregroundColor: creamMuted, .font: labelFont]
        item.selected.titleTextAttributes = [.foregroundColor: yellow, .font: labelFont]

        let tab = UITabBarAppearance()
        tab.configureWithTransparentBackground()
        tab.backgroundEffect = UIBlurEffect(style: .systemUltraThinMaterialDark)
        tab.backgroundColor = ink800
        tab.stackedLayoutAppearance = item
        tab.inlineLayoutAppearance = item
        tab.compactInlineLayoutAppearance = item
        UITabBar.appearance().standardAppearance = tab
        UITabBar.appearance().scrollEdgeAppearance = tab
    }
}
