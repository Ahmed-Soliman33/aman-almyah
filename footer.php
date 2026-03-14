
<style>
  .bg-dark { background-color: var(--color-dark); }

  /* ── Quick Links — animated underline slide ── */
  .footer-link {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #d1d5db;
    font-size: .875rem;
    text-decoration: none;
    transition: color .25s ease;
    padding-bottom: 1px;
  }
  .footer-link::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 0;
    height: 1px;
    background: #0651A2;
    transition: width .3s cubic-bezier(.22,.61,.36,1);
  }
  .footer-link:hover { color: #fff; }
  .footer-link:hover::after { width: 100%; }

  /* Arrow dot that slides in on hover */
  .footer-link .fl-dot {
    display: inline-block;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #0651A2;
    opacity: 0;
    transform: translateX(6px);
    transition: opacity .25s ease, transform .28s cubic-bezier(.22,.61,.36,1);
    flex-shrink: 0;
  }
  .footer-link:hover .fl-dot {
    opacity: 1;
    transform: translateX(0);
  }

  /* ── Contact items — icon lift + glow ── */
  .footer-contact-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    color: #d1d5db;
    font-size: .875rem;
    transition: color .22s ease;
    cursor: default;
  }
  .footer-contact-item:hover { color: #fff; }

  .fci-icon {
    flex-shrink: 0;
    margin-top: 2px;
    color: #0651A2;
    transition: transform .3s cubic-bezier(.34,1.56,.64,1),
                filter .3s ease;
  }
  .footer-contact-item:hover .fci-icon {
    transform: translateY(-2px) scale(1.15);
    filter: drop-shadow(0 0 6px rgba(6,81,162,.55));
  }

  /* ── WhatsApp CTA button ── */
  .footer-wa-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-top: 24px;
    background: #0651A2;
    color: #fff;
    font-family: 'Tajawal', sans-serif;
    font-size: .875rem;
    font-weight: 700;
    padding: 10px 24px;
    border-radius: 100px;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    transition: background .25s ease, transform .22s ease,
                box-shadow .25s ease;
    /* shimmer layer */
  }
  .footer-wa-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(
      105deg,
      transparent 35%,
      rgba(255,255,255,.18) 50%,
      transparent 65%
    );
    transform: translateX(-100%);
    transition: transform .55s ease;
  }
  .footer-wa-btn:hover {
    background: #053f7e;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(6,81,162,.35);
  }
  .footer-wa-btn:hover::before { transform: translateX(100%); }
  .footer-wa-btn:active { transform: translateY(0); box-shadow: none; }

  .footer-wa-btn .wa-icon {
    transition: transform .35s cubic-bezier(.34,1.56,.64,1);
  }
  .footer-wa-btn:hover .wa-icon {
    transform: rotate(-10deg) scale(1.2);
  }

  /* ── Social icon buttons ── */
  .footer-social-btn {
    width: 44px;
    height: 44px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.1);
    color: #d1d5db;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    transition: border-color .25s ease, color .25s ease,
                transform .25s cubic-bezier(.34,1.56,.64,1),
                box-shadow .25s ease;
  }
  .footer-social-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 50%;
    background: #0651A2;
    transform: scale(0);
    transition: transform .3s cubic-bezier(.34,1.56,.64,1);
  }
  .footer-social-btn:hover {
    border-color: #0651A2;
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 6px 18px rgba(6,81,162,.3);
  }
  .footer-social-btn:hover::before { transform: scale(1); }
  .footer-social-btn:active { transform: translateY(0) scale(.95); }
  .footer-social-btn svg {
    position: relative; /* above ::before */
    z-index: 1;
    transition: transform .3s cubic-bezier(.34,1.56,.64,1);
  }
  .footer-social-btn:hover svg { transform: scale(1.1); }
</style>
 
<!-- ============================================================
     Site Footer
     ============================================================ -->
<footer class="bg-dark text-white" dir="rtl">

  <!-- Main footer grid -->
  <div class="max-w-7xl mx-auto px-6 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

      <!-- Brand column -->
      <div>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block mb-5">
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>"
            alt="<?php bloginfo( 'name' ); ?>"
            class="h-24 w-auto object-contain brightness-0 invert"
            width="70" height="70"
            loading="lazy"
          >
        </a>
        <p class="text-gray-200 text-sm leading-relaxed max-w-xs">
          أمان الميه — رواد حلول العزل وكشف تسريبات المياه في المملكة العربية السعودية.
          نلتزم بأعلى معايير الجودة لحماية منشآتك.
        </p>

        <!-- Social icons -->
        <div class="flex gap-3 mt-6">
          <a href="https://wa.me/966500000000" target="_blank" rel="noopener noreferrer"
             class="footer-social-btn" aria-label="واتساب">
            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
            </svg>
          </a>
          <a href="#" class="footer-social-btn" aria-label="تويتر">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
              <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
            </svg>
          </a>
          <a href="#" class="footer-social-btn" aria-label="إنستغرام">
            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="text-white font-bold text-base mb-6 pb-3 border-b border-white/10">روابط سريعة</h3>
        <?php
        wp_nav_menu(
            [
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'space-y-3',
                'fallback_cb'    => function () {
                    ?>
                    <ul class="space-y-4">
                      <li><a href="#about"    class="footer-link"><span class="fl-dot"></span>من نحن</a></li>
                      <li><a href="#services" class="footer-link"><span class="fl-dot"></span>خدماتنا</a></li>
                      <li><a href="#projects" class="footer-link"><span class="fl-dot"></span>مشاريعنا</a></li>
                      <li><a href="#blog"     class="footer-link"><span class="fl-dot"></span>المقالات</a></li>
                      <li><a href="#contact"  class="footer-link"><span class="fl-dot"></span>تواصل معنا</a></li>
                    </ul>
                    <?php
                },
            ]
        );
        ?>
      </div>

      <!-- Contact column -->
      <div>
        <h3 class="text-white font-bold text-base mb-6 pb-3 border-b border-white/10">تواصل معنا</h3>
        <ul class="space-y-4">
          <li class="footer-contact-item">
            <svg class="fci-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <span dir="ltr">+966 50 000 0000</span>
          </li>
          <li class="footer-contact-item">
            <svg class="fci-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <span>info@aman-almyah.com</span>
          </li>
          <li class="footer-contact-item">
            <svg class="fci-icon w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <span>المملكة العربية السعودية</span>
          </li>
        </ul>

        <a
          href="https://wa.me/966500000000"
          target="_blank"
          rel="noopener noreferrer"
          class="footer-wa-btn"
        >
          <svg class="wa-icon w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
          </svg>
          ابدأ المحادثة
        </a>
      </div>

    </div>
  </div><!-- /main grid -->

  <!-- Copyright bar -->
  <div class="border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 py-5 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-300">
      <p>
        &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
        <?php bloginfo( 'name' ); ?> — جميع الحقوق محفوظة
      </p>
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/payment-methods.png' ); ?>"
        alt="طرق الدفع المتاحة"
        height="30" width="120"
        loading="lazy"
        style="height:35px;width:auto;opacity:.55;filter:brightness(0) invert(1);transition:opacity .25s ease;"
        onmouseover="this.style.opacity='.85'"
        onmouseout="this.style.opacity='.55'"
      >
    </div>
  </div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
