# New Wave Creative — Landing Template

A responsive static landing page whose **structure and animations mirror the
reference layout** ([quad.medvi.org](https://quad.medvi.org/), a Framer site),
rebuilt as clean, dependency-free HTML/CSS/JS and themed with New Wave's brand
colors. Placeholder copy is Lorem Ipsum and placeholder imagery is a bundled SVG
— swap both for real content without touching layout.

## Files

```
index.html        All 15 sections, each commented as its own block
css/styles.css    Design system (brand vars) + all section styles + responsive
js/main.js        Animation layer (no dependencies)
assets/
  logo.svg          Placeholder wordmark (dark)  — replace with official PNG/SVG
  logo-white.svg    Placeholder wordmark (reverse)
  img/placeholder.svg  Generic image placeholder ("REPLACE IMAGE")
  img/avatar.svg       Testimonial avatar placeholder
```

## Preview locally

Just open `index.html` in a browser, or serve the folder:

```bash
python3 -m http.server 8080   # then visit http://localhost:8080
```

## Section map (top → bottom)

1. Navbar (transparent over hero → solid white on scroll, mobile menu)
2. Hero (bg image, rating + "USA Made" badges, dual CTA)
3. CTA band
4. Logo bar (auto-scrolling marquee)
5. About / intro
6. Flip cards (front/back flip on click — parallax on scroll)
7. Stats (count-up on scroll)
8. Programs (3 alternating image + checklist blocks)
9. Blog / resource cards (×3)
10. Comparison table (Us vs Others)
11. Pricing (3 plans, featured middle)
12. How It Works (bento grid with glow)
13. Testimonials (auto-scrolling review marquee w/ stars)
14. Final CTA
15. Footer (feature row, contact pills, nav columns)

## Rebranding — everything lives in CSS variables

Open `css/styles.css`, edit the `:root` block:

```css
--blue:  #254f69;   /* primary  */
--navy:  #082f3f;   /* deep     */
--gold:  #ffc900;   /* accent / CTA */
--font-body: 'Manrope', …;   /* swap for your Typekit brand font */
--font-head: 'Onest', …;
```

**Fonts:** the template loads Manrope + Onest from Google Fonts as a close stand-in.
To use New Wave's actual Typekit font, add your Typekit `<link>` in `index.html`
and change the two `--font-*` variables.

**Logo / images:** drop the real files into `assets/` (keep the same names to
avoid editing markup), or point the `src` / `--font` values at your own paths.

## Animation hooks (add to any element)

| Attribute | Effect |
|---|---|
| `data-reveal` | fade + slide up when scrolled into view |
| `data-reveal-delay="120"` | stagger the reveal (ms) |
| `data-parallax="0.15"` | translate on scroll (factor) |
| `data-count="12000"` | count up to the number when visible |
| `data-flip` | make a card flip front↔back on click |

All effects automatically disable under `prefers-reduced-motion`.

---

## Using this inside Beaver Builder

This is built to drop into your Beaver Builder site via **HTML modules**. Do it
this way so it doesn't fight the BB theme:

1. **Load the CSS + JS once, globally** — not inside every module. Easiest options:
   - a child theme that enqueues `css/styles.css`, `js/main.js`, and the Google
     Fonts link, **or**
   - the *Code Snippets* / *Simple Custom CSS & JS* plugin (add the fonts + CSS as
     a stylesheet snippet, `main.js` as a footer JS snippet).
   - Or paste the contents of `styles.css` into **BB → Global Settings → CSS** and
     `main.js` into **Global Settings → JS**.
2. **Add one HTML module per section.** In `index.html` each section is wrapped in
   a commented `<!-- SECTION NN -->` block — copy that block's markup into its own
   HTML module, in order. (You can also drop the whole `<main>` into a single HTML
   module if you'd rather not split it.)
3. **Host the assets** in the Media Library (or `wp-content/uploads`) and update the
   `src` paths in the markup to match.
4. Because BB wraps everything in its own rows, keep the section `<section
   class="…">` wrappers intact — the CSS targets those classes.

> Note: Beaver Builder can't *import* this as a native saved layout — BB layouts are
> serialized WordPress data the builder generates itself. The HTML-module approach
> above is the supported way to use hand-coded markup inside BB.
