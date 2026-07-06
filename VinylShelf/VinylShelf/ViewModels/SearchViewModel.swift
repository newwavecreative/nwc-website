import Foundation
import Observation

@MainActor
@Observable
final class SearchViewModel {
    enum State {
        case idle
        case loading
        case loaded([DiscogsRelease])
        case failed(DiscogsError)
    }

    var query: String = "" {
        didSet {
            guard query != oldValue else { return }
            scheduleSearch()
        }
    }

    private(set) var state: State = .idle

    private let service: DiscogsService
    private let debounceInterval: Duration
    private var searchTask: Task<Void, Never>?

    init(service: DiscogsService = .shared, debounceInterval: Duration = .milliseconds(400)) {
        self.service = service
        self.debounceInterval = debounceInterval
    }

    /// Debounce: each keystroke cancels the previous pending search.
    private func scheduleSearch() {
        searchTask?.cancel()

        let trimmed = query.trimmingCharacters(in: .whitespacesAndNewlines)
        guard !trimmed.isEmpty else {
            state = .idle
            return
        }

        searchTask = Task { [weak self, debounceInterval] in
            try? await Task.sleep(for: debounceInterval)
            guard !Task.isCancelled else { return }
            await self?.search(trimmed)
        }
    }

    func retry() {
        let trimmed = query.trimmingCharacters(in: .whitespacesAndNewlines)
        guard !trimmed.isEmpty else { return }
        searchTask?.cancel()
        searchTask = Task { [weak self] in
            await self?.search(trimmed)
        }
    }

    private func search(_ query: String) async {
        state = .loading
        do {
            let results = try await service.searchByQuery(query)
            guard !Task.isCancelled else { return }
            state = .loaded(results)
        } catch let error as DiscogsError {
            guard !Task.isCancelled else { return }
            state = .failed(error)
        } catch {
            guard !Task.isCancelled else { return }
            state = .failed(.network)
        }
    }
}
