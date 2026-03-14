<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" lang="ar">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Tajawal Font (Google Fonts) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

<!-- Tailwind CSS Play CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  corePlugins: {
    preflight: true,
  },
  theme: {
    extend: {
      colors: {
        primary:  '#0651A2',
        dark:     '#1E2D3D',
        charcoal: '#2C3E50',
      },
      fontFamily: {
        tajawal: ['Tajawal', 'sans-serif'],
      },
    },
  },
};
</script>

<?php wp_head(); ?>

<style>
/* ══════════════════════════════════════════
   WhatsApp CTA — premium pill button
   Matches reference: light blue bg, dark text,
   outline WA icon, generous pill radius
══════════════════════════════════════════ */
.wa-cta {
  position: relative;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 8px 16px 4px 12px;
  border-radius: 999px;
  border: 1.5px solid rgba(44, 62, 80, 0.13);
  background: #eaf1fbd3;
  color: #1E2D3D;
  font-size: 14px;
  font-weight: 700;
  font-family: 'Tajawal', sans-serif;
  text-decoration: none;
  white-space: nowrap;
  overflow: hidden;
  isolation: isolate;
  cursor: pointer;
  /* subtle inner top highlight */
  box-shadow:
    inset 0 1px 0 rgba(255,255,255,.7),
    0 1px 4px rgba(6,81,162,.06);
  transition:
    transform     .26s cubic-bezier(.34,1.56,.64,1),
    box-shadow    .22s ease,
    border-color  .22s ease,
    background    .22s ease,
    color         .22s ease;
  -webkit-tap-highlight-color: transparent;
}

/* Liquid fill layer — slides in from right (RTL natural) */
.wa-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background: #1E2D3D;
  border-radius: inherit;
  transform: translateX(105%);
  transition: transform .38s cubic-bezier(.65,0,.35,1);
  z-index: 0;
}

/* Hover state */
.wa-cta:hover {
  color: #fff;
  border-color: #1E2D3D;
  background: #eaf1fb;
  transform: translateY(-2px) scale(1.018);
  box-shadow:
    0 8px 24px rgba(30,45,61,.18),
    0 2px 6px rgba(30,45,61,.10),
    inset 0 1px 0 rgba(255,255,255,.12);
}
.wa-cta:hover::before {
  transform: translateX(0);
}

/* Active press */
.wa-cta:active {
  transform: translateY(0) scale(.97);
  box-shadow: 0 2px 8px rgba(30,45,61,.12);
  transition-duration: .09s;
}

/* Text and icon stay above fill layer */
.wa-cta__text,
.wa-cta__icon {
  position: relative;
  z-index: 1;
  transition: color .22s ease;
}

/* Icon container */
.wa-cta__icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 32px;
  height: 32px;
  border-radius: 50%;
  flex-shrink: 0;
  transition:
    background    .22s ease,
    transform     .3s cubic-bezier(.34,1.56,.64,1);
}
.wa-cta:hover .wa-cta__icon {
  background: rgba(255,255,255,.85);
  transform: rotate(10deg) scale(1.1);
}



/* ── Hamburger (premium version) ── */
.ham-btn {
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-end;
  width: 40px;
  height: 40px;
  border-radius: 11px;
  border: 1.5px solid rgba(44,62,80,.1);
  background: rgba(234,241,251,.6);
  gap: 5px;
  padding: 0 10px;
  cursor: pointer;
  transition: background .2s ease, border-color .2s ease, box-shadow .2s ease;
  -webkit-tap-highlight-color: transparent;
}
.ham-btn:hover {
  background: #eaf1fb;
  border-color: rgba(6,81,162,.2);
  box-shadow: 0 3px 12px rgba(6,81,162,.1);
}
.ham-bar {
  display: block;
  height: 1.8px;
  border-radius: 99px;
  background: #1E2D3D;
  transition:
    transform .32s cubic-bezier(.77,0,.175,1),
    opacity   .22s ease,
    width     .28s cubic-bezier(.77,0,.175,1);
}
#ham-1 { width: 20px; }
#ham-2 { width: 14px; }
#ham-3 { width: 20px; }

