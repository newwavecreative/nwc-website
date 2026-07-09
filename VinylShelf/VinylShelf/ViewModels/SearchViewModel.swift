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
    private(set) var isLoadingMore = false

    private let service: DiscogsService
    private let debounceInterval: Duration
    private var searchTask: Task<Void, Never>?
    private var activeQuery: String?
    private var currentPage = 1
    private var totalPages = 1

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

    /// Infinite scroll: called as result rows appear; fetches the next page
    /// when the last loaded row comes into view.
    func loadMoreIfNeeded(after release: DiscogsRelease) {
        guard case .loaded(let current) = state,
              release.id == current.last?.id,
              currentPage < totalPages,
              !isLoadingMore,
              let activeQuery
        else { return }

        isLoadingMore = true
        Task { [weak self] in
            guard let self else { return }
            defer { self.isLoadingMore = false }
            do {
                let response = try await self.service.searchByQuery(activeQuery, page: self.currentPage + 1)
                // The query may have changed while this page was in flight.
                guard self.activeQuery == activeQuery,
                      case .loaded(let existing) = self.state else { return }

                self.currentPage += 1
                self.totalPages = response.pagination?.pages ?? self.currentPage

                let seen = Set(existing.map(\.id))
                let fresh = response.results.filter { !seen.contains($0.id) }
                self.state = .loaded(existing + fresh)
            } catch {
                // Leave the current page intact; scrolling again retries.
            }
        }
    }

    private func search(_ query: String) async {
        state = .loading
        activeQuery = query
        currentPage = 1
        totalPages = 1
        do {
            let response = try await service.searchByQuery(query, page: 1)
            guard !Task.isCancelled else { return }
            totalPages = response.pagination?.pages ?? 1
            state = .loaded(response.results)
            Analytics.track(AnalyticsEvent.searchPerformed, ["results": response.results.isEmpty ? "none" : "some"])
        } catch let error as DiscogsError {
            guard !Task.isCancelled else { return }
            state = .failed(error)
        } catch {
            guard !Task.isCancelled else { return }
            state = .failed(.network)
        }
    }
}
