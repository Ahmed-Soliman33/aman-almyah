<?php
/**
 * Main template — Hero section.
 *
 * @package engineering-theme
 */

get_header();
?>

<main class="relative z-0 flex flex-col mx-auto" style="font-family: var(--font-main);">

  <!-- ============================================================
       Hero Section
  ============================================================ -->

  <style>
    /* ════════════════════════════
       KEYFRAMES
    ════════════════════════════ */
    @keyframes hero-fade-up {
      from { opacity: 0; transform: translateY(22px); }
      to   { opacity: 1; transform: translateY(0);    }
    }
    @keyframes hero-fade-in {
      from { opacity: 0; } to { opacity: 1; }
    }
    @keyframes hero-scale-in {
      from { opacity: 0; transform: scale(1.05); }
      to   { opacity: 1; transform: scale(1);    }
    }
    @keyframes pulse-ring {
      0%   { transform: scale(1);   opacity: .55; }
      100% { transform: scale(1.9); opacity: 0;   }
    }
    @keyframes shimmer-line {
      0%   { width: 0;    opacity: 0; }
      40%  { opacity: 1;             }
      100% { width: 60px; opacity: 1; }
    }

    /* ════════════════════════════
       ENTRANCE HELPERS
    ════════════════════════════ */
    .hero-anim     { opacity: 0; }
    .hero-anim-img { opacity: 0; }
    .hero-anim.is-visible     { animation: hero-fade-up  .65s cubic-bezier(.22,.61,.36,1) forwards; }
    .hero-anim-img.is-visible { animation: hero-scale-in .85s cubic-bezier(.22,.61,.36,1) forwards; }

    /* Mobile panel items: no delay, instant opacity so they never flash invisible */
    .hero-mob-item { opacity: 1; animation: hero-fade-up .5s cubic-bezier(.22,.61,.36,1) both; }
    .hero-mob-item:nth-child(2) { animation-delay: .08s; }
    .hero-mob-item:nth-child(3) { animation-delay: .16s; }
    .hero-mob-item:nth-child(4) { animation-delay: .22s; }
    .hero-mob-item:nth-child(5) { animation-delay: .28s; }

    /* ════════════════════════════
       HEADLINE ACCENT UNDERLINE
    ════════════════════════════ */
    .hero-accent { position: relative; }
    .hero-accent::after {
      content: '';
      position: absolute;
      bottom: -3px; right: 0;
      height: 3px; width: 0;
      background: linear-gradient(to left, #0651A2, transparent);
      border-radius: 30%;
    }
    .hero-accent.is-visible::after {
      animation: shimmer-line .8s .5s cubic-bezier(.22,.61,.36,1) forwards;
    }


    #banner {
      animation: hero-fade-in 1s .9s both;
      max-width: 1400px; margin-left: auto; margin-right: auto;
      border-radius: 20px;
      overflow: hidden;
    }

   @media (max-width: 1400px)  {
    #banner {
      border-radius: 20px;
      margin-left: 24px;
     }
  }

   @media (max-width: 700px)  {
    #banner { 
      margin-left: 0;
      border-radius: 20px;
      margin-right: 0;
    }
}


    /* ════════════════════════════
       BUTTONS
    ════════════════════════════ */
    /* ── PRIMARY BUTTON ── */
    .btn-primary-hero {
      position: relative;
      overflow: hidden;
      isolation: isolate;
      transition: transform .22s cubic-bezier(.34,1.56,.64,1),
                  box-shadow .22s ease;
      -webkit-tap-highlight-color: transparent;
    }
    /* Shimmer sweep layer */
    .btn-primary-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(
        105deg,
        transparent 30%,
        rgba(255,255,255,.28) 50%,
        transparent 70%
      );
      transform: translateX(-100%);
      transition: transform 0s;
      pointer-events: none;
      z-index: 1;
    }
    .btn-primary-hero:hover {
      transform: translateY(-3px) scale(1.015);
      box-shadow: 0 16px 36px rgba(6,81,162,.42), 0 4px 12px rgba(6,81,162,.22);
    }
    .btn-primary-hero:hover::before {
      transform: translateX(200%);
      transition: transform .55s ease;
    }
    .btn-primary-hero:active {
      transform: translateY(0) scale(.975);
      box-shadow: 0 4px 12px rgba(6,81,162,.25);
      transition-duration: .1s;
    }
    /* Text/icon inside stays above shimmer */
    .btn-primary-hero > * { position: relative; z-index: 2; }

    /* ── OUTLINE BUTTON ── */
    .btn-outline-hero {
      position: relative;
      overflow: hidden;
      isolation: isolate;
      transition: transform .22s cubic-bezier(.34,1.56,.64,1),
                  color .22s ease,
                  border-color .22s ease,
                  box-shadow .22s ease;
      -webkit-tap-highlight-color: transparent;
    }
    /* Cursor-tracked spotlight fill */
    .btn-outline-hero::before {
      content: '';
      position: absolute;
      width: 180px; height: 180px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(6,81,162,.18) 0%, transparent 70%);
      transform: translate(-50%, -50%) scale(0);
      transition: transform .4s ease, opacity .3s ease;
      top: var(--my, 50%);
      left: var(--mx, 50%);
      pointer-events: none;
      z-index: 0;
    }
    /* Fill wipe on hover */
    .btn-outline-hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background: #0651A2;
      border-radius: inherit;
      transform: scaleX(0);
      transform-origin: right center;
      transition: transform .3s cubic-bezier(.65,0,.35,1);
      z-index: 0;
    }
    .btn-outline-hero:hover::before {
      transform: translate(-50%, -50%) scale(1);
    }
    .btn-outline-hero:hover::after {
      transform: scaleX(1);
      transform-origin: left center;
    }
    .btn-outline-hero:hover {
      transform: translateY(-3px) scale(1.015);
      color: #fff !important;
      border-color: #0651A2 !important;
      box-shadow: 0 14px 32px rgba(6,81,162,.35);
    }
    .btn-outline-hero:active {
      transform: translateY(0) scale(.975);
      transition-duration: .1s;
    }
    /* Text above layers */
    .btn-outline-hero > * { position: relative; z-index: 2; }

    /* ════════════════════════════
       DECORATIVE / SCROLL REVEAL
    ════════════════════════════ */
    .hero-shape-decor { animation: hero-fade-in 1.2s .9s both; }

    .reveal {
      opacity: 0; transform: translateY(30px);
      transition: opacity .65s cubic-bezier(.22,.61,.36,1), transform .65s cubic-bezier(.22,.61,.36,1);
    }
    .reveal.revealed { opacity: 1; transform: none; }

    /* ════════════════════════════════════════
       MOBILE HERO  (< 1024 px)
       Split layout: image top, content card below
    ════════════════════════════════════════ */
    @media (max-width: 1023px) {

      /* Section: normal block flow, no min-height tricks */
      #hero {
        flex-direction: column !important;
        min-height: 0 !important;
        height: auto !important;
        padding-top: 0 !important;
        margin-top: 0 !important;
        overflow: visible !important;
        border-radius: 0 !important;
      }

      /* Hide desktop panel */
      #hero .hero-desktop-panel { display: none !important; }

      /* Show mobile content card */
      #hero .hero-mobile-panel  { display: block !important; }
    }

    /* ── Mobile content card (white, below image) ── */
    .hero-mob-card {
      background: #fff;
      padding: 24px 20px 28px;
    }

    /* ── Stats strip (on white background) ── */
    .hero-stats-strip {
      background: #f4f7fb;
      border: 1px solid #e4eaf3;
      border-radius: 16px;
    }
  </style>

  <section
    id="hero"
    class="relative flex flex-col lg:flex-row -mt-10 min-h-screen overflow-hidden"
    style="padding-top: var(--header-height);"
    aria-label="القسم الرئيسي"
  >

    <!-- ══════════════════════════════════════
         MOBILE IMAGE  (top of stack, mobile only)
    ══════════════════════════════════════ -->
    <div class="hero-img-wrap w-full lg:hidden overflow-hidden">
      <picture class="hero-picture block">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/main-hero-image.png' ); ?>"
          alt="فريق عمل أمان الميه على سطح مبنى"
          class="w-full h-auto object-cover hero-img-pos"
          style="object-position: center 30%;"
          loading="eager"
          fetchpriority="high"
          width="902"
          height="732"
        >
      </picture>
    </div><!-- /mobile image panel -->

    <!-- ══ MOBILE CONTENT CARD — sits below image ══ -->
    <div class="hero-mobile-panel hidden text-right">
      <div class="hero-mob-card">

        <!-- Badge -->
        <div class="hero-mob-item inline-flex items-center gap-2 mb-4 px-3.5 py-1.5 rounded-full text-xs font-bold"
             style="background:rgba(6,81,162,.08); border:1px solid rgba(6,81,162,.18); color:#0651A2;">
          <span class="w-1.5 h-1.5 rounded-full inline-block" style="background:#0651A2;"></span>
          حلول هندسية متخصصة
        </div>

        <!-- Headline -->
        <h1 class="hero-mob-item font-black leading-tight mb-3"
            style="font-size:clamp(1.65rem,7vw,2.1rem); letter-spacing:-.02em; color:#1E2D3D;">
          حلول هندسية دقيقة...<br>
          <span class="hero-accent is-visible" style="color:#0651A2;">حماية تدوم لسنوات</span>
        </h1>

        <!-- Sub-copy -->
        <p class="hero-mob-item leading-relaxed mb-5" style="font-size:.9rem; color:#5a6a7e;">
          كشف تسريبات المياه، العزل الحراري والمائي، وأعمال الأسطح بأعلى معايير الجودة للمنشآت السكنية والتجارية.
        </p>

       

      </div><!-- /hero-mob-card -->
    </div><!-- /hero-mobile-panel -->

    <!-- ══════════════════════════════════════
         DESKTOP CONTENT PANEL
    ══════════════════════════════════════ -->
    <div class="hero-desktop-panel relative w-full bg-white hidden lg:flex flex-col justify-center px-16 py-0 text-right overflow-hidden">

      <!-- Decorative dot pattern (right side) -->
      <div class="hero-shape-decor absolute top-0 right-0 w-64 h-full opacity-20 pointer-events-none"
           style="background-image:url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-shape.png' ); ?>'); background-repeat:no-repeat; background-position:top left; background-size:contain;"
           aria-hidden="true"></div>

      <!-- Hero image — decorative background, pinned to far left -->
      <div class="hero-anim-img absolute top-0 left-0 h-full pointer-events-none"
           style="width: clamp(340px, 60%, 900px);"
           aria-hidden="true">
        <img
          id="hero-img"
          src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/main-hero-image.png' ); ?>"
          alt=""
          class="w-full h-full object-cover"
          style="object-position: center top;"
          loading="eager"
          fetchpriority="high"
          width="902"
          height="732"
        >
        <!-- Soft right-edge fade into white content area -->
        <div class="absolute inset-0 pointer-events-none"
             style="background: linear-gradient(to right, transparent 55%, rgba(255,255,255,.85) 85%, #fff 100%);"
             aria-hidden="true"></div>
      </div>


      <div class="relative z-10 max-w-xl mr-0 min-[1350px]:mr-32">

        <!-- Badge -->
        <div class="hero-anim inline-flex items-center gap-2 bg-primary/10 border border-primary/20 text-primary text-xs font-bold px-4 py-1.5 rounded-full mb-6"
             style="animation-delay:.05s;">
          <span class="w-1.5 h-1.5 rounded-full bg-primary inline-block animate-pulse"></span>
          حلول هندسية متخصصة
        </div>

        <!-- Headline -->
        <h1 class="hero-anim text-5xl xl:text-6xl font-black text-dark leading-snug mb-6" style="animation-delay:.15s;">
          حلول هندسية دقيقة...<br>
          <span class="text-primary hero-accent">حماية تدوم لسنوات</span>
        </h1>

        <!-- Body -->
        <p class="hero-anim text-gray-500 text-lg font-[500] leading-relaxed mb-10" style="animation-delay:.25s;">
          حلول هندسية متخصصة في كشف تسريبات المياه، العزل الحراري والمائي، وأعمال الأسطح.
          نخدم المنشآت السكنية والتجارية والصناعية بأعلى معايير الجودة.
        </p>

        <!-- CTA Buttons -->
        <div class="hero-anim flex flex-wrap items-center gap-4" style="animation-delay:.35s;">
          <a href="#services"
             class="btn-primary-hero bg-primary  text-white font-bold text-md px-20 py-2.5 rounded-full shadow-lg shadow-primary/30">
            <span class="translate-y-2">اطلب خدماتنا</span>
          </a>
          <a href="https://wa.me/966500000000" target="_blank" rel="noopener noreferrer"
             class="btn-outline-hero border-2 border-charcoal text-charcoal font-bold text-md px-20 py-2.5 rounded-full">
            <span class="translate-y-2">تواصل معنا</span>
          </a>
        </div>

         

      </div>
    </div><!-- /desktop panel -->

  </section><!-- /hero -->

  <script>
  (function () {
    'use strict';

    /* 1. Hero entrance: fire immediately on load for above-fold elements.
          IntersectionObserver can miss elements already in viewport at page load
          in some rendering contexts; triggering directly is more reliable. */
    function triggerHeroAnims() {
      document.querySelectorAll('.hero-anim, .hero-anim-img, .hero-accent').forEach(function (el) {
        el.classList.add('is-visible');
      });
    }
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', triggerHeroAnims);
    } else {
      triggerHeroAnims();
    }

    /* 2. Scroll-reveal for sections below hero */
    var revealIO = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        e.target.classList.add('revealed');
        revealIO.unobserve(e.target);
      });
    }, { threshold: 0.08 });

    document.querySelectorAll('.reveal').forEach(function (el) { revealIO.observe(el); });

    /* 3. Animated counter (ease-out-cubic) */
    function animateCount(el) {
      var target = parseInt(el.dataset.count, 10);
      var suffix = el.dataset.suffix || '';
      var dur    = 1400;
      var start  = performance.now();
      (function step(now) {
        var p    = Math.min((now - start) / dur, 1);
        var ease = 1 - Math.pow(1 - p, 3);
        el.textContent = Math.round(ease * target) + suffix;
        if (p < 1) requestAnimationFrame(step);
      })(start);
    }

    var counterIO = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        animateCount(e.target);
        counterIO.unobserve(e.target);
      });
    }, { threshold: 0.4 });

    document.querySelectorAll('[data-count]').forEach(function (el) { counterIO.observe(el); });

    /* 4. Desktop parallax on hero bg image (respects prefers-reduced-motion) */
    var heroImg = document.getElementById('hero-img');
    var noMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (heroImg && !noMotion && window.innerWidth >= 1024) {
      window.addEventListener('scroll', function () {
        heroImg.style.transform = 'translateY(' + (window.scrollY * 0.08) + 'px)';
      }, { passive: true });
    }

    /* 5. Primary button — ink ripple on click */
    document.querySelectorAll('.btn-primary-hero').forEach(function (btn) {
      btn.addEventListener('pointerdown', function (e) {
        var r    = btn.getBoundingClientRect();
        var size = Math.max(r.width, r.height) * 2.2;
        var ink  = document.createElement('span');
        ink.style.cssText = [
          'position:absolute', 'border-radius:50%', 'pointer-events:none', 'z-index:3',
          'background:rgba(255,255,255,.38)',
          'width:'  + size + 'px',
          'height:' + size + 'px',
          'top:'    + (e.clientY - r.top  - size / 2) + 'px',
          'left:'   + (e.clientX - r.left - size / 2) + 'px',
          'transform:scale(0)',
          'transition:transform .5s cubic-bezier(.2,.8,.3,1), opacity .4s ease',
        ].join(';');
        btn.appendChild(ink);
        requestAnimationFrame(function () {
          ink.style.transform = 'scale(1)';
          ink.style.opacity   = '0';
        });
        setTimeout(function () { ink.remove(); }, 600);
      });
    });

    /* 6. Outline button — magnetic pull + cursor spotlight tracking */
    document.querySelectorAll('.btn-outline-hero').forEach(function (btn) {
      var strength = 6; // px of magnetic pull

      btn.addEventListener('mousemove', function (e) {
        var r  = btn.getBoundingClientRect();
        var cx = r.left + r.width  / 2;
        var cy = r.top  + r.height / 2;
        var dx = (e.clientX - cx) / (r.width  / 2); // -1 … +1
        var dy = (e.clientY - cy) / (r.height / 2); // -1 … +1

        /* Magnetic nudge */
        btn.style.transform = 'translate('
          + (dx * strength) + 'px,'
          + (dy * strength - 3) + 'px) scale(1.015)';

        /* Spotlight position (CSS custom props) */
        btn.style.setProperty('--mx', (e.clientX - r.left) + 'px');
        btn.style.setProperty('--my', (e.clientY - r.top)  + 'px');
      });

      btn.addEventListener('mouseleave', function () {
        btn.style.transform = '';
        /* Reset to center so next hover starts from middle */
        btn.style.setProperty('--mx', '50%');
        btn.style.setProperty('--my', '50%');
      });

      /* Tactile press */
      btn.addEventListener('pointerdown', function () {
        btn.style.transform = 'scale(.96)';
        btn.style.transition = 'transform .08s ease';
      });
      btn.addEventListener('pointerup', function () {
        btn.style.transition = '';
      });
    });

  })();
  </script>

  <!-- Banner Section -->
  <section id="banner" class="w-full mt-20 mb-32">
    <div style="max-width:1400px; margin-left:auto; margin-right:auto; padding-left:30px; padding-right:30px;">
      <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/banner-desktop.jpg">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-desktop.jpg"
             alt="عوازلنا.. حماية تدوم وراحة بال مضمونة"
             class="w-full h-auto object-cover block"
             loading="lazy">
      </picture>
    </div>
  </section><!-- /banner -->

  <style>
    @media (max-width: 760px) {
      #banner > div { padding-left: 10px !important; padding-right: 10px !important; border-radius: 20px; }
    }
  </style>

 
  <!-- About Section -->
  <style>
    /* ── About entrance animations ── */
    @keyframes about-fade-up {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes about-scale-in {
      from { opacity: 0; transform: scale(1.04); }
      to   { opacity: 1; transform: scale(1); }
    }
   
    @keyframes about-border-shimmer {
      0%   { background-position: 200% center; }
      100% { background-position: -200% center; }
    }

    /* Reveal states */
    .about-item { opacity: 0;
  max-width: 85%;
    justify-content: center;
    align-items: center;
    flex-direction: row;
    flex-wrap: nowrap;
  }
    .about-item.about-visible { animation: about-fade-up 0.7s cubic-bezier(0.22,1,0.36,1) forwards; }
    .about-img-wrap { opacity: 0; }
    .about-img-wrap.about-visible { animation: about-scale-in 0.9s cubic-bezier(0.22,1,0.36,1) forwards; }

    /* Heading accent underline */
    .about-heading {
      display: inline-block;
      position: relative;    font-size: clamp(1.6rem, 3vw, 1.95rem);
    font-weight: 800;
    color: #1E2D3D;
    letter-spacing: -.02em;
      margin-bottom: 44px;
      opacity: 0;
      transform: translateY(18px);
      transition: opacity .65s cubic-bezier(.22,.61,.36,1),
                  transform .65s cubic-bezier(.22,.61,.36,1);
    }
    .about-heading::after {
      content: '';
      position: absolute;
      bottom: -6px;
      right: 0;
      height: 3px;
      width: 0;
      border-radius: 2px;
      background: linear-gradient(90deg, transparent, #0651A2, #4a9eff, #0651A2, transparent);
      background-size: 200% auto;
    }
  

    /* Paragraph hover highlight */
    .about-para {
      position: relative;
      padding-right: 12px;
      border-right: 2px solid transparent;
      transition: border-color 0.3s ease, padding-right 0.3s ease, color 0.3s ease;
      cursor: default;
    }
    .about-para:hover {
      border-right-color: rgba(6,81,162,0.6);
      padding-right: 16px;
      color: #fff;
    }

    /* Primary button — liquid fill */
    .about-btn-primary {
      position: relative;
      overflow: hidden;
      background: #0651A2;
      color: #fff;
      font-weight: 700;
      font-size: 0.875rem;
               height: 42px;
      border-radius: 9999px;
      border: none;
      display: inline-block;
      transition: transform 0.2s cubic-bezier(0.34,1.56,0.64,1),
                  box-shadow 0.2s ease;
      box-shadow: 0 8px 24px rgba(6,81,162,0.35);
      isolation: isolate;
      width: 100%;text-align: center;    display: flex;
    justify-content: center;
    align-items: center;
    }
    .about-btn-primary::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.18) 0%, transparent 60%);
      border-radius: inherit;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
    .about-btn-primary::after {
      content: '';
      position: absolute;
      top: 50%; left: 50%;
      width: 0; height: 0;
      background: rgba(255,255,255,0.22);
      border-radius: 50%;
      transform: translate(-50%,-50%);
      transition: width 0.55s cubic-bezier(0.22,1,0.36,1),
                  height 0.55s cubic-bezier(0.22,1,0.36,1),
                  opacity 0.55s ease;
      opacity: 0;
      pointer-events: none;
    }
    .about-btn-primary:hover {
      transform: translateY(-3px) scale(1.03);
      box-shadow: 0 14px 36px rgba(6,81,162,0.5);
    }
    .about-btn-primary:hover::before { opacity: 1; }
    .about-btn-primary:active {
      transform: translateY(0) scale(0.97);
      box-shadow: 0 4px 12px rgba(6,81,162,0.3);
    }
    /* Ripple via JS — spawned element */
    .about-btn-primary .ab-ripple {
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.3);
      transform: scale(0);
      animation: ab-ripple-out 0.6s cubic-bezier(0.22,1,0.36,1) forwards;
      pointer-events: none;
    }
    @keyframes ab-ripple-out {
      to { transform: scale(4); opacity: 0; }
    }

    /* Outline button — spotlight + magnetic */
    .about-btn-outline {
      position: relative;
      overflow: hidden;
      background: transparent;
      color: #fff;
      font-weight: 700;
      font-size: 0.875rem;
      height: 42px;
      border-radius: 9999px;
      border: 2px solid rgba(255,255,255,0.75);
      display: inline-block;
      transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1),
                  border-color 0.3s ease,
                  color 0.3s ease,
                  box-shadow 0.3s ease;
      isolation: isolate;
      width: 100%;text-align: center;    display: flex;
    justify-content: center;
    align-items: center;
    }
    /* Spotlight radial that follows mouse */
    .about-btn-outline::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: radial-gradient(circle at var(--ox,50%) var(--oy,50%),
                    rgba(255,255,255,0.15) 0%,
                    transparent 65%);
      opacity: 0;
      transition: opacity 0.3s ease;
      pointer-events: none;
    }
    /* Fill wipe on hover */
    .about-btn-outline::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: #fff;
      transform: scaleX(0);
      transform-origin: left center;
      transition: transform 0.35s cubic-bezier(0.22,1,0.36,1);
      z-index: -1;
    }
    .about-btn-outline:hover {
      border-color: #fff;
      color: #1E2D3D;
      box-shadow: 0 8px 28px rgba(255,255,255,0.2);
      transform: translateY(-2px);
    }
    .about-btn-outline:hover::before { opacity: 1; }
    .about-btn-outline:hover::after  { transform: scaleX(1); }
    .about-btn-outline:active { transform: translateY(0) scale(0.97); }

    /* Image tilt container */
    .about-img-tilt {
      will-change: transform;
      transition: transform 0.08s linear;
      border-radius: 1rem;
    }
    .about-img-tilt img {
      border-radius: inherit;
      display: block;
    }
  </style>

  <section id="about"
    class="bg-no-repeat mt-20 mb-32"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-bg.png'); background-size: 100% 100%; background-position: center;">
    <div class="max-w-7xl mx-auto px-6 py-16 lg:py-24 flex items-center justify-center">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

        <!-- Column 1: Text (visually right in RTL) -->
        <div class="text-right">
          <h2 class="about-item about-heading text-4xl lg:text-5xl font-black text-white mb-8" style="animation-delay:0.05s">من نحن</h2>
          <div class="space-y-2 text-gray-200 font-medium text-base leading-relaxed">
            <p class="about-item about-para" style="animation-delay:0.15s">أمان المياه شركة متخصصة في الحلول الهندسية لكشف تسريبات المياه وأعمال العزل والترميم، نعمل بمنهج يعتمد على التشخيص الدقيق قبل التنفيذ، والمعالجة الجذرية بدل الحلول المؤقتة.</p>
            <p class="about-item about-para" style="animation-delay:0.25s">نستخدم تقنيات كشف متقدمة تُمكِّننا من تحديد مواقع الخلل بدقة دون تكسير عشوائي، مع تطبيق أنظمة عزل معتمدة تحمي المباني من التسريبات والرطوبة على المدى الطويل.</p>
            <p class="about-item about-para" style="animation-delay:0.35s">نؤمن أن جودة التنفيذ تبدأ من التخطيط، لذلك نلتزم بمعايير هندسية واضحة في كل مرحلة — من الفحص والمعاينة، إلى التنفيذ، ثم الاختبار والتسليم — لضمان نتائج موثوقة يمكن الاعتماد عليها.</p>
            <p class="about-item about-para" style="animation-delay:0.45s">هدفنا هو تأمين المباني، حماية الأصول، وبناء ثقة طويلة الأمد مع عملائنا من خلال حلول عملية، تنفيذ منضبط، والتزام كامل بالجودة.</p>
          </div>
          <div class="about-item flex flex-wrap gap-4 mt-8 justify-start" style="animation-delay:0.55s">
            <a href="#services" class="about-btn-primary">اطلب خدماتنا</a>
            <a href="https://wa.me/966500000000" class="about-btn-outline">تواصل معنا</a>
          </div>
        </div><!-- /text column -->

        <!-- Column 2: Image (visually left in RTL) -->
        <div class="about-img-wrap" style="animation-delay:0.2s">
          <div class="about-img-tilt">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about-worker.jpg"
                 alt="عامل يطبق عزل على سطح مبنى"
                 class="shadow-2xl object-contain w-full h-auto"
                 loading="lazy" width="460" height="450">
          </div>
        </div><!-- /image column -->

      </div><!-- /grid -->
    </div><!-- /container -->
  </section><!-- /about -->

  <script>
  (function () {
    /* ── About Section micro-interactions ── */
    var aboutItems   = document.querySelectorAll('.about-item, .about-img-wrap, .about-heading');
    var aboutVisible = false;

    function revealAbout(entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        aboutItems.forEach(function (el) {
          el.classList.add('about-visible');
        });
        aboutObserver.disconnect();
      });
    }
    var aboutObserver = new IntersectionObserver(revealAbout, { threshold: 0.15 });
    var aboutSection  = document.getElementById('about');
    if (aboutSection) aboutObserver.observe(aboutSection);

    /* Primary button — ink ripple */
    document.querySelectorAll('.about-btn-primary').forEach(function (btn) {
      btn.addEventListener('pointerdown', function (e) {
        var r   = btn.getBoundingClientRect();
        var size = Math.max(r.width, r.height) * 1.6;
        var rip  = document.createElement('span');
        rip.className = 'ab-ripple';
        rip.style.cssText = 'width:' + size + 'px;height:' + size + 'px;'
          + 'top:'  + (e.clientY - r.top  - size / 2) + 'px;'
          + 'left:' + (e.clientX - r.left - size / 2) + 'px;';
        btn.appendChild(rip);
        setTimeout(function () { rip.remove(); }, 650);
      });
    });

    /* Outline button — spotlight mouse tracking + magnetic pull */
    document.querySelectorAll('.about-btn-outline').forEach(function (btn) {
      btn.addEventListener('mousemove', function (e) {
        var r  = btn.getBoundingClientRect();
        var ox = ((e.clientX - r.left) / r.width  * 100).toFixed(1) + '%';
        var oy = ((e.clientY - r.top)  / r.height * 100).toFixed(1) + '%';
        btn.style.setProperty('--ox', ox);
        btn.style.setProperty('--oy', oy);
        /* magnetic nudge — max 5px */
        var mx = ((e.clientX - r.left - r.width  / 2) / r.width)  * 5;
        var my = ((e.clientY - r.top  - r.height / 2) / r.height) * 5;
        btn.style.transform = 'translate(' + mx + 'px,' + (my - 2) + 'px)';
      });
      btn.addEventListener('mouseleave', function () {
        btn.style.transform = '';
        btn.style.setProperty('--ox', '50%');
        btn.style.setProperty('--oy', '50%');
      });
    });

  })();
  </script>


  <!-- ============================================================
       Why Choose Us Section
  ============================================================ -->
  <style>
    /* ── Why Choose Us ── */
    #why-us {
      padding: 64px 24px 72px;
    }
    .why-container {
      max-width: 1300px;
      margin: 0 auto;
      
      padding: 52px 25px 60px;
    }
    .why-heading {
        font-size: clamp(1.6rem, 3vw, 1.95rem);
    font-weight: 800;
    color: #1E2D3D;
    letter-spacing: -.02em;
      margin-bottom: 44px;
      opacity: 0;
      transform: translateY(18px);
      transition: opacity .65s cubic-bezier(.22,.61,.36,1),
                  transform .65s cubic-bezier(.22,.61,.36,1);
    }
    .why-grid {
          display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 23px;
    direction: rtl;
    background: #fff;
    border-radius: 28px;
    border: 1px solid #e8edf5;
    padding: 52px 42px 60px;
    box-shadow: 0 4px 40px rgba(4, 54, 108, .06), 0 1px 8px rgba(4, 54, 108, .04);
}
    .why-col {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
      padding: 0 20px;
      position: relative;
      opacity: 0;
      transform: translateY(24px);
      transition: opacity .55s cubic-bezier(.22,.61,.36,1),
                  transform .55s cubic-bezier(.22,.61,.36,1);
    }
    .why-col.in-view {
      opacity: 1;
      transform: none;
    }
    .why-col:not(:last-child)::after {
      content: '';
      position: absolute;
      left: 0; top: 16px; bottom: 16px;
      width: 1px;
      background: linear-gradient(to bottom, transparent, #d8e4f0 30%, #d8e4f0 70%, transparent);
    }
    /* Stagger delays */
    .why-col:nth-child(1) { transition-delay: .05s; }
    .why-col:nth-child(2) { transition-delay: .13s; }
    .why-col:nth-child(3) { transition-delay: .21s; }
    .why-col:nth-child(4) { transition-delay: .29s; }
    .why-col:nth-child(5) { transition-delay: .37s; }

    .why-icon-wrap {
      width: 96px;
      height: 96px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 20px;
      border-radius: 50%;
      transition: background .28s ease,
                  transform .42s cubic-bezier(.34,1.56,.64,1);
    }
    .why-icon-wrap svg {
      transition: transform .42s cubic-bezier(.34,1.56,.64,1);
    }
    .why-col:hover .why-icon-wrap {
      transform: translateY(-5px) scale(1.08);
    }
    .why-col:hover .why-icon-wrap svg {
      transform: rotate(-12deg);
    }
    .why-title {
         font-size: 1.1rem;
    font-weight: 800;
    color: #04366C;
    margin-bottom: 11px;
    letter-spacing: -.01em;
    }
    .why-text {
          font-size: .855rem;
    color: #5a6a7e;
    line-height: 1.45;
    font-weight: 500;
    }

    @media (max-width: 900px) {
      .why-grid { grid-template-columns: repeat(3, 1fr); gap: 32px 0; }
      .why-col:nth-child(3)::after { display: none; }
    }
    @media (max-width: 600px) {
      .why-heading {
        margin: 30px auto;
        text-align: center;
      }
      .why-container { padding: 36px 24px 44px; border-radius: 20px; }
      .why-grid { grid-template-columns: repeat(2, 1fr); gap: 20px 0; padding: 20px 0; }
      .why-grid .why-col:last-of-type {
        grid-column: 1 / -1;
        padding: 0 20px;
      }
      .why-col:nth-child(2)::after { display: none; }
      .why-col:nth-child(4)::after { display: none; }
    }
  </style>

  <section id="why-us">
    <div class="why-container">

      <h2 class="why-heading">ما يجعلنا الخيار الأفضل</h2>

      <div class="why-grid">

        <!-- 1: الجودة -->
        <div class="why-col">
          <div class="why-icon-wrap">
            <svg width="54" height="54" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M43.9999 72.6667C42.3999 72.6667 40.8265 72.2933 39.5465 71.5733L26.9332 64.2933C21.7065 60.7733 21.3599 60.1333 21.3599 54.6133V41.3867C21.3599 35.8667 21.7065 35.2267 26.8265 31.7867L39.5732 24.4267C42.1065 22.96 45.9199 22.96 48.4532 24.4267L61.0665 31.7067C66.2932 35.2267 66.6399 35.8667 66.6399 41.3867V54.6133C66.6399 60.1333 66.2932 60.7733 61.1732 64.2133L48.4265 71.5733C47.1732 72.32 45.5732 72.6667 43.9999 72.6667ZM43.9999 27.3333C43.0932 27.3333 42.1865 27.52 41.5465 27.8933L28.9332 35.1733C25.3599 37.6 25.3599 37.6 25.3599 41.3867V54.6133C25.3599 58.4 25.3599 58.4 29.0665 60.9067L41.5732 68.1067C42.8532 68.8533 45.1732 68.8533 46.4532 68.1067L59.0665 60.8267C62.6399 58.4 62.6399 58.4 62.6399 54.6133V41.3867C62.6399 37.6 62.6399 37.6 58.9332 35.0933L46.4265 27.8933C45.8132 27.52 44.9065 27.3333 43.9999 27.3333Z" fill="#04366C"/>
              <path d="M58.6668 34.3467C57.5735 34.3467 56.6668 33.44 56.6668 32.3467V25.3334C56.6668 21.12 54.8802 19.3334 50.6668 19.3334H37.3335C33.1202 19.3334 31.3335 21.12 31.3335 25.3334V32.16C31.3335 33.2534 30.4268 34.16 29.3335 34.16C28.2402 34.16 27.3335 33.28 27.3335 32.16V25.3334C27.3335 18.88 30.8802 15.3334 37.3335 15.3334H50.6668C57.1202 15.3334 60.6668 18.88 60.6668 25.3334V32.3467C60.6668 33.44 59.7602 34.3467 58.6668 34.3467Z" fill="#04366C"/>
              <path d="M48.3465 59.0133C47.7865 59.0133 47.1998 58.9066 46.6132 58.6666L43.9998 57.6533L41.3865 58.6933C39.9732 59.2533 38.5332 59.1199 37.4665 58.3466C36.3998 57.5733 35.8398 56.2399 35.9198 54.7199L36.0798 51.9199L34.2932 49.7599C33.3332 48.5599 33.0132 47.1733 33.4398 45.8933C33.8398 44.6399 34.9332 43.6799 36.3998 43.3066L39.1198 42.6133L40.6398 40.2399C42.2665 37.6799 45.7598 37.6799 47.3865 40.2399L48.9065 42.6133L51.6265 43.3066C53.0932 43.6799 54.1865 44.6399 54.5865 45.8933C54.9865 47.1466 54.6665 48.5599 53.7065 49.7333L51.9198 51.8933L52.0798 54.6933C52.1598 56.2133 51.5998 57.5199 50.5332 58.3199C49.8932 58.7733 49.1465 59.0133 48.3465 59.0133ZM37.3865 47.1999L39.1732 49.3599C39.7865 50.0799 40.1332 51.2266 40.0798 52.1599L39.9198 54.9599L42.5332 53.9199C43.4132 53.5733 44.5865 53.5733 45.4665 53.9199L48.0798 54.9599L47.9198 52.1599C47.8665 51.2266 48.2132 50.1066 48.8265 49.3599L50.6131 47.1999L47.8932 46.5066C46.9865 46.2666 46.0265 45.5733 45.5198 44.7999L44.0265 42.4533L42.5065 44.7999C41.9998 45.5999 41.0398 46.2933 40.1332 46.5333L37.3865 47.1999Z" fill="#04366C"/>
            </svg>
          </div>
          <div class="why-title">الجودة</div>
          <p class="why-text">نلتزم بتقديم أفضل المعايير في كافة أعمالنا لضمان رضا العملاء وثقتهم</p>
        </div>

        <!-- 2: الابتكار -->
        <div class="why-col">
          <div class="why-icon-wrap">
            <svg width="54" height="54" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M51.3868 64.6666H36.6935C35.5202 64.6666 34.0268 64.5333 33.0401 63.52C32.0801 62.5333 32.1068 61.3066 32.1335 60.48V58.1066C25.4135 53.6266 20.9868 45.84 20.9868 38.4266C20.9868 31.4133 24.1335 24.8533 29.6002 20.4533C35.0668 16.0533 42.2402 14.4 49.2535 15.9466C55.9202 17.4133 61.6802 21.8666 64.6668 27.8666C70.4535 39.52 64.8801 52.1333 55.9735 58.1333V60.1333C56.0001 60.9066 56.0268 62.32 54.9335 63.44C54.1068 64.24 52.9335 64.6666 51.3868 64.6666ZM36.1068 60.64C36.2402 60.64 36.4268 60.6666 36.6668 60.6666H51.3868C51.6535 60.6666 51.8401 60.64 51.9468 60.6133C51.9468 60.5333 51.9468 60.4266 51.9468 60.3466V56.9866C51.9468 56.2933 52.3202 55.6266 52.9068 55.28C60.8002 50.5066 66.0268 39.6 61.0401 29.6C58.5868 24.6666 53.8402 21.0133 48.3468 19.8133C42.5335 18.5333 36.5868 19.8933 32.0535 23.5466C27.5202 27.2 24.9335 32.6133 24.9335 38.4266C24.9335 45.84 30.0535 52.24 35.1202 55.3066C35.7335 55.68 36.0801 56.32 36.0801 57.0133V60.6133C36.1068 60.6133 36.1068 60.6133 36.1068 60.64Z" fill="#04366C"/>
              <path d="M53.3332 72.6666C53.1465 72.6666 52.9599 72.64 52.7732 72.5866C47.0132 70.9333 40.9599 70.9333 35.1999 72.5866C34.1332 72.88 33.0399 72.2666 32.7199 71.2C32.3999 70.1333 33.0399 69.04 34.1065 68.72C40.5599 66.88 47.4132 66.88 53.8665 68.72C54.9332 69.0133 55.5465 70.1333 55.2532 71.2C55.0132 72.1066 54.2132 72.6666 53.3332 72.6666Z" fill="#04366C"/>
            </svg>
          </div>
          <div class="why-title">الابتكار</div>
          <p class="why-text">نسعى دائمًا لاستخدام أحدث التقنيات والحلول لتحسين خدماتنا وتلبية تطلعات العملاء</p>
        </div>

        <!-- 3: الاستدامة -->
        <div class="why-col">
          <div class="why-icon-wrap">
            <svg width="54" height="54" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M70.6668 44C70.6668 58.72 58.7202 70.6667 44.0002 70.6667C29.2802 70.6667 20.2935 55.84 20.2935 55.84M20.2935 55.84H32.3468M20.2935 55.84V69.1734M17.3335 44C17.3335 29.28 29.1735 17.3334 44.0002 17.3334C61.7868 17.3334 70.6668 32.16 70.6668 32.16M70.6668 32.16V18.8267M70.6668 32.16H58.8268" stroke="#04366C" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="why-title">الاستدامة</div>
          <p class="why-text">نحرص على تنفيذ مشاريع تحقق الاستدامة البيئية وتساهم في الحفاظ على الموارد</p>
        </div>

        <!-- 4: الشفافية -->
        <div class="why-col">
          <div class="why-icon-wrap">
            <svg width="54" height="54" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M41.3335 67.3334C26.9868 67.3334 15.3335 55.68 15.3335 41.3334C15.3335 26.9867 26.9868 15.3334 41.3335 15.3334C55.6802 15.3334 67.3335 26.9867 67.3335 41.3334C67.3335 55.68 55.6802 67.3334 41.3335 67.3334ZM41.3335 19.3334C29.2002 19.3334 19.3335 29.2 19.3335 41.3334C19.3335 53.4667 29.2002 63.3334 41.3335 63.3334C53.4668 63.3334 63.3335 53.4667 63.3335 41.3334C63.3335 29.2 53.4668 19.3334 41.3335 19.3334Z" fill="#04366C"/>
              <path d="M65.7602 72.7733C65.5469 72.7733 65.3336 72.7467 65.1469 72.72C63.8936 72.56 61.6269 71.7067 60.3469 67.8933C59.6802 65.8933 59.9202 63.8933 61.0136 62.3733C62.1069 60.8533 63.9469 60 66.0536 60C68.7736 60 70.9069 61.04 71.8669 62.88C72.8269 64.72 72.5602 67.0667 71.0402 69.3333C69.1469 72.1867 67.0936 72.7733 65.7602 72.7733ZM64.1602 66.64C64.6136 68.0267 65.2536 68.72 65.6802 68.7733C66.1069 68.8267 66.9069 68.32 67.7336 67.12C68.5069 65.9733 68.5602 65.1467 68.3736 64.7733C68.1869 64.4 67.4402 64 66.0536 64C65.2269 64 64.6136 64.2667 64.2669 64.72C63.9469 65.1733 63.8936 65.8667 64.1602 66.64Z" fill="#04366C"/>
            </svg>
          </div>
          <div class="why-title">الشفافية</div>
          <p class="why-text">نبني علاقاتنا مع العملاء على الوضوح والصراحة في جميع تعاملاتنا</p>
        </div>

        <!-- 5: المصداقية -->
        <div class="why-col">
          <div class="why-icon-wrap">
            <svg width="54" height="54" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M44.0002 56.6667C42.9335 56.6667 41.8668 56.5867 40.8535 56.4C35.2002 55.5734 30.0535 52.32 26.8002 47.4934C24.5335 44.08 23.3335 40.1067 23.3335 36C23.3335 24.6134 32.6135 15.3334 44.0002 15.3334C55.3868 15.3334 64.6668 24.6134 64.6668 36C64.6668 40.1067 63.4668 44.08 61.2002 47.4934C57.9202 52.3467 52.7735 55.5734 47.0668 56.4267C46.1335 56.5867 45.0668 56.6667 44.0002 56.6667ZM44.0002 19.3334C34.8002 19.3334 27.3335 26.8 27.3335 36C27.3335 39.3334 28.2935 42.5334 30.1068 45.2534C32.7468 49.1467 36.8802 51.76 41.4668 52.4267C43.1735 52.72 44.8535 52.72 46.4268 52.4267C51.0935 51.76 55.2268 49.12 57.8668 45.2267C59.6802 42.5067 60.6402 39.3067 60.6402 35.9733C60.6668 26.8 53.2002 19.3334 44.0002 19.3334Z" fill="#04366C"/>
              <path d="M29.253 72.2399C28.8797 72.2399 28.533 72.1866 28.1597 72.1066C26.4263 71.7066 25.093 70.3732 24.693 68.6399L23.7597 64.7198C23.7063 64.4798 23.5197 64.2932 23.253 64.2132L18.853 63.1732C17.1997 62.7732 15.893 61.5465 15.4397 59.9199C14.9863 58.2932 15.4397 56.5332 16.6397 55.3332L27.0397 44.9332C27.4663 44.5066 28.053 44.2932 28.6397 44.3466C29.2263 44.3999 29.7597 44.7199 30.1063 45.2265C32.7463 49.1199 36.8797 51.7599 41.493 52.4266C43.1997 52.7199 44.8797 52.7199 46.453 52.4266C51.1197 51.7599 55.253 49.1199 57.893 45.2265C58.213 44.7199 58.773 44.3999 59.3597 44.3466C59.9463 44.2932 60.533 44.5066 60.9597 44.9332L71.3597 55.3332C72.5597 56.5332 73.013 58.2932 72.5597 59.9199C72.1063 61.5465 70.773 62.7999 69.1463 63.1732L64.7463 64.2132C64.5063 64.2665 64.3197 64.4532 64.2397 64.7198L63.3063 68.6399C62.9063 70.3732 61.573 71.7066 59.8397 72.1066C58.1063 72.5332 56.3197 71.9199 55.1997 70.5599L43.9997 57.6799L32.7997 70.5865C31.893 71.6532 30.613 72.2399 29.253 72.2399ZM28.2397 49.4132L19.4663 58.1866C19.2263 58.4266 19.253 58.6932 19.3063 58.8532C19.333 58.9866 19.4663 59.2532 19.7863 59.3065L24.1863 60.3466C25.9197 60.7466 27.253 62.0799 27.653 63.8132L28.5863 67.7332C28.6663 68.0799 28.933 68.1865 29.093 68.2399C29.253 68.2665 29.5197 68.2932 29.7597 68.0266L39.973 56.2666C35.4397 55.3866 31.2797 52.9599 28.2397 49.4132ZM48.0263 56.2399L58.2397 67.9732C58.4797 68.2665 58.773 68.2665 58.933 68.2132C59.093 68.1865 59.333 68.0532 59.4397 67.7066L60.373 63.7866C60.773 62.0532 62.1063 60.7199 63.8397 60.3199L68.2397 59.2799C68.5597 59.1999 68.693 58.9599 68.7197 58.8265C68.773 58.6932 68.7997 58.3999 68.5597 58.1599L59.7863 49.3865C56.7197 52.9332 52.5863 55.3599 48.0263 56.2399Z" fill="#04366C"/>
              <path d="M49.0402 46.3734C48.3469 46.3734 47.5202 46.1867 46.5335 45.6001L44.0002 44.08L41.4669 45.5734C39.1469 46.96 37.6269 46.1601 37.0669 45.7601C36.5069 45.3601 35.3069 44.1601 35.9202 41.5201L36.5602 38.7734L34.4269 36.8C33.2535 35.6267 32.8269 34.2134 33.2269 32.9334C33.6269 31.6534 34.8002 30.7467 36.4535 30.48L39.3069 30L40.6669 27.0134C41.4402 25.4934 42.6402 24.64 44.0002 24.64C45.3602 24.64 46.5869 25.5201 47.3335 27.0401L48.9069 30.1867L51.5469 30.5067C53.1735 30.7734 54.3469 31.68 54.7735 32.96C55.1735 34.24 54.7469 35.6534 53.5735 36.8267L51.3602 39.0401L52.0535 41.5201C52.6669 44.1601 51.4669 45.3601 50.9069 45.7601C50.6135 46.0001 49.9735 46.3734 49.0402 46.3734ZM37.6269 34.3734L39.4669 36.2133C40.3202 37.0667 40.7469 38.5067 40.4802 39.6801L39.9735 41.8134L42.1069 40.56C43.2535 39.8934 44.8002 39.8934 45.9202 40.56L48.0535 41.8134L47.5735 39.6801C47.3069 38.4801 47.7069 37.0667 48.5602 36.2133L50.4002 34.3734L48.0802 33.9733C46.9602 33.7867 45.8402 32.9601 45.3335 31.9467L44.0002 29.3334L42.6669 32C42.1869 32.9867 41.0669 33.8401 39.9469 34.0267L37.6269 34.3734Z" fill="#04366C"/>
            </svg>
          </div>
          <div class="why-title">المصداقية</div>
          <p class="why-text">نحافظ على المواعيد والالتزامات ونضمن تقديم خدمات وفقًا لما تم الاتفاق عليه</p>
        </div>

      </div><!-- /why-grid -->
    </div><!-- /why-container -->
  </section><!-- /why-us -->

  <script>
  (function () {
    var cols = document.querySelectorAll('.why-col');
    if (!cols.length) return;
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        e.target.classList.add('in-view');
        io.unobserve(e.target);
      });
    }, { threshold: 0.15 });
    cols.forEach(function (col) { io.observe(col); });
  })();
  </script>


 <!-- ============================================================
       Services Section
  ============================================================ -->
  <style>
    /* ── Services Section ── */
    #services {
      padding: 56px 24px 72px;
      direction: rtl;
    }
    .services-header {
      max-width: 1300px;
      margin: 0 auto 36px;
      text-align: right;
    }
    .services-header h2 {
         text-align: right;
    font-size: clamp(1.6rem, 3vw, 1.85rem);
    font-weight: 700;
    color: #1E2D3D;
    margin-bottom: 52px;
    letter-spacing: -.02em;
    }
    .services-grid {
      max-width: 1300px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 50px;
    }
    @keyframes sc-glow-pulse {
      0%, 100% { box-shadow: 0 6px 32px rgba(30,45,61,.13), 0 1px 6px rgba(30,45,61,.07), 0 0 0 rgba(6,81,162,0); }
      50%       { box-shadow: 0 16px 52px rgba(6,81,162,.32), 0 2px 10px rgba(30,45,61,.12), 0 0 28px rgba(6,81,162,.18); }
    }
    .service-card {
      position: relative;
      border-radius: 35px;
      overflow: visible; /* allow glow to bleed outside */
      aspect-ratio: 4 / 5;
      box-shadow: 0 6px 32px rgba(30,45,61,.13), 0 1px 6px rgba(30,45,61,.07);
      cursor: pointer;
      will-change: transform;
      /* entrance */
      opacity: 0;
      transform: translateY(28px);
      transition:
        opacity   .55s cubic-bezier(.22,.61,.36,1),
        transform .55s cubic-bezier(.22,.61,.36,1),
        box-shadow .3s ease;
    }
    /* inner clip wrapper so glow bleeds out while content stays rounded */
    .service-card__clip {
      position: absolute;
      inset: 0;
      border-radius: 20px;
      overflow: hidden;
    }
    .service-card.in-view {
      opacity: 1;
      transform: none;
      animation: sc-glow-pulse 4s 0.8s ease-in-out infinite;
    }
    /* pause glow while user is hovering — tilt takes over visually */
    .service-card.in-view:hover {
      animation-play-state: paused;
    }
    .service-card:nth-child(1) { transition-delay: .05s; }
    .service-card:nth-child(2) { transition-delay: .17s; }
    .service-card:nth-child(3) { transition-delay: .29s; }

    .service-card:hover {
      box-shadow: 0 22px 56px rgba(6,81,162,.38), 0 4px 14px rgba(30,45,61,.15), 0 0 40px rgba(6,81,162,.2);
    }

    /* The photo */
    .service-card__img {
      position: absolute;
      inset: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      transition: transform .55s cubic-bezier(.25,.46,.45,.94);
    }
    .service-card:hover .service-card__img {
      transform: scale(1.05);
    }

    /* Dark overlay bottom third */
    .service-card__overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to top,
        rgba(45,57,69,.92) 0%,
        rgba(45,57,69,.78) 18%,
        rgba(45,57,69,.3) 36%,
        transparent 58%
      );
      pointer-events: none;
    }

    /* Bottom bar: wave as bg, title on top */
    .service-card__bottom {
      position: absolute;
      bottom: 0; right: 0; left: 0;
      transition: transform .3s cubic-bezier(.34,1.56,.64,1);
    }
    .service-card:hover .service-card__bottom {
      transform: translateY(-4px);
    }
    .service-card__wave {
      display: block;
      width: 100%;
      line-height: 0;
    }
    .service-card__wave svg {
      display: block;
      width: 100%;
      height: auto;
    }
    .service-card__title {
      position: absolute;
      bottom: 10px; right: 0; left: 0;
      padding: 0 16px 18px;
      text-align: center;
      color: #fff;
      font-size: clamp(.95rem, 1.8vw, 1.1rem);
      font-weight: 700;
      line-height: 1.4;
      letter-spacing: -.01em;
    }

    @media (max-width: 768px) {
      .services-grid { grid-template-columns: 1fr; max-width: 420px; }
      .service-card  { aspect-ratio: 4 / 3; }
    }
    @media (min-width: 769px) and (max-width: 1024px) {
      .services-grid { grid-template-columns: repeat(3, 1fr); gap: 16px; }
    }
  </style>

  <section id="services">
    <div class="services-header">
      <h2>خدماتنا</h2>
    </div>

    <div class="services-grid">

      <!-- Card 1: كشف تسريبات المياه -->
      <div class="service-card">
        <div class="service-card__clip">
          <img
            class="service-card__img"
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/service-leaks.jpg' ); ?>"
            alt="كشف وصيانة تسريبات المياه"
            loading="lazy"
          >
          <div class="service-card__overlay"></div>
          <div class="service-card__bottom">
            <span class="service-card__wave"><svg width="354" height="99" viewBox="0 0 354 99" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0 0.59583C0 0.59583 310.781 -6.8779 365.625 31.1136C420.469 69.105 365.625 99 365.625 99H0V0.59583Z" fill="#5C6369"/></svg></span>
            <div class="service-card__title">كشف وصيانة تسريبات المياه</div>
          </div>
        </div>
      </div>

      <!-- Card 2: أعمال العوازل -->
      <div class="service-card">
        <div class="service-card__clip">
          <img
            class="service-card__img"
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/about-worker.jpg' ); ?>"
            alt="أعمال العوازل"
            loading="lazy"
          >
          <div class="service-card__overlay"></div>
          <div class="service-card__bottom">
            <span class="service-card__wave"><svg width="354" height="99" viewBox="0 0 354 99" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0 0.59583C0 0.59583 310.781 -6.8779 365.625 31.1136C420.469 69.105 365.625 99 365.625 99H0V0.59583Z" fill="#5C6369"/></svg></span>
            <div class="service-card__title">أعمال العوازل</div>
          </div>
        </div>
      </div>

      <!-- Card 3: ترميم وصيانة المنازل -->
      <div class="service-card">
        <div class="service-card__clip">
          <img
            class="service-card__img"
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/service-renovation.jpg' ); ?>"
            alt="ترميم وصيانة المنازل"
            loading="lazy"
          >
          <div class="service-card__overlay"></div>
          <div class="service-card__bottom">
            <span class="service-card__wave"><svg width="354" height="99" viewBox="0 0 354 99" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0 0.59583C0 0.59583 310.781 -6.8779 365.625 31.1136C420.469 69.105 365.625 99 365.625 99H0V0.59583Z" fill="#5C6369"/></svg></span>
            <div class="service-card__title">ترميم وصيانة المنازل</div>
          </div>
        </div>
      </div>

    </div>
  </section><!-- /services -->

  <script>
  (function () {
    var cards = document.querySelectorAll('.service-card');
    if (!cards.length) return;

    /* entrance observer */
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        e.target.classList.add('in-view');
        io.unobserve(e.target);
      });
    }, { threshold: 0.1 });
    cards.forEach(function (c) { io.observe(c); });

    /* 3-D tilt + glow on mouse move */
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    cards.forEach(function (card) {
      card.addEventListener('mousemove', function (e) {
        if (reduced) return;
        var r  = card.getBoundingClientRect();
        var rx = ((e.clientY - r.top  - r.height / 2) / r.height) * -12;
        var ry = ((e.clientX - r.left - r.width  / 2) / r.width)  *  12;
        card.style.transform = 'perspective(800px) rotateX(' + rx + 'deg) rotateY(' + ry + 'deg) scale(1.03) translateY(-4px)';
        card.style.transition = 'transform 0.08s linear, box-shadow 0.3s ease';
      });
      card.addEventListener('mouseleave', function () {
        card.style.transform = '';
        card.style.transition = 'transform 0.55s cubic-bezier(0.22,1,0.36,1), box-shadow 0.3s ease';
      });
    });
  })();
  </script>



  <!-- ============================================================
       Results & Trust Section
  ============================================================ -->
  <style>

    #about {
      animation: hero-fade-in 1s .5s both;
    }

    /* ── Results & Trust ── */
    #results {
      padding: 72px 24px;
      direction: rtl;
    }
    .results-inner {
      max-width: 1300px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 35px;
      align-items: center;
    }

    /* ── Text column (right in RTL = first in DOM) ── */
    .results-text {
      text-align: right;
    }
    .results-heading {
        font-size: clamp(1.6rem, 3vw, 1.95rem);
    font-weight: 800;
    color: #1E2D3D;
    letter-spacing: -.02em;
      margin-bottom: 44px;
      opacity: 0;
      transform: translateY(18px);
      transition: opacity .65s cubic-bezier(.22,.61,.36,1),
                  transform .65s cubic-bezier(.22,.61,.36,1);
    }
    .results-desc {
       font-size: .95rem;
    font-weight: 600;
    color: #6b7a8d;
    line-height: 1.6;
      margin-bottom: 40px;
      opacity: 0;
      transform: translateY(16px);
      transition: opacity .6s .1s cubic-bezier(.22,.61,.36,1),
                  transform .6s .1s cubic-bezier(.22,.61,.36,1);
    }

    /* ── Stats row ── */
    .results-stats {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 0;
      margin-bottom: 44px;
      padding-bottom: 40px;
      opacity: 0;
      transform: translateY(16px);
      transition: opacity .6s .2s cubic-bezier(.22,.61,.36,1),
                  transform .6s .2s cubic-bezier(.22,.61,.36,1);
    }
    .results-stat {
      text-align: center;
      padding: 0 12px;
      position: relative;
    }
   
    .results-stat__num {
      display: block;
      font-size: clamp(1.6rem, 2.8vw, 2.2rem);
      font-weight: 800;
      color: #2E3235;
      line-height: 1.1;
      margin-bottom: 8px;
      letter-spacing: -.02em;
      font-variant-numeric: tabular-nums;
    }
    .results-stat__label {
     font-size: .78rem;
    color: #667481;
    line-height: 1.5;
    font-weight: 700;
    line-height: 18px;
    }

    /* ── Stat card micro-interactions ── */
    @keyframes res-num-glow {
      0%   { text-shadow: 0 0 0 rgba(6,81,162,0); }
      40%  { text-shadow: 0 0 18px rgba(6,81,162,0.55), 0 0 6px rgba(6,81,162,0.3); }
      100% { text-shadow: 0 0 0 rgba(6,81,162,0); }
    }
    .results-stat__num.counted {
      animation: res-num-glow 1.2s cubic-bezier(0.22,1,0.36,1) forwards;
    }
    .results-stat {
      position: relative;
      border-radius: 16px;
      padding: 16px 12px;
      transition: background 0.25s ease, transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease;
      cursor: default;
    }
    .results-stat:hover {
      transform: translateY(-3px);
    }
    
  
    

    /* ── Buttons ── */
    .results-btns {
         display: flex;
    gap: 16px;
    flex-wrap: nowrap;
    justify-content: flex-start;
    max-width: 85%;
    opacity: 0;
    transform: translateY(14px);
    transition: opacity .6s .3s cubic-bezier(.22, .61, .36, 1), transform .6s .3s cubic-bezier(.22, .61, .36, 1);
    }
    .results-btn-primary {
       position: relative;
      overflow: hidden;
      background: #0651A2;
      color: #fff;
      font-weight: 700;
      font-size: 0.875rem;
               height: 42px;
      border-radius: 9999px;
      border: none;
      display: inline-block;
      transition: transform 0.2s cubic-bezier(0.34,1.56,0.64,1),
                  box-shadow 0.2s ease;
      box-shadow: 0 8px 24px rgba(6,81,162,0.35);
      isolation: isolate;
      width: 100%;text-align: center;    display: flex;
    justify-content: center;
    align-items: center;
    }
    /* glass sheen overlay */
    .results-btn-primary::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: linear-gradient(135deg, rgba(255,255,255,0.18) 0%, transparent 55%);
      opacity: 0;
      transition: opacity 0.3s ease;
      pointer-events: none;
    }
    /* ink ripple spawned by JS */
    .results-btn-primary .res-ripple {
      position: absolute;
      border-radius: 50%;
      background: rgba(255,255,255,0.28);
      transform: scale(0);
      animation: res-ripple-out 0.6s cubic-bezier(0.22,1,0.36,1) forwards;
      pointer-events: none;
    }
    @keyframes res-ripple-out {
      to { transform: scale(4); opacity: 0; }
    }
    .results-btn-primary:hover {
      transform: translateY(-3px) scale(1.03);
      box-shadow: 0 14px 36px rgba(6,81,162,0.45);
    }
    .results-btn-primary:hover::before { opacity: 1; }
    .results-btn-primary:active { transform: translateY(0) scale(0.97); }
    .results-btn-outline {
    position: relative;
      overflow: hidden;
      background: transparent;
      color: #fff;
      font-weight: 700;
      font-size: 0.875rem;
      height: 42px;
      border-radius: 9999px;
      border: 2px solid #0651A2;
      color: #0651A2;
      display: inline-block;
      transition: transform 0.25s cubic-bezier(0.34,1.56,0.64,1),
                  border-color 0.3s ease,
                  color 0.3s ease,
                  box-shadow 0.3s ease;
      isolation: isolate;
      width: 100%;text-align: center;    display: flex;
    justify-content: center;
    align-items: center;
    }
    /* spotlight radial follows mouse */
    .results-btn-outline::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: radial-gradient(circle at var(--ox,50%) var(--oy,50%),
                    rgba(6,81,162,0.12) 0%, transparent 65%);
      opacity: 0;
      transition: opacity 0.3s ease;
      pointer-events: none;
    }
    /* fill wipe on hover */
    .results-btn-outline::after {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      background: #0651A2;
      transform: scaleX(0);
      transform-origin: right center;
      transition: transform 0.35s cubic-bezier(0.22,1,0.36,1);
      z-index: -1;
    }
    .results-btn-outline:hover {
      border-color: #0651A2;
      color: #fff;
      transform: translateY(-3px);
      box-shadow: 0 10px 28px rgba(6,81,162,0.25);
    }
    .results-btn-outline:hover::before { opacity: 1; }
    .results-btn-outline:hover::after  { transform: scaleX(1); }
    .results-btn-outline:active { transform: translateY(0) scale(0.97); }

    /* ── Image column (left in RTL = second in DOM) ── */
    .results-img-wrap {
      position: relative;
      min-height: 576px;
      max-width: 550px;
      border-radius: 24px;
      overflow: hidden;
      line-height: 0;
      box-shadow: 0 8px 48px rgba(30,45,61,.12), 0 2px 12px rgba(30,45,61,.07);
      opacity: 0;
      transform: translateX(-28px);
      transition: opacity .7s .1s cubic-bezier(.22,.61,.36,1),
                  transform .7s .1s cubic-bezier(.22,.61,.36,1);
    }

    .result-img-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(115.89deg, rgba(193, 222, 232, 0.7) 9.86%, rgba(255, 255, 255, 0) 52.13%, rgba(251, 217, 185, 0.7) 97.99%);
    }
    .results-img-wrap img {
      width: 100%;
      min-height: 576px;
      object-fit: cover;
      object-position: center top;
      display: block;
      transition: transform .55s cubic-bezier(.25,.46,.45,.94);
    }
    
    /* in-view triggers */
    #results.in-view .results-heading,
    #results.in-view .results-desc,
    #results.in-view .results-stats,
    #results.in-view .results-btns,
    #results.in-view .results-img-wrap {
      opacity: 1;
      transform: none;
    }

    @media (max-width: 900px) {
      .results-inner {
        grid-template-columns: 1fr;
        gap: 40px;
      }
      .results-img-wrap {
        order: -1; /* image on top on mobile */
        transform: translateY(-20px);
      }
      .results-btns { justify-content: center; }
      .results-text { text-align: center; }
      .results-stat { text-align: center; }

      .results-img-wrap img , .results-img-wrap  {
      min-height: 426px;
      }
    }
    @media (max-width: 480px) {

    #results {
          padding: 74px 13px;
    }
      .results-stats { grid-template-columns: 1fr 1fr 1fr; gap: 0; margin-bottom: 20px; }
      .results-stat::after { display: none; }
        .results-img-wrap img , .results-img-wrap  {
      min-height: 356px;
      }

      .results-btns {
        max-width: 100%;
      }
    }
  </style>

  <section id="results">
    <div class="results-inner">
 <!-- Image column -->
      <div class="results-img-wrap">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/results-section.png' ); ?>"
          alt="فريق أمان الميه"
          loading="lazy"
          width="640"
          height="520"
        >

        <div class="result-img-overlay"></div>
      </div>


      <!-- Text column -->
      <div class="results-text">
        <h2 class="results-heading">نتائج ملموسة... وثقة مستمرة</h2>
        <p class="results-desc">إنجازاتنا ليست وعودًا، بل نتائج موثقة تعكس خبرتنا، دقة تنفيذنا، وثقة عملائنا المستمرة في جودة خدماتنا.
