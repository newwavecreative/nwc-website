> **Also in this repo:** [`VinylShelf/`](VinylShelf/README.md) — an iOS
> (SwiftUI + SwiftData) vinyl record collection manager with Discogs barcode
> scanning and iCloud sync. See its README for setup.

# New Wave Creative — Landing

A custom-coded landing page whose structure and animations mirror the reference
layout ([quad.medvi.org](https://quad.medvi.org/)), themed with New Wave's brand
colors. Shipped as a **self-contained WordPress plugin** that registers an "NWC
Landing" page template, and **auto-deploys to WP Engine over SSH on every push.**

Placeholder copy = Lorem Ipsum; placeholder imagery = bundled SVGs — swap for
real content or point `<img>` tags at Media Library URLs.

## Why a plugin (not a Beaver Builder layout or a child theme)

- A **page template in a child theme** only works if that theme is active
  site-wide — it would take over the whole site.
- A **plugin** registers just the one template and loads its CSS/JS **only on
  pages using it**, leaving the rest of newwavecreative.io untouched.
- Everything (markup + CSS + JS + assets) lives in the repo, so updates flow
  through Git instead of copy/paste.

## Repo layout

```
nwc-landing/                     ← the plugin (this whole folder is deployed)
  nwc-landing.php                  main file: registers template + enqueues assets
  templates/landing-template.php   full-page document (own nav/footer, wp_head/footer)
  template-parts/landing.php       the 15 section blocks (edit copy/images here)
  assets/
    css/styles.css                 design system (brand vars) + all styles
    js/main.js                     animation layer (no dependencies)
    logo.svg / logo-white.svg      placeholder wordmarks
    img/placeholder.svg, avatar.svg
.github/workflows/deploy.yml     ← WP Engine SSH deploy on push
```

## One-time setup (WP Engine deploy)

**1. Create a deploy SSH key** (dedicated to this — keep it separate from your
personal key):

```bash
ssh-keygen -t ed25519 -f wpe_deploy -C "github-actions-nwc" -N ""
```

**2. Add the PUBLIC key to WP Engine:** User Portal → *Profile → SSH Keys* →
paste the contents of `wpe_deploy.pub`. (Also make sure *SSH Gateway* is enabled
on the environment.)

**3. Add the PRIVATE key to GitHub:** repo → *Settings → Secrets and variables →
Actions → New repository secret*:
- Name: `WPE_SSHG_KEY_PRIVATE`
- Value: the full contents of `wpe_deploy` (the private file)

**4. Add your environment name to GitHub:** same page → *Variables* tab → *New
repository variable*:
- Name: `WPE_ENV`
- Value: your WP Engine install name (e.g. `newwavecreative`, or a staging
  install like `newwavecreativestg`)

Then delete the local key files. That's it — every push to `main` or the working
branch now rsyncs `nwc-landing/` into `wp-content/plugins/nwc-landing/`.

## One-time setup (WordPress)

1. **Plugins → Installed Plugins →** activate **"New Wave Creative — Landing."**
   (Activating a plugin does *not* change your theme.)
2. **Pages → Add New →** in *Page Attributes → Template*, choose **"NWC Landing."**
   Publish. That page now renders the landing template.
3. Upload your logo + images to the **Media Library** and point the `<img src>`
   values in `template-parts/landing.php` at their URLs (or just replace the
   bundled SVGs in `assets/` with same-named files).

## Editing

- **Copy & images:** `nwc-landing/template-parts/landing.php`
- **Look, scroll, layering, animation:** `nwc-landing/assets/css/styles.css` and
  `nwc-landing/assets/js/main.js`
- **Colors/fonts:** the `:root` block at the top of `styles.css`
  (`--blue #254f69`, `--navy #082f3f`, `--gold #ffc900`, `--font-body`, `--font-head`)

Asset URLs auto cache-bust on deploy (the plugin versions them with `filemtime`),
so changes show up on a normal refresh.

## Local preview (for development)

There's no build step. To eyeball changes without WordPress, generate a static
preview from the partial:

```bash
{
  echo '<!doctype html><html><head><meta charset=utf-8><meta name=viewport content="width=device-width,initial-scale=1">'
  echo '<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Onest:wght@400;500;600;700;800&display=swap" rel=stylesheet>'
  echo '<link rel=stylesheet href="nwc-landing/assets/css/styles.css"></head><body>'
  sed -n '/<!-- SECTION 01/,$p' nwc-landing/template-parts/landing.php | sed 's#<?php echo \$A; ?>#nwc-landing/assets/#g'
  echo '<script src="nwc-landing/assets/js/main.js"></script></body></html>'
} > preview.html   # gitignored; open in a browser
```

## Section map (top → bottom)

Navbar · Hero · CTA band · Logo marquee · About · Flip cards · Count-up stats ·
Programs (×3) · Blog cards · Comparison table · Pricing · Bento "How It Works" ·
Testimonials marquee · Final CTA · Footer.
