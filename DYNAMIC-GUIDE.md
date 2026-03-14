# دليل تحويل الموقع إلى نظام ديناميكي متكامل
## أمان الميه — خارطة طريق احترافية من الصفر إلى لوحة تحكم كاملة

> **الهدف**: تمكين مدير الموقع من التحكم في كل محتوى الصفحة — النصوص، الصور، الإحصائيات، الخدمات، الأسئلة، التقييمات — من لوحة تحكم WordPress دون المساس بخط واحد من الكود.

---

## فهرس المحتويات

1. [نظرة عامة على المنهجية](#1-نظرة-عامة-على-المنهجية)
2. [الأدوات المطلوبة](#2-الأدوات-المطلوبة)
3. [المرحلة الأولى — إعداد البيئة وتثبيت الإضافات](#3-المرحلة-الأولى--إعداد-البيئة-وتثبيت-الإضافات)
4. [المرحلة الثانية — إعدادات الموقع العامة (Theme Options)](#4-المرحلة-الثانية--إعدادات-الموقع-العامة-theme-options)
5. [المرحلة الثالثة — قسم الهيرو (Hero)](#5-المرحلة-الثالثة--قسم-الهيرو-hero)
6. [المرحلة الرابعة — قسم من نحن (About)](#6-المرحلة-الرابعة--قسم-من-نحن-about)
7. [المرحلة الخامسة — قسم لماذا نحن (Why Us)](#7-المرحلة-الخامسة--قسم-لماذا-نحن-why-us)
8. [المرحلة السادسة — قسم الخدمات (Services CPT)](#8-المرحلة-السادسة--قسم-الخدمات-services-cpt)
9. [المرحلة السابعة — قسم النتائج والإحصائيات (Results)](#9-المرحلة-السابعة--قسم-النتائج-والإحصائيات-results)
10. [المرحلة الثامنة — قسم الأسئلة الشائعة (FAQ CPT)](#10-المرحلة-الثامنة--قسم-الأسئلة-الشائعة-faq-cpt)
11. [المرحلة التاسعة — قسم التقييمات (Testimonials CPT)](#11-المرحلة-التاسعة--قسم-التقييمات-testimonials-cpt)
12. [المرحلة العاشرة — قسم التواصل وإرسال النموذج](#12-المرحلة-العاشرة--قسم-التواصل-وإرسال-النموذج)
13. [المرحلة الحادية عشرة — الرأس والتذييل (Header & Footer)](#13-المرحلة-الحادية-عشرة--الرأس-والتذييل-header--footer)
14. [المرحلة الثانية عشرة — البانرات الفاصلة (Section Banners)](#14-المرحلة-الثانية-عشرة--البانرات-الفاصلة-section-banners)
15. [المرحلة الثالثة عشرة — ربط كل شيء في index.php](#15-المرحلة-الثالثة-عشرة--ربط-كل-شيء-في-indexphp)
16. [المرحلة الرابعة عشرة — SEO والميتاداتا](#16-المرحلة-الرابعة-عشرة--seo-والميتاداتا)
17. [جدول المحتوى الكامل — ما يتحكم فيه المدير](#17-جدول-المحتوى-الكامل--ما-يتحكم-فيه-المدير)
18. [أفضل الممارسات والتحذيرات](#18-أفضل-الممارسات-والتحذيرات)

---

## 1. نظرة عامة على المنهجية

الموقع الحالي **ثابت بالكامل** — كل نص، صورة، رقم، وسؤال مكتوب مباشرة داخل ملفات PHP. المنهجية المعتمدة في هذا الدليل تعتمد على ثلاثة مستويات:

```
┌─────────────────────────────────────────────────────┐
│  المستوى 1: إعدادات الموقع العامة (ACF Options)     │
│  ← رقم واتساب، بريد إلكتروني، عنوان، سوشيال ميديا  │
├─────────────────────────────────────────────────────┤
│  المستوى 2: حقول مخصصة للصفحة الرئيسية (ACF Page) │
│  ← محتوى الهيرو، من نحن، لماذا نحن، النتائج        │
├─────────────────────────────────────────────────────┤
│  المستوى 3: أنواع محتوى مخصصة (Custom Post Types)  │
│  ← الخدمات، الأسئلة، التقييمات                     │
└─────────────────────────────────────────────────────┘
```

### لماذا ACF (Advanced Custom Fields) وليس Elementor أو Gutenberg؟

لأن الموقع مبني بـ **Tailwind CSS CDN + HTML/PHP مخصص** مع **تأثيرات JavaScript معقدة** لا يمكن لأي Page Builder إعادة إنتاجها. الحل الوحيد الذي يحافظ على التصميم والأداء بالكامل هو ACF — إضافة تضيف حقولاً بيانات للوحة التحكم بينما يبقى ملف PHP مسؤولاً عن العرض بالكامل.

---

## 2. الأدوات المطلوبة

### إضافات WordPress (Plugins) — مجانية بالكامل

| الإضافة | الدور | المصدر |
|---|---|---|
| **Advanced Custom Fields (ACF)** | إنشاء جميع الحقول المخصصة | wordpress.org/plugins/advanced-custom-fields |
| **WPForms Lite** أو **Contact Form 7** | معالجة نموذج التواصل وإرسال الإيميلات | wordpress.org |
| **WP Mail SMTP** | ضمان وصول الإيميلات من النموذج | wordpress.org |
| **Yoast SEO** أو **Rank Math** | إدارة SEO والميتاداتا | wordpress.org |

> **ملاحظة**: النسخة المجانية من ACF تكفي لـ 95% من احتياجات هذا الموقع. النسخة المدفوعة (ACF Pro) مطلوبة فقط إذا أردنا حقل **Repeater** (للأسئلة الشائعة وبنود لماذا نحن). البديل المجاني هو استخدام **Custom Post Types** لهذه الأقسام — وهو ما يوصي به هذا الدليل.

---

## 3. المرحلة الأولى — إعداد البيئة وتثبيت الإضافات

### الخطوة 3.1 — تثبيت ACF

```
لوحة التحكم ← الإضافات ← أضف جديد ← ابحث عن "Advanced Custom Fields" ← تثبيت وتفعيل
```

### الخطوة 3.2 — التحقق من إعدادات Permalinks

```
لوحة التحكم ← الإعدادات ← الروابط الدائمة ← اختر "Post name" ← احفظ
```
هذا ضروري لكي تعمل Custom Post Types بشكل صحيح.

### الخطوة 3.3 — تفعيل Theme Support للشعار في functions.php

الموقع يدعم `custom-logo` مسبقاً في `functions.php`. تأكد من أنه مفعّل (موجود بالفعل):
```php
add_theme_support('custom-logo', [
    'height'      => 80,
    'width'       => 80,
    'flex-height' => true,
    'flex-width'  => true,
]);
```

---

## 4. المرحلة الثانية — إعدادات الموقع العامة (Theme Options)

هذه أهم خطوة — إنشاء **صفحة إعدادات** في لوحة التحكم تحتوي على جميع البيانات المشتركة بين جميع الصفحات.

### الخطوة 4.1 — إنشاء صفحة الإعدادات في functions.php

```php
// في functions.php — أضف هذا الكود
if ( function_exists('acf_add_options_page') ) {

    acf_add_options_page([
        'page_title' => 'إعدادات الموقع',
        'menu_title' => 'إعدادات الموقع',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'icon_url'   => 'dashicons-admin-settings',
        'position'   => 2,
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'معلومات التواصل',
        'menu_title'  => 'التواصل',
        'parent_slug' => 'theme-general-settings',
    ]);

    acf_add_options_sub_page([
        'page_title'  => 'وسائل التواصل الاجتماعي',
        'menu_title'  => 'السوشيال ميديا',
        'parent_slug' => 'theme-general-settings',
    ]);
}
```

### الخطوة 4.2 — إنشاء مجموعة حقول "إعدادات الموقع العامة" في ACF

```
لوحة التحكم ← Custom Fields ← أضف جديد
اسم المجموعة: إعدادات الموقع العامة
```

**الحقول المطلوبة:**

| اسم الحقل | نوع الحقل | التسمية | ملاحظات |
|---|---|---|---|
| `site_whatsapp` | Text | رقم واتساب (بدون +) | مثال: `966501234567` |
| `site_phone` | Text | رقم الهاتف للعرض | مثال: `+966 50 123 4567` |
| `site_email` | Email | البريد الإلكتروني | |
| `site_address` | Text | العنوان | |
| `site_twitter` | URL | رابط تويتر/X | |
| `site_instagram` | URL | رابط إنستغرام | |
| `site_whatsapp_text` | Text | نص زر واتساب | مثال: `التواصل معنا` |
| `payment_methods_image` | Image | صورة طرق الدفع | يرجع URL |

**إعداد الموقع (Location Rules):**
```
Show this field group if: Options Page == إعدادات الموقع العامة
```

### الخطوة 4.3 — طريقة استخدام هذه الحقول في القوالب

```php
// في أي ملف PHP
$whatsapp = get_field('site_whatsapp', 'option');
$phone    = get_field('site_phone', 'option');
$email    = get_field('site_email', 'option');

// رابط واتساب
$wa_url = 'https://wa.me/' . $whatsapp;
```

---

## 5. المرحلة الثالثة — قسم الهيرو (Hero)

### الخطوة 5.1 — إنشاء مجموعة حقول قسم الهيرو في ACF

```
لوحة التحكم ← Custom Fields ← أضف جديد
اسم المجموعة: محتوى الصفحة الرئيسية — الهيرو
```

**الحقول:**

| اسم الحقل | نوع الحقل | التسمية |
|---|---|---|
| `hero_badge_text` | Text | نص الشارة (Badge) |
| `hero_headline_line1` | Text | السطر الأول من العنوان الرئيسي |
| `hero_headline_line2` | Text | السطر الثاني (الملون) من العنوان |
| `hero_body_text` | Textarea | النص التوضيحي |
| `hero_cta_primary_text` | Text | نص الزر الأول |
| `hero_cta_primary_url` | Text | رابط الزر الأول |
| `hero_cta_secondary_text` | Text | نص الزر الثاني |
| `hero_image_desktop` | Image | صورة الهيرو — ديسكتوب |
| `hero_image_mobile` | Image | صورة الهيرو — جوال |

**Location Rules:**
```
Show this field group if: Page == الصفحة الرئيسية
```

> أو إذا أردت تطبيقه على جميع الصفحات: `Post Type == Page`

### الخطوة 5.2 — تعديل index.php لقراءة الحقول

**المحتوى الحالي (ثابت):**
```html
<div class="... text-xs font-bold ...">
  حلول هندسية متخصصة
</div>
<h1>
  حلول هندسية دقيقة...<br>
  <span>حماية تدوم لسنوات</span>
</h1>
<p>كشف تسريبات المياه، العزل الحراري والمائي...</p>
```

**بعد التحويل (ديناميكي):**
```php
<?php
$hero_badge    = get_field('hero_badge_text')       ?: 'حلول هندسية متخصصة';
$hero_line1    = get_field('hero_headline_line1')   ?: 'حلول هندسية دقيقة...';
$hero_line2    = get_field('hero_headline_line2')   ?: 'حماية تدوم لسنوات';
$hero_body     = get_field('hero_body_text')        ?: 'كشف تسريبات المياه...';
$cta1_text     = get_field('hero_cta_primary_text') ?: 'اطلب خدماتنا';
$cta1_url      = get_field('hero_cta_primary_url')  ?: '#services';
$cta2_text     = get_field('hero_cta_secondary_text') ?: 'تواصل معنا';
$wa_number     = get_field('site_whatsapp', 'option') ?: '966500000000';

$img_desktop   = get_field('hero_image_desktop');
$img_desktop_url = $img_desktop ? $img_desktop['url'] : get_template_directory_uri() . '/assets/images/main-hero-image.png';

$img_mobile    = get_field('hero_image_mobile');
$img_mobile_url = $img_mobile ? $img_mobile['url'] : get_template_directory_uri() . '/assets/images/main-hero-mobile.png';
?>

<!-- Badge -->
<div class="hero-anim inline-flex items-center gap-2 ...">
  <span class="w-1.5 h-1.5 ..."></span>
  <?php echo esc_html($hero_badge); ?>
</div>

<!-- Headline -->
<h1 class="hero-anim ...">
  <?php echo esc_html($hero_line1); ?><br>
  <span class="text-primary hero-accent"><?php echo esc_html($hero_line2); ?></span>
</h1>

<!-- Body -->
<p class="hero-anim ..."><?php echo esc_html($hero_body); ?></p>

<!-- CTAs -->
<a href="<?php echo esc_url($cta1_url); ?>" class="btn-primary-hero ...">
  <span><?php echo esc_html($cta1_text); ?></span>
</a>
<a href="https://wa.me/<?php echo esc_html($wa_number); ?>" class="btn-outline-hero ...">
  <span><?php echo esc_html($cta2_text); ?></span>
</a>

<!-- Images -->
<picture>
  <source media="(max-width: 1023px)" srcset="<?php echo esc_url($img_mobile_url); ?>">
  <img src="<?php echo esc_url($img_desktop_url); ?>" ...>
</picture>
```

**القاعدة الذهبية**: استخدم دائماً `?: 'قيمة_افتراضية'` حتى لا تظهر الصفحة فارغة إذا نسي المدير ملء حقل.

---

## 6. المرحلة الرابعة — قسم من نحن (About)

### الخطوة 6.1 — إنشاء مجموعة حقول About

```
اسم المجموعة: محتوى الصفحة الرئيسية — من نحن
```

**الحقول:**

| اسم الحقل | نوع الحقل | التسمية |
|---|---|---|
| `about_heading` | Text | العنوان الرئيسي |
| `about_paragraph_1` | Textarea | الفقرة الأولى |
| `about_paragraph_2` | Textarea | الفقرة الثانية |
| `about_paragraph_3` | Textarea | الفقرة الثالثة |
| `about_paragraph_4` | Textarea | الفقرة الرابعة |
| `about_cta_primary_text` | Text | نص الزر الأول |
| `about_cta_primary_url` | Text | رابط الزر الأول |
| `about_image` | Image | صورة العامل |
| `about_bg_image` | Image | صورة الخلفية (الموجة الزرقاء) |

**Location Rules:** `Page == الصفحة الرئيسية`

### الخطوة 6.2 — تعديل section#about في index.php

```php
<?php
$about_h        = get_field('about_heading')          ?: 'من نحن';
$about_p1       = get_field('about_paragraph_1')       ?: 'أمان المياه شركة متخصصة...';
$about_p2       = get_field('about_paragraph_2')       ?: 'نستخدم تقنيات كشف متقدمة...';
$about_p3       = get_field('about_paragraph_3')       ?: 'نؤمن أن جودة التنفيذ...';
$about_p4       = get_field('about_paragraph_4')       ?: 'هدفنا هو تأمين المباني...';
$about_cta1     = get_field('about_cta_primary_text')  ?: 'اطلب خدماتنا';
$about_cta1_url = get_field('about_cta_primary_url')   ?: '#services';

$about_img      = get_field('about_image');
$about_img_url  = $about_img ? $about_img['url'] : get_template_directory_uri() . '/assets/images/about-worker.jpg';

$about_bg       = get_field('about_bg_image');
$about_bg_url   = $about_bg ? $about_bg['url'] : get_template_directory_uri() . '/assets/images/about-bg.png';
$wa_number      = get_field('site_whatsapp', 'option') ?: '966500000000';
?>

<section id="about"
  style="background-image: url('<?php echo esc_url($about_bg_url); ?>'); background-size: 100% 100%;">
  ...
  <h2><?php echo esc_html($about_h); ?></h2>
  <p class="about-para"><?php echo esc_html($about_p1); ?></p>
  <p class="about-para"><?php echo esc_html($about_p2); ?></p>
  <p class="about-para"><?php echo esc_html($about_p3); ?></p>
  <p class="about-para"><?php echo esc_html($about_p4); ?></p>
  <a href="<?php echo esc_url($about_cta1_url); ?>"><?php echo esc_html($about_cta1); ?></a>
  <a href="https://wa.me/<?php echo esc_html($wa_number); ?>">تواصل معنا</a>
  <img src="<?php echo esc_url($about_img_url); ?>" alt="...">
  ...
</section>
```

---

## 7. المرحلة الخامسة — قسم لماذا نحن (Why Us)

هذا القسم يحتوي على **5 بنود متكررة** (أيقونة + عنوان + نص). الحل الاحترافي:

**الخيار أ (ACF Pro — Repeater):** حقل Repeater واحد يحتوي على sub-fields: icon_svg, title, description.

**الخيار ب (مجاني — Custom Post Type):** إنشاء CPT اسمه `why_us` مع حقلين بسيطين.

**الخيار ج (مجاني — أسرع تطبيقاً):** إنشاء 5 مجموعات حقول مستقلة (why_1_title, why_1_text, ... why_5_title, why_5_text).

**التوصية**: الخيار ج للبدء السريع، الخيار ب للمرونة المستقبلية.

### الخطوة 7.1 — الخيار ج (بدون ACF Pro)

```
اسم المجموعة: محتوى الصفحة الرئيسية — لماذا نحن
```

**الحقول (×5 بنود):**

| الحقل | النوع |
|---|---|
| `why_section_heading` | Text — عنوان القسم |
| `why_1_title` | Text |
| `why_1_text` | Textarea |
| `why_2_title` | Text |
| `why_2_text` | Textarea |
| ... وهكذا حتى why_5 | |

### الخطوة 7.2 — تعديل section#why-us

```php
<?php
$why_h   = get_field('why_section_heading') ?: 'ما يجعلنا الخيار الأفضل';
$why     = [];
for ($i = 1; $i <= 5; $i++) {
    $why[] = [
        'title' => get_field("why_{$i}_title") ?: ['الجودة','الابتكار','الاستدامة','الشفافية','المصداقية'][$i-1],
        'text'  => get_field("why_{$i}_text")  ?: '',
    ];
}
?>
<h2 class="why-heading"><?php echo esc_html($why_h); ?></h2>
<div class="why-grid">
  <?php foreach ($why as $item) : ?>
    <div class="why-col">
      <div class="why-icon-wrap">
        <!-- SVG يبقى ثابتاً في الكود — يمكن تحريكه لاحقاً -->
      </div>
      <div class="why-title"><?php echo esc_html($item['title']); ?></div>
      <p class="why-text"><?php echo esc_html($item['text']); ?></p>
    </div>
  <?php endforeach; ?>
</div>
```

> **ملاحظة حول الأيقونات**: الأيقونات حالياً SVG مدمج في الكود وهي ثابتة. لتحريكها مستقبلاً، أضف حقل `why_N_icon` من نوع **Image** أو **Textarea** (لصق SVG مباشرة) — لكن لأسباب الأمان لا تستخدم `echo` مع SVG مدخل من المستخدم بدون تعقيم مناسب. الحل الأبسط: إبقاء الأيقونات ثابتة في الكود وجعل العناوين والنصوص فقط ديناميكية.

---

## 8. المرحلة السادسة — قسم الخدمات (Services CPT)

الخدمات هي المحتوى الأكثر احتمالاً للتغيير (إضافة خدمة جديدة، تعديل الصورة، تغيير الاسم). لذا **Custom Post Type** هو الحل المثالي.

### الخطوة 8.1 — إنشاء Custom Post Type "الخدمات" في functions.php

```php
// في functions.php — أضف هذه الدالة
function et_register_cpts(): void {

    // ── Custom Post Type: الخدمات ──
    register_post_type( 'service', [
        'labels' => [
            'name'               => 'الخدمات',
            'singular_name'      => 'خدمة',
            'add_new'            => 'أضف خدمة',
            'add_new_item'       => 'إضافة خدمة جديدة',
            'edit_item'          => 'تعديل الخدمة',
            'new_item'           => 'خدمة جديدة',
            'view_item'          => 'عرض الخدمة',
            'search_items'       => 'البحث في الخدمات',
            'not_found'          => 'لم يتم العثور على خدمات',
            'all_items'          => 'جميع الخدمات',
            'menu_name'          => 'الخدمات',
        ],
        'public'              => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-hammer',
        'supports'            => [ 'title', 'thumbnail', 'page-attributes' ], // thumbnail = صورة الخدمة
        'has_archive'         => false,
        'show_in_rest'        => false,
        'rewrite'             => [ 'slug' => 'services' ],
    ]);
}
add_action( 'init', 'et_register_cpts' );
```

**لماذا `supports: ['thumbnail']`؟** لأن صورة كل خدمة ستُدار عبر "الصورة البارزة" (Featured Image) — ميزة WordPress القياسية.

**لماذا `supports: ['page-attributes']`؟** لأنه يضيف حقل "الترتيب" (Order) لتحديد ترتيب الخدمات في الصفحة.

### الخطوة 8.2 — لا حاجة لحقول ACF إضافية

كل ما يحتاجه كارد الخدمة هو:
- **العنوان** → `get_the_title()` — مدمج في WordPress
- **الصورة** → `get_the_post_thumbnail_url($post->ID, 'large')` — مدمج في WordPress

### الخطوة 8.3 — تعديل section#services في index.php

```php
<?php
$services_heading = get_field('services_section_heading') ?: 'خدماتنا';

$services_query = new WP_Query([
    'post_type'      => 'service',
    'posts_per_page' => -1,        // جميع الخدمات
    'orderby'        => 'menu_order', // حسب الترتيب الذي حدده المدير
    'order'          => 'ASC',
    'post_status'    => 'publish',
]);
?>

<section id="services">
  <div class="services-header">
    <h2><?php echo esc_html($services_heading); ?></h2>
  </div>

  <div class="services-grid">
    <?php if ( $services_query->have_posts() ) : ?>
      <?php while ( $services_query->have_posts() ) : $services_query->the_post(); ?>
        <?php
        $img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
        if ( ! $img_url ) {
            $img_url = get_template_directory_uri() . '/assets/images/service-1.jpg';
        }
        ?>
        <div class="service-card">
          <div class="service-card__clip">
            <img class="service-card__img"
                 src="<?php echo esc_url($img_url); ?>"
                 alt="<?php echo esc_attr(get_the_title()); ?>"
                 loading="lazy">
            <div class="service-card__overlay"></div>
            <div class="service-card__bottom">
              <span class="service-card__wave"><!-- SVG wave --></span>
              <div class="service-card__title"><?php echo esc_html(get_the_title()); ?></div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</section>
```

### الخطوة 8.4 — كيف يضيف المدير خدمة جديدة؟

```
لوحة التحكم ← الخدمات ← أضف جديد
← أدخل اسم الخدمة في حقل العنوان
← ارفع صورة الخدمة من "الصورة البارزة" في الشريط الجانبي
← في "خصائص الصفحة" حدد الترتيب (0, 1, 2...)
← انشر
```

الخدمة تظهر تلقائياً في الصفحة بنفس التصميم الكامل مع جميع التأثيرات.

---

## 9. المرحلة السابعة — قسم النتائج والإحصائيات (Results)

### الخطوة 9.1 — إنشاء مجموعة حقول Results

```
اسم المجموعة: محتوى الصفحة الرئيسية — النتائج والثقة
```

**الحقول:**

| اسم الحقل | نوع الحقل | التسمية |
|---|---|---|
| `results_heading` | Text | العنوان الرئيسي |
| `results_description` | Textarea | النص التوضيحي |
| `results_stat1_number` | Number | الإحصاء الأول (الرقم) |
| `results_stat1_suffix` | Text | اللاحقة (مثل: + أو ساعة) |
| `results_stat1_label` | Text | وصف الإحصاء الأول |
| `results_stat2_number` | Number | الإحصاء الثاني (الرقم) |
| `results_stat2_suffix` | Text | اللاحقة |
| `results_stat2_label` | Text | وصف الإحصاء الثاني |
| `results_stat3_number` | Number | الإحصاء الثالث (الرقم) |
| `results_stat3_suffix` | Text | اللاحقة |
| `results_stat3_label` | Text | وصف الإحصاء الثالث |
| `results_cta_primary_text` | Text | نص الزر الأول |
| `results_cta_primary_url` | Text | رابط الزر الأول |
| `results_image` | Image | صورة القسم |

### الخطوة 9.2 — تعديل section#results في index.php

```php
<?php
$res_h        = get_field('results_heading')      ?: 'نتائج ملموسة... وثقة مستمرة';
$res_desc     = get_field('results_description')  ?: 'إنجازاتنا ليست وعودًا...';

$stats = [
    [
        'num'    => get_field('results_stat1_number') ?: 24,
        'suffix' => get_field('results_stat1_suffix') ?: ' ساعة',
        'label'  => get_field('results_stat1_label')  ?: 'سرعة استجابة للبلاغات العاجلة',
    ],
    [
        'num'    => get_field('results_stat2_number') ?: 980,
        'suffix' => get_field('results_stat2_suffix') ?: '+',
        'label'  => get_field('results_stat2_label')  ?: 'عميل وثق بخدماتنا',
    ],
    [
        'num'    => get_field('results_stat3_number') ?: 1250,
        'suffix' => get_field('results_stat3_suffix') ?: '+',
        'label'  => get_field('results_stat3_label')  ?: 'مشروع تم تنفيذه بنجاح',
    ],
];

$res_img     = get_field('results_image');
$res_img_url = $res_img ? $res_img['url'] : get_template_directory_uri() . '/assets/images/results-section.png';

$res_cta1_text = get_field('results_cta_primary_text') ?: 'اطلب خدماتنا';
$res_cta1_url  = get_field('results_cta_primary_url')  ?: '#services';
$wa_number     = get_field('site_whatsapp', 'option')  ?: '966500000000';
?>

<section id="results">
  <div class="results-inner">
    <div class="results-img-wrap">
      <img src="<?php echo esc_url($res_img_url); ?>" ...>
    </div>
    <div class="results-text">
      <h2 class="results-heading"><?php echo esc_html($res_h); ?></h2>
      <p class="results-desc"><?php echo esc_html($res_desc); ?></p>
      <div class="results-stats">
        <?php foreach ($stats as $stat) : ?>
          <div class="results-stat">
            <span class="results-stat__num"
                  data-count="<?php echo esc_attr($stat['num']); ?>"
                  data-suffix="<?php echo esc_attr($stat['suffix']); ?>">
              <?php echo esc_html($stat['num'] . $stat['suffix']); ?>
            </span>
            <span class="results-stat__label"><?php echo esc_html($stat['label']); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="results-btns">
        <a href="<?php echo esc_url($res_cta1_url); ?>" class="results-btn-primary">
          <?php echo esc_html($res_cta1_text); ?>
        </a>
        <a href="https://wa.me/<?php echo esc_html($wa_number); ?>" class="results-btn-outline">
          تواصل معنا
        </a>
      </div>
    </div>
  </div>
</section>
```

---

## 10. المرحلة الثامنة — قسم الأسئلة الشائعة (FAQ CPT)

### الخطوة 10.1 — إنشاء Custom Post Type "الأسئلة الشائعة" في functions.php

```php
// أضف داخل دالة et_register_cpts() الموجودة مسبقاً:

register_post_type( 'faq', [
    'labels' => [
        'name'          => 'الأسئلة الشائعة',
        'singular_name' => 'سؤال',
        'add_new_item'  => 'إضافة سؤال جديد',
        'edit_item'     => 'تعديل السؤال',
        'all_items'     => 'جميع الأسئلة',
        'menu_name'     => 'الأسئلة الشائعة',
    ],
    'public'        => false,     // لا صفحة أرشيف للأسئلة
    'show_ui'       => true,      // تظهر في لوحة التحكم
    'show_in_menu'  => true,
    'menu_position' => 6,
    'menu_icon'     => 'dashicons-editor-help',
    'supports'      => [ 'title', 'editor', 'page-attributes' ],
    // title   = السؤال
    // editor  = الإجابة (محرر WordPress الكامل)
    // page-attributes = الترتيب
    'show_in_rest'  => false,
]);
```

**السؤال** → `get_the_title()` ← عنوان المنشور
**الإجابة** → `get_the_content()` ← محتوى المنشور (المحرر)

لا حاجة لأي حقول ACF إضافية!

### الخطوة 10.2 — تعديل section#faq في index.php

```php
<?php
$faq_heading = get_field('faq_section_heading') ?: 'الأسئلة الشائعة';

$faq_query = new WP_Query([
    'post_type'      => 'faq',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
]);
?>

<section id="faq">
  <div class="faq-inner">
    <h2 class="faq-heading"><?php echo esc_html($faq_heading); ?></h2>
    <ul class="faq-list">
      <?php if ( $faq_query->have_posts() ) : ?>
        <?php while ( $faq_query->have_posts() ) : $faq_query->the_post(); ?>
          <li class="faq-item">
            <button class="faq-btn" aria-expanded="false">
              <span class="faq-question"><?php echo esc_html(get_the_title()); ?></span>
              <span class="faq-icon" aria-hidden="true">
                <!-- SVG الشيفرون يبقى ثابتاً -->
                <svg width="21" height="11" viewBox="0 0 21 11" fill="none">
                  <path d="M19.7838 0.894287L12.0087 8.66943C11.0905 9.58766 9.5879 9.58766 8.66967 8.66943L0.894531 0.894287" stroke="#5C6369" stroke-width="1.78876" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
            </button>
            <div class="faq-answer" role="region">
              <div class="faq-answer-inner">
                <div class="faq-answer-text">
                  <?php echo wp_kses_post(get_the_content()); ?>
                </div>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php endif; ?>
    </ul>
  </div>
</section>
```

### الخطوة 10.3 — كيف يضيف المدير سؤالاً جديداً؟

```
لوحة التحكم ← الأسئلة الشائعة ← أضف جديد
← اكتب السؤال في حقل العنوان
← اكتب الإجابة في المحرر (يدعم تنسيق النص)
← في "خصائص الصفحة" حدد الترتيب
← انشر
```

---

## 11. المرحلة التاسعة — قسم التقييمات (Testimonials CPT)

### الخطوة 11.1 — إنشاء Custom Post Type "التقييمات" في functions.php

```php
// أضف داخل دالة et_register_cpts():

register_post_type( 'testimonial', [
    'labels' => [
        'name'          => 'تقييمات العملاء',
        'singular_name' => 'تقييم',
        'add_new_item'  => 'إضافة تقييم جديد',
        'edit_item'     => 'تعديل التقييم',
        'all_items'     => 'جميع التقييمات',
        'menu_name'     => 'تقييمات العملاء',
    ],
    'public'        => false,
    'show_ui'       => true,
    'show_in_menu'  => true,
    'menu_position' => 7,
    'menu_icon'     => 'dashicons-star-filled',
    'supports'      => [ 'title', 'editor', 'page-attributes' ],
    // title  = اسم العميل
    // editor = نص التقييم
    'show_in_rest'  => false,
]);
```

### الخطوة 11.2 — إنشاء حقول ACF للتقييمات

```
اسم المجموعة: حقول التقييمات
Location: Post Type == testimonial
```

**الحقول:**

| اسم الحقل | نوع الحقل | التسمية |
|---|---|---|
| `testimonial_service` | Text | الخدمة المستفادة (مثال: كشف تسريبات) |
| `testimonial_rating` | Number | التقييم (1-5)، افتراضي: 5 |

> اسم العميل = `get_the_title()` | نص التقييم = `get_the_content()`

### الخطوة 11.3 — تعديل section#testimonials في index.php

```php
<?php
$testi_heading = get_field('testimonials_section_heading') ?: 'آراء عملائنا';

$testi_query = new WP_Query([
    'post_type'      => 'testimonial',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
    'post_status'    => 'publish',
]);

$testimonials = [];
if ( $testi_query->have_posts() ) {
    while ( $testi_query->have_posts() ) {
        $testi_query->the_post();
        $testimonials[] = [
            'name'    => get_the_title(),
            'review'  => get_the_content(),
            'service' => get_field('testimonial_service') ?: '',
            'rating'  => (int) ( get_field('testimonial_rating') ?: 5 ),
        ];
    }
    wp_reset_postdata();
}
?>

<section id="testimonials">
  <div class="testi-header">
    <h2 class="testi-heading">
      آراء <span><?php echo esc_html(get_field('testimonials_heading_accent') ?: 'عملائنا'); ?></span>
    </h2>
  </div>

  <div class="testi-shell">
    <!-- أزرار السابق والتالي تبقى ثابتة -->
    <button class="testi-btn testi-btn-prev" aria-label="السابق">...</button>
    <button class="testi-btn testi-btn-next" aria-label="التالي">...</button>

    <div class="testi-viewport" role="region" aria-label="آراء العملاء">
      <div class="testi-track">

        <?php foreach ( $testimonials as $i => $t ) : ?>
          <div class="testi-card <?php echo $i === 0 ? 'tc-active' : ''; ?>">
            <div class="tc-user">
              <div class="tc-avatar">
                <!-- SVG الأفاتار يبقى ثابتاً -->
              </div>
              <div class="tc-meta">
                <span class="tc-name"><?php echo esc_html($t['name']); ?></span>
                <span class="tc-service"><?php echo esc_html($t['service']); ?></span>
              </div>
            </div>
            <hr class="tc-divider">
            <p class="tc-review"><?php echo esc_html($t['review']); ?></p>
            <div class="tc-rating">
              <div class="tc-stars">
                <?php for ( $s = 0; $s < $t['rating']; $s++ ) : ?>
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                  </svg>
                <?php endfor; ?>
              </div>
              <span class="tc-score"><?php echo esc_html($t['rating']); ?>.0</span>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>

  <!-- نقاط التنقل — يجب توليدها ديناميكياً -->
  <div class="testi-dots" role="tablist">
    <?php for ( $i = 0; $i < count($testimonials); $i++ ) : ?>
      <button class="testi-dot <?php echo $i === 0 ? 'td-active' : ''; ?>"
              aria-label="<?php echo $i + 1; ?>"
              role="tab">
      </button>
    <?php endfor; ?>
  </div>

</section>
```

---

## 12. المرحلة العاشرة — قسم التواصل وإرسال النموذج

### الخطوة 12.1 — إضافة حقول ACF لقسم التواصل

```
اسم المجموعة: محتوى الصفحة الرئيسية — التواصل
```

| اسم الحقل | النوع | التسمية |
|---|---|---|
| `contact_tagline` | Textarea | النص الترحيبي |
| `contact_cta_text` | Text | نص الزر |

### الخطوة 12.2 — تثبيت وإعداد WPForms Lite

```
لوحة التحكم ← الإضافات ← أضف جديد ← ابحث عن WPForms ← تثبيت وتفعيل
```

**إنشاء نموذج التواصل:**
```
WPForms ← أضف جديد ← اختر "Simple Contact Form"
← أضف الحقول: الاسم، البريد الإلكتروني، الرسالة
← في الإعدادات → الإشعارات: ضع البريد الإلكتروني الذي تريد استلام الرسائل عليه
← احفظ ← انسخ رقم ID النموذج
```

### الخطوة 12.3 — تضمين النموذج في index.php

```php
<?php
$contact_tagline = get_field('contact_tagline') ?: 'نحن هنا للإجابة على جميع استفساراتكم.';
$contact_cta     = get_field('contact_cta_text') ?: 'اطلب خدماتنا';
$form_id         = get_field('contact_form_id', 'option') ?: 1; // ID نموذج WPForms
?>

<section id="contact">
  <div class="contact-inner">
    <div class="contact-info">
      <?php
      // الشعار من إعداد WordPress القياسي
      $custom_logo_id  = get_theme_mod( 'custom_logo' );
      $logo_url        = $custom_logo_id
          ? wp_get_attachment_image_url( $custom_logo_id, 'full' )
          : get_template_directory_uri() . '/assets/images/logo.png';
      ?>
      <img class="contact-logo"
           src="<?php echo esc_url($logo_url); ?>"
           alt="<?php bloginfo('name'); ?>">

      <p class="contact-tagline"><?php echo esc_html($contact_tagline); ?></p>

      <button type="submit" form="wpforms-form-<?php echo esc_attr($form_id); ?>"
              class="contact-cta-btn">
        <?php echo esc_html($contact_cta); ?>
      </button>
    </div>

    <div class="contact-form-col">
      <?php echo do_shortcode('[wpforms id="' . esc_attr($form_id) . '"]'); ?>
    </div>
  </div>
</section>
```

> **تحذير**: ستحتاج إلى تخصيص CSS لنموذج WPForms ليتطابق مع تصميم `.cf-input` و`.cf-textarea` الحالي. يمكن ذلك عبر تحديد الـ selectors الخاصة بـ WPForms في `style.css`.

### الخطوة 12.4 — إعداد WP Mail SMTP لضمان وصول الإيميلات

```
لوحة التحكم ← WP Mail SMTP ← الإعدادات ← اختر SMTP Provider
← أدخل بيانات خادم البريد (Mailer) أو استخدم Gmail/SendGrid
← اختبر الإرسال
```

---

## 13. المرحلة الحادية عشرة — الرأس والتذييل (Header & Footer)

### الخطوة 13.1 — الشعار (Logo)

WordPress يدعم Custom Logo بشكل أصيل. استخدم هذا الكود في `header.php`:

```php
// احذف الكود الثابت الحالي واستبدله بـ:
<?php if ( has_custom_logo() ) : ?>
  <?php the_custom_logo(); ?>
<?php else : ?>
  <a href="<?php echo esc_url( home_url('/') ); ?>">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo.png' ); ?>"
         alt="<?php bloginfo('name'); ?>"
         class="h-12 w-auto object-contain">
  </a>
<?php endif; ?>
```

**رفع الشعار:**
```
لوحة التحكم ← المظهر ← تخصيص ← هوية الموقع ← شعار الموقع ← رفع صورة
```

### الخطوة 13.2 — قائمة التنقل

القوائم مسجلة مسبقاً في `functions.php`. المدير يديرها من:
```
لوحة التحكم ← المظهر ← القوائم
← أنشئ قائمة ← أضف روابط ← اختر موقعها (القائمة الرئيسية / قائمة التذييل)
```

### الخطوة 13.3 — رقم واتساب وبيانات التواصل في header.php

```php
<?php $wa = get_field('site_whatsapp', 'option') ?: '966500000000'; ?>

<a href="https://wa.me/<?php echo esc_html($wa); ?>" class="wa-cta ...">
  ...
</a>
```

### الخطوة 13.4 — تعديل footer.php

```php
<?php
$wa       = get_field('site_whatsapp', 'option') ?: '966500000000';
$phone    = get_field('site_phone', 'option')    ?: '+966 50 000 0000';
$email    = get_field('site_email', 'option')    ?: 'info@aman-almyah.com';
$address  = get_field('site_address', 'option')  ?: 'المملكة العربية السعودية';
$twitter  = get_field('site_twitter', 'option')  ?: '#';
$instagram= get_field('site_instagram', 'option') ?: '#';

$pay_img  = get_field('payment_methods_image', 'option');
$pay_url  = $pay_img ? $pay_img['url'] : get_template_directory_uri() . '/assets/images/payment-methods.png';
?>

<!-- في جزء معلومات التواصل -->
<span dir="ltr"><?php echo esc_html($phone); ?></span>
<span><?php echo esc_html($email); ?></span>
<span><?php echo esc_html($address); ?></span>
<a href="https://wa.me/<?php echo esc_html($wa); ?>">ابدأ المحادثة</a>

<!-- روابط السوشيال ميديا -->
<a href="<?php echo esc_url($twitter); ?>" class="footer-social-btn" aria-label="تويتر">...</a>
<a href="<?php echo esc_url($instagram); ?>" class="footer-social-btn" aria-label="إنستغرام">...</a>

<!-- شريط الحقوق -->
<img src="<?php echo esc_url($pay_url); ?>" alt="طرق الدفع المتاحة">
```

---

## 14. المرحلة الثانية عشرة — البانرات الفاصلة (Section Banners)

### الخطوة 14.1 — إضافة حقول البانرات في ACF

```
اسم المجموعة: بانرات الفواصل
Location: Page == الصفحة الرئيسية
```

**الحقول لكل بانر (×5 بانرات):**

| اسم الحقل | النوع | التسمية |
|---|---|---|
| `banner1_image_desktop` | Image | البانر الأول — ديسكتوب |
| `banner1_image_mobile` | Image | البانر الأول — جوال |
| `banner1_alt` | Text | النص البديل |
| ... تكرار لـ banner2 حتى banner5 | | |

### الخطوة 14.2 — دالة مساعدة للبانر في functions.php

```php
// دالة مساعدة — أضف في functions.php
function et_section_banner( string $desktop_field, string $mobile_field, string $alt_field = '' ): void {
    $desktop = get_field( $desktop_field );
    $mobile  = get_field( $mobile_field );
    $alt     = $alt_field ? get_field( $alt_field ) : '';

    if ( ! $desktop && ! $mobile ) return;

    $desktop_url = $desktop ? $desktop['url'] : ( $mobile ? $mobile['url'] : '' );
    $mobile_url  = $mobile  ? $mobile['url']  : $desktop_url;

    echo '<div class="section-banner reveal">';
    echo '<picture>';
    echo '<source media="(max-width: 767px)" srcset="' . esc_url($mobile_url) . '">';
    echo '<img src="' . esc_url($desktop_url) . '" alt="' . esc_attr($alt) . '" loading="lazy" class="section-banner__img">';
    echo '</picture>';
    echo '</div>';
}
```

### الخطوة 14.3 — استخدام الدالة في index.php

```php
<!-- بدلاً من الكود الثابت -->
<?php et_section_banner('banner1_image_desktop', 'banner1_image_mobile', 'banner1_alt'); ?>
```

---

## 15. المرحلة الثالثة عشرة — ربط كل شيء في index.php

### الخطوة 15.1 — تنظيم استدعاء الحقول في أعلى الملف

من الممارسات الاحترافية تجميع استدعاءات ACF في أعلى `index.php` في قسم PHP واحد قبل `get_header()` أو مباشرة بعده:

```php
<?php
get_header();

// ── جلب بيانات إعدادات الموقع ──
$wa_number = get_field('site_whatsapp', 'option') ?: '966500000000';
$site_phone = get_field('site_phone', 'option') ?: '+966 50 000 0000';

// ── جلب بيانات الهيرو ──
$hero_badge  = get_field('hero_badge_text')     ?: 'حلول هندسية متخصصة';
$hero_line1  = get_field('hero_headline_line1') ?: 'حلول هندسية دقيقة...';
// ... إلخ

// ── استعلامات Custom Post Types ──
$services_query = new WP_Query([
    'post_type' => 'service', 'posts_per_page' => -1,
    'orderby' => 'menu_order', 'order' => 'ASC',
]);

$faq_query = new WP_Query([
    'post_type' => 'faq', 'posts_per_page' => -1,
    'orderby' => 'menu_order', 'order' => 'ASC',
]);

$testi_query = new WP_Query([
    'post_type' => 'testimonial', 'posts_per_page' => -1,
    'orderby' => 'menu_order', 'order' => 'ASC',
]);
?>
```

---

## 16. المرحلة الرابعة عشرة — SEO والميتاداتا

### الخطوة 16.1 — تثبيت Yoast SEO أو Rank Math

```
لوحة التحكم ← الإضافات ← أضف جديد ← Rank Math SEO ← تثبيت
```

### الخطوة 16.2 — إضافة حقول SEO لصفحة الإعدادات (اختياري)

```
اسم المجموعة: SEO الصفحة الرئيسية
```

| الحقل | النوع |
|---|---|
| `meta_title` | Text |
| `meta_description` | Textarea |
| `og_image` | Image |

```php
// في functions.php — إضافة الميتاداتا
add_action('wp_head', function() {
    if ( ! is_front_page() ) return;

    $meta_title = get_field('meta_title') ?: get_bloginfo('name') . ' — كشف تسريبات المياه والعزل';
    $meta_desc  = get_field('meta_description') ?: 'أمان الميه — متخصصون في كشف تسريبات المياه والعزل الحراري والمائي في المملكة العربية السعودية';
    $og_img     = get_field('og_image');
    $og_img_url = $og_img ? $og_img['url'] : get_template_directory_uri() . '/assets/images/main-hero-image.png';

    echo '<meta name="description" content="' . esc_attr($meta_desc) . '">';
    echo '<meta property="og:title" content="' . esc_attr($meta_title) . '">';
    echo '<meta property="og:description" content="' . esc_attr($meta_desc) . '">';
    echo '<meta property="og:image" content="' . esc_url($og_img_url) . '">';
    echo '<meta property="og:type" content="website">';
    echo '<meta property="og:locale" content="ar_SA">';
});
```

---

## 17. جدول المحتوى الكامل — ما يتحكم فيه المدير

بعد اكتمال التطبيق، يستطيع مدير الموقع التحكم في كل التالي من لوحة التحكم:

### من قسم "إعدادات الموقع"
| المحتوى | المكان في لوحة التحكم |
|---|---|
| رقم واتساب | إعدادات الموقع ← التواصل |
| رقم الهاتف | إعدادات الموقع ← التواصل |
| البريد الإلكتروني | إعدادات الموقع ← التواصل |
| العنوان | إعدادات الموقع ← التواصل |
| روابط السوشيال ميديا | إعدادات الموقع ← السوشيال ميديا |
| صورة طرق الدفع | إعدادات الموقع |
| الشعار | المظهر ← تخصيص ← هوية الموقع |
| قوائم التنقل | المظهر ← القوائم |

### من "الصفحة الرئيسية ← Custom Fields"
| المحتوى | القسم |
|---|---|
| شارة الهيرو + العنوان + النص | الهيرو |
| صورتا الهيرو (جوال وديسكتوب) | الهيرو |
| نصوص أزرار الهيرو ورواباطها | الهيرو |
| عنوان "من نحن" + الفقرات الأربع | من نحن |
| صورة العامل وصورة الخلفية | من نحن |
| عنوان "لماذا نحن" + 5 بنود | لماذا نحن |
| عنوان النتائج + الوصف | النتائج |
| 3 إحصاءات (الأرقام، اللواحق، الأوصاف) | النتائج |
| صورة قسم النتائج | النتائج |
| 5 بانرات الفواصل (ديسكتوب + جوال) | البانرات |
| نص قسم التواصل | التواصل |
| ميتاداتا SEO | SEO |

### من أنواع المحتوى المخصصة (CPTs)
| المحتوى | مكان الإدارة |
|---|---|
| إضافة خدمة / تعديلها / حذفها | الخدمات ← قائمة الخدمات |
| ترتيب الخدمات | الخدمات ← "خصائص الصفحة" ← الترتيب |
| صورة كل خدمة | الخدمات ← الصورة البارزة |
| إضافة سؤال جديد / تعديله | الأسئلة الشائعة |
| ترتيب الأسئلة | الأسئلة الشائعة ← الترتيب |
| إضافة تقييم عميل | تقييمات العملاء |
| اسم العميل + الخدمة + التقييم + النص | تقييمات العملاء |

---

## 18. أفضل الممارسات والتحذيرات

### القيم الافتراضية (Fallbacks) — إلزامية
```php
// دائماً استخدم ?: للحقول النصية
$heading = get_field('hero_headline_line1') ?: 'العنوان الافتراضي';

// وللصور:
$img = get_field('hero_image_desktop');
$url = $img ? $img['url'] : get_template_directory_uri() . '/assets/images/main-hero-image.png';
```
الصفحة يجب أن تبدو طبيعية حتى لو لم يملأ المدير أي حقل.

### الأمان — لا تتجاهل التعقيم
```php
echo esc_html( $text );        // للنصوص العادية
echo esc_url( $url );          // للروابط والصور
echo esc_attr( $attribute );   // لخصائص HTML
echo wp_kses_post( $content ); // للمحتوى من المحرر (يسمح بـ HTML آمن)
// لا تستخدم echo مباشرة بدون أي من هذه الدوال
```

### الأداء — لا تكثر من استعلامات قاعدة البيانات
```php
// ✅ صحيح — استعلام واحد لكل CPT
$services = new WP_Query([...]);

// ❌ خطأ — استدعاء get_field() داخل حلقة while لحقول تخص الصفحة
// (بدلاً من ذلك، اجلبها قبل الحلقة)
```

### ترتيب التطبيق الموصى به
1. ✅ تثبيت ACF أولاً وتأكيد عمله
2. ✅ إنشاء صفحة الإعدادات العامة أولاً (رقم واتساب)
3. ✅ اختبار استدعاء `get_field('site_whatsapp', 'option')` في header.php
4. ✅ تحويل الهيرو — الأكثر وضوحاً ويشمل الصور والنصوص
5. ✅ إنشاء CPTs (خدمات، أسئلة، تقييمات) وأضف بيانات تجريبية
6. ✅ تحويل الأقسام الأخرى تباعاً مع اختبار كل قسم
7. ✅ ربط نموذج التواصل وإعداد الإيميل
8. ✅ اختبار كامل شامل على جوال وديسكتوب

### ماذا لا تغير أبداً
- لا تمس CSS classes المرتبطة بـ JavaScript (مثل `.hero-anim`, `.why-col`, `.testi-card`, `.service-card`)
- لا تغير HTML structure داخل cards وسيكتفي بتغيير المحتوى النصي والصور فقط
- لا تزيل `data-count` و`data-suffix` من إحصاءات النتائج — JavaScript يعتمد عليهما للرسوم المتحركة

### إضافات مدفوعة تستحق النظر (مستقبلاً)
| الإضافة | الفائدة |
|---|---|
| **ACF Pro** | حقل Repeater لبنود "لماذا نحن" والبانرات بشكل أكثر مرونة |
| **WPForms Pro** | منطق شرطي للنموذج، ملفات مرفقة، تكامل CRM |
| **Gravity Forms** | نماذج متقدمة لطلب عروض أسعار |

---

> **الخلاصة**: بعد تطبيق هذا الدليل، يستطيع مدير الموقع تعديل كل كلمة وصورة ورقم على الموقع من لوحة التحكم في أقل من 30 ثانية لكل تعديل — دون لمس ملف PHP واحد، مع الحفاظ التام على كل تأثير بصري وحركي في الموقع.
