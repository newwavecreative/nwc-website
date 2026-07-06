import AVFoundation
import SwiftUI
import UIKit

/// Full-screen camera scanner with a viewfinder overlay. Detects EAN-13 /
/// UPC-A barcodes and hands the first hit to `onScan`. Shows a graceful
/// "Open Settings" state when camera access is denied.
struct BarcodeScannerView: View {
    let onScan: (String) -> Void
    let onCancel: () -> Void

    @State private var barcodeService = BarcodeService()

    var body: some View {
        ZStack {
            switch barcodeService.authorization {
            case .authorized:
                cameraLayer
            case .denied:
                permissionDeniedView
            case .undetermined:
                Color.black.ignoresSafeArea()
            }
        }
        .overlay(alignment: .topLeading) { cancelButton }
        .task {
            barcodeService.onCode = { code in
                onScan(code)
            }
            await barcodeService.requestAccessAndStart()
        }
        .onDisappear {
            barcodeService.stop()
        }
    }

    private var cameraLayer: some View {
        ZStack {
            CameraPreviewView(session: barcodeService.session)
                .ignoresSafeArea()

            viewfinderOverlay
        }
    }

    private var viewfinderOverlay: some View {
        VStack(spacing: 24) {
            Spacer()

            RoundedRectangle(cornerRadius: 16)
                .strokeBorder(Color.vinylAccent, lineWidth: 3)
                .frame(width: 260, height: 160)
                .background(.clear)

            Text("Line up the barcode inside the frame")
                .font(.subheadline.weight(.medium))
                .foregroundStyle(.white)
                .padding(.horizontal, 16)
                .padding(.vertical, 8)
                .background(.black.opacity(0.6), in: Capsule())

            Spacer()
        }
    }

    private var permissionDeniedView: some View {
        VStack(spacing: 16) {
            Image(systemName: "camera.fill")
                .font(.system(size: 44))
                .foregroundStyle(.secondary)

            Text("Camera Access Needed")
                .font(.headline)

            Text("Vinyl Shelf uses the camera to scan record barcodes. Enable camera access in Settings.")
                .font(.subheadline)
                .foregroundStyle(.secondary)
                .multilineTextAlignment(.center)
                .padding(.horizontal, 32)

            Button("Open Settings") {
                if let url = URL(string: UIApplication.openSettingsURLString) {
                    UIApplication.shared.open(url)
                }
            }
            .buttonStyle(.borderedProminent)
        }
        .frame(maxWidth: .infinity, maxHeight: .infinity)
        .background(Color(.systemBackground))
    }

    private var cancelButton: some View {
        Button(action: onCancel) {
            Image(systemName: "xmark")
                .font(.headline)
                .foregroundStyle(.white)
                .frame(width: 36, height: 36)
                .background(.black.opacity(0.6), in: Circle())
        }
        .padding()
        .accessibilityLabel("Cancel scanning")
    }
}

/// UIKit-backed live camera preview.
struct CameraPreviewView: UIViewRepresentable {
    let session: AVCaptureSession

    final class PreviewUIView: UIView {
        override class var layerClass: AnyClass { AVCaptureVideoPreviewLayer.self }

        var previewLayer: AVCaptureVideoPreviewLayer {
            layer as! AVCaptureVideoPreviewLayer
        }
    }

    func makeUIView(context: Context) -> PreviewUIView {
        let view = PreviewUIView()
        view.previewLayer.session = session
        view.previewLayer.videoGravity = .resizeAspectFill
        return view
    }

    func updateUIView(_ uiView: PreviewUIView, context: Context) {}
}
