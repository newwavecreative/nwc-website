import Foundation
import Observation

@MainActor
@Observable
final class ScannerViewModel {
    enum Phase {
        case scanning
        case searching
        /// Exactly one match — full detail already fetched, jump straight to preview.
        case single(DiscogsRelease)
        /// Several matches — let the user pick.
        case multiple([DiscogsRelease])
        /// No matches for the scanned barcode.
        case noMatch(barcode: String)
        case failed(DiscogsError)
    }

    private(set) var phase: Phase = .scanning

    private let service: DiscogsService
    private var lastBarcode: String?

    init(service: DiscogsService = .shared) {
        self.service = service
    }

    func handleScanned(_ barcode: String) async {
        lastBarcode = barcode
        phase = .searching
        do {
            let results = try await service.searchByBarcode(barcode)
            switch results.count {
            case 0:
                phase = .noMatch(barcode: barcode)
            case 1:
                let detail = try await service.getReleaseDetail(results[0].id)
                phase = .single(detail)
            default:
                phase = .multiple(results)
            }
            Analytics.track(
                AnalyticsEvent.scanCompleted,
                ["matches": results.isEmpty ? "none" : (results.count == 1 ? "single" : "multiple")]
            )
        } catch let error as DiscogsError {
            phase = .failed(error)
        } catch {
            phase = .failed(.network)
        }
    }

    func retry() async {
        guard let lastBarcode else {
            phase = .scanning
            return
        }
        await handleScanned(lastBarcode)
    }

    func rescan() {
        lastBarcode = nil
        phase = .scanning
    }
}
