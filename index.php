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
  <section id="about"
    class="bg-cover bg-no-repeat bg-top mt-20 mb-32"
    style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-bg.png');">
    <div class="max-w-7xl mx-auto px-6 py-16 lg:py-24">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

        <!-- Column 1: Text (visually right in RTL) -->
        <div class="text-right">
          <h2 class="text-4xl lg:text-5xl font-black text-white mb-8">من نحن</h2>
          <div class="space-y-4 text-gray-200 text-base leading-loose">
            <p>أمان المياه شركة متخصصة في الحلول الهندسية لكشف تسريبات المياه وأعمال العزل والترميم، نعمل بمنهج يعتمد على التشخيص الدقيق قبل التنفيذ، والمعالجة الجذرية بدل الحلول المؤقتة.</p>
            <p>نستخدم تقنيات كشف متقدمة تُمكِّننا من تحديد مواقع الخلل بدقة دون تكسير عشوائي، مع تطبيق أنظمة عزل معتمدة تحمي المباني من التسريبات والرطوبة على المدى الطويل.</p>
            <p>نؤمن أن جودة التنفيذ تبدأ من التخطيط، لذلك نلتزم بمعايير هندسية واضحة في كل مرحلة — من الفحص والمعاينة، إلى التنفيذ، ثم الاختبار والتسليم — لضمان نتائج موثوقة يمكن الاعتماد عليها.</p>
            <p>هدفنا هو تأمين المباني، حماية الأصول، وبناء ثقة طويلة الأمد مع عملائنا من خلال حلول عملية، تنفيذ منضبط، والتزام كامل بالجودة.</p>
          </div>
          <div class="flex flex-wrap gap-4 mt-8 justify-start">
            <a href="#services" class="bg-primary text-white font-bold text-sm px-8 py-3.5 rounded-full shadow-lg shadow-primary/30 hover:bg-primary/90 transition-colors">اطلب خدماتنا</a>
            <a href="https://wa.me/966500000000" class="border-2 border-white text-white font-bold text-sm px-8 py-3 rounded-full hover:bg-white hover:text-dark transition-colors">تواصل معنا</a>
          </div>
        </div><!-- /text column -->

        <!-- Column 2: Image (visually left in RTL) -->
        <div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-worker.jpg"
               alt="عامل يطبق عزل على سطح مبنى"
               class="rounded-2xl shadow-2xl object-cover w-full h-auto"
               loading="lazy" width="460" height="550">
        </div><!-- /image column -->

      </div><!-- /grid -->
    </div><!-- /container -->
  </section><!-- /about -->

</main>

<?php get_footer(); ?>
