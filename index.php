<?php
/**
 * Main template — Hero section.
 *
 * @package engineering-theme
 */

get_header();
?>

<main>

  <!-- ============================================================
       Hero Section — Split Layout
       ============================================================ -->
  <section
    class="relative flex -mt-10 flex-col lg:flex-row-reverse min-h-screen"
    style="padding-top: var(--header-height); "
    aria-label="القسم الرئيسي"
  >

    <!-- ── LEFT PANEL (RTL visual right): Hero Image ── -->
    <div class="relative w-full lg:w-[45%] min-h-[50vh] lg:min-h-screen overflow-hidden">

      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/main-hero-image.png' ); ?>"
        alt="فريق عمل أمان الميه على سطح مبنى"
        class="w-full h-full object-cover object-right-top absolute inset-0"
        loading="eager"
        fetchpriority="high"
        width="902"
        height="732"
      >

      <!-- Dark gradient overlay (bottom, for readability on mobile) -->
      <div class="absolute inset-0 md:bg-gradient-to-t from-dark/40 to-transparent lg:hidden"></div>

     

    </div><!-- /image panel -->

    <!-- ── RIGHT PANEL (RTL visual left): Content ── -->
    <div
      class="relative flex-1 bg-white flex flex-col justify-center px-8 lg:px-16 py-16 lg:py-0 text-right"
    >

      <!-- Decorative dot pattern (hero-shape.png) -->
      <div
        class="absolute top-0 right-0 w-64 h-full opacity-30 pointer-events-none"
        style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero-shape.png' ); ?>'); background-repeat: no-repeat; background-position: top left; background-size: contain;"
        aria-hidden="true"
      ></div>

      <!-- Main content -->
      <div class="relative z-10 max-w-xl mr-auto lg:mr-0">

      

        <!-- Headline -->
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-dark leading-snug mb-6">
          حلول هندسية دقيقة...<br>
          <span class="text-primary">حماية تدوم لسنوات</span>
        </h1>

        <!-- Body copy -->
        <p class="text-gray-500 text-lg leading-loose mb-10">
          حلول هندسية متخصصة في كشف تسريبات المياه، العزل الحراري والمائي، وأعمال الأسطح.
          نخدم المنشآت السكنية والتجارية والصناعية بأعلى معايير الجودة.
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-wrap items-center gap-4 justify-start">
          <a
            href="#services"
            class="bg-primary text-white font-bold text-sm px-8 py-3.5 rounded-full shadow-lg shadow-primary/30 hover:bg-primary/90 hover:shadow-primary/50 transition-all duration-200"
          >
            اطلب خدماتنا
          </a>
          <a
            href="https://wa.me/966500000000"
            target="_blank"
            rel="noopener noreferrer"
            class="border-2 border-charcoal text-charcoal font-bold text-sm px-8 py-3 rounded-full hover:border-primary hover:text-primary transition-all duration-200"
          >
            تواصل معنا
          </a>
        </div>

      
      </div><!-- /main content -->

    </div><!-- /content panel -->

  </section><!-- /hero -->

  <!-- Banner Section -->
  <section id="banner" class="w-full">
    <picture>
      <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri(); ?>/assets/images/banner-desktop.jpg">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-desktop.jpg"
           alt="عوازلنا.. حماية تدوم وراحة بال مضمونة"
           class="w-full h-auto object-cover block"
           loading="lazy">
    </picture>
  </section><!-- /banner -->

  <!-- About Section -->
  <section id="about"
    class="bg-cover bg-no-repeat bg-top"
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
