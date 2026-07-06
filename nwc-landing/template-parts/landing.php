<?php
/**
 * Landing page markup (all 15 sections). Included by templates/landing-template.php,
 * which defines $A = plugin assets base URL. Placeholder copy = Lorem Ipsum;
 * placeholder imagery = assets/img/placeholder.svg — swap for real content or
 * point <img src> at Media Library URLs.
 *
 * Animation hooks: data-reveal | data-reveal-delay | data-parallax | data-count | data-flip
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( ! isset( $A ) ) { $A = ''; } // fallback if included directly
?>
<!-- SECTION 01 — NAVBAR (transparent over hero, solid on scroll) -->
<header class="nav" id="nav" data-nav>
  <div class="nav__inner container">
    <a class="nav__logo" href="#top" aria-label="New Wave Creative home">
      <img class="nav__logo-img nav__logo-img--light" src="<?php echo $A; ?>logo-white.svg" alt="New Wave Creative">
      <img class="nav__logo-img nav__logo-img--dark" src="<?php echo $A; ?>logo.svg" alt="New Wave Creative">
    </a>
    <nav class="nav__links" aria-label="Primary">
      <a href="#work">Work</a>
      <a href="#services">Services</a>
      <a href="#approach">Approach</a>
      <a href="#blog">Blog</a>
    </nav>
    <a href="#contact" class="btn btn--gold nav__cta">Contact Us</a>
    <button class="nav__burger" aria-label="Open menu" aria-expanded="false" data-menu-toggle>
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="nav__mobile" data-mobile-menu>
    <a href="#work">Work</a>
    <a href="#services">Services</a>
    <a href="#approach">Approach</a>
    <a href="#blog">Blog</a>
    <a href="#contact" class="btn btn--gold">Contact Us</a>
  </div>
</header>

<main id="top">

<!-- SECTION 02 — HERO -->
<section class="hero" id="hero">
  <div class="hero__bg">
    <img src="<?php echo $A; ?>img/placeholder.svg" alt="" aria-hidden="true">
    <div class="hero__overlay"></div>
  </div>
  <div class="container hero__content">
    <div class="hero__badges" data-reveal>
      <span class="pill pill--rating"><span class="stars" aria-hidden="true">★★★★★</span> Excellent 4.9 out of 5</span>
      <span class="pill pill--flag">★ USA Made</span>
    </div>
    <h1 class="hero__title" data-reveal data-reveal-delay="80">
      Lorem ipsum dolor <span class="text-gold">sit amet</span> consectetur elit
    </h1>
    <p class="hero__sub" data-reveal data-reveal-delay="160">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.
    </p>
    <div class="hero__actions" data-reveal data-reveal-delay="240">
      <a href="#pricing" class="btn btn--gold btn--lg">Find Your Perfect Program</a>
      <a href="#how" class="btn btn--ghost-light btn--lg">How It Works</a>
    </div>
  </div>
</section>

<!-- SECTION 03 — CTA BAND -->
<section class="ctaband">
  <div class="container ctaband__inner" data-reveal>
    <h2>Lorem ipsum dolor sit amet consectetur</h2>
    <a href="#contact" class="btn btn--gold btn--lg">Get Started</a>
  </div>
</section>

<!-- SECTION 04 — LOGO BAR (marquee) -->
<section class="logobar" id="work">
  <div class="container">
    <p class="logobar__label" data-reveal>Trusted by teams everywhere</p>
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

<!-- SECTION 05 — ABOUT / MEET THE TEAM (intro) -->
<section class="about" id="approach">
  <div class="container about__inner">
    <span class="eyebrow" data-reveal>About Us</span>
    <h2 class="about__title" data-reveal data-reveal-delay="80">
      Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod
    </h2>
    <p class="about__text" data-reveal data-reveal-delay="160">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
    </p>
  </div>
</section>

<!-- SECTION 06 — FLIP CARDS (parallax scroll) -->
<section class="flipcards" id="services">
  <h2 class="flipcards__bgtext" aria-hidden="true">SERVICES</h2>
  <div class="container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">The Science</span>
      <h2>Lorem ipsum dolor sit amet</h2>
    </div>
    <div class="flipcards__grid">
      <article class="flip" data-flip data-reveal data-parallax="0.06">
        <div class="flip__inner">
          <div class="flip__face flip__front">
            <div class="flip__icon">◇</div>
            <h3>Lorem Ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <span class="flip__more">More +</span>
          </div>
          <div class="flip__face flip__back">
            <h4>Details</h4>
            <ul>
              <li><strong>Ingredient</strong> — Lorem ipsum dolor</li>
              <li><strong>Mechanism</strong> — Consectetur elit</li>
              <li><strong>Benefit</strong> — Sed do eiusmod</li>
            </ul>
            <span class="flip__close">Close ×</span>
          </div>
        </div>
      </article>
      <article class="flip" data-flip data-reveal data-reveal-delay="100" data-parallax="0.12">
        <div class="flip__inner">
          <div class="flip__face flip__front">
            <div class="flip__icon">△</div>
            <h3>Dolor Sit</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <span class="flip__more">More +</span>
          </div>
          <div class="flip__face flip__back">
            <h4>Details</h4>
            <ul>
              <li><strong>Ingredient</strong> — Lorem ipsum dolor</li>
              <li><strong>Mechanism</strong> — Consectetur elit</li>
              <li><strong>Benefit</strong> — Sed do eiusmod</li>
            </ul>
            <span class="flip__close">Close ×</span>
          </div>
        </div>
      </article>
      <article class="flip" data-flip data-reveal data-reveal-delay="200" data-parallax="0.18">
        <div class="flip__inner">
          <div class="flip__face flip__front">
            <div class="flip__icon">○</div>
            <h3>Amet Elit</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <span class="flip__more">More +</span>
          </div>
          <div class="flip__face flip__back">
            <h4>Details</h4>
            <ul>
              <li><strong>Ingredient</strong> — Lorem ipsum dolor</li>
              <li><strong>Mechanism</strong> — Consectetur elit</li>
              <li><strong>Benefit</strong> — Sed do eiusmod</li>
            </ul>
            <span class="flip__close">Close ×</span>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<!-- SECTION 07 — STATS (count-up) -->
<section class="stats">
  <div class="container stats__grid">
    <div class="stat" data-reveal>
      <div class="stat__num"><span data-count="12000">0</span>+</div>
      <div class="stat__label">Active Members</div>
    </div>
    <div class="stat" data-reveal data-reveal-delay="100">
      <div class="stat__num"><span data-count="48">0</span></div>
      <div class="stat__label">Programs</div>
    </div>
    <div class="stat" data-reveal data-reveal-delay="200">
      <div class="stat__num"><span data-count="99">0</span>%</div>
      <div class="stat__label">Satisfaction</div>
    </div>
    <div class="stat" data-reveal data-reveal-delay="300">
      <div class="stat__num"><span data-count="15">0</span>+</div>
      <div class="stat__label">Years Experience</div>
    </div>
  </div>
</section>

<!-- SECTION 08 — PROGRAMS (alternating image + list, x3) -->
<section class="programs" id="programs">
  <div class="container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">Training Programs</span>
      <h2>Lorem ipsum dolor sit amet consectetur</h2>
    </div>

    <div class="program" data-reveal>
      <div class="program__media"><img src="<?php echo $A; ?>img/placeholder.svg" alt="Program one"></div>
      <div class="program__body">
        <h3>Program One</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
        <ul class="checklist">
          <li>Lorem ipsum dolor sit amet</li>
          <li>Consectetur adipiscing elit</li>
          <li>Sed do eiusmod tempor</li>
        </ul>
        <a href="#pricing" class="btn btn--dark">Learn More</a>
      </div>
    </div>

    <div class="program program--reverse" data-reveal>
      <div class="program__media"><img src="<?php echo $A; ?>img/placeholder.svg" alt="Program two"></div>
      <div class="program__body">
        <h3>Program Two</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
        <ul class="checklist">
          <li>Lorem ipsum dolor sit amet</li>
          <li>Consectetur adipiscing elit</li>
          <li>Sed do eiusmod tempor</li>
        </ul>
        <a href="#pricing" class="btn btn--dark">Learn More</a>
      </div>
    </div>

    <div class="program" data-reveal>
      <div class="program__media"><img src="<?php echo $A; ?>img/placeholder.svg" alt="Program three"></div>
      <div class="program__body">
        <h3>Program Three</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
        <ul class="checklist">
          <li>Lorem ipsum dolor sit amet</li>
          <li>Consectetur adipiscing elit</li>
          <li>Sed do eiusmod tempor</li>
        </ul>
        <a href="#pricing" class="btn btn--dark">Learn More</a>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 09 — BLOG / RESOURCE CARDS (x3) -->
<section class="blog" id="blog">
  <div class="container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">From the Blog</span>
      <h2>Lorem ipsum dolor sit amet</h2>
    </div>
    <div class="blog__grid">
      <a class="blogcard" href="#" data-reveal>
        <div class="blogcard__media"><img src="<?php echo $A; ?>img/placeholder.svg" alt=""><span class="blogcard__grad"></span></div>
        <div class="blogcard__body">
          <span class="tag">Category</span>
          <h3>Lorem ipsum dolor sit amet consectetur</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </a>
      <a class="blogcard" href="#" data-reveal data-reveal-delay="100">
        <div class="blogcard__media"><img src="<?php echo $A; ?>img/placeholder.svg" alt=""><span class="blogcard__grad"></span></div>
        <div class="blogcard__body">
          <span class="tag">Category</span>
          <h3>Lorem ipsum dolor sit amet consectetur</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </a>
      <a class="blogcard" href="#" data-reveal data-reveal-delay="200">
        <div class="blogcard__media"><img src="<?php echo $A; ?>img/placeholder.svg" alt=""><span class="blogcard__grad"></span></div>
        <div class="blogcard__body">
          <span class="tag">Category</span>
          <h3>Lorem ipsum dolor sit amet consectetur</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- SECTION 10 — COMPARISON TABLE (Us vs Others) -->
<section class="compare">
  <div class="container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">Why Choose Us</span>
      <h2>Lorem ipsum dolor sit amet</h2>
    </div>
    <div class="compare__table" data-reveal>
      <div class="compare__row compare__row--head">
        <div class="compare__feature"></div>
        <div class="compare__col compare__col--us">New Wave</div>
        <div class="compare__col">Others</div>
      </div>
      <div class="compare__row">
        <div class="compare__feature">Lorem ipsum dolor sit amet</div>
        <div class="compare__col compare__col--us"><span class="yes">✓</span></div>
        <div class="compare__col"><span class="no">✕</span></div>
      </div>
      <div class="compare__row">
        <div class="compare__feature">Consectetur adipiscing elit</div>
        <div class="compare__col compare__col--us"><span class="yes">✓</span></div>
        <div class="compare__col"><span class="no">✕</span></div>
      </div>
      <div class="compare__row">
        <div class="compare__feature">Sed do eiusmod tempor</div>
        <div class="compare__col compare__col--us"><span class="yes">✓</span></div>
        <div class="compare__col"><span class="no">✕</span></div>
      </div>
      <div class="compare__row">
        <div class="compare__feature">Incididunt ut labore</div>
        <div class="compare__col compare__col--us"><span class="yes">✓</span></div>
        <div class="compare__col"><span class="no">✕</span></div>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 11 — PRICING (3 plans) -->
<section class="pricing" id="pricing">
  <div class="container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">Choose the Plan</span>
      <h2>Lorem ipsum dolor sit amet</h2>
    </div>
    <div class="pricing__grid">
      <div class="plan" data-reveal>
        <h3 class="plan__name">Starter</h3>
        <div class="plan__price"><span class="plan__cur">$</span>49<span class="plan__per">/mo</span></div>
        <ul class="checklist">
          <li>Lorem ipsum dolor</li>
          <li>Consectetur elit</li>
          <li>Sed do eiusmod</li>
          <li>Tempor incididunt</li>
        </ul>
        <a href="#contact" class="btn btn--dark btn--block">Choose Plan</a>
      </div>
      <div class="plan plan--featured" data-reveal data-reveal-delay="100">
        <span class="plan__badge">Most Popular</span>
        <h3 class="plan__name">Pro</h3>
        <div class="plan__price"><span class="plan__cur">$</span>99<span class="plan__per">/mo</span></div>
        <ul class="checklist">
          <li>Everything in Starter</li>
          <li>Lorem ipsum dolor</li>
          <li>Consectetur elit</li>
          <li>Sed do eiusmod tempor</li>
        </ul>
        <a href="#contact" class="btn btn--gold btn--block">Choose Plan</a>
      </div>
      <div class="plan" data-reveal data-reveal-delay="200">
        <h3 class="plan__name">Elite</h3>
        <div class="plan__price"><span class="plan__cur">$</span>199<span class="plan__per">/mo</span></div>
        <ul class="checklist">
          <li>Everything in Pro</li>
          <li>Lorem ipsum dolor</li>
          <li>Consectetur elit</li>
          <li>Dedicated support</li>
        </ul>
        <a href="#contact" class="btn btn--dark btn--block">Choose Plan</a>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 12 — HOW IT WORKS (bento grid) -->
<section class="how" id="how">
  <div class="container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">How It Works</span>
      <h2>Lorem ipsum dolor sit amet consectetur</h2>
    </div>
    <div class="bento">
      <div class="bento__cell bento__cell--lg" data-reveal>
        <span class="bento__step">01</span>
        <div class="bento__glow"></div>
        <h3>Choose Your Program</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
      </div>
      <div class="bento__cell" data-reveal data-reveal-delay="100">
        <span class="bento__step">02</span>
        <div class="bento__glow"></div>
        <h3>Get Matched</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="bento__cell" data-reveal data-reveal-delay="200">
        <span class="bento__step">03</span>
        <div class="bento__glow"></div>
        <h3>Start Today</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
  </div>
</section>

<!-- SECTION 13 — TESTIMONIALS (marquee w/ stars) -->
<section class="testimonials">
  <div class="container">
    <div class="section-head" data-reveal>
      <span class="eyebrow">Testimonials</span>
      <h2>What Our Clients Say</h2>
    </div>
  </div>
  <div class="marquee marquee--cards" data-marquee data-reveal>
    <div class="marquee__track">
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>Jane Doe</strong>Client</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>John Smith</strong>Client</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>Amy Lee</strong>Client</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>Carlos Ruiz</strong>Client</span></figcaption>
      </figure>
      <!-- duplicate set for seamless loop -->
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>Jane Doe</strong>Client</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>John Smith</strong>Client</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>Amy Lee</strong>Client</span></figcaption>
      </figure>
      <figure class="review">
        <div class="stars">★★★★★</div>
        <blockquote>“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.”</blockquote>
        <figcaption><img src="<?php echo $A; ?>img/avatar.svg" alt=""><span><strong>Carlos Ruiz</strong>Client</span></figcaption>
      </figure>
    </div>
  </div>
</section>

<!-- SECTION 14 — FINAL CTA -->
<section class="finalcta" id="contact">
  <div class="container finalcta__inner" data-reveal>
    <h2>Lorem ipsum dolor sit amet consectetur adipiscing</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>
    <a href="#" class="btn btn--gold btn--lg">Find Your Perfect Program</a>
  </div>
</section>

</main>

<!-- SECTION 15 — FOOTER -->
<footer class="footer">
  <div class="container">
    <div class="footer__features" data-reveal>
      <div class="feature"><span class="feature__icon">◈</span><div><strong>Lorem Ipsum</strong><span>Dolor sit amet consectetur</span></div></div>
      <div class="feature"><span class="feature__icon">✆</span><div><strong>24/7 Support</strong><span>One-on-one guidance</span></div></div>
      <div class="feature"><span class="feature__icon">✔</span><div><strong>Guaranteed</strong><span>Money-back promise</span></div></div>
    </div>

    <div class="footer__main">
      <div class="footer__brand">
        <img src="<?php echo $A; ?>logo.svg" alt="New Wave Creative" class="footer__logo">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
        <div class="footer__pills">
          <a href="#" class="pill pill--contact">✉ hello@newwavecreative.io</a>
          <a href="#" class="pill pill--contact">✆ (000) 000-0000</a>
        </div>
      </div>
      <nav class="footer__nav">
        <div><h4>Company</h4><a href="#work">Work</a><a href="#services">Services</a><a href="#approach">Approach</a><a href="#blog">Blog</a></div>
        <div><h4>Programs</h4><a href="#programs">Program One</a><a href="#programs">Program Two</a><a href="#programs">Program Three</a><a href="#pricing">Pricing</a></div>
        <div><h4>Legal</h4><a href="#">Terms &amp; Conditions</a><a href="#">Privacy Policy</a><a href="#">Refund Policy</a><a href="#">Contact</a></div>
      </nav>
    </div>

    <div class="footer__bottom">
      <span>© 2026 New Wave Creative. All rights reserved.</span>
      <span>Made with care.</span>
    </div>
  </div>
</footer>
