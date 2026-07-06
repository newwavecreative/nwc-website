import AVFoundation
import Foundation

/// Owns the AVFoundation capture session for barcode scanning.
/// EAN-13 covers both spec'd symbologies: AVFoundation reports UPC-A codes
/// as EAN-13 with a leading zero.
@Observable
final class BarcodeService: NSObject, AVCaptureMetadataOutputObjectsDelegate {
    enum Authorization {
        case undetermined
        case authorized
        case denied
    }

    var authorization: Authorization = .undetermined
    let session = AVCaptureSession()

    /// Called on the main queue with the first code detected; scanning is
    /// one-shot until `reset()` is called.
    var onCode: ((String) -> Void)?

    private let sessionQueue = DispatchQueue(label: "com.newwavecreative.vinylshelf.camera")
    private var isConfigured = false
    private var hasEmittedCode = false

    // MARK: - Lifecycle

    func requestAccessAndStart() async {
        switch AVCaptureDevice.authorizationStatus(for: .video) {
        case .authorized:
            authorization = .authorized
            start()
        case .notDetermined:
            let granted = await AVCaptureDevice.requestAccess(for: .video)
            authorization = granted ? .authorized : .denied
            if granted { start() }
        default:
            authorization = .denied
        }
    }

    func start() {
        sessionQueue.async { [self] in
            configureIfNeeded()
            if !session.isRunning {
                session.startRunning()
            }
        }
    }

    func stop() {
        sessionQueue.async { [self] in
            if session.isRunning {
                session.stopRunning()
            }
        }
    }

    func reset() {
        hasEmittedCode = false
    }

    // MARK: - Configuration

    private func configureIfNeeded() {
        guard !isConfigured else { return }

        session.beginConfiguration()
        defer { session.commitConfiguration() }

        guard
            let device = AVCaptureDevice.default(for: .video),
            let input = try? AVCaptureDeviceInput(device: device),
            session.canAddInput(input)
        else { return }
        session.addInput(input)

        let output = AVCaptureMetadataOutput()
        guard session.canAddOutput(output) else { return }
        session.addOutput(output)
        output.setMetadataObjectsDelegate(self, queue: .main)
        output.metadataObjectTypes = [.ean13]

        isConfigured = true
    }

    // MARK: - AVCaptureMetadataOutputObjectsDelegate

    func metadataOutput(
        _ output: AVCaptureMetadataOutput,
        didOutput metadataObjects: [AVMetadataObject],
        from connection: AVCaptureConnection
    ) {
        guard
            !hasEmittedCode,
            let object = metadataObjects.first as? AVMetadataMachineReadableCodeObject,
            object.type == .ean13,
            let code = object.stringValue
        else { return }

        hasEmittedCode = true
        onCode?(code)
    }
}
