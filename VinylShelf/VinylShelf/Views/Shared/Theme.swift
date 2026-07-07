import CoreText
import SwiftUI

// Vinyl Shelf design system — Swift translation of `Design/tokens/*.css`.
// Palette: deep blue-black ink, warm signature yellow, electric blue accent,
// cream text. Motion is springy; the record spin is the brand animation.

// MARK: - Color tokens (tokens/colors.css)

extension Color {
    init(hex: UInt32) {
        self.init(
            red: Double((hex >> 16) & 0xFF) / 255,
            green: Double((hex >> 8) & 0xFF) / 255,
            blue: Double(hex & 0xFF) / 255
        )
    }

    // Ink ramp — backgrounds & surfaces
    static let vsInk900 = Color(hex: 0x070A16)
    static let vsInk800 = Color(hex: 0x0E1428)
    static let vsInk700 = Color(hex: 0x141C36)
    static let vsInk600 = Color(hex: 0x1C2748)
    static let vsInk500 = Color(hex: 0x26345E)
    static let vsInk400 = Color(hex: 0x33447A)

    // Blue ramp — interactive accent
    static let vsBlue500 = Color(hex: 0x3B6FE5)
    static let vsBlue400 = Color(hex: 0x5E8CFF)
    static let vsBlue300 = Color(hex: 0x90B2FF)

    // Yellow ramp — signature highlight
    static let vsYellow600 = Color(hex: 0xE9A712)
    static let vsYellow500 = Color(hex: 0xFFC93C)
    static let vsYellow400 = Color(hex: 0xFFD65E)

    // Cream ramp — text on dark
    static let vsCream100 = Color(hex: 0xF4F1E6)
    static let vsCream300 = Color(hex: 0xC7C6BC)
    static let vsCream500 = Color(hex: 0x8E9099)

    // Semantic aliases
    static let vsBackground = vsInk900
    static let vsSurfaceCard = vsInk700
    static let vsSurfaceRaised = vsInk600
    static let vsTextPrimary = vsCream100
    static let vsTextSecondary = vsCream300
    static let vsTextMuted = vsCream500
    static let vsTextOnYellow = vsInk900
    static let vsBorderSubtle = Color.white.opacity(0.07)
    static let vsBorderDefault = Color.white.opacity(0.12)
    static let vsAccentSoft = vsYellow500.opacity(0.14)

    static let vsStatusOwned = Color(hex: 0x37C98A)
    static let vsStatusWishlist = Color(hex: 0xFF6B5E)
    static let vsStatusDanger = Color(hex: 0xF0524B)

    /// Primary accent (design-system yellow-500). Kept under the original
    /// name so pre-theme call sites pick up the brand color.
    static let vinylAccent = vsYellow500
}

// MARK: - Gradients (tokens/effects.css)

extension LinearGradient {
    /// --grad-yellow: the record-label gradient for primary CTAs.
    static let vsYellow = LinearGradient(
        colors: [.vsYellow400, .vsYellow600],
        startPoint: .topLeading,
        endPoint: .bottomTrailing
    )
}

/// --grad-app: near-black blue lifted toward navy at the top-left,
/// so screens never feel flat. Apply with `.vsScreenBackground()`.
struct VSBackground: View {
    var body: some View {
        Color.vsInk900
            .overlay(
                RadialGradient(
                    colors: [Color(hex: 0x16203F), .vsInk900],
                    center: UnitPoint(x: 0.15, y: -0.1),
                    startRadius: 0,
                    endRadius: 760
                )
            )
            .ignoresSafeArea()
    }
}

extension View {
    func vsScreenBackground() -> some View {
        background(VSBackground())
    }
}

// MARK: - Typography (tokens/typography.css)

// Display: Bricolage Grotesque · Body: DM Sans · Mono: Space Mono.
// Font files ship in Resources/Fonts and are registered at launch by
// `VSTheme.registerFonts()`; Font.custom falls back to the system face if a
// file fails to load, so these never crash.
extension Font {
    static func vsDisplay(_ size: CGFloat, extraBold: Bool = true) -> Font {
        .custom(extraBold ? "BricolageGrotesque-ExtraBold" : "BricolageGrotesque-Bold", size: size)
    }

    static func vsBody(_ size: CGFloat, weight: VSBodyWeight = .regular) -> Font {
        .custom(weight.postScriptName, size: size)
    }

    static func vsMono(_ size: CGFloat, bold: Bool = false) -> Font {
        .custom(bold ? "SpaceMono-Bold" : "SpaceMono-Regular", size: size)
    }
}

enum VSBodyWeight {
    case regular, medium, semibold

