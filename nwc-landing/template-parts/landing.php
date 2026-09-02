<?php
/**
 * Landing page markup — section order mirrors the reference (quad.medvi.org):
 *   nav · hero · logos · statement · product showcase · stats · feature cards ·
 *   photo CTA · comparison chart · pricing · how it works · testimonials · CTA · footer
 *
 * Included by templates/landing-template.php, which defines $A = plugin assets base URL.
 * Copy is real New Wave Creative positioning, sourced from newwavecreative.io.
 * Placeholder imagery = assets/img/placeholder.svg.
 *
 * SEARCH "CONFIRM:" — those are unverified factual claims (stat figures, client
 * logos, testimonials). They are deliberately NOT filled with invented values.
 *
 * Animation hooks: data-reveal | data-reveal-delay | data-parallax | data-rotate | data-count | data-flip
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! isset( $A ) ) { $A = ''; }
?>
<!-- SECTION 01 — NAVBAR -->
<header class="nav" id="nav" data-nav>
  <div class="nav__inner nwc-container">
    <a class="nav__logo" href="#top" aria-label="New Wave Creative home">
      <img class="nav__logo-img nav__logo-img--light" src="<?php echo nwc_landing_asset( 'logo-white.png' ); ?>" alt="New Wave Creative">
      <img class="nav__logo-img nav__logo-img--dark" src="<?php echo nwc_landing_asset( 'logo.png' ); ?>" alt="New Wave Creative">
    </a>
    <nav class="nav__links" aria-label="Primary">
      <a href="#services">Services</a>
      <a href="#approach">Approach</a>
      <a href="#work">Work</a>
      <a href="#pricing">Pricing</a>
    </nav>
    <a href="#contact" class="btn btn--gold nav__cta">Contact Us</a>
    <button class="nav__burger" aria-label="Open menu" aria-expanded="false" data-menu-toggle>
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="nav__mobile" data-mobile-menu>
    <a href="#services">Services</a>
    <a href="#approach">Approach</a>
    <a href="#work">Work</a>
    <a href="#pricing">Pricing</a>
    <a href="#contact" class="btn btn--gold">Contact Us</a>
  </div>
</header>

<main id="top">

<!-- SECTION 02 — HERO (two-column: headline left, copy + CTA right) -->
<section class="hero" id="hero">
  <div class="hero__bg">
    <!-- Background video loop. Swap the .mp4 for your own (Media Library URL or
         replace assets/video/hero.mp4). muted+playsinline are required for
         autoplay; poster shows instantly + is the fallback. -->
    <video class="hero__media" autoplay muted loop playsinline preload="auto"
           poster="<?php echo nwc_landing_asset( 'img/hero-poster.jpg' ); ?>" aria-hidden="true">
      <source src="<?php echo nwc_landing_asset( 'video/hero.mp4' ); ?>" type="video/mp4">
    </video>
    <div class="hero__overlay"></div>
  </div>
  <div class="nwc-container hero__grid">
    <div class="hero__left">
      <!-- The old star-rating pill made an unverified 4.9/5 claim; swapped for two
           statements that are simply true. To put a rating back, use a real,
           attributable source (Google Business Profile). -->
      <div class="hero__badges" data-reveal>
        <span class="pill pill--rating"><span class="stars" aria-hidden="true">★</span> Mt. Juliet, Tennessee</span>
        <span class="pill pill--flag">Zero hand-offs</span>
      </div>
      <h1 class="hero__title" data-reveal data-reveal-delay="80">Your<br>Local<br>Digital Agency.</h1>
    </div>
    <div class="hero__right" data-reveal data-reveal-delay="180">
      <p class="hero__sub">We build websites that generate leads, run ads that produce a return you can
        measure, and handle your marketing like it matters. That's because we're your neighbor,
        not just your vendor.</p>
      <div class="hero__actions">
        <a href="#contact" class="btn btn--gold btn--lg">Schedule a Free Consultation</a>
        <a href="#approach" class="hero__link">See how we work →</a>
      </div>
    </div>
  </div>
  <a href="#work" class="hero__cue" aria-label="Scroll down"></a>
</section>

<!-- SECTION 03 — LOGO BAR (marquee) -->
<!-- CONFIRM: these are text placeholders. Replace with real client logo <img> tags
     once we have permission + files. American Baptist College is already public on
     newwavecreative.io; the rest need your sign-off before they go on a landing page. -->
<section class="logobar" id="work">
  <div class="nwc-container">
    <p class="logobar__label" data-reveal>Who we've worked with</p>
    <div class="marquee" data-marquee>
      <div class="marquee__track">
        <span class="logobar__logo">LOGO</span><span class="logobar__logo">BRAND</span>
        <span class="logobar__logo">COMPANY</span><span class="logobar__logo">STUDIO</span>
        <span class="logobar__logo">AGENCY</span><span class="logobar__logo">GROUP</span>
        <span class="logobar__logo">LOGO</span><span class="logobar__logo">BRAND</span>
        <span class="logobar__logo">COMPANY</span><span class="logobar__logo">STUDIO</span>
        <span class="logobar__logo">AGENCY</span><span class="logobar__logo">GROUP</span>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 04 — STATEMENT (centered intro) -->
<section class="about" id="approach">
  <span class="section-watermark" aria-hidden="true">Approach</span>
  <div class="nwc-container about__inner">
    <span class="eyebrow" data-reveal>Our Approach</span>
    <h2 class="about__title" data-reveal data-reveal-delay="80">
      You deserve a <span class="text-accent">different kind of digital partner</span>
    </h2>
    <p class="about__text" data-reveal data-reveal-delay="160">
      Most agencies sell you a package, assign you an account number, and move on. You end up
      chasing responses from someone who barely knows your business — let alone your zip code.
      New Wave Creative is built differently: every client gets a direct line to the person
      actually doing the work. No layers. No outsourced runaround.
    </p>
  </div>
</section>

<!-- SECTION 05 — PRODUCT SHOWCASE (card rotates on scroll) -->
<section class="showcase">
  <span class="section-watermark" aria-hidden="true">Showcase</span>
  <div class="nwc-container showcase__grid">
    <div class="showcase__stage" data-reveal>
      <div class="showcase__card" data-rotate>
        <img src="<?php echo $A; ?>img/placeholder.svg" alt="Showcase">
      </div>
    </div>
    <div class="showcase__body" data-reveal data-reveal-delay="140">
      <span class="eyebrow">The Difference</span>
      <h2>Big agency thinking. <span class="text-accent">Small market pricing.</span></h2>
      <p>We help Middle Tennessee businesses grow their reach and build their presence online —
        web design, site development, Google Ads, SEO, and AI-driven solutions, all handled by
        one team that actually knows your account.</p>
      <ul class="checklist">
        <li>One team, from kickoff to launch</li>
        <li>You own everything we build, outright</li>
        <li>No proprietary platform costs or hidden fees</li>
      </ul>
      <a href="#services" class="btn btn--dark">See Our Services</a>
    </div>
  </div>
</section>

<!-- SECTION 06 — STATS (count-up) + heading -->
<!-- CONFIRM: the three figures below are placeholders — I did not invent real numbers.
     Send me the actual values (or tell me to drop the section) and I'll set them. -->
<section class="stats">
  <div class="nwc-container">
    <div class="stats__grid">
      <div class="stat" data-reveal>
        <div class="stat__num"><span data-count="0">0</span>+</div>
        <div class="stat__label">Projects Launched</div>
      </div>
      <div class="stat" data-reveal data-reveal-delay="100">
        <div class="stat__num"><span data-count="0">0</span></div>
        <div class="stat__label">Years in Business</div>
      </div>
      <div class="stat" data-reveal data-reveal-delay="200">
        <div class="stat__num"><span data-count="0">0</span>%</div>
        <div class="stat__label">Client Retention</div>
      </div>
    </div>
    <div class="stats__headline" data-reveal>
      <h2>Local expertise, <span class="text-accent">measurable results</span></h2>
      <p>We know what local customers search for, which competitors you're up against, and what
        actually converts in this market. Not just in theory.</p>
    </div>
  </div>
</section>

<!-- SECTION 07 — FEATURE CARDS (stacked: text + large icon, alternating) -->
<section class="features" id="services">
  <span class="section-watermark" aria-hidden="true">Services</span>
  <div class="nwc-container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">What We Do</span>
      <h2>We do the stuff that <span class="text-accent">actually grows businesses</span></h2>
    </div>
    <div class="feature-list">
      <article class="featurecard" data-reveal>
        <div class="featurecard__body">
          <h3>Website Design &amp; Development</h3>
          <p>Fast, lead-generating websites built to get the attention of both your audience and
            of search engines. We build it. You own it outright.</p>
          <ul class="checklist">
            <li>Conversion-focused design</li>
            <li>You own the site outright</li>
            <li>No proprietary platform fees</li>
          </ul>
        </div>
        <div class="featurecard__icon" aria-hidden="true">◇</div>
      </article>
      <article class="featurecard" data-reveal data-reveal-delay="80">
        <div class="featurecard__body">
          <h3>AI Solutions</h3>
          <p>Chatbots, workflow automation, and AI-ready websites. We figure out where AI actually
            makes sense for your business, then build it. No hype. No shelfware.</p>
          <ul class="checklist">
            <li>Chatbots &amp; workflow automation</li>
            <li>CRM AI integration</li>
            <li>Tool selection and team training</li>
          </ul>
        </div>
        <div class="featurecard__icon" aria-hidden="true">△</div>
      </article>
      <article class="featurecard" data-reveal data-reveal-delay="160">
        <div class="featurecard__body">
          <h3>SEO + GEO</h3>
          <p>Search isn't just Google anymore. We build strategies that get you found on traditional
            search engines and in AI-powered results, so you show up no matter how your next
            customer is looking.</p>
          <ul class="checklist">
            <li>Technical and local SEO</li>
            <li>Generative Engine Optimization</li>
            <li>Visible however they search</li>
          </ul>
        </div>
        <div class="featurecard__icon" aria-hidden="true">○</div>
      </article>
      <article class="featurecard" data-reveal data-reveal-delay="240">
        <div class="featurecard__body">
          <h3>SEM &amp; PPC Campaigns</h3>
          <p>Campaigns that actually move the needle on your conversions, with tracking and
            reporting that makes sense of your ROI and lead generation.</p>
          <ul class="checklist">
            <li>Google Ads and paid social</li>
            <li>Reporting you can actually read</li>
            <li>Built around your lead goals</li>
          </ul>
        </div>
        <div class="featurecard__icon" aria-hidden="true">◈</div>
      </article>
      <article class="featurecard" data-reveal data-reveal-delay="320">
        <div class="featurecard__body">
          <h3>CRM Setup &amp; Management</h3>
          <p>The right system, configured to work. We help you implement the best platform, build
            effective landing pages, launch email sequences, and track leads.</p>
          <ul class="checklist">
            <li>Platform selection and setup</li>
            <li>Email sequences that convert</li>
            <li>Lead tracking end to end</li>
          </ul>
        </div>
        <div class="featurecard__icon" aria-hidden="true">▣</div>
      </article>
    </div>
  </div>
</section>

<!-- SECTION 08 — PHOTO CTA (full-bleed image) -->
<section class="photocta">
  <div class="photocta__bg" data-parallax="0.08">
    <img src="<?php echo $A; ?>img/placeholder.svg" alt="" aria-hidden="true">
    <div class="photocta__overlay"></div>
  </div>
  <div class="nwc-container photocta__content" data-reveal>
    <span class="eyebrow eyebrow--light">Mt. Juliet · Wilson County · Middle Tennessee</span>
    <h2>We're from here.<br>That changes everything.</h2>
    <p>We're not a national agency with a Mt. Juliet landing page. We live and work in Wilson
      County, and we treat your budget like it belongs to a real person — because it does.</p>
    <a href="https://newwavecreative.io/contact-us/" class="btn btn--gold btn--lg">Start Your Project</a>
  </div>
</section>

<!-- SECTION 09 — COMPARISON (animated line chart) -->
<section class="compare" id="compare">
  <div class="nwc-container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">Why Choose Us</span>
      <h2>What you <span class="text-accent">won't get elsewhere</span></h2>
    </div>
    <div class="chart" data-reveal>
      <svg class="chart__svg" viewBox="0 0 820 380" role="img" aria-label="New Wave vs Others over time">
        <!-- grid -->
        <g class="chart__grid">
          <line x1="60" y1="40"  x2="60"  y2="320"></line>
          <line x1="60" y1="320" x2="800" y2="320"></line>
          <line x1="60" y1="110" x2="800" y2="110"></line>
          <line x1="60" y1="180" x2="800" y2="180"></line>
          <line x1="60" y1="250" x2="800" y2="250"></line>
        </g>
        <!-- Others: flat / declining -->
        <polyline class="chart__line chart__line--them"
          points="60,250 200,255 340,262 480,270 620,285 800,300"></polyline>
        <!-- New Wave: rising -->
        <polyline class="chart__line chart__line--us"
          points="60,300 200,255 340,215 480,160 620,110 800,60"></polyline>
        <circle class="chart__dot chart__dot--us" cx="800" cy="60" r="7"></circle>
        <circle class="chart__dot chart__dot--them" cx="800" cy="300" r="7"></circle>
        <text class="chart__axis" x="60" y="344">Start</text>
        <text class="chart__axis" x="800" y="344" text-anchor="end">Now</text>
        <text class="chart__axis" x="20" y="185" transform="rotate(-90 20 185)" text-anchor="middle">Results</text>
        <text class="chart__lbl chart__lbl--us" x="792" y="46" text-anchor="end">New Wave</text>
        <text class="chart__lbl chart__lbl--them" x="792" y="322" text-anchor="end">The Old Way</text>
      </svg>
      <div class="chart__legend">
        <span class="chart__key chart__key--us">New Wave</span>
        <span class="chart__key chart__key--them">The Old Way</span>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 10 — PRICING (single product) -->
<!-- The reference had a $114/mo product. You don't publish package pricing, so this is
     framed as a scoped quote instead of an invented number. If you DO want a figure
     here, put it back as: <span class="plan__cur">$</span>NNN<span class="plan__per">/mo</span> -->
<section class="pricing" id="pricing">
  <div class="nwc-container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">Straightforward Pricing</span>
      <h2>Big agency thinking, <span class="text-accent">small market pricing</span></h2>
    </div>
    <div class="product" data-reveal>
      <div class="product__media"><img src="<?php echo $A; ?>img/placeholder.svg" alt="Project work"></div>
      <div class="product__card">
        <span class="product__badge">No Hidden Fees</span>
        <h3 class="product__name">Scoped to Your Project</h3>
        <div class="product__price">Custom <span class="plan__per">quote</span></div>
        <ul class="checklist">
          <li>Free consultation and scope</li>
          <li>Flat project pricing, no surprises</li>
          <li>You own everything we build</li>
          <li>A direct line to the person doing the work</li>
        </ul>
        <a href="https://newwavecreative.io/contact-us/" class="btn btn--gold btn--block btn--lg">Schedule a Free Consultation</a>
        <p class="product__note">Free consultation · no obligation · no hidden fees</p>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 11 — HOW IT WORKS (gradient step cards) -->
<section class="how" id="how">
  <div class="nwc-container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">How It Works</span>
      <h2>Three steps, <span class="text-accent">zero hand-offs</span></h2>
    </div>
    <div class="bento">
      <div class="bento__cell bento__cell--lg" data-reveal>
        <span class="bento__step">Step 1</span>
        <div class="bento__glow"></div>
        <h3>Free Consultation</h3>
        <p>We start with a conversation about your business, your market, and what you actually
          need — not a pitch deck for a package we already built.</p>
      </div>
      <div class="bento__cell" data-reveal data-reveal-delay="100">
        <span class="bento__step">Step 2</span>
        <div class="bento__glow"></div>
        <h3>A Clear Plan &amp; Quote</h3>
        <p>You get a scoped plan and a flat quote before any work starts.</p>
      </div>
      <div class="bento__cell" data-reveal data-reveal-delay="200">
        <span class="bento__step">Step 3</span>
        <div class="bento__glow"></div>
        <h3>We Build It</h3>
        <p>You work with the person running your project, from kickoff to launch.</p>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 12 — TESTIMONIALS (marquee) -->
<!-- CONFIRM: I will not write fake reviews, so these are deliberately obvious
     placeholders rather than plausible-sounding invented quotes. Send real client
     quotes + names/titles (with permission) and I'll drop them in. If none are
     available yet, say the word and I'll remove the whole section. -->
<section class="testimonials">
  <div class="nwc-container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">Testimonials</span>
      <h2>What our <span class="text-accent">clients say</span></h2>
    </div>
  </div>
  <div class="marquee marquee--cards" data-marquee data-reveal>
    <div class="marquee__track">
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #1]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #2]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #3]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #4]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
      <!-- duplicate set for seamless loop -->
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #1]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #2]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #3]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“[REPLACE — real client quote #4]”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>[Client name]</strong>[Title, Company]</span></figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- SECTION 13 — FINAL CTA -->
<section class="finalcta" id="contact">
  <div class="nwc-container finalcta__inner" data-reveal>
    <h2>Let's talk about <span class="text-accent">what you're trying to grow</span></h2>
    <p>A free consultation with the person who'd actually run your project. No packages,
      no account numbers, no hand-offs.</p>
    <a href="https://newwavecreative.io/contact-us/" class="btn btn--gold btn--lg">Schedule a Free Consultation</a>
    <!-- Trustpilot badge removed: unverified claim. Replaced with facts that are true. -->
    <div class="trustbadge"><span class="stars">★</span> Based in Mt. Juliet, TN · Serving all of Middle Tennessee</div>
  </div>
</section>

</main>

<!-- SECTION 14 — FOOTER -->
<footer class="footer">
  <div class="nwc-container">
    <div class="footer__features" data-reveal>
      <div class="feature"><span class="feature__icon">◈</span><div><strong>No Hand-offs</strong><span>Work directly with your team</span></div></div>
      <div class="feature"><span class="feature__icon">✆</span><div><strong>Local &amp; Responsive</strong><span>Based in Mt. Juliet, TN</span></div></div>
      <div class="feature"><span class="feature__icon">✔</span><div><strong>You Own It</strong><span>No proprietary platform fees</span></div></div>
    </div>

    <div class="footer__main">
      <div class="footer__brand">
        <p>Big agency thinking, small market pricing, zero hand-offs. We help Middle Tennessee
          businesses grow their reach and develop their presence online.</p>
        <div class="footer__pills">
          <a href="mailto:info@newwavecreative.io" class="pill pill--contact">✉ info@newwavecreative.io</a>
          <a href="tel:+16157633523" class="pill pill--contact">✆ (615) 763-3523</a>
        </div>
      </div>
      <nav class="footer__nav">
        <div><h4>Company</h4><a href="#services">Services</a><a href="#approach">Approach</a><a href="#work">Work</a><a href="#pricing">Pricing</a></div>
        <div><h4>Explore</h4><a href="#services">What We Do</a><a href="#how">How It Works</a><a href="#pricing">Pricing</a><a href="#contact">Contact</a></div>
        <!-- CONFIRM: point these at the real policy pages on newwavecreative.io -->
        <div><h4>Legal</h4><a href="#">Terms &amp; Conditions</a><a href="#">Privacy Policy</a><a href="#">Refund Policy</a><a href="https://newwavecreative.io/contact-us/">Contact</a></div>
      </nav>
    </div>

    <div class="footer__bottom">
      <span>© 2026 New Wave Creative. All rights reserved.</span>
      <span>Mt. Juliet, Tennessee.</span>
    </div>
  </div>
</footer>