.ham-btn.is-open { background: #dde8f7; border-color: rgba(6,81,162,.3); }
.ham-btn.is-open #ham-1 { transform: translateY(6.8px) rotate(45deg); width: 20px; }
.ham-btn.is-open #ham-2 { opacity: 0; width: 0; }
.ham-btn.is-open #ham-3 { transform: translateY(-6.8px) rotate(-45deg); width: 20px; }
</style>
</head>

<body <?php body_class( 'font-tajawal bg-white antialiased' ); ?>>
<?php wp_body_open(); ?>

<!-- ============================================================
     Sticky Navbar
     ============================================================ -->
<header class="fixed top-0 inset-x-0 z-50 bg-white border-b border-gray-100 shadow-sm" style="height:var(--header-height)">
  <nav class="max-w-[1400px] mx-auto h-full px-6 flex items-center justify-between">

    <!-- RIGHT (RTL): Logo + Nav links together -->
    <div class="flex items-center gap-8">

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 shrink-0">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>"
          alt="<?php bloginfo( 'name' ); ?>"
          class="h-12 w-auto object-contain"
          width="48" height="48"
          loading="eager"
        >
      </a>

      <!-- Desktop nav links — flush next to logo -->
      <ul class="hidden md:flex items-center gap-7 mt-3 text-sm font-semibold text-charcoal">
        <li>
          <a href="#about" class="hover:text-primary transition-colors duration-200">عننا</a>
        </li>
        <li class="relative group">
          <button class="flex items-center gap-1 hover:text-primary transition-colors duration-200">
            خدماتنا
            <svg class="w-3.5 h-3.5 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
          <ul class="absolute top-full right-0 mt-2 w-52 bg-white border border-gray-100 rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2 z-50">
            <li><a href="#waterproofing" class="block px-4 py-2 text-sm hover:bg-blue-50 hover:text-primary transition-colors">كشف تسريبات المياه</a></li>
            <li><a href="#insulation"    class="block px-4 py-2 text-sm hover:bg-blue-50 hover:text-primary transition-colors">العزل الحراري</a></li>
            <li><a href="#roofing"       class="block px-4 py-2 text-sm hover:bg-blue-50 hover:text-primary transition-colors">أعمال الأسطح</a></li>
            <li><a href="#maintenance"   class="block px-4 py-2 text-sm hover:bg-blue-50 hover:text-primary transition-colors">الصيانة الدورية</a></li>
          </ul>
        </li>
        <li>
          <a href="#blog" class="hover:text-primary transition-colors duration-200">المقالات</a>
        </li>
        <li>
          <a href="#projects" class="hover:text-primary transition-colors duration-200">مشاريعنا</a>
        </li>
      </ul>

    </div>

    <!-- LEFT (RTL): CTA + Hamburger -->
    <div class="flex items-center gap-3">

      <!-- WhatsApp CTA Button — premium pill -->
      <a href="https://wa.me/966500000000"
         target="_blank"
         rel="noopener noreferrer"
         class="wa-cta hidden sm:inline-flex">
        <span class="wa-cta__text">التواصل معنا</span>
        <span class="wa-cta__icon" aria-hidden="true">

          <!-- WhatsApp outline icon -->
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.49986 17.0627C1.34986 17.0627 1.20734 17.0027 1.10234 16.8977C0.959838 16.7552 0.899874 16.5452 0.952374 16.3502L1.89738 12.8177C1.26738 11.6477 0.93736 10.3277 0.93736 8.99268C0.93736 4.54518 4.55236 0.930176 8.99986 0.930176C13.4474 0.930176 17.0624 4.54518 17.0624 8.99268C17.0624 13.4402 13.4474 17.0552 8.99986 17.0552C7.64236 17.0552 6.31488 16.7177 5.12988 16.0727L1.64987 17.0402C1.59737 17.0552 1.55236 17.0627 1.49986 17.0627ZM5.20486 14.9102C5.30236 14.9102 5.39987 14.9402 5.48987 14.9852C6.54737 15.6077 7.76236 15.9377 8.99986 15.9377C12.8249 15.9377 15.9374 12.8252 15.9374 9.00018C15.9374 5.17518 12.8249 2.06268 8.99986 2.06268C5.17486 2.06268 2.06236 5.17518 2.06236 9.00018C2.06236 10.2227 2.38485 11.4152 2.99235 12.4652C3.06735 12.5927 3.08986 12.7502 3.05237 12.8927L2.30237 15.6977L5.06236 14.9327C5.10736 14.9177 5.15986 14.9102 5.20486 14.9102Z" fill="#2E3235"/>
<path d="M11.0552 13.3202C10.5902 13.3202 10.1102 13.2152 9.60768 12.9977C9.13518 12.7952 8.66268 12.5252 8.20518 12.1877C7.75518 11.8577 7.3127 11.4827 6.9077 11.0777C6.5027 10.6652 6.12767 10.2302 5.79767 9.78022C5.46017 9.30772 5.19016 8.84271 4.99516 8.38521C4.78516 7.89021 4.68018 7.40271 4.68018 6.93771C4.68018 6.60771 4.74016 6.29271 4.85266 6.00021C4.97266 5.69271 5.16767 5.41521 5.42267 5.17521C5.90267 4.70271 6.5927 4.53023 7.1402 4.79273C7.3277 4.87523 7.48519 5.01022 7.60519 5.19022L8.47517 6.41271C8.56517 6.53271 8.6327 6.66021 8.6852 6.78771C8.7452 6.93771 8.7827 7.08773 8.7827 7.23023C8.7827 7.42523 8.73018 7.62023 8.62518 7.79273C8.55768 7.90523 8.46017 8.04023 8.33267 8.16773L8.23517 8.27271C8.28017 8.33271 8.33266 8.4077 8.41516 8.4977C8.57266 8.6777 8.74516 8.8727 8.93266 9.0602C9.12016 9.2402 9.30766 9.42021 9.49516 9.57771C9.58516 9.65271 9.6602 9.71271 9.7202 9.75021L9.82516 9.6452C9.96017 9.5102 10.0952 9.40522 10.2302 9.33772C10.4777 9.18022 10.8602 9.14272 11.1977 9.28522C11.3177 9.33022 11.4377 9.39771 11.5652 9.48771L12.8177 10.3727C12.9902 10.4927 13.1252 10.6577 13.2152 10.8452C13.2902 11.0327 13.3202 11.1977 13.3202 11.3702C13.3202 11.5952 13.2677 11.8127 13.1702 12.0227C13.0727 12.2177 12.9602 12.3902 12.8252 12.5477C12.5852 12.8102 12.3077 13.0052 12.0077 13.1327C11.7077 13.2602 11.3852 13.3202 11.0552 13.3202ZM6.59267 5.80521C6.54767 5.80521 6.39771 5.80521 6.21021 5.99271C6.06771 6.12771 5.97018 6.27022 5.90268 6.42772C5.83518 6.58522 5.80518 6.76522 5.80518 6.94522C5.80518 7.26022 5.88017 7.5977 6.03017 7.9577C6.18767 8.3327 6.42018 8.73022 6.70518 9.12772C6.99768 9.52522 7.32769 9.92272 7.69519 10.2902C8.06269 10.6502 8.45268 10.9877 8.85768 11.2877C9.24768 11.5727 9.64519 11.7977 10.0427 11.9702C10.6127 12.2177 11.1377 12.2777 11.5652 12.0977C11.7152 12.0377 11.8502 11.9327 11.9852 11.7977C12.0527 11.7227 12.1052 11.6477 12.1502 11.5502C12.1727 11.4977 12.1877 11.4377 12.1877 11.3852C12.1877 11.3702 12.1877 11.3477 12.1652 11.3027L10.9127 10.4327C10.8602 10.3952 10.8077 10.3652 10.7627 10.3502C10.7327 10.3652 10.6877 10.3877 10.6052 10.4702L10.3202 10.7552C10.1027 10.9727 9.75769 11.0327 9.48019 10.9352L9.3452 10.8752C9.1727 10.7852 8.97768 10.6502 8.76018 10.4627C8.55018 10.2827 8.3477 10.0952 8.1302 9.88521C7.9202 9.66771 7.73269 9.46521 7.55269 9.25521C7.35769 9.02271 7.22269 8.83522 7.13269 8.67772L7.0502 8.48271C7.0277 8.40771 7.02017 8.32521 7.02017 8.25021C7.02017 8.04021 7.0952 7.85271 7.2377 7.70271L7.52271 7.41022C7.60521 7.32772 7.63519 7.28272 7.65019 7.25272C7.62769 7.20022 7.5977 7.15522 7.5602 7.10272L6.68266 5.86522L6.59267 5.80521Z" fill="#2E3235"/>
</svg>

        </span>
      </a>

      <!-- Premium Hamburger -->
      <button
        id="mobile-menu-btn"
        class="ham-btn md:hidden"
        aria-label="فتح القائمة"
        aria-expanded="false"
        aria-controls="mobile-menu"
      >
        <span class="ham-bar" id="ham-1"></span>
        <span class="ham-bar" id="ham-2"></span>
        <span class="ham-bar" id="ham-3"></span>
      </button>

    </div>
  </nav>

  <!-- Mobile Drawer -->
  <div
    id="mobile-menu"
    class="md:hidden hidden bg-white border-t border-gray-100 shadow-lg"
    aria-hidden="true"
  >
    <ul class="px-6 py-4 space-y-4 text-charcoal font-semibold text-sm">
      <li><a href="#about"    class="block py-2 hover:text-primary transition-colors">عننا</a></li>
      <li><a href="#services" class="block py-2 hover:text-primary transition-colors">خدماتنا</a></li>
      <li><a href="#blog"     class="block py-2 hover:text-primary transition-colors">المقالات</a></li>
      <li><a href="#projects" class="block py-2 hover:text-primary transition-colors">مشاريعنا</a></li>
      <li>
        <a href="https://wa.me/966500000000"
           target="_blank"
           rel="noopener noreferrer"
           class="wa-cta w-full justify-center">
          <span class="wa-cta__text">التواصل معنا عبر واتساب</span>
          <span class="wa-cta__icon" aria-hidden="true">

          <!-- WhatsApp outline icon -->
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1.49986 17.0627C1.34986 17.0627 1.20734 17.0027 1.10234 16.8977C0.959838 16.7552 0.899874 16.5452 0.952374 16.3502L1.89738 12.8177C1.26738 11.6477 0.93736 10.3277 0.93736 8.99268C0.93736 4.54518 4.55236 0.930176 8.99986 0.930176C13.4474 0.930176 17.0624 4.54518 17.0624 8.99268C17.0624 13.4402 13.4474 17.0552 8.99986 17.0552C7.64236 17.0552 6.31488 16.7177 5.12988 16.0727L1.64987 17.0402C1.59737 17.0552 1.55236 17.0627 1.49986 17.0627ZM5.20486 14.9102C5.30236 14.9102 5.39987 14.9402 5.48987 14.9852C6.54737 15.6077 7.76236 15.9377 8.99986 15.9377C12.8249 15.9377 15.9374 12.8252 15.9374 9.00018C15.9374 5.17518 12.8249 2.06268 8.99986 2.06268C5.17486 2.06268 2.06236 5.17518 2.06236 9.00018C2.06236 10.2227 2.38485 11.4152 2.99235 12.4652C3.06735 12.5927 3.08986 12.7502 3.05237 12.8927L2.30237 15.6977L5.06236 14.9327C5.10736 14.9177 5.15986 14.9102 5.20486 14.9102Z" fill="#2E3235"/>
      <path d="M11.0552 13.3202C10.5902 13.3202 10.1102 13.2152 9.60768 12.9977C9.13518 12.7952 8.66268 12.5252 8.20518 12.1877C7.75518 11.8577 7.3127 11.4827 6.9077 11.0777C6.5027 10.6652 6.12767 10.2302 5.79767 9.78022C5.46017 9.30772 5.19016 8.84271 4.99516 8.38521C4.78516 7.89021 4.68018 7.40271 4.68018 6.93771C4.68018 6.60771 4.74016 6.29271 4.85266 6.00021C4.97266 5.69271 5.16767 5.41521 5.42267 5.17521C5.90267 4.70271 6.5927 4.53023 7.1402 4.79273C7.3277 4.87523 7.48519 5.01022 7.60519 5.19022L8.47517 6.41271C8.56517 6.53271 8.6327 6.66021 8.6852 6.78771C8.7452 6.93771 8.7827 7.08773 8.7827 7.23023C8.7827 7.42523 8.73018 7.62023 8.62518 7.79273C8.55768 7.90523 8.46017 8.04023 8.33267 8.16773L8.23517 8.27271C8.28017 8.33271 8.33266 8.4077 8.41516 8.4977C8.57266 8.6777 8.74516 8.8727 8.93266 9.0602C9.12016 9.2402 9.30766 9.42021 9.49516 9.57771C9.58516 9.65271 9.6602 9.71271 9.7202 9.75021L9.82516 9.6452C9.96017 9.5102 10.0952 9.40522 10.2302 9.33772C10.4777 9.18022 10.8602 9.14272 11.1977 9.28522C11.3177 9.33022 11.4377 9.39771 11.5652 9.48771L12.8177 10.3727C12.9902 10.4927 13.1252 10.6577 13.2152 10.8452C13.2902 11.0327 13.3202 11.1977 13.3202 11.3702C13.3202 11.5952 13.2677 11.8127 13.1702 12.0227C13.0727 12.2177 12.9602 12.3902 12.8252 12.5477C12.5852 12.8102 12.3077 13.0052 12.0077 13.1327C11.7077 13.2602 11.3852 13.3202 11.0552 13.3202ZM6.59267 5.80521C6.54767 5.80521 6.39771 5.80521 6.21021 5.99271C6.06771 6.12771 5.97018 6.27022 5.90268 6.42772C5.83518 6.58522 5.80518 6.76522 5.80518 6.94522C5.80518 7.26022 5.88017 7.5977 6.03017 7.9577C6.18767 8.3327 6.42018 8.73022 6.70518 9.12772C6.99768 9.52522 7.32769 9.92272 7.69519 10.2902C8.06269 10.6502 8.45268 10.9877 8.85768 11.2877C9.24768 11.5727 9.64519 11.7977 10.0427 11.9702C10.6127 12.2177 11.1377 12.2777 11.5652 12.0977C11.7152 12.0377 11.8502 11.9327 11.9852 11.7977C12.0527 11.7227 12.1052 11.6477 12.1502 11.5502C12.1727 11.4977 12.1877 11.4377 12.1877 11.3852C12.1877 11.3702 12.1877 11.3477 12.1652 11.3027L10.9127 10.4327C10.8602 10.3952 10.8077 10.3652 10.7627 10.3502C10.7327 10.3652 10.6877 10.3877 10.6052 10.4702L10.3202 10.7552C10.1027 10.9727 9.75769 11.0327 9.48019 10.9352L9.3452 10.8752C9.1727 10.7852 8.97768 10.6502 8.76018 10.4627C8.55018 10.2827 8.3477 10.0952 8.1302 9.88521C7.9202 9.66771 7.73269 9.46521 7.55269 9.25521C7.35769 9.02271 7.22269 8.83522 7.13269 8.67772L7.0502 8.48271C7.0277 8.40771 7.02017 8.32521 7.02017 8.25021C7.02017 8.04021 7.0952 7.85271 7.2377 7.70271L7.52271 7.41022C7.60521 7.32772 7.63519 7.28272 7.65019 7.25272C7.62769 7.20022 7.5977 7.15522 7.5602 7.10272L6.68266 5.86522L6.59267 5.80521Z" fill="#2E3235"/>
      </svg>

        </span>
        </a>
      </li>
    </ul>
  </div>
</header>

<script>
(function () {
  var btn  = document.getElementById('mobile-menu-btn');
  var menu = document.getElementById('mobile-menu');
  var open = false;

  btn.addEventListener('click', function () {
    open = !open;
    menu.classList.toggle('hidden', !open);
    btn.classList.toggle('is-open', open);
    btn.setAttribute('aria-expanded', String(open));
    menu.setAttribute('aria-hidden',  String(!open));
  });
})();
</script>