    var postScriptName: String {
        switch self {
        case .regular: return "DMSans-Regular"
        case .medium: return "DMSans-Medium"
        case .semibold: return "DMSans-SemiBold"
        }
    }
}

// MARK: - Motion (tokens/effects.css)

enum VSMotion {
    /// --ease-spring: overshoot that settles with a little bounce.
    static let spring = Animation.spring(response: 0.32, dampingFraction: 0.6)
    /// --dur-spin: one full record rotation.
    static let spinDuration: TimeInterval = 1.6
    /// Press state scale target.
    static let pressScale: CGFloat = 0.96
}

/// Springy press feedback (press → 0.96 → settle) for any custom control.
struct VSPressButtonStyle: ButtonStyle {
    func makeBody(configuration: Configuration) -> some View {
        configuration.label
            .scaleEffect(configuration.isPressed ? VSMotion.pressScale : 1)
            .animation(VSMotion.spring, value: configuration.isPressed)
    }
}

/// Primary action — yellow label gradient, ink text.
struct VSPrimaryButtonStyle: ButtonStyle {
    func makeBody(configuration: Configuration) -> some View {
        configuration.label
            .font(.vsBody(15, weight: .semibold))
            .foregroundStyle(Color.vsTextOnYellow)
            .frame(maxWidth: .infinity, minHeight: 48)
            .background(LinearGradient.vsYellow, in: RoundedRectangle(cornerRadius: 14))
            .scaleEffect(configuration.isPressed ? VSMotion.pressScale : 1)
            .animation(VSMotion.spring, value: configuration.isPressed)
    }
}

/// Secondary action — raised ink surface with a hairline border.
struct VSSecondaryButtonStyle: ButtonStyle {
    func makeBody(configuration: Configuration) -> some View {
        configuration.label
            .font(.vsBody(15, weight: .semibold))
            .foregroundStyle(Color.vsTextPrimary)
            .frame(maxWidth: .infinity, minHeight: 48)
            .background(Color.vsSurfaceRaised, in: RoundedRectangle(cornerRadius: 14))
            .overlay(
                RoundedRectangle(cornerRadius: 14)
                    .strokeBorder(Color.vsBorderDefault, lineWidth: 1)
            )
            .scaleEffect(configuration.isPressed ? VSMotion.pressScale : 1)
            .animation(VSMotion.spring, value: configuration.isPressed)
    }
}

// MARK: - Small shared pieces

/// Mono, uppercase, letter-spaced section label — the "record sleeve small
/// print" (CATALOG NO., TRACKLIST, …).
struct VSSectionLabel: View {
    let text: String

    var body: some View {
        Text(text.uppercased())
            .font(.vsMono(11))
            .kerning(1.3)
            .foregroundStyle(Color.vsTextMuted)
    }
}

/// Badge — small mono status pill (components/data-display/Badge.jsx).
struct VSBadge: View {
    enum Tone {
        case owned, wishlist, accent, neutral

        var foreground: Color {
            switch self {
            case .owned: return .vsStatusOwned
            case .wishlist: return .vsStatusWishlist
            case .accent: return .vsYellow500
            case .neutral: return .vsTextSecondary
            }
        }

        var background: Color {
            switch self {
            case .owned: return Color.vsStatusOwned.opacity(0.16)
            case .wishlist: return Color.vsStatusWishlist.opacity(0.16)
            case .accent: return .vsAccentSoft
            case .neutral: return .vsSurfaceRaised
            }
        }
    }

    let text: String
    var tone: Tone = .neutral
    var dot = false

    var body: some View {
        HStack(spacing: 5) {
            if dot {
                Circle()
                    .fill(tone.foreground)
                    .frame(width: 6, height: 6)
            }
            Text(text.uppercased())
                .font(.vsMono(11))
                .kerning(0.4)
        }
        .foregroundStyle(tone.foreground)
        .padding(.horizontal, 9)
        .frame(height: 22)
        .background(tone.background, in: Capsule())
    }
}

// MARK: - Launch-time setup

enum VSTheme {
    /// Registers the bundled brand fonts (Resources/Fonts/*.ttf) with
    /// CoreText. Programmatic registration works regardless of how the build
    /// lays resources out, and a missing file degrades to system fonts.
    static func registerFonts() {
        let subdirectories: [String?] = [nil, "Fonts", "Resources/Fonts"]
        for subdirectory in subdirectories {
            guard let urls = Bundle.main.urls(forResourcesWithExtension: "ttf", subdirectory: subdirectory),
                  !urls.isEmpty else { continue }
            CTFontManagerRegisterFontURLs(urls as CFArray, .process, true, nil)
            return
        }
    }
}
