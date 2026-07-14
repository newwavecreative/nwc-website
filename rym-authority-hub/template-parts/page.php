<?php
/**
 * RYM Authority Hub page markup. Included by templates/page-template.php,
 * which defines $A (the plugin assets/ base URL).
 *
 * Generated from the Lovable prototype (rym-authority-hub.lovable.app):
 * server-rendered markup captured verbatim, asset URLs localized, and the
 * React-only pieces (nav dropdowns, mobile drawer, rate tabs, carousel,
 * dialogs) re-expressed as static markup driven by assets/js/main.js.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class="min-h-screen bg-[color:var(--stone)]">
<header class="sticky top-0 z-40 border-b border-border/60 bg-[color:var(--stone)]/85 backdrop-blur">
<div class="container-page flex h-16 items-center justify-between">
<a aria-label="Replace Your University" class="flex items-center" href="/">
<img src="<?php echo $A; ?>img/RYU-Submark-CampusSteel-RGB.png" alt="Replace Your University" class="h-8 w-auto"/>
</a>
<nav class="hidden items-center gap-8 md:flex">
<div class="rym-nav-dropdown">
<button type="button" aria-haspopup="menu" aria-expanded="false" data-rym-dropdown class="inline-flex items-center gap-1 text-sm font-medium text-[color:var(--navy-deep)] outline-none transition-colors hover:text-[color:var(--honors)]">Our Story<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-3.5 w-3.5 transition-transform duration-200" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</button>
<div class="rym-nav-menu min-w-[240px] rounded-xl border border-border/60 bg-white p-2 shadow-[0_20px_50px_-20px_rgba(16,24,39,0.25)]" hidden>
<a href="#michael" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Our Story</a>
<a href="#michael" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Meet the Team</a>
<a href="#media" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">In The News</a>
</div>
</div>
<div class="rym-nav-dropdown">
<button type="button" aria-haspopup="menu" aria-expanded="false" data-rym-dropdown class="inline-flex items-center gap-1 text-sm font-medium text-[color:var(--navy-deep)] outline-none transition-colors hover:text-[color:var(--honors)]">Programs<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-3.5 w-3.5 transition-transform duration-200" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</button>
<div class="rym-nav-menu min-w-[240px] rounded-xl border border-border/60 bg-white p-2 shadow-[0_20px_50px_-20px_rgba(16,24,39,0.25)]" hidden>
<a href="#education" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Replace Your Mortgage</a>
<a href="#education" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Replace Your Bank</a>
<a href="#education" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Replace Your Dollar</a>
<a href="#education" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Replace Your Employer</a>
</div>
</div>
<div class="rym-nav-dropdown">
<button type="button" aria-haspopup="menu" aria-expanded="false" data-rym-dropdown class="inline-flex items-center gap-1 text-sm font-medium text-[color:var(--navy-deep)] outline-none transition-colors hover:text-[color:var(--honors)]">Learn<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-3.5 w-3.5 transition-transform duration-200" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</button>
<div class="rym-nav-menu min-w-[240px] rounded-xl border border-border/60 bg-white p-2 shadow-[0_20px_50px_-20px_rgba(16,24,39,0.25)]" hidden>
<a href="#education" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Education Hub</a>
<a href="#faq" class="block cursor-pointer rounded-lg px-3 py-2.5 text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:bg-[color:var(--stone)]">Frequently Asked Questions</a>
</div>
</div>
<a href="#reviews" class="text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:text-[color:var(--honors)]">Reviews</a>
<a href="#contact" class="text-sm font-medium text-[color:var(--navy-deep)] transition-colors hover:text-[color:var(--honors)]">Contact</a>
</nav>
<a href="#training" class="btn-cta hidden md:inline-flex !py-2.5 !px-4 text-sm">Watch Free Training</a>
<button type="button" aria-label="Open menu" data-rym-drawer-open class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-[color:var(--navy-deep)] md:hidden">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu h-6 w-6" aria-hidden="true">
<path d="M4 5h16">
</path>
<path d="M4 12h16">
</path>
<path d="M4 19h16">
</path>
</svg>
</button>
</div>
</header>
<main>
<section id="training" class="relative overflow-hidden bg-[color:var(--navy-deep)] text-white">
<div class="pointer-events-none absolute inset-0 opacity-[0.12]">
<div class="absolute -left-40 top-10 h-[520px] w-[520px] rounded-full bg-[color:var(--honors)] blur-[140px]">
</div>
<div class="absolute -right-40 bottom-0 h-[420px] w-[420px] rounded-full bg-[color:var(--rym)] blur-[140px]">
</div>
</div>
<div class="container-page relative grid items-center gap-14 pb-24 pt-14 lg:grid-cols-[1.15fr_1fr] lg:gap-16 lg:pt-20">
<div>
<div class="mb-7 hidden items-center gap-3 md:flex">
<span class="inline-flex h-11 items-center rounded-sm bg-white px-2">
<img src="<?php echo $A; ?>img/ryu-logo-full.png" alt="Replace Your University" class="h-9 w-auto"/>
</span>
<span class="text-[11px] font-semibold uppercase tracking-[0.24em] text-white/60">Replace Your University · est. 2013</span>
</div>
<h1 class="font-display text-[2.5rem] font-extrabold leading-[1.02] tracking-[-0.02em] text-white sm:text-[3.2rem] lg:text-[3.75rem]">Learn Why Your Mortgage Is Costing You <em class="font-serif-italic font-normal">More Than You Think</em>
</h1>
<p class="mt-5 max-w-xl text-[1.35rem] font-semibold leading-snug text-[color:var(--ember)] sm:text-[1.5rem]">The Number Almost Everyone Overlooks</p>
<p class="mt-6 max-w-xl text-[1.06rem] leading-relaxed text-white/75">After 17 years in the mortgage industry, <strong class="font-semibold text-white">Michael Lush</strong> reveals the overlooked number that often matters more than your interest rate—and why understanding it has helped thousands of homeowners position themselves to pay off their homes years sooner.</p>
<div class="mt-9 flex flex-wrap items-center gap-4">
<a href="#training-form" class="btn-cta">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg> Watch The Free Training</a>
<span class="text-sm text-white/55">Free · 16 minutes · No obligation</span>
</div>
<div class="mt-12 grid max-w-md grid-cols-2 gap-6 border-t border-white/10 pt-7 text-left">
<div>
<div class="font-display text-xl font-bold">A+ BBB</div>
<div class="text-xs uppercase tracking-[0.16em] text-white/55">Accredited since 2017</div>
</div>
<div>
<div class="font-display text-xl font-bold">10,000+</div>
<div class="text-xs uppercase tracking-[0.16em] text-white/55">Homeowners served</div>
</div>
</div>
</div>
<div class="relative">
<div class="absolute -inset-3 -z-10 rounded-2xl bg-gradient-to-br from-white/10 to-transparent blur-2xl">
</div>
<div class="overflow-hidden rounded-xl border border-white/10 bg-[color:var(--graphite)] shadow-2xl">
<div class="relative aspect-video">
<img src="<?php echo $A; ?>img/michael-interview-clean.png" alt="Michael Lush, CEO and Founder of Replace Your University, in conversation" class="h-full w-full object-cover" width="1536" height="1024"/>
<div class="absolute inset-0 bg-gradient-to-t from-[color:var(--navy-deep)]/85 via-[color:var(--navy-deep)]/10 to-transparent">
</div>
<button type="button" data-training-cta="true" aria-label="Play free training" class="group absolute inset-0 flex items-center justify-center">
<span class="flex h-20 w-20 items-center justify-center rounded-full bg-[color:var(--ember)] text-white shadow-2xl ring-8 ring-white/10 transition group-hover:scale-105">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-10 w-10" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg>
</span>
</button>
<div class="absolute bottom-5 right-5 flex items-center gap-3 rounded-sm bg-[color:var(--navy-deep)]/85 px-4 py-2.5 backdrop-blur-sm">
<div class="text-right">
<div class="font-display text-lg font-bold leading-none text-white">Michael Lush</div>
<div class="mt-1 text-[10px] font-semibold uppercase tracking-[0.18em] text-white/70">CEO / Founder · Replace Your University</div>
</div>
</div>
</div>
<div class="border-t border-white/10 bg-[color:var(--navy-deep)] px-5 py-4">
<div class="eyebrow !text-white/55">Free Training · 16 min</div>
<div class="mt-1 font-display text-[1.05rem] font-semibold text-white">Your “3% Interest Rate” Is Costing You 51.8% In Total Interest</div>
</div>
</div>
</div>
</div>
</section>
<section id="media" aria-label="As featured in" class="border-b border-border bg-white">
<div class="container-page flex flex-col items-center gap-6 py-9 md:gap-8">
<span class="eyebrow">As Featured In</span>
<div class="flex w-full flex-wrap items-center justify-center gap-x-10 gap-y-5 md:gap-x-14">
<span class="font-serif text-[1.35rem] italic font-semibold tracking-tight text-[color:var(--navy-deep)]/75 transition hover:text-[color:var(--navy-deep)]">Entrepreneur</span>
<span class="font-display text-[1.15rem] font-black uppercase tracking-[0.02em] text-[color:var(--navy-deep)]/75 transition hover:text-[color:var(--navy-deep)]">Associated Press</span>
<span class="font-display text-[1.5rem] font-black tracking-[0.14em] text-[color:var(--navy-deep)]/75 transition hover:text-[color:var(--navy-deep)]">NTD</span>
<span class="font-display text-[1.35rem] font-black tracking-tight text-[color:var(--navy-deep)]/75 transition hover:text-[color:var(--navy-deep)]">BuzzFeed</span>
<span class="font-display text-[1.2rem] font-bold tracking-tight text-[color:var(--navy-deep)]/75 transition hover:text-[color:var(--navy-deep)]">FutureSharks</span>
<span class="font-serif text-[1.3rem] italic tracking-tight text-[color:var(--navy-deep)]/75 transition hover:text-[color:var(--navy-deep)]">Thrive Global</span>
</div>
</div>
</section>
<section id="problem" class="bg-[color:var(--stone)] py-24">
<div class="container-page">
<div class="mx-auto max-w-3xl text-center">
<span class="eyebrow">THE PROBLEM</span>
<h2 class="mt-4 text-[2.25rem] leading-[1.05] sm:text-[2.75rem]">Most Homeowners Have <br class="hidden lg:block"/>
<span class="font-serif-italic font-normal">A Mortgage Blind Spot.</span>
</h2>
<p class="mt-4 text-[1.25rem] font-semibold leading-relaxed text-[color:var(--navy-deep)]">Interest Rate <span class="font-serif-italic font-normal text-[color:var(--ember)]">≠</span> Interest Cost</p>
<p class="mt-6 text-[1.05rem] leading-relaxed text-[color:var(--graphite)]/80">Most homeowners know their interest rate. Very few know what their mortgage will actually cost them. The number that matters most is your Total Interest Percentage, found on <button data-loan-estimate-lightbox="true" class="inline cursor-pointer font-semibold underline decoration-[color:var(--ember)] underline-offset-4 hover:text-[color:var(--navy-deep)] hover:decoration-2">page 3 of your loan estimate</button>.</p>
</div>
<div class="mx-auto mt-12 max-w-3xl">
<div class="flex flex-col items-center gap-3">
<p class="text-xs uppercase tracking-[0.18em] text-[color:var(--steel)]">Pick the rate closest to yours</p>
<div role="tablist" aria-label="Choose your interest rate" class="inline-flex items-center gap-1 rounded-full border border-border bg-white p-1.5 shadow-sm">
<button role="tab" aria-selected="false" data-rym-rate="3" class="rounded-full px-5 py-2 text-sm font-semibold transition sm:px-7 sm:py-2.5 sm:text-[0.95rem] text-[color:var(--graphite)]/70 hover:text-[color:var(--navy-deep)]">3% interest rate</button>
<button role="tab" aria-selected="false" data-rym-rate="5" class="rounded-full px-5 py-2 text-sm font-semibold transition sm:px-7 sm:py-2.5 sm:text-[0.95rem] text-[color:var(--graphite)]/70 hover:text-[color:var(--navy-deep)]">5% interest rate</button>
<button role="tab" aria-selected="true" data-rym-rate="7" class="rounded-full px-5 py-2 text-sm font-semibold transition sm:px-7 sm:py-2.5 sm:text-[0.95rem] bg-[color:var(--navy-deep)] text-white shadow-sm">7% interest rate</button>
</div>
</div>
</div>
<div class="mx-auto mt-10 max-w-3xl">
<div class="flex flex-col items-center rounded-2xl border-2 border-[color:var(--navy-deep)]/10 bg-white p-8 shadow-[0_20px_60px_-30px_rgba(15,22,36,0.15)] sm:p-10 md:flex-row md:justify-center md:gap-4 lg:gap-5">
<div class="flex flex-col items-center text-center">
<div class="eyebrow !text-[color:var(--rym)]">You borrow</div>
<div class="mt-2 font-display text-4xl font-extrabold text-[color:var(--rym)] sm:text-5xl">$400k</div>
<div class="mt-1 text-sm font-bold text-[color:var(--rym)]">in principal</div>
</div>
<div class="my-2 shrink-0 font-display text-2xl font-black text-[color:var(--graphite)]/50 md:my-0 md:px-2">+</div>
<div class="flex flex-col items-center text-center">
<div class="eyebrow !text-[color:var(--ember)]">You pay</div>
<div class="mt-2 font-display text-4xl font-extrabold text-[color:var(--ember)] sm:text-5xl">
<span data-rym-rate-interest>$558,036</span>
</div>
<div class="mt-1 text-sm font-bold text-[color:var(--ember)] md:hidden">in interest paid</div>
<div class="mt-1 hidden text-sm font-bold text-[color:var(--ember)] md:block">in interest</div>
</div>
<div class="my-2 shrink-0 font-display text-2xl font-black text-[color:var(--graphite)]/50 md:my-0 md:px-2">=</div>
<div class="rounded-xl bg-[color:var(--stone)] px-5 py-4 text-center sm:px-6 sm:py-5">
<div class="eyebrow !text-[color:var(--navy-deep)]">You repay</div>
<div class="mt-2 font-display text-4xl font-extrabold text-[color:var(--navy-deep)] sm:text-5xl">
<span data-rym-rate-repay>$958k</span>
</div>
<div class="mt-1 text-sm font-bold text-[color:var(--navy-deep)]">total</div>
</div>
</div>
</div>
<div class="mx-auto mt-10 max-w-3xl rounded-2xl border border-border bg-white p-7 shadow-[0_20px_60px_-30px_rgba(15,22,36,0.25)] sm:p-9">
<div class="flex items-center justify-between">
<div>
<div class="eyebrow">Year-by-year breakdown</div>
<div class="mt-1 font-display text-lg font-semibold">$400,000 mortgage · <span data-rym-rate-label>7</span>% · 30 years</div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trending-down h-5 w-5 text-[color:var(--ember)]" aria-hidden="true">
<path d="M16 17h6v-6">
</path>
<path d="m22 17-8.5-8.5-5 5L2 7">
</path>
</svg>
</div>
<p class="mt-3 text-sm leading-relaxed text-[color:var(--graphite)]/70">This chart shows how much of each mortgage payment goes toward interest versus principal over time.</p>
<div class="mt-5 space-y-2" data-rym-rate-bars>
<div class="grid grid-cols-[36px_1fr] items-center gap-3">
<span class="font-mono text-xs text-[color:var(--steel)]">Y1</span>
<div class="flex h-7 overflow-hidden rounded-sm bg-[color:var(--muted)]">
<div class="flex items-center justify-end pr-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:93%;background:var(--ember)">93%</div>
<div class="flex items-center justify-start pl-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:7%;background:var(--rym)">
</div>
</div>
</div>
<div class="grid grid-cols-[36px_1fr] items-center gap-3">
<span class="font-mono text-xs text-[color:var(--steel)]">Y5</span>
<div class="flex h-7 overflow-hidden rounded-sm bg-[color:var(--muted)]">
<div class="flex items-center justify-end pr-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:88%;background:var(--ember)">88%</div>
<div class="flex items-center justify-start pl-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:12%;background:var(--rym)">
</div>
</div>
</div>
<div class="grid grid-cols-[36px_1fr] items-center gap-3">
<span class="font-mono text-xs text-[color:var(--steel)]">Y10</span>
<div class="flex h-7 overflow-hidden rounded-sm bg-[color:var(--muted)]">
<div class="flex items-center justify-end pr-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:79%;background:var(--ember)">79%</div>
<div class="flex items-center justify-start pl-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:21%;background:var(--rym)">21%</div>
</div>
</div>
<div class="grid grid-cols-[36px_1fr] items-center gap-3">
<span class="font-mono text-xs text-[color:var(--steel)]">Y15</span>
<div class="flex h-7 overflow-hidden rounded-sm bg-[color:var(--muted)]">
<div class="flex items-center justify-end pr-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:66%;background:var(--ember)">66%</div>
<div class="flex items-center justify-start pl-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:34%;background:var(--rym)">34%</div>
</div>
</div>
<div class="grid grid-cols-[36px_1fr] items-center gap-3">
<span class="font-mono text-xs text-[color:var(--steel)]">Y20</span>
<div class="flex h-7 overflow-hidden rounded-sm bg-[color:var(--muted)]">
<div class="flex items-center justify-end pr-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:48%;background:var(--ember)">48%</div>
<div class="flex items-center justify-start pl-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:52%;background:var(--rym)">52%</div>
</div>
</div>
<div class="grid grid-cols-[36px_1fr] items-center gap-3">
<span class="font-mono text-xs text-[color:var(--steel)]">Y25</span>
<div class="flex h-7 overflow-hidden rounded-sm bg-[color:var(--muted)]">
<div class="flex items-center justify-end pr-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:25%;background:var(--ember)">25%</div>
<div class="flex items-center justify-start pl-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:75%;background:var(--rym)">75%</div>
</div>
</div>
<div class="grid grid-cols-[36px_1fr] items-center gap-3">
<span class="font-mono text-xs text-[color:var(--steel)]">Y30</span>
<div class="flex h-7 overflow-hidden rounded-sm bg-[color:var(--muted)]">
<div class="flex items-center justify-end pr-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:3%;background:var(--ember)">
</div>
<div class="flex items-center justify-start pl-2 text-[10px] font-semibold text-white transition-[width] duration-500 ease-out" style="width:97%;background:var(--rym)">97%</div>
</div>
</div>
</div>
<div class="mt-6 flex items-center justify-between border-t border-border pt-5 text-xs">
<span class="flex items-center gap-2">
<span class="h-2.5 w-2.5 rounded-sm bg-[color:var(--ember)]">
</span> Interest paid</span>
<span class="flex items-center gap-2">
<span class="h-2.5 w-2.5 rounded-sm bg-[color:var(--rym)]">
</span> Principal paid</span>
</div>
</div>
<div class="mt-12 flex justify-center">
<a href="#training-form" class="btn-cta">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg> Watch The Free Training</a>
</div>
</div>
</section>
<section id="better-way" class="bg-white py-24">
<div class="container-page">
<div class="mx-auto max-w-3xl text-center">
<span class="eyebrow">THE SOLUTION</span>
<h2 class="mt-4 text-[2.25rem] leading-[1.05] sm:text-[2.75rem]">There&#x27;s A Better Way.</h2>
<p class="mt-5 text-[1.25rem] font-semibold leading-relaxed text-[color:var(--navy-deep)]">Paying Off Your Mortgage Isn&#x27;t About Earning More Money.</p>
<p class="mt-5 text-[1.05rem] leading-relaxed text-[color:var(--graphite)]/80">It&#x27;s about using the money you already have more efficiently.</p>
</div>
<div class="mx-auto mt-16 grid max-w-6xl gap-6 md:grid-cols-3">
<div class="group relative flex flex-col rounded-2xl border border-border bg-[color:var(--stone)] p-8 transition hover:-translate-y-1 hover:border-[color:var(--honors)] hover:shadow-[0_30px_80px_-40px_rgba(15,22,36,0.35)]">
<div class="font-display text-6xl font-black leading-none text-[color:var(--honors)]/25 transition group-hover:text-[color:var(--honors)]/50">1</div>
<h3 class="mt-6 font-display text-xl font-bold text-[color:var(--navy-deep)]">Discover The Blind Spot</h3>
<p class="mt-3 text-[0.98rem] leading-relaxed text-[color:var(--graphite)]/80">Learn why most homeowners unknowingly pay tens to hundreds of thousands more in interest than they expected.</p>
</div>
<div class="group relative flex flex-col rounded-2xl border border-border bg-[color:var(--stone)] p-8 transition hover:-translate-y-1 hover:border-[color:var(--honors)] hover:shadow-[0_30px_80px_-40px_rgba(15,22,36,0.35)]">
<div class="font-display text-6xl font-black leading-none text-[color:var(--honors)]/25 transition group-hover:text-[color:var(--honors)]/50">2</div>
<h3 class="mt-6 font-display text-xl font-bold text-[color:var(--navy-deep)]">Optimize Your Cash Flow</h3>
<p class="mt-3 text-[0.98rem] leading-relaxed text-[color:var(--graphite)]/80">Learn how homeowners use the money they already earn to reduce interest more efficiently while holding onto their cash.</p>
</div>
<div class="group relative flex flex-col rounded-2xl border border-border bg-[color:var(--stone)] p-8 transition hover:-translate-y-1 hover:border-[color:var(--honors)] hover:shadow-[0_30px_80px_-40px_rgba(15,22,36,0.35)]">
<div class="font-display text-6xl font-black leading-none text-[color:var(--honors)]/25 transition group-hover:text-[color:var(--honors)]/50">3</div>
<h3 class="mt-6 font-display text-xl font-bold text-[color:var(--navy-deep)]">Implement Your Strategy</h3>
<p class="mt-3 text-[0.98rem] leading-relaxed text-[color:var(--graphite)]/80">Work with our team to build a personalized mortgage payoff strategy tailored to your finances, goals, and the banks best suited for your situation.</p>
</div>
</div>
<div class="mt-14 flex justify-center">
<a href="#training-form" class="btn-cta">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg> Watch the Free Training</a>
</div>
</div>
</section>
<section id="michael" class="relative overflow-hidden bg-[color:var(--navy-deep)] py-24 text-white">
<div class="container-page grid gap-14 lg:grid-cols-[0.85fr_1fr] lg:gap-20">
<div class="relative lg:sticky lg:top-24 lg:self-start">
<div class="aspect-[4/5] overflow-hidden rounded-xl border border-white/10">
<img src="<?php echo $A; ?>img/michael-portrait.jpg" alt="Michael Lush, founder of Replace Your Mortgage" class="h-full w-full object-cover object-top" width="1024" height="1280" loading="lazy"/>
</div>
<div class="absolute -bottom-6 -right-4 hidden rounded-lg border border-white/10 bg-[color:var(--graphite)] p-5 shadow-2xl md:block">
<div class="eyebrow !text-white/60">Industry Experience</div>
<div class="mt-1 font-display text-3xl font-extrabold">17 yrs</div>
<div class="text-xs text-white/65">Inside the mortgage industry</div>
</div>
</div>
<div>
<span class="eyebrow !text-white/55">Why People Trust Michael Lush</span>
<h2 class="mt-3 text-[2.25rem] leading-[1.05] text-white sm:text-[2.75rem]">The mortgage lender who tried to disprove it — <span class="font-serif-italic font-normal">and couldn&#x27;t</span>.</h2>
<blockquote class="mt-7 border-l-2 border-[color:var(--ember)] bg-white/5 px-6 py-5">
<p class="font-serif-italic text-[1.15rem] leading-relaxed text-white/95">“I didn&#x27;t create this strategy. I tried to prove it wrong.”</p>
<footer class="mt-3 text-xs font-semibold uppercase tracking-[0.16em] text-white/55">— Michael Lush</footer>
</blockquote>
<ol class="mt-10 relative border-l border-white/15 pl-6">
<li class="relative pb-8 last:pb-0">
<span class="absolute -left-[31px] top-1 grid h-6 w-6 place-items-center rounded-full border border-white/20 bg-[color:var(--navy-deep)] font-mono text-[10px] font-bold text-[color:var(--ember)]">01</span>
<div class="font-display text-lg font-bold text-white">17 Years Inside The Mortgage Industry</div>
<div class="mt-1.5 text-[0.98rem] leading-relaxed text-white/70">Michael spent nearly two decades helping families finance homes. Like most lenders, he believed the traditional 30-year mortgage was simply how homeownership worked.</div>
</li>
<li class="relative pb-8 last:pb-0">
<span class="absolute -left-[31px] top-1 grid h-6 w-6 place-items-center rounded-full border border-white/20 bg-[color:var(--navy-deep)] font-mono text-[10px] font-bold text-[color:var(--ember)]">02</span>
<div class="font-display text-lg font-bold text-white">One Conversation Changed Everything</div>
<div class="mt-1.5 text-[0.98rem] leading-relaxed text-white/70">A hedge fund manager who specialized in banking and mortgage investments introduced Michael to a completely different way of thinking about mortgage debt, cash flow, and interest. At first, Michael was convinced it couldn&apos;t work.</div>
</li>
<li class="relative pb-8 last:pb-0">
<span class="absolute -left-[31px] top-1 grid h-6 w-6 place-items-center rounded-full border border-white/20 bg-[color:var(--navy-deep)] font-mono text-[10px] font-bold text-[color:var(--ember)]">03</span>
<div class="font-display text-lg font-bold text-white">He Tried To Prove It Wrong</div>
<div class="mt-1.5 text-[0.98rem] leading-relaxed text-white/70">Instead of accepting the idea, Michael tested it relentlessly—reviewing the math, challenging every assumption, and looking for the flaw.</div>
</li>
<li class="relative pb-8 last:pb-0">
<span class="absolute -left-[31px] top-1 grid h-6 w-6 place-items-center rounded-full border border-white/20 bg-[color:var(--navy-deep)] font-mono text-[10px] font-bold text-[color:var(--ember)]">04</span>
<div class="font-display text-lg font-bold text-white">The Numbers Kept Holding Up</div>
<div class="mt-1.5 text-[0.98rem] leading-relaxed text-white/70">The deeper he looked, the more the math made sense. What started as skepticism became conviction. Interest Rate &ne; Interest Cost became one of the foundational principles behind Replace Your Mortgage.</div>
</li>
<li class="relative pb-8 last:pb-0">
<span class="absolute -left-[31px] top-1 grid h-6 w-6 place-items-center rounded-full border border-white/20 bg-[color:var(--navy-deep)] font-mono text-[10px] font-bold text-[color:var(--ember)]">05</span>
<div class="font-display text-lg font-bold text-white">He Used It On His Own Mortgage</div>
<div class="mt-1.5 text-[0.98rem] leading-relaxed text-white/70">Before teaching anyone else, Michael implemented the strategy himself. He watched his mortgage balance behave differently than everything he had learned during his lending career.</div>
</li>
<li class="relative pb-8 last:pb-0">
<span class="absolute -left-[31px] top-1 grid h-6 w-6 place-items-center rounded-full border border-white/20 bg-[color:var(--navy-deep)] font-mono text-[10px] font-bold text-[color:var(--ember)]">06</span>
<div class="font-display text-lg font-bold text-white">He Couldn&apos;t Keep It To Himself</div>
<div class="mt-1.5 text-[0.98rem] leading-relaxed text-white/70">After seeing the results firsthand, Michael became convinced homeowners deserved to understand how mortgages really work. He walked away from a successful career in the mortgage industry and set out on a mission to teach what he had learned.</div>
</li>
</ol>
</div>
</div>
</section>
<section class="bg-[color:var(--stone)] py-24 text-[color:var(--navy-deep)]">
<div class="container-page">
<div class="mx-auto max-w-3xl text-center">
<div class="mx-auto h-px w-16 bg-[color:var(--navy-deep)]/20">
</div>
<span class="eyebrow mt-8 inline-block">FROM ONE MORTGAGE LENDER TO A TEAM ON A MISSION</span>
<h3 class="mt-4 text-[1.75rem] leading-[1.15] sm:text-[2.15rem]">Replace Your Mortgage Was Born.</h3>
<p class="mx-auto mt-5 max-w-2xl text-[1.02rem] leading-relaxed text-[color:var(--graphite)]/75">What started with one former mortgage lender searching for answers has grown into a team dedicated to helping homeowners understand how mortgages really work, pay off their homes sooner, and build a stronger financial future.</p>
</div>
<h4 class="mx-auto mt-14 max-w-3xl text-center font-display text-lg font-semibold text-[color:var(--navy-deep)]">Meet the Team Behind Replace Your Mortgage</h4>
<ul class="mx-auto mt-6 grid max-w-6xl grid-cols-2 gap-x-6 gap-y-10 sm:grid-cols-3 lg:grid-cols-6">
<li class="flex flex-col items-center text-center">
<div class="h-24 w-24 overflow-hidden rounded-full ring-1 ring-[color:var(--navy-deep)]/15 sm:h-28 sm:w-28">
<img src="<?php echo $A; ?>img/derrick-waltz.webp" alt="Derrick Waltz" class="h-full w-full object-cover" loading="lazy" width="300" height="300"/>
</div>
<div class="mt-4 font-display text-[0.98rem] font-bold text-[color:var(--navy-deep)]">Derrick Waltz</div>
<div class="mt-1 text-[0.78rem] leading-snug text-[color:var(--graphite)]/60">Chief Revenue Officer</div>
</li>
<li class="flex flex-col items-center text-center">
<div class="h-24 w-24 overflow-hidden rounded-full ring-1 ring-[color:var(--navy-deep)]/15 sm:h-28 sm:w-28">
<img src="<?php echo $A; ?>img/matt-workman.webp" alt="Matt Workman" class="h-full w-full object-cover" loading="lazy" width="300" height="300"/>
</div>
<div class="mt-4 font-display text-[0.98rem] font-bold text-[color:var(--navy-deep)]">Matt Workman</div>
<div class="mt-1 text-[0.78rem] leading-snug text-[color:var(--graphite)]/60">Chief Operating Officer</div>
</li>
<li class="flex flex-col items-center text-center">
<div class="h-24 w-24 overflow-hidden rounded-full ring-1 ring-[color:var(--navy-deep)]/15 sm:h-28 sm:w-28">
<img src="<?php echo $A; ?>img/edmund-fontana.png" alt="Edmund Fontana" class="h-full w-full object-cover" loading="lazy" width="300" height="300"/>
</div>
<div class="mt-4 font-display text-[0.98rem] font-bold text-[color:var(--navy-deep)]">Edmund Fontana</div>
<div class="mt-1 text-[0.78rem] leading-snug text-[color:var(--graphite)]/60">CEO of RYE</div>
</li>
<li class="flex flex-col items-center text-center">
<div class="h-24 w-24 overflow-hidden rounded-full ring-1 ring-[color:var(--navy-deep)]/15 sm:h-28 sm:w-28">
<img src="<?php echo $A; ?>img/cody-hutchin.webp" alt="Cody Hutchin" class="h-full w-full object-cover" loading="lazy" width="300" height="300"/>
</div>
<div class="mt-4 font-display text-[0.98rem] font-bold text-[color:var(--navy-deep)]">Cody Hutchin</div>
<div class="mt-1 text-[0.78rem] leading-snug text-[color:var(--graphite)]/60">VP of Sales</div>
</li>
<li class="flex flex-col items-center text-center">
<div class="h-24 w-24 overflow-hidden rounded-full ring-1 ring-[color:var(--navy-deep)]/15 sm:h-28 sm:w-28">
<img src="<?php echo $A; ?>img/paul-woitko.webp" alt="Paul Woitko" class="h-full w-full object-cover" loading="lazy" width="300" height="300"/>
</div>
<div class="mt-4 font-display text-[0.98rem] font-bold text-[color:var(--navy-deep)]">Paul Woitko</div>
<div class="mt-1 text-[0.78rem] leading-snug text-[color:var(--graphite)]/60">Head of Client Support</div>
</li>
<li class="flex flex-col items-center text-center">
<div class="h-24 w-24 overflow-hidden rounded-full ring-1 ring-[color:var(--navy-deep)]/15 sm:h-28 sm:w-28">
<img src="<?php echo $A; ?>img/derrick-minyard.webp" alt="Derrick Minyard" class="h-full w-full object-cover" loading="lazy" width="300" height="300"/>
</div>
<div class="mt-4 font-display text-[0.98rem] font-bold text-[color:var(--navy-deep)]">Derrick Minyard</div>
<div class="mt-1 text-[0.78rem] leading-snug text-[color:var(--graphite)]/60">VP of Marketing</div>
</li>
</ul>
<p class="mx-auto mt-14 max-w-2xl text-center font-serif-italic text-[1.05rem] leading-relaxed text-[color:var(--graphite)]/80">Together, they&#x27;ve helped more than 10,000 homeowners better understand their mortgage, position themselves to pay off their home years sooner, and take greater control of their financial future.</p>
</div>
</section>
<section id="reviews" class="bg-white py-24">
<div class="container-page">
<div class="flex flex-wrap items-end justify-between gap-6">
<div class="max-w-2xl">
<span class="eyebrow">THE PROOF</span>
<h2 class="mt-3 text-[2.25rem] leading-[1.05] sm:text-[2.75rem]">Real Homeowner Stories</h2>
<p class="mt-4 max-w-xl text-[color:var(--graphite)]/75">Every review below comes from a verified Replace Your Mortgage client. Read how homeowners across the country changed the way they think about their mortgage, positioned themselves to pay off their home years sooner, and built greater confidence in their financial future.</p>
</div>
<div class="flex items-center gap-6 text-sm text-[color:var(--graphite)]/75">
<div>
<strong class="font-display text-xl text-[color:var(--navy-deep)]">10,000+</strong> families</div>
<div>
<strong class="font-display text-xl text-[color:var(--navy-deep)]">A+</strong> Rated by BBB</div>
</div>
</div>
<div class="relative mt-12">
<button type="button" data-rym-reviews-prev aria-label="Previous review" class="absolute left-0 top-1/2 z-10 hidden -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-border bg-white p-3 shadow-md transition hover:bg-[color:var(--navy-deep)] hover:text-white md:flex">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left h-5 w-5" aria-hidden="true">
<path d="m15 18-6-6 6-6">
</path>
</svg>
</button>
<button type="button" data-rym-reviews-next aria-label="Next review" class="absolute right-0 top-1/2 z-10 hidden translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full border border-border bg-white p-3 shadow-md transition hover:bg-[color:var(--navy-deep)] hover:text-white md:flex">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-5 w-5" aria-hidden="true">
<path d="m9 18 6-6-6-6">
</path>
</svg>
</button>
<div data-rym-reviews-track class="flex snap-x snap-mandatory gap-6 overflow-x-auto scroll-smooth pb-4 [scrollbar-width:none] [-ms-overflow-style:none] [&amp;::-webkit-scrollbar]:hidden">
<figure data-story-card="true" class="flex w-[100%] shrink-0 snap-center flex-col rounded-xl border border-border bg-[color:var(--stone)] p-7 shadow-[0_10px_30px_-20px_rgba(15,22,36,0.2)] sm:w-[70%] md:w-[calc((100%-3rem)/2)] lg:w-[calc((100%-3rem)/3)]">
<div class="flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
</div>
<blockquote class="mt-5 font-serif-italic text-[1.05rem] leading-snug text-[color:var(--navy-deep)]">“We worked with replace your mortgage and have nothing but good things to say. They were incredibly amazing, professional yet personal, and truly wanted to see you succeed. We had each person spend extra time with us to help us decide if they were the best fit for us, and we had an amazing experience!!! Everyone responded timely and professionally, and wanted to get to know my husband and I as people showing genuine care! I would recommend RYU to anyone!!!”</blockquote>
<figcaption class="mt-auto pt-6 border-t border-border text-sm">
<div class="mt-4 font-semibold text-[color:var(--navy-deep)]">Abigail L</div>
<div class="mt-0.5 text-xs uppercase tracking-[0.14em] text-[color:var(--steel)]">Verified Review · 06/15/2026</div>
</figcaption>
</figure>
<figure data-story-card="true" class="flex w-[100%] shrink-0 snap-center flex-col rounded-xl border border-border bg-[color:var(--stone)] p-7 shadow-[0_10px_30px_-20px_rgba(15,22,36,0.2)] sm:w-[70%] md:w-[calc((100%-3rem)/2)] lg:w-[calc((100%-3rem)/3)]">
<div class="flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
</div>
<blockquote class="mt-5 font-serif-italic text-[1.05rem] leading-snug text-[color:var(--navy-deep)]">“Don&#x27;t wait, start today and save thousands of dollars and invest in RYU for yourself, family and legacy. You will learn so much that you didn&#x27;t know, and you will wish you had done this sooner. It will open up opportunities and dreams for you and your family. Book it! Warm regards,”</blockquote>
<figcaption class="mt-auto pt-6 border-t border-border text-sm">
<div class="mt-4 font-semibold text-[color:var(--navy-deep)]">Gary V</div>
<div class="mt-0.5 text-xs uppercase tracking-[0.14em] text-[color:var(--steel)]">Verified Review · 04/20/2026</div>
</figcaption>
</figure>
<figure data-story-card="true" class="flex w-[100%] shrink-0 snap-center flex-col rounded-xl border border-border bg-[color:var(--stone)] p-7 shadow-[0_10px_30px_-20px_rgba(15,22,36,0.2)] sm:w-[70%] md:w-[calc((100%-3rem)/2)] lg:w-[calc((100%-3rem)/3)]">
<div class="flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
</div>
<blockquote class="mt-5 font-serif-italic text-[1.05rem] leading-snug text-[color:var(--navy-deep)]">“I joined RYU out of curiosity and with an interest to better understand how to best position myself as it relates to my mortgage and legacy. The education and support provided by RYU exceeded my expectations and afforded me the opportunity to place a HELOC in the 1st position. It further called attention to how I was positioning myself that lead me to Move money that was not working for me and eliminate my mortgage within 6 months. It takes discipline and if you follow the program it works. I can attest!”</blockquote>
<figcaption class="mt-auto pt-6 border-t border-border text-sm">
<div class="mt-4 font-semibold text-[color:var(--navy-deep)]">Peter A</div>
<div class="mt-0.5 text-xs uppercase tracking-[0.14em] text-[color:var(--steel)]">Verified Review · 03/30/2026</div>
</figcaption>
</figure>
<figure data-story-card="true" class="flex w-[100%] shrink-0 snap-center flex-col rounded-xl border border-border bg-[color:var(--stone)] p-7 shadow-[0_10px_30px_-20px_rgba(15,22,36,0.2)] sm:w-[70%] md:w-[calc((100%-3rem)/2)] lg:w-[calc((100%-3rem)/3)]">
<div class="flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
</div>
<blockquote class="mt-5 font-serif-italic text-[1.05rem] leading-snug text-[color:var(--navy-deep)]">“At first I thought this was too good to be true and there is NO way to become debt free in 4 years. We had one car payment, student loans, credit cards, and mortgage. We were scheduled to have a mortgage payment until I was over 70 years old! I thought retirement was out of the question. Well, in ONE year, we have paid off over $100,000 of debt and are currently chipping away at our mortgage. This experience has been life-changing!!! I could NOT recommend more!”</blockquote>
<figcaption class="mt-auto pt-6 border-t border-border text-sm">
<div class="mt-4 font-semibold text-[color:var(--navy-deep)]">Beth H</div>
<div class="mt-0.5 text-xs uppercase tracking-[0.14em] text-[color:var(--steel)]">Verified Review · 03/21/2026</div>
</figcaption>
</figure>
<figure data-story-card="true" class="flex w-[100%] shrink-0 snap-center flex-col rounded-xl border border-border bg-[color:var(--stone)] p-7 shadow-[0_10px_30px_-20px_rgba(15,22,36,0.2)] sm:w-[70%] md:w-[calc((100%-3rem)/2)] lg:w-[calc((100%-3rem)/3)]">
<div class="flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
</div>
<blockquote class="mt-5 font-serif-italic text-[1.05rem] leading-snug text-[color:var(--navy-deep)]">“This is a great place to start building your skills and knowledge along with investing within your real estate journey if you choose to take the time to invest within yourself.”</blockquote>
<figcaption class="mt-auto pt-6 border-t border-border text-sm">
<div class="mt-4 font-semibold text-[color:var(--navy-deep)]">Pat G</div>
<div class="mt-0.5 text-xs uppercase tracking-[0.14em] text-[color:var(--steel)]">Verified Review · 03/20/2026</div>
</figcaption>
</figure>
<figure data-story-card="true" class="flex w-[100%] shrink-0 snap-center flex-col rounded-xl border border-border bg-[color:var(--stone)] p-7 shadow-[0_10px_30px_-20px_rgba(15,22,36,0.2)] sm:w-[70%] md:w-[calc((100%-3rem)/2)] lg:w-[calc((100%-3rem)/3)]">
<div class="flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
</div>
<blockquote class="mt-5 font-serif-italic text-[1.05rem] leading-snug text-[color:var(--navy-deep)]">“Really informative experience and teaching from these guys. It&#x27;s expensive but if you get the heloc going, it&#x27;s a wash pretty fast. I was up and rocking in a couple months and would really recommend it to anyone considering. It&#x27;s worth learning about before trying it on your own.”</blockquote>
<figcaption class="mt-auto pt-6 border-t border-border text-sm">
<div class="mt-4 font-semibold text-[color:var(--navy-deep)]">DANGO C</div>
<div class="mt-0.5 text-xs uppercase tracking-[0.14em] text-[color:var(--steel)]">Verified Review · 03/20/2026</div>
</figcaption>
</figure>
<figure data-story-card="true" class="flex w-[100%] shrink-0 snap-center flex-col rounded-xl border border-border bg-[color:var(--stone)] p-7 shadow-[0_10px_30px_-20px_rgba(15,22,36,0.2)] sm:w-[70%] md:w-[calc((100%-3rem)/2)] lg:w-[calc((100%-3rem)/3)]">
<div class="flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-star h-4 w-4 fill-[color:var(--ember)] text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z">
</path>
</svg>
</div>
<blockquote class="mt-5 font-serif-italic text-[1.05rem] leading-snug text-[color:var(--navy-deep)]">“I am enjoying a wonderful experience with Replace Your University. They were an answer to my prayers. I enjoy the education, the assistance every step of the way. The weekly chats and open community forums. Based on the information provided, I obtained my 1st HELOC and paid off my mortgage. I am now reviewing the other features of Replace Your University.”</blockquote>
<figcaption class="mt-auto pt-6 border-t border-border text-sm">
<div class="mt-4 font-semibold text-[color:var(--navy-deep)]">Andre B</div>
<div class="mt-0.5 text-xs uppercase tracking-[0.14em] text-[color:var(--steel)]">Verified Review · 03/19/2026</div>
</figcaption>
</figure>
</div>
<div class="mt-4 flex items-center justify-center gap-3 md:hidden">
<button type="button" data-rym-reviews-prev aria-label="Previous review" class="rounded-full border border-border bg-white p-2.5 shadow-sm">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left h-4 w-4" aria-hidden="true">
<path d="m15 18-6-6 6-6">
</path>
</svg>
</button>
<button type="button" data-rym-reviews-next aria-label="Next review" class="rounded-full border border-border bg-white p-2.5 shadow-sm">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4" aria-hidden="true">
<path d="m9 18 6-6-6-6">
</path>
</svg>
</button>
</div>
</div>
</div>
</section>
<section id="how" class="bg-[color:var(--stone)] py-24">
<div class="container-page">
<div class="mx-auto max-w-2xl text-center">
<span class="eyebrow">THE REPLACE YOUR MORTGAGE EXPERIENCE</span>
<h2 class="mt-3 text-[2.25rem] leading-[1.05] sm:text-[2.75rem]">How We Help You Succeed</h2>
<p class="mt-5 text-[color:var(--graphite)]/75">Within minutes of becoming a client, you&#x27;ll gain access to a complete support system designed to help you confidently implement the Replace Your Mortgage strategy. You won&#x27;t have to figure it out alone.</p>
</div>
<div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
<div class="flex flex-col rounded-2xl border border-border bg-white p-7 transition hover:-translate-y-1 hover:border-[color:var(--honors)]">
<div class="grid h-14 w-14 place-items-center rounded-xl bg-white text-[color:var(--honors)] shadow-sm">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-line h-7 w-7" aria-hidden="true">
<path d="M3 3v16a2 2 0 0 0 2 2h16">
</path>
<path d="m19 9-5 5-4-4-3 3">
</path>
</svg>
</div>
<h3 class="mt-6 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">Build Your Financial Blueprint</h3>
<p class="mt-3 text-[0.95rem] leading-relaxed text-[color:var(--graphite)]/80">Gain access to our Financial Portfolio software to organize your income, expenses, properties, debts, and cash flow in one place, creating a personalized financial blueprint for your family.</p>
</div>
<div class="flex flex-col rounded-2xl border border-border bg-white p-7 transition hover:-translate-y-1 hover:border-[color:var(--honors)]">
<div class="grid h-14 w-14 place-items-center rounded-xl bg-white text-[color:var(--honors)] shadow-sm">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-7 w-7" aria-hidden="true">
<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2">
</path>
<path d="M16 3.128a4 4 0 0 1 0 7.744">
</path>
<path d="M22 21v-2a4 4 0 0 0-3-3.87">
</path>
<circle cx="9" cy="7" r="4">
</circle>
</svg>
</div>
<h3 class="mt-6 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">Join Our Private Community &amp; Weekly Training</h3>
<p class="mt-3 text-[0.95rem] leading-relaxed text-[color:var(--graphite)]/80">Connect with thousands of homeowners inside our active private community, participate in weekly live training, and receive ongoing guidance from experienced RYM educators.</p>
</div>
<div class="flex flex-col rounded-2xl border border-border bg-white p-7 transition hover:-translate-y-1 hover:border-[color:var(--honors)]">
<div class="grid h-14 w-14 place-items-center rounded-xl bg-white text-[color:var(--honors)] shadow-sm">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-landmark h-7 w-7" aria-hidden="true">
<path d="M10 18v-7">
</path>
<path d="M11.12 2.198a2 2 0 0 1 1.76.006l7.866 3.847c.476.233.31.949-.22.949H3.474c-.53 0-.695-.716-.22-.949z">
</path>
<path d="M14 18v-7">
</path>
<path d="M18 18v-7">
</path>
<path d="M3 22h18">
</path>
<path d="M6 18v-7">
</path>
</svg>
</div>
<h3 class="mt-6 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">Access Our Proprietary Bank List</h3>
<p class="mt-3 text-[0.95rem] leading-relaxed text-[color:var(--graphite)]/80">Our team has already done the research, narrowing thousands of banks to a vetted list of fewer than 100 that best support the Replace Your Mortgage strategy.</p>
</div>
<div class="flex flex-col rounded-2xl border border-border bg-white p-7 transition hover:-translate-y-1 hover:border-[color:var(--honors)]">
<div class="grid h-14 w-14 place-items-center rounded-xl bg-white text-[color:var(--honors)] shadow-sm">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-life-buoy h-7 w-7" aria-hidden="true">
<circle cx="12" cy="12" r="10">
</circle>
<path d="m4.93 4.93 4.24 4.24">
</path>
<path d="m14.83 9.17 4.24-4.24">
</path>
<path d="m14.83 14.83 4.24 4.24">
</path>
<path d="m9.17 14.83-4.24 4.24">
</path>
<circle cx="12" cy="12" r="4">
</circle>
</svg>
</div>
<h3 class="mt-6 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">Get Ongoing Education &amp; 1-on-1 Support</h3>
<p class="mt-3 text-[0.95rem] leading-relaxed text-[color:var(--graphite)]/80">Access our growing education library, implementation resources, calculators, and 1-on-1 support whenever you need guidance along the way.</p>
</div>
</div>
<div class="mt-16 flex justify-center">
<a href="#training-form" class="btn-cta">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg> Watch The Training</a>
</div>
</div>
</section>
<section id="education" class="bg-white py-24">
<div class="container-page">
<div class="flex flex-wrap items-end justify-between gap-6">
<div class="max-w-2xl">
<span class="eyebrow">MORTGAGE EDUCATION HUB</span>
<h2 class="mt-3 text-[2.25rem] leading-[1.05] sm:text-[2.75rem]">Mortgage Education Hub: <span class="font-serif-italic font-normal">Resources You Can Actually Understand</span>
</h2>
<p class="mt-5 max-w-2xl text-[color:var(--graphite)]/75">Explore our growing library of educational articles, guides, and videos covering mortgage interest, amortization, HELOCs, cash flow, home equity, and financial freedom strategies designed to help you make more informed financial decisions.</p>
</div>
<a href="#" class="btn-ghost">Browse The Education Hub <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</a>
</div>
<div class="mt-10 flex flex-wrap gap-2">
<span class="rounded-full border border-border bg-[color:var(--stone)] px-4 py-1.5 text-sm font-medium text-[color:var(--navy-deep)]">Mortgage Payoff Strategies</span>
<span class="rounded-full border border-border bg-[color:var(--stone)] px-4 py-1.5 text-sm font-medium text-[color:var(--navy-deep)]">Home Equity</span>
<span class="rounded-full border border-border bg-[color:var(--stone)] px-4 py-1.5 text-sm font-medium text-[color:var(--navy-deep)]">Mortgage Interest</span>
<span class="rounded-full border border-border bg-[color:var(--stone)] px-4 py-1.5 text-sm font-medium text-[color:var(--navy-deep)]">HELOC Education</span>
<span class="rounded-full border border-border bg-[color:var(--stone)] px-4 py-1.5 text-sm font-medium text-[color:var(--navy-deep)]">Cash Flow Management</span>
<span class="rounded-full border border-border bg-[color:var(--stone)] px-4 py-1.5 text-sm font-medium text-[color:var(--navy-deep)]">Financial Freedom</span>
</div>
<div class="mt-10 grid gap-5 md:grid-cols-2 lg:grid-cols-4">
<a href="#" class="group flex flex-col overflow-hidden rounded-xl border border-border bg-[color:var(--stone)] transition hover:-translate-y-0.5 hover:border-[color:var(--honors)]">
<div class="aspect-[16/10] w-full overflow-hidden bg-[color:var(--navy-deep)]/5">
<img src="<?php echo $A; ?>img/blog-amortization-B1xpAMgH.jpg" alt="How Amortization Actually Works (And Why It Matters)" width="1024" height="640" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105"/>
</div>
<div class="flex flex-1 flex-col p-6">
<span class="text-xs font-semibold uppercase tracking-[0.18em] text-[color:var(--honors)]">Mortgage Interest</span>
<h3 class="mt-3 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">How Amortization Actually Works (And Why It Matters)</h3>
<div class="mt-auto flex items-center justify-between pt-6 text-xs text-[color:var(--steel)]">
<span>9 min read</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</div>
</div>
</a>
<a href="#" class="group flex flex-col overflow-hidden rounded-xl border border-border bg-[color:var(--stone)] transition hover:-translate-y-0.5 hover:border-[color:var(--honors)]">
<div class="aspect-[16/10] w-full overflow-hidden bg-[color:var(--navy-deep)]/5">
<img src="<?php echo $A; ?>img/blog-heloc-C4dLC8S2.jpg" alt="HELOC vs. Traditional Mortgage: Which Is Right for You?" width="1024" height="640" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105"/>
</div>
<div class="flex flex-1 flex-col p-6">
<span class="text-xs font-semibold uppercase tracking-[0.18em] text-[color:var(--honors)]">HELOC Education</span>
<h3 class="mt-3 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">HELOC vs. Traditional Mortgage: Which Is Right for You?</h3>
<div class="mt-auto flex items-center justify-between pt-6 text-xs text-[color:var(--steel)]">
<span>12 min read</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</div>
</div>
</a>
<a href="#" class="group flex flex-col overflow-hidden rounded-xl border border-border bg-[color:var(--stone)] transition hover:-translate-y-0.5 hover:border-[color:var(--honors)]">
<div class="aspect-[16/10] w-full overflow-hidden bg-[color:var(--navy-deep)]/5">
<img src="<?php echo $A; ?>img/blog-cashflow-B3eopAqf.jpg" alt="The Cash Flow Math Behind a 7-Year Mortgage Payoff" width="1024" height="640" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105"/>
</div>
<div class="flex flex-1 flex-col p-6">
<span class="text-xs font-semibold uppercase tracking-[0.18em] text-[color:var(--honors)]">Cash Flow</span>
<h3 class="mt-3 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">The Cash Flow Math Behind a 7-Year Mortgage Payoff</h3>
<div class="mt-auto flex items-center justify-between pt-6 text-xs text-[color:var(--steel)]">
<span>11 min read</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</div>
</div>
</a>
<a href="#" class="group flex flex-col overflow-hidden rounded-xl border border-border bg-[color:var(--stone)] transition hover:-translate-y-0.5 hover:border-[color:var(--honors)]">
<div class="aspect-[16/10] w-full overflow-hidden bg-[color:var(--navy-deep)]/5">
<img src="<?php echo $A; ?>img/blog-equity-CQbBV1XF.jpg" alt="Why Your Mortgage Barely Moves During the First 10 Years" width="1024" height="640" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105"/>
</div>
<div class="flex flex-1 flex-col p-6">
<span class="text-xs font-semibold uppercase tracking-[0.18em] text-[color:var(--honors)]">Home Equity</span>
<h3 class="mt-3 font-display text-lg font-bold leading-snug text-[color:var(--navy-deep)]">Why Your Mortgage Barely Moves During the First 10 Years</h3>
<div class="mt-auto flex items-center justify-between pt-6 text-xs text-[color:var(--steel)]">
<span>8 min read</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</div>
</div>
</a>
</div>
</div>
</section>
<section id="faq" class="bg-[color:var(--stone)] py-24">
<div class="container-page grid gap-14 lg:grid-cols-[0.9fr_1.2fr]">
<div>
<span class="eyebrow">Common Questions</span>
<h2 class="mt-3 text-[2.25rem] leading-[1.05] sm:text-[2.75rem]">Frequently Asked Questions</h2>
<p class="mt-5 text-[color:var(--graphite)]/80">We&#x27;ve answered tens of thousands of these. Here are the ones we hear most.</p>
<div class="mt-8 rounded-lg border border-border bg-white p-5">
<div class="flex items-center gap-2 text-sm font-semibold text-[color:var(--navy-deep)]">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-4 w-4 text-[color:var(--honors)]" aria-hidden="true">
<path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z">
</path>
<path d="m9 12 2 2 4-4">
</path>
</svg> Don&#x27;t see your question?</div>
<p class="mt-1.5 text-sm text-[color:var(--graphite)]/80">The free training answers the deepest ones — including the math.</p>
</div>
<div class="mt-5">
<a href="#training-form" class="btn-cta w-full justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg> Watch The Free Training</a>
</div>
</div>
<div class="divide-y divide-border rounded-xl border border-border bg-white">
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">How does the Replace Your Mortgage strategy actually work?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Replace Your Mortgage is a cash flow strategy designed to help homeowners reduce mortgage interest and position themselves to pay off their home years sooner.</p>
<p>Rather than focusing on making larger mortgage payments, the strategy helps qualified homeowners use the money they&#x27;re already earning more efficiently. By changing how cash flows through the mortgage, many families are able to reduce interest costs while maintaining access to their money.</p>
<p>Every homeowner&#x27;s financial situation is unique, which is why every implementation is personalized based on your mortgage, cash flow, equity, and financial goals.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">How quickly could I realistically pay off my mortgage?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Every homeowner&#x27;s timeline is different.</p>
<p>Your results depend on factors such as your income, monthly cash flow, existing debt, mortgage balance, and financial habits.</p>
<p>While every situation is unique, many Replace Your Mortgage clients are positioned to pay off their homes in approximately 5–7 years on average, often while saving significant mortgage interest compared to a traditional 30-year loan.</p>
<p>Your personalized analysis is based on your own financial picture—not a generic example.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">Why can&#x27;t I just make extra payments toward my mortgage?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>You absolutely can—and making extra payments will generally help reduce your mortgage faster.</p>
<p>The challenge is that most families can&#x27;t afford to send every extra dollar into their mortgage because they still have groceries, utilities, insurance, childcare, vacations, emergencies, and everyday expenses to pay.</p>
<p>Replace Your Mortgage isn&#x27;t about paying more. It&#x27;s about helping qualified homeowners use the money they&#x27;re already earning more efficiently, so the same income can work harder without sacrificing access to the cash they need for daily life.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">Is this strategy risky?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Every financial strategy requires discipline and responsible decision-making. A mortgage is a guaranteed loss.</p>
<p>Replace Your Mortgage isn&#x27;t about taking on unnecessary risk or encouraging reckless borrowing. It&#x27;s about restructuring how cash flows through your home loan to reduce interest more efficiently.</p>
<p>Education, coaching, budgeting tools, and personalized guidance are central to the program because implementation matters just as much as the strategy itself.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">What if there&#x27;s a recession?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Economic uncertainty is often when access to your cash flow and equity matters most.</p>
<p>One of the goals of the Replace Your Mortgage strategy is to help qualified homeowners improve cash flow efficiency while maintaining access to their money. That flexibility can become especially valuable during periods of economic uncertainty, unexpected expenses, or changes in income.</p>
<p>Every financial situation is different, but many homeowners appreciate having a strategy designed to increase financial flexibility rather than simply locking more money away in home mortgage.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">I have a low fixed-rate mortgage and inflation is high. Why would I change anything?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>A low interest rate can certainly be valuable, and for some homeowners, keeping their current mortgage may be the best decision.</p>
<p>However, interest rate is only one part of the equation.</p>
<p>For many qualified homeowners, the amount of total interest paid over time and the speed at which principal is reduced can have a much greater impact than the advertised rate alone.</p>
<p>That&#x27;s why Replace Your Mortgage evaluates your complete financial picture before making any recommendation. Even homeowners with historically low mortgage rates are sometimes positioned to reduce their overall interest costs and pay off their homes significantly sooner.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">What if I&#x27;m living paycheck to paycheck?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>The Replace Your Mortgage strategy is built around positive monthly cash flow.</p>
<p>If you&#x27;re currently living paycheck to paycheck with little or no monthly surplus, this may not be the right time to implement the strategy.</p>
<p>In those situations, our recommendation is usually to first focus on increasing income, reducing unnecessary expenses, improving budgeting, or strengthening your overall financial position. Once positive cash flow improves, the strategy may become a much better fit.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">What happens if I don&#x27;t qualify or the strategy isn&#x27;t right for me?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Not every homeowner is a good candidate—and that&#x27;s okay.</p>
<p>Our goal isn&#x27;t to force every family into the same solution.</p>
<p>If your financial situation, mortgage structure, or long-term goals suggest a different approach, we&#x27;ll tell you. In some cases, we may recommend waiting, improving certain financial metrics, or pursuing a different strategy altogether.</p>
<p>Our recommendation is based on what&#x27;s best for your household—not simply whether we can implement the strategy today.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">Who is Replace Your Mortgage designed for?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Replace Your Mortgage is designed for homeowners who want to better understand how their mortgage works and make their existing cash flow work harder.</p>
<p>Many of our clients are looking to:</p>
<ul class="list-disc space-y-1 pl-5">
<li>Pay off their mortgage years sooner</li>
<li>Reduce the total interest they pay</li>
<li>Maintain access to their money</li>
<li>Build greater long-term financial flexibility and control</li>
</ul>
<p>Whether the strategy is appropriate depends on your equity, cash flow, income, credit profile, and overall financial goals.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">Can retirees use this strategy?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Yes.</p>
<p>Age isn&#x27;t what determines whether the strategy makes sense.</p>
<p>Instead, we evaluate factors like income, expenses, cash flow, debt levels, liquidity, and financial goals. For some retirees, improving cash flow efficiency and maintaining access to capital can still provide meaningful benefits. For others, a different approach may be more appropriate.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">Can this strategy work with rental properties or multiple homes?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Yes, in many cases, though we typically advise people to focus the strategy on one property at a time instead of multiple at the same time, for greater efficiency.</p>
<p>Many Replace Your Mortgage clients own rental properties, vacation homes, or multiple real estate investments.</p>
<p>Depending on your portfolio, the strategy may involve prioritizing certain properties, coordinating rental income, or implementing different lending structures. Every plan is built around your complete financial picture.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">What about geopolitical instability?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Global events, elections, inflation, and market volatility can all create uncertainty—but they don&#x27;t change the underlying mathematics of how mortgage interest is calculated.</p>
<p>Replace Your Mortgage isn&#x27;t designed to predict economic cycles. It&#x27;s designed to help qualified homeowners make more efficient use of their cash flow regardless of the broader economic environment.</p>
<p>Rather than trying to time the economy, many families choose to focus on improving the aspects of their finances they can actually control.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">What&#x27;s the difference between Replace Your Mortgage and Replace Your Bank?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Replace Your Mortgage helps homeowners understand how mortgage interest works and implement a strategy designed to reduce interest costs while accelerating payoff.</p>
<p>Replace Your Bank builds on that foundation by teaching families how to create greater long-term financial control through private banking concepts, liquidity, and wealth-building strategies.</p>
<p>Many homeowners begin with Replace Your Mortgage, then continue learning through Replace Your Bank as they pursue broader financial freedom.</p>
</div>
</details>
<details class="group px-6 py-5">
<summary class="flex cursor-pointer items-start justify-between gap-4 list-none">
<span class="font-display text-[1.05rem] font-semibold text-[color:var(--navy-deep)]">What credit score or income do I need to qualify?</span>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down mt-1 h-4 w-4 shrink-0 text-[color:var(--steel)] transition group-open:rotate-180" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="mt-3 space-y-3 text-[0.97rem] leading-relaxed text-[color:var(--graphite)]/85">
<p>Most of the lending programs we work with require a credit score of at least 640-680, though requirements can vary depending on the lender and your overall financial situation.</p>
<p>In addition to your credit score, lenders may also consider factors such as:</p>
<ul class="list-disc space-y-1 pl-5">
<li>Household income</li>
<li>Debt-to-income ratio</li>
<li>Available equity</li>
<li>Employment history</li>
<li>Property type</li>
</ul>
<p>If you&#x27;re unsure whether you qualify, don&#x27;t worry. During the discovery process, our team will review your financial picture and help determine the strategy and lending options that best fit your situation.</p>
</div>
</details>
</div>
</div>
</section>
<section id="training-form" class="relative overflow-hidden bg-[color:var(--navy-deep)] py-24 text-white">
<div class="absolute inset-0 opacity-20">
<img src="<?php echo $A; ?>img/home-dusk-Ej3evHyq.jpg" alt="" class="h-full w-full object-cover" loading="lazy" width="1600" height="1100"/>
<div class="absolute inset-0 bg-gradient-to-r from-[color:var(--navy-deep)] via-[color:var(--navy-deep)]/90 to-[color:var(--navy-deep)]/60">
</div>
</div>
<div class="container-page relative grid gap-12 lg:grid-cols-[1.2fr_1fr] lg:items-center">
<div>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sparkles h-6 w-6 text-[color:var(--ember)]" aria-hidden="true">
<path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z">
</path>
<path d="M20 2v4">
</path>
<path d="M22 4h-4">
</path>
<circle cx="4" cy="20" r="2">
</circle>
</svg>
<h2 class="mt-4 text-[2.4rem] leading-[1.05] text-white sm:text-[3.2rem]">See what your mortgage is <span class="font-serif-italic font-normal">really</span> costing you.</h2>
<p class="mt-6 max-w-xl text-[1.05rem] text-white/75">In just 16 minutes, you&#x27;ll learn why most homeowners unknowingly pay hundreds of thousands more in interest than necessary, how the Replace Your Mortgage strategy works, and whether it could help you pay off your home years sooner while holding onto your cash.</p>
<div class="mt-9 flex flex-wrap items-center gap-4">
<a href="#training" class="btn-cta">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg> Watch The Free Training</a>
<span class="text-sm text-white/55">Free · 16 minutes · Instant access</span>
</div>
</div>
<div class="rounded-xl border border-white/10 bg-white/[0.04] p-7 backdrop-blur">
<div class="eyebrow !text-white/55">INSIDE THE TRAINING</div>
<ul class="mt-5 space-y-4">
<li class="flex gap-3 text-[0.98rem] text-white/85">
<span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[color:var(--ember)]">
</span>
<span>Why most homeowners unknowingly overpay hundreds of thousands in mortgage interest</span>
</li>
<li class="flex gap-3 text-[0.98rem] text-white/85">
<span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[color:var(--ember)]">
</span>
<span>The simple math behind the Replace Your Mortgage strategy</span>
</li>
<li class="flex gap-3 text-[0.98rem] text-white/85">
<span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[color:var(--ember)]">
</span>
<span>How qualified homeowners use the money they already earn to pay off their mortgage sooner</span>
</li>
<li class="flex gap-3 text-[0.98rem] text-white/85">
<span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[color:var(--ember)]">
</span>
<span>Real homeowner case studies with actual numbers and results</span>
</li>
</ul>
</div>
</div>
</section>
<section class="bg-[color:var(--stone)] py-24">
<div class="container-page">
<div class="mx-auto max-w-3xl text-center">
<span class="eyebrow">YOUR FINANCIAL JOURNEY</span>
<h2 class="mt-4 text-[2.25rem] leading-[1.05] sm:text-[2.75rem]">Paying Off Your Mortgage<br/>
<span class="font-serif-italic font-normal">Is Just The Beginning.</span>
</h2>
<p class="mx-auto mt-6 max-w-3xl text-[1.05rem] leading-relaxed text-[color:var(--graphite)]/80">Understanding how your mortgage really works, and choosing to act on that knowledge, could be one of the most valuable financial decisions you&#x27;ll ever make. Once that foundation is in place, Replace Your University offers additional educational paths designed to help you continue building wealth, increasing cash flow, and taking greater control of your financial future.</p>
</div>
<div class="mt-14 grid grid-cols-1 gap-4 lg:grid-cols-[1fr_auto_1fr_auto_1fr_auto_1fr]">
<a href="#" class="group flex flex-col rounded-2xl border border-border bg-white p-8 transition hover:-translate-y-1 hover:border-[color:var(--honors)] hover:shadow-[0_30px_80px_-40px_rgba(15,22,36,0.25)]">
<div class="flex h-28 items-center justify-center rounded-xl bg-[color:var(--stone)] p-5">
<img src="<?php echo $A; ?>img/RYM-lightBG-RGB.png" alt="Replace Your Mortgage" class="h-full w-auto object-contain"/>
</div>
<h3 class="mt-7 text-center font-display text-xl font-bold text-[color:var(--navy-deep)]">Replace Your Mortgage</h3>
<p class="mt-3 text-center text-[0.98rem] leading-relaxed text-[color:var(--graphite)]/80">Learn how to pay off your home years sooner while holding onto your cash along the way.</p>
<div class="mt-auto pt-6 text-center">
<span class="inline-flex items-center gap-1 text-xs font-semibold uppercase tracking-[0.16em] text-[color:var(--honors)]">Explore RYM <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-3.5 w-3.5 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</span>
</div>
</a>
<div class="flex items-center justify-center py-1 text-[color:var(--honors)] lg:px-1 lg:py-0">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-6 w-6 rotate-90 lg:rotate-0" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</div>
<a href="#" class="group flex flex-col rounded-2xl border border-border bg-white p-8 transition hover:-translate-y-1 hover:border-[color:var(--honors)] hover:shadow-[0_30px_80px_-40px_rgba(15,22,36,0.25)]">
<div class="flex h-28 items-center justify-center rounded-xl bg-[color:var(--stone)] p-5">
<img src="<?php echo $A; ?>img/RYB-lightBG-RGB.png" alt="Replace Your Bank" class="h-full w-auto object-contain"/>
</div>
<h3 class="mt-7 text-center font-display text-xl font-bold text-[color:var(--navy-deep)]">Replace Your Bank</h3>
<p class="mt-3 text-center text-[0.98rem] leading-relaxed text-[color:var(--graphite)]/80">Learn how to build a private family banking system that gives you greater control over your money.</p>
<div class="mt-auto pt-6 text-center">
<span class="inline-flex items-center gap-1 text-xs font-semibold uppercase tracking-[0.16em] text-[color:var(--honors)]">Explore RYB <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-3.5 w-3.5 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</span>
</div>
</a>
<div class="flex items-center justify-center py-1 text-[color:var(--honors)] lg:px-1 lg:py-0">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-6 w-6 rotate-90 lg:rotate-0" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</div>
<a href="#" class="group flex flex-col rounded-2xl border border-border bg-white p-8 transition hover:-translate-y-1 hover:border-[color:var(--honors)] hover:shadow-[0_30px_80px_-40px_rgba(15,22,36,0.25)]">
<div class="flex h-28 items-center justify-center rounded-xl bg-[color:var(--stone)] p-5">
<img src="<?php echo $A; ?>img/RYD-lightBG-RGB.png" alt="Replace Your Dollar" class="h-full w-auto object-contain"/>
</div>
<h3 class="mt-7 text-center font-display text-xl font-bold text-[color:var(--navy-deep)]">Replace Your Dollar</h3>
<p class="mt-3 text-center text-[0.98rem] leading-relaxed text-[color:var(--graphite)]/80">Learn how the stock market works and build the confidence to make smarter long-term investment decisions.</p>
<div class="mt-auto pt-6 text-center">
<span class="inline-flex items-center gap-1 text-xs font-semibold uppercase tracking-[0.16em] text-[color:var(--honors)]">Explore RYD <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-3.5 w-3.5 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</span>
</div>
</a>
<div class="flex items-center justify-center py-1 text-[color:var(--honors)] lg:px-1 lg:py-0">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-6 w-6 rotate-90 lg:rotate-0" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</div>
<a href="#" class="group flex flex-col rounded-2xl border border-border bg-white p-8 transition hover:-translate-y-1 hover:border-[color:var(--honors)] hover:shadow-[0_30px_80px_-40px_rgba(15,22,36,0.25)]">
<div class="flex h-28 items-center justify-center rounded-xl bg-[color:var(--stone)] p-5">
<img src="<?php echo $A; ?>img/RYE-lightBG-RGB.png" alt="Replace Your Employer" class="h-full w-auto object-contain"/>
</div>
<h3 class="mt-7 text-center font-display text-xl font-bold text-[color:var(--navy-deep)]">Replace Your Employer</h3>
<p class="mt-3 text-center text-[0.98rem] leading-relaxed text-[color:var(--graphite)]/80">Learn how to confidently invest in real estate through coaching, community, and practical tools from experienced investors.</p>
<div class="mt-auto pt-6 text-center">
<span class="inline-flex items-center gap-1 text-xs font-semibold uppercase tracking-[0.16em] text-[color:var(--honors)]">Explore RYE <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-3.5 w-3.5 transition group-hover:translate-x-1" aria-hidden="true">
<path d="M5 12h14">
</path>
<path d="m12 5 7 7-7 7">
</path>
</svg>
</span>
</div>
</a>
</div>
</div>
</section>
<section class="bg-white py-20">
<div class="container-page">
<div class="mx-auto max-w-2xl text-center">
<h2 class="text-[2.25rem] leading-[1.05] text-[color:var(--navy-deep)] sm:text-[2.75rem]">Ready to Take the First Step?</h2>
<p class="mx-auto mt-5 max-w-xl text-[1.05rem] leading-relaxed text-[color:var(--graphite)]/80">Learn how the Replace Your Mortgage strategy works in our free 16-minute training.</p>
<div class="mt-8">
<a href="#training" class="btn-cta">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg> Watch The Free Training</a>
</div>
</div>
</div>
</section>
</main>
<footer id="contact" class="border-t border-border bg-white py-14">
<div class="container-page grid gap-10 md:grid-cols-[1.4fr_1fr_1fr_1fr]">
<div>
<img src="<?php echo $A; ?>img/ryu-logo-full.png" alt="Replace Your University" class="h-12 w-auto"/>
<p class="mt-4 max-w-sm text-sm text-[color:var(--graphite)]/75">Replace Your University is a financial education company helping homeowners better understand how mortgages really work and build long-term financial freedom.</p>
<div class="mt-5 flex items-center gap-4 text-xs text-[color:var(--steel)]">
<span>BBB Accredited · A+</span>
<span>·</span>
<span>Nashville, TN</span>
</div>
</div>
<div>
<div class="eyebrow">Learn</div>
<ul class="mt-4 space-y-2.5 text-sm">
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Free Training</a>
</li>
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Education Hub</a>
</li>
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Frequently Asked Questions</a>
</li>
</ul>
</div>
<div>
<div class="eyebrow">About</div>
<ul class="mt-4 space-y-2.5 text-sm">
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Our Story</a>
</li>
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Meet the Team</a>
</li>
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">In the News</a>
</li>
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Our Programs</a>
</li>
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Client Reviews</a>
</li>
</ul>
</div>
<div>
<div class="eyebrow">Support</div>
<ul class="mt-4 space-y-2.5 text-sm">
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Contact Us</a>
</li>
<li>
<a href="#" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Client Login</a>
</li>
<li>
<a href="mailto:support@replaceyouruniversity.com" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Email: support@replaceyouruniversity.com</a>
</li>
<li>
<a href="tel:+16292586989" class="text-[color:var(--navy-deep)] hover:text-[color:var(--honors)]">Phone: (629) 258-6989</a>
</li>
</ul>
</div>
</div>
<div class="container-page mt-12 border-t border-border pt-6">
<div class="flex flex-col items-center gap-4 text-xs text-[color:var(--steel)] md:flex-row md:justify-between">
<span>© 2026 Replace Your University. All rights reserved.</span>
<nav class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1">
<a href="#" class="hover:text-[color:var(--honors)]">Privacy Policy</a>
<span>•</span>
<a href="#" class="hover:text-[color:var(--honors)]">Terms of Service</a>
<span>•</span>
<a href="#" class="hover:text-[color:var(--honors)]">Membership Agreement</a>
<span>•</span>
<a href="#" class="hover:text-[color:var(--honors)]">Legal</a>
<span>•</span>
<a href="#" class="hover:text-[color:var(--honors)]">Sitemap</a>
</nav>
<nav class="flex items-center gap-4">
<a href="#" class="hover:text-[color:var(--honors)]">Facebook</a>
<a href="#" class="hover:text-[color:var(--honors)]">Instagram</a>
<a href="#" class="hover:text-[color:var(--honors)]">YouTube</a>
<a href="#" class="hover:text-[color:var(--honors)]">TikTok</a>
</nav>
</div>
<p class="mt-4 text-center text-xs text-[color:var(--steel)] md:text-left">Educational content only. Not financial, tax, or legal advice.</p>
</div>
</footer>
<!-- ============================================================= -->
<!-- Interactive shells added in the WordPress conversion.          -->
<!-- The Lovable page renders these client-side with React (Radix   -->
<!-- dialogs / sheet); markup + classes below mirror that output.   -->
<!-- ============================================================= -->

<!-- Mobile nav drawer -->
<div class="rym-drawer" data-rym-drawer hidden>
<div class="rym-drawer-overlay fixed inset-0 z-50 bg-black/80" data-rym-drawer-close>
</div>
<div class="rym-drawer-panel fixed inset-y-0 right-0 z-50 w-[86%] max-w-sm border-l border-border/60 bg-white shadow-lg" role="dialog" aria-modal="true" aria-label="Menu">
<div class="flex h-16 items-center justify-between border-b border-border/60 px-5">
<img src="<?php echo $A; ?>img/RYU-Submark-CampusSteel-RGB.png" alt="Replace Your University" class="h-8 w-auto"/>
<button type="button" data-rym-drawer-close aria-label="Close menu" class="inline-flex h-10 w-10 items-center justify-center rounded-lg text-[color:var(--navy-deep)]">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-5 w-5" aria-hidden="true">
<path d="M18 6 6 18">
</path>
<path d="m6 6 12 12">
</path>
</svg>
</button>
</div>
<div class="rym-drawer-body px-3 py-4">
<details class="rym-acc border-b border-border/60">
<summary class="flex cursor-pointer list-none items-center justify-between px-2 py-3 text-base font-semibold text-[color:var(--navy-deep)]">Our Story<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 shrink-0 transition-transform duration-200" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="flex flex-col pb-2">
<a href="#michael" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Our Story</a>
<a href="#michael" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Meet the Team</a>
<a href="#media" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">In The News</a>
</div>
</details>
<details class="rym-acc border-b border-border/60">
<summary class="flex cursor-pointer list-none items-center justify-between px-2 py-3 text-base font-semibold text-[color:var(--navy-deep)]">Programs<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 shrink-0 transition-transform duration-200" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="flex flex-col pb-2">
<a href="#education" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Replace Your Mortgage</a>
<a href="#education" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Replace Your Bank</a>
<a href="#education" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Replace Your Dollar</a>
<a href="#education" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Replace Your Employer</a>
</div>
</details>
<details class="rym-acc border-b border-border/60">
<summary class="flex cursor-pointer list-none items-center justify-between px-2 py-3 text-base font-semibold text-[color:var(--navy-deep)]">Learn<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 shrink-0 transition-transform duration-200" aria-hidden="true">
<path d="m6 9 6 6 6-6">
</path>
</svg>
</summary>
<div class="flex flex-col pb-2">
<a href="#education" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Education Hub</a>
<a href="#faq" data-rym-drawer-link class="rounded-lg px-4 py-2.5 text-sm text-[color:var(--graphite)] hover:bg-[color:var(--stone)]">Frequently Asked Questions</a>
</div>
</details>
<a href="#reviews" data-rym-drawer-link class="block border-b border-border/60 px-2 py-4 text-base font-semibold text-[color:var(--navy-deep)]">Reviews</a>
<a href="#contact" data-rym-drawer-link class="block border-b border-border/60 px-2 py-4 text-base font-semibold text-[color:var(--navy-deep)]">Contact</a>
<div class="mt-6 px-2">
<a href="#training" data-rym-drawer-link class="btn-cta w-full justify-center">Watch Free Training</a>
</div>
</div>
</div>
</div>

<!-- "Watch the Free Training" lead-capture modal (opens from every training CTA) -->
<div class="rym-modal" data-rym-modal="training" hidden>
<div class="rym-modal-overlay fixed inset-0 z-50 bg-black/80" data-rym-modal-close>
</div>
<div class="rym-modal-panel fixed left-[50%] top-[50%] z-50 grid w-full max-w-md translate-x-[-50%] translate-y-[-50%] gap-0 border border-border/60 bg-white p-0 shadow-lg sm:rounded-2xl" role="dialog" aria-modal="true" aria-label="Watch the Free Training">
<div class="flex flex-col space-y-1.5 text-center sm:text-left border-b border-border/60 px-6 py-5">
<h2 class="text-lg font-semibold text-[color:var(--navy-deep)]">Watch the Free Training</h2>
</div>
<form data-rym-training-form class="space-y-4 px-6 py-6" novalidate="">
<div class="space-y-1.5">
<label for="tm-first" class="text-sm font-semibold text-[color:var(--navy-deep)]">First Name <span class="text-[color:var(--ember)]">*</span>
</label>
<input id="tm-first" name="firstName" maxlength="80" autocomplete="given-name" required class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"/>
</div>
<div class="space-y-1.5">
<label for="tm-last" class="text-sm font-semibold text-[color:var(--navy-deep)]">Last Name <span class="text-[color:var(--ember)]">*</span>
</label>
<input id="tm-last" name="lastName" maxlength="80" autocomplete="family-name" required class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"/>
</div>
<div class="space-y-1.5">
<label for="tm-email" class="text-sm font-semibold text-[color:var(--navy-deep)]">Email <span class="text-[color:var(--ember)]">*</span>
</label>
<div class="relative">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-[color:var(--steel)]" aria-hidden="true">
<path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7">
</path>
<rect x="2" y="4" width="20" height="16" rx="2">
</rect>
</svg>
<input id="tm-email" name="email" type="email" maxlength="255" autocomplete="email" required class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm pl-9"/>
</div>
</div>
<div class="space-y-1.5">
<label for="tm-phone" class="text-sm font-semibold text-[color:var(--navy-deep)]">Phone <span class="text-[color:var(--ember)]">*</span>
</label>
<input id="tm-phone" name="phone" type="tel" maxlength="30" autocomplete="tel" placeholder="(555) 555-5555" required pattern="[0-9\(\)\+\-\.\s]{7,}" class="flex h-9 w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50 md:text-sm"/>
</div>
<button type="submit" class="btn-cta w-full justify-center disabled:opacity-70">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-play h-5 w-5" aria-hidden="true">
<path d="M9 9.003a1 1 0 0 1 1.517-.859l4.997 2.997a1 1 0 0 1 0 1.718l-4.997 2.997A1 1 0 0 1 9 14.996z">
</path>
<circle cx="12" cy="12" r="10">
</circle>
</svg>
<span data-rym-submit-label>Watch the Free Training</span>
</button>
<label class="flex cursor-pointer items-start gap-2 pt-1 text-xs leading-relaxed text-[color:var(--graphite)]/80">
<input type="checkbox" name="consent" required class="rym-checkbox mt-0.5"/>
<span>I agree to receive access to this free video and related follow-up resources from Replace Your University, which may include text messages and phone calls from our team or an AI voice. You can opt out at any time by replying STOP or letting us know during a call.</span>
</label>
</form>
<div data-rym-training-success class="px-6 py-12 text-center" hidden>
<p class="font-display text-lg font-semibold text-[color:var(--navy-deep)]">You're in.</p>
<p class="mt-2 text-sm text-[color:var(--graphite)]/80">Check your email for the training link.</p>
</div>
<button type="button" data-rym-modal-close aria-label="Close" class="absolute right-4 top-4 rounded-sm opacity-70 cursor-pointer transition-opacity hover:opacity-100">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4" aria-hidden="true">
<path d="M18 6 6 18">
</path>
<path d="m6 6 12 12">
</path>
</svg>
<span class="sr-only">Close</span>
</button>
</div>
</div>

<!-- Loan-estimate page 3 lightbox -->
<div class="rym-modal" data-rym-modal="loan-estimate" hidden>
<div class="rym-modal-overlay fixed inset-0 z-50 bg-black/80" data-rym-modal-close>
</div>
<div class="rym-modal-panel fixed left-[50%] top-[50%] z-50 grid w-full max-w-4xl translate-x-[-50%] translate-y-[-50%] gap-4 bg-white p-0 shadow-lg sm:max-w-5xl sm:rounded-lg" role="dialog" aria-modal="true" aria-label="Loan Estimate — Page 3">
<img src="<?php echo $A; ?>img/loan-estimate-p3.png" alt="Loan Estimate page 3 showing Total Interest Percentage (TIP)" class="h-auto w-full rounded-lg" loading="lazy"/>
<button type="button" data-rym-modal-close aria-label="Close" class="absolute right-4 top-4 rounded-sm opacity-70 cursor-pointer transition-opacity hover:opacity-100">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x h-4 w-4" aria-hidden="true">
<path d="M18 6 6 18">
</path>
<path d="m6 6 12 12">
</path>
</svg>
<span class="sr-only">Close</span>
</button>
</div>
</div>
</div>
