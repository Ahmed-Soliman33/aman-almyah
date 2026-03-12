<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="rtl" lang="ar">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Cairo Font (Google Fonts) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;900&display=swap" rel="stylesheet">

<!-- Tailwind CSS Play CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary:  '#3BAEDF',
        dark:     '#1E2D3D',
        charcoal: '#2C3E50',
      },
      fontFamily: {
        cairo: ['Cairo', 'sans-serif'],
      },
    },
  },
};
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class( 'font-cairo bg-white antialiased' ); ?>>
<?php wp_body_open(); ?>

<!-- ============================================================
     Sticky Navbar
     ============================================================ -->
<header class="fixed top-0 inset-x-0 z-50 bg-white border-b border-gray-100 shadow-sm" style="height:var(--header-height)">
  <nav class="max-w-7xl mx-auto h-full px-6 flex items-center justify-between">

    <!-- RIGHT (RTL-first): Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2 shrink-0">
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>"
        alt="<?php bloginfo( 'name' ); ?>"
        class="h-12 w-auto object-contain"
        width="48" height="48"
        loading="eager"
      >
    </a>

    <!-- CENTER: Desktop nav links -->
    <ul class="hidden md:flex items-center gap-8 text-sm font-semibold text-charcoal">
      <li>
        <a href="#about" class="hover:text-primary transition-colors duration-200">عننا</a>
      </li>
      <li class="relative group">
        <button class="flex items-center gap-1 hover:text-primary transition-colors duration-200">
          خدماتنا
          <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <!-- Dropdown -->
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

    <!-- LEFT (RTL): CTA + Mobile hamburger -->
    <div class="flex items-center gap-3">

      <!-- WhatsApp CTA Button -->
      <a
        href="https://wa.me/966500000000"
        target="_blank"
        rel="noopener noreferrer"
        class="hidden sm:flex items-center gap-2 border-2 border-primary text-primary text-sm font-bold px-5 py-2 rounded-full hover:bg-primary hover:text-white transition-all duration-200"
      >
        <!-- WhatsApp SVG -->
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
        التواصل معنا
      </a>

      <!-- Mobile Hamburger -->
      <button
        id="mobile-menu-btn"
        class="md:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 rounded-lg hover:bg-gray-100 transition-colors"
        aria-label="فتح القائمة"
        aria-expanded="false"
        aria-controls="mobile-menu"
      >
        <span class="block w-6 h-0.5 bg-charcoal transition-all duration-300" id="ham-1"></span>
        <span class="block w-6 h-0.5 bg-charcoal transition-all duration-300" id="ham-2"></span>
        <span class="block w-4 h-0.5 bg-charcoal transition-all duration-300" id="ham-3"></span>
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
        <a
          href="https://wa.me/966500000000"
          target="_blank"
          rel="noopener noreferrer"
          class="flex items-center justify-center gap-2 border-2 border-primary text-primary py-2.5 rounded-full hover:bg-primary hover:text-white transition-all duration-200"
        >
          التواصل معنا عبر واتساب
        </a>
      </li>
    </ul>
  </div>
</header>

<script>
(function () {
  var btn  = document.getElementById('mobile-menu-btn');
  var menu = document.getElementById('mobile-menu');
  var h1   = document.getElementById('ham-1');
  var h2   = document.getElementById('ham-2');
  var h3   = document.getElementById('ham-3');
  var open = false;

  btn.addEventListener('click', function () {
    open = !open;
    menu.classList.toggle('hidden', !open);
    btn.setAttribute('aria-expanded', String(open));
    menu.setAttribute('aria-hidden',  String(!open));

    // Animate hamburger → X
    if (open) {
      h1.style.transform = 'translateY(8px) rotate(45deg)';
      h2.style.opacity   = '0';
      h3.style.transform = 'translateY(-8px) rotate(-45deg)';
      h3.style.width     = '24px';
    } else {
      h1.style.transform = '';
      h2.style.opacity   = '';
      h3.style.transform = '';
      h3.style.width     = '';
    }
  });
})();
</script>
