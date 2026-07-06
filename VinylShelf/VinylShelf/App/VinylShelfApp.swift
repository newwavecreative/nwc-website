import SwiftData
import SwiftUI

@main
struct VinylShelfApp: App {
    let container: ModelContainer

    init() {
        container = Self.makeContainer()
    }

    var body: some Scene {
        WindowGroup {
            RootTabView()
                .tint(.vinylAccent)
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
}
