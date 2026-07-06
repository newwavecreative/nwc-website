import Foundation
import Observation

/// Loads full release detail for a search/scan result before showing the
/// add-to-collection preview.
@MainActor
@Observable
final class DetailViewModel {
    enum State {
        case loading
        case loaded(DiscogsRelease)
        case failed(DiscogsError)
    }

    private(set) var state: State = .loading

    private let service: DiscogsService

    init(service: DiscogsService = .shared) {
        self.service = service
    }

    func load(releaseID: Int) async {
        state = .loading
        do {
            state = .loaded(try await service.getReleaseDetail(releaseID))
        } catch let error as DiscogsError {
            state = .failed(error)
        } catch {
            state = .failed(.network)
        }
    }
}