لو تحبي صياغة أقصر أو أقوى تأثيرًا قوليلي أظبطها حسب ستايل الموقع.</p>

        <div class="results-stats">
          <div class="results-stat">
            <span class="results-stat__num" data-count="24" data-suffix=" ساعة">24 ساعة</span>
            <span class="results-stat__label">سرعة استجابة للبلاغات العاجلة</span>
          </div>
          <div class="results-stat">
            <span class="results-stat__num" data-count="980" data-suffix="+">+980</span>
            <span class="results-stat__label">عميل وثق بخدماتنا</span>
          </div>
          <div class="results-stat">
            <span class="results-stat__num" data-count="1250" data-suffix="+">+1250</span>
            <span class="results-stat__label">مشروع تم تنفيذه بنجاح</span>
          </div>
        </div>

        <div class="results-btns">
          <a href="#services" class="results-btn-primary">اطلب خدماتنا</a>
          <a href="https://wa.me/966500000000" target="_blank" rel="noopener noreferrer" class="results-btn-outline">تواصل معنا</a>
        </div>
      </div>

      

    </div>
  </section><!-- /results -->

  <script>
  (function () {
    var sec = document.getElementById('results');
    if (!sec) return;

    /* ── Section entrance ── */
    var io = new IntersectionObserver(function (entries) {
      if (!entries[0].isIntersecting) return;
      sec.classList.add('in-view');
      io.unobserve(sec);
    }, { threshold: 0.12 });
    io.observe(sec);

    /* ── Stat number glow once counted ── */
    var nums = sec.querySelectorAll('.results-stat__num[data-count]');
    var numIO = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        var el = e.target;
        numIO.unobserve(el);
        var target   = +el.dataset.count;
        var suffix   = el.dataset.suffix || '';
        var duration = 1400;
        var start    = performance.now();
        function tick(now) {
          var p = Math.min((now - start) / duration, 1);
          var ease = 1 - Math.pow(1 - p, 3);
          el.textContent = Math.round(ease * target) + suffix;
          if (p < 1) { requestAnimationFrame(tick); }
          else { el.classList.add('counted'); }
        }
        requestAnimationFrame(tick);
      });
    }, { threshold: 0.4 });
    nums.forEach(function (n) { numIO.observe(n); });

    /* ── Primary button — ink ripple ── */
    var btnPrimary = sec.querySelector('.results-btn-primary');
    if (btnPrimary) {
      btnPrimary.addEventListener('pointerdown', function (e) {
        var r    = btnPrimary.getBoundingClientRect();
        var size = Math.max(r.width, r.height) * 1.6;
        var rip  = document.createElement('span');
        rip.className = 'res-ripple';
        rip.style.cssText = 'width:' + size + 'px;height:' + size + 'px;'
          + 'top:'  + (e.clientY - r.top  - size / 2) + 'px;'
          + 'left:' + (e.clientX - r.left - size / 2) + 'px;';
        btnPrimary.appendChild(rip);
        setTimeout(function () { rip.remove(); }, 650);
      });
    }

    /* ── Outline button — spotlight + magnetic ── */
    var btnOutline = sec.querySelector('.results-btn-outline');
    if (btnOutline) {
      btnOutline.addEventListener('mousemove', function (e) {
        var r  = btnOutline.getBoundingClientRect();
        btnOutline.style.setProperty('--ox', ((e.clientX - r.left) / r.width  * 100).toFixed(1) + '%');
        btnOutline.style.setProperty('--oy', ((e.clientY - r.top)  / r.height * 100).toFixed(1) + '%');
        var mx = ((e.clientX - r.left - r.width  / 2) / r.width)  * 5;
        var my = ((e.clientY - r.top  - r.height / 2) / r.height) * 5;
        btnOutline.style.transform = 'translate(' + mx + 'px,' + (my - 2) + 'px)';
      });
      btnOutline.addEventListener('mouseleave', function () {
        btnOutline.style.transform = '';
        btnOutline.style.setProperty('--ox', '50%');
        btnOutline.style.setProperty('--oy', '50%');
      });
    }

  })();
  </script>




  <!-- ============================================================
       FAQ Section
  ============================================================ -->
  <style>

    /* ── FAQ Section ── */
    #faq {
      padding: 96px 24px 112px;
      direction: rtl;
      background: #fff;
    }

    .faq-inner {
      max-width: 1100px;
      margin: 0 auto;
    }

    /* ── Heading ── */
    .faq-heading {
    font-size: clamp(1.6rem, 3vw, 1.95rem);
    font-weight: 800;
    color: #1E2D3D;
    letter-spacing: -.02em;
      margin-bottom: 44px;
      opacity: 0;
      transform: translateY(18px);
      transition: opacity .65s cubic-bezier(.22,.61,.36,1),
                  transform .65s cubic-bezier(.22,.61,.36,1);
    }
    #faq.faq-visible .faq-heading {
      opacity: 1;
      transform: none;
    }

    /* ── Item list ── */
    .faq-list {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    /* ── Single item ── */
    .faq-item:not(:first-child) {
      border-top: 1px solid #e4e8ee;
      opacity: 0;
      transform: translateY(14px);
      transition: opacity .55s cubic-bezier(.22,.61,.36,1),
                  transform .55s cubic-bezier(.22,.61,.36,1);
    }
    .faq-item:last-child {
      border-bottom: 1px solid #e4e8ee;
    }
    #faq.faq-visible .faq-item {
      opacity: 1;
      transform: none;
    }
    /* stagger each item */
    #faq.faq-visible .faq-item:nth-child(1) { transition-delay: .08s; }
    #faq.faq-visible .faq-item:nth-child(2) { transition-delay: .16s; }
    #faq.faq-visible .faq-item:nth-child(3) { transition-delay: .24s; }
    #faq.faq-visible .faq-item:nth-child(4) { transition-delay: .32s; }
    #faq.faq-visible .faq-item:nth-child(5) { transition-delay: .40s; }
    #faq.faq-visible .faq-item:nth-child(6) { transition-delay: .48s; }

    /* ── Question button ── */
    .faq-btn {
      display: flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      background: none;
      border: none;
      cursor: pointer;
      padding: 30px 0;
      gap: 24px;
      text-align: right;
      direction: rtl;
    }

    .faq-question {
      font-family: 'Tajawal', sans-serif;
      font-size: clamp(1rem, 2vw, 1.1rem);
      font-weight: 700;
      color: #1E2D3D;
      line-height: 1.5;
      flex: 1;
      text-align: right;
    }

    /* ── Chevron icon wrapper ── */
    .faq-icon {
      flex-shrink: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 36px;
      height: 36px;
      transition: transform .42s cubic-bezier(.22,.61,.36,1);
    }
    .faq-icon svg {
      display: block;
    }

    /* ── Active state: chevron rotates ── */
    .faq-item.is-open .faq-icon {
      transform: rotate(180deg);
    }

    /* ── Answer panel — height-animates via max-height trick ── */
    .faq-answer {
      overflow: hidden;
      max-height: 0;
      transition: max-height .48s cubic-bezier(.22,.61,.36,1),
                  opacity .38s ease;
      opacity: 0;
    }
    .faq-item.is-open .faq-answer {
      max-height: 600px;
      opacity: 1;
    }

    .faq-answer-inner {
      padding: 0 0 30px 0;
      text-align: right;
    }

    .faq-answer-text {
      font-family: 'Tajawal', sans-serif;
      font-size: clamp(.9rem, 1.8vw, .975rem);
      font-weight: 400;
      color: #5C6369;
      line-height: 1.85;
      margin: 0;
    }

    /* ── Hover: question brightens slightly ── */
    .faq-btn:hover .faq-question {
      color: #0651A2;
      transition: color .2s ease;
    }
    .faq-btn:focus-visible {
      outline: 2px solid #0651A2;
      outline-offset: 4px;
      border-radius: 4px;
    }

    /* ── Mobile tweaks ── */
    @media (max-width: 640px) {
      #faq {
        padding: 72px 20px 88px;
      }
      .faq-heading {
        margin-bottom: 48px;
      }
      .faq-btn {
        padding: 24px 0;
      }
      .faq-icon {
        width: 30px;
        height: 30px;
      }
    }

  </style>

  <section id="faq">
    <div class="faq-inner">

      <h2 class="faq-heading">الأسئلة الشائعة</h2>

      <ul class="faq-list">

        <!-- Q1 -->
        <li class="faq-item">
          <button class="faq-btn" aria-expanded="false">
            <span class="faq-question">كيف يتم كشف تسريب المياه دون تكسير؟</span>
            <span class="faq-icon" aria-hidden="true">
              <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7838 0.894287L12.0087 8.66943C11.0905 9.58766 9.5879 9.58766 8.66967 8.66943L0.894531 0.894287" stroke="#5C6369" stroke-width="1.78876" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </button>
          <div class="faq-answer" role="region">
            <div class="faq-answer-inner">
              <p class="faq-answer-text">نستخدم أجهزة كشف متخصصة تعتمد على تقنيات صوتية وحرارية لتحديد مصدر التسريب بدقة، مما يقلل الحاجة لأي تكسير عشوائي.</p>
            </div>
          </div>
        </li>

        <!-- Q2 -->
        <li class="faq-item">
          <button class="faq-btn" aria-expanded="false">
            <span class="faq-question">هل تقدمون ضمانًا على أعمال العزل؟</span>
            <span class="faq-icon" aria-hidden="true">
              <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7838 0.894287L12.0087 8.66943C11.0905 9.58766 9.5879 9.58766 8.66967 8.66943L0.894531 0.894287" stroke="#5C6369" stroke-width="1.78876" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </button>
          <div class="faq-answer" role="region">
            <div class="faq-answer-inner">
              <p class="faq-answer-text">نعم، يتم تقديم ضمان مكتوب على الأعمال المنفذة وفق نوع الخدمة ومواد العزل المستخدمة.</p>
            </div>
          </div>
        </li>

        <!-- Q3 -->
        <li class="faq-item">
          <button class="faq-btn" aria-expanded="false">
            <span class="faq-question">ما هي طرق الدفع المتاحة؟</span>
            <span class="faq-icon" aria-hidden="true">
              <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7838 0.894287L12.0087 8.66943C11.0905 9.58766 9.5879 9.58766 8.66967 8.66943L0.894531 0.894287" stroke="#5C6369" stroke-width="1.78876" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </button>
          <div class="faq-answer" role="region">
            <div class="faq-answer-inner">
              <p class="faq-answer-text">نقبل الدفع نقدًا، عبر التحويل البنكي، وبطاقات الدفع الإلكتروني. يمكن أيضًا الاتفاق على جدول دفع مرحلي للمشاريع الكبيرة.</p>
            </div>
          </div>
        </li>

        <!-- Q4 -->
        <li class="faq-item">
          <button class="faq-btn" aria-expanded="false">
            <span class="faq-question">كم تستغرق مدة تنفيذ أعمال العزل الحراري للمنزل؟</span>
            <span class="faq-icon" aria-hidden="true">
              <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7838 0.894287L12.0087 8.66943C11.0905 9.58766 9.5879 9.58766 8.66967 8.66943L0.894531 0.894287" stroke="#5C6369" stroke-width="1.78876" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </button>
          <div class="faq-answer" role="region">
            <div class="faq-answer-inner">
              <p class="faq-answer-text">تعتمد المدة على حجم المشروع ونوع العزل المطلوب. في الغالب تتراوح بين يوم واحد لغرفة واحدة وأسبوع كامل للمنازل الكبيرة، وسيتم تحديد الجدول الزمني بدقة بعد المعاينة.</p>
            </div>
          </div>
        </li>

        <!-- Q5 -->
        <li class="faq-item">
          <button class="faq-btn" aria-expanded="false">
            <span class="faq-question">هل تشمل الخدمة منطقتي؟</span>
            <span class="faq-icon" aria-hidden="true">
              <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7838 0.894287L12.0087 8.66943C11.0905 9.58766 9.5879 9.58766 8.66967 8.66943L0.894531 0.894287" stroke="#5C6369" stroke-width="1.78876" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </button>
          <div class="faq-answer" role="region">
            <div class="faq-answer-inner">
              <p class="faq-answer-text">نغطي معظم مناطق المملكة العربية السعودية. تواصل معنا عبر واتساب وسنؤكد لك التغطية في منطقتك فورًا.</p>
            </div>
          </div>
        </li>

        <!-- Q6 -->
        <li class="faq-item">
          <button class="faq-btn" aria-expanded="false">
            <span class="faq-question">هل يمكن الحصول على معاينة مجانية قبل التعاقد؟</span>
            <span class="faq-icon" aria-hidden="true">
              <svg width="21" height="11" viewBox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.7838 0.894287L12.0087 8.66943C11.0905 9.58766 9.5879 9.58766 8.66967 8.66943L0.894531 0.894287" stroke="#5C6369" stroke-width="1.78876" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </button>
          <div class="faq-answer" role="region">
            <div class="faq-answer-inner">
              <p class="faq-answer-text">نعم، نوفر معاينة ميدانية مجانية لتقييم المشكلة وتقديم عرض سعر شفاف وبدون أي التزامات مسبقة.</p>
            </div>
          </div>
        </li>

      </ul>
    </div>
  </section><!-- /faq -->

  <script>
  (function () {

    var sec = document.getElementById('faq');
    if (!sec) return;

    /* ── Section entrance ── */
    var secIO = new IntersectionObserver(function (entries) {
      if (!entries[0].isIntersecting) return;
      sec.classList.add('faq-visible');
      secIO.unobserve(sec);
    }, { threshold: 0.08 });
    secIO.observe(sec);

    /* ── Accordion logic ── */
    var items = sec.querySelectorAll('.faq-item');

    items.forEach(function (item) {
      var btn    = item.querySelector('.faq-btn');
      var answer = item.querySelector('.faq-answer');
      if (!btn || !answer) return;

      btn.addEventListener('click', function () {
        var isOpen = item.classList.contains('is-open');

        /* Close all siblings */
        items.forEach(function (other) {
          if (other === item) return;
          other.classList.remove('is-open');
          other.querySelector('.faq-btn').setAttribute('aria-expanded', 'false');
        });

        /* Toggle current */
        if (isOpen) {
          item.classList.remove('is-open');
          btn.setAttribute('aria-expanded', 'false');
        } else {
          item.classList.add('is-open');
          btn.setAttribute('aria-expanded', 'true');
        }
      });
    });

  })();
  </script>


</main>

<?php get_footer(); ?>
