# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

---

# Engineering Theme — Complete Project Reference

> **Purpose of this file**: Drop into any new session — AI or human — and have a complete, accurate picture of this project. No guessing, no re-exploring. Read this first, then work.

---

## 1. Project Identity

| Field | Value |
|---|---|
| **Site name** | أمان الميه (Aman Almyah) |
| **Business** | Engineering company — water leak detection, thermal/waterproof insulation, roofing |
| **Market** | Saudi Arabia — Arabic RTL, audience is residential/commercial/industrial property owners |
| **Environment** | Local by Flywheel (`http://aman-almyah.local`) |
| **WordPress** | 6.9+ |
| **PHP** | 8.0+ |
| **Theme slug** | `engineering-theme` |
| **Theme path** | `app/public/wp-content/themes/engineering-theme/` |
| **DB** | MySQL, db: `local`, user/pass: `root`/`root` (local only) |

---

## 2. What Exists Right Now

### Files
```
engineering-theme/
├── functions.php          # Theme bootstrap — supports, menus, enqueue
├── header.php             # Sticky navbar, Tailwind config, Google Fonts
├── footer.php             # 3-column footer, copyright
├── index.php              # ALL page content: hero + banner + about
├── style.css              # CSS custom properties + base resets only
├── CLAUDE.md              # ← this file
└── assets/
    └── images/
        ├── logo.png               # Brand logo (header + footer)
        ├── main-hero-image.png    # Hero image — DESKTOP (902×732, 497 KB)
        ├── main-hero-mobile.png   # Hero image — MOBILE (square crop, 401 KB)
        ├── hero-shape.png         # Decorative dot grid — desktop hero bg
        ├── banner-desktop.jpg     # Full-width banner section (76 KB)
        ├── about-bg.png           # About section background — dark navy wave (449 KB)
        ├── about-worker.jpg       # About section worker photo (460×550, 127 KB)
        ├── results-section.png    # Results & Trust section image
        ├── service-leaks.jpg      # Services card — water leak detection (referenced, not yet added)
        └── service-renovation.jpg # Services card — renovation/maintenance (referenced, not yet added)
```

### No build system
There is **no** `package.json`, `composer.json`, npm, webpack, or any build pipeline. Edit PHP/CSS/JS files directly and refresh. Tailwind is loaded via CDN Play script.

---

## 3. Design System

### Brand Colors

| Token | Hex | Tailwind class | Usage |
|---|---|---|---|
| Primary | `#0651A2` | `primary` | Buttons, links, accents, stats highlight |
| Dark | `#1E2D3D` | `dark` | Headlines, deep backgrounds |
| Charcoal | `#2C3E50` | `charcoal` | Body text, nav links |

**IMPORTANT**: The primary color is defined in **three places** — keep them in sync:
1. `style.css` → `--color-primary: #0651a2`
2. `header.php` → Tailwind config `primary: '#0651A2'`
3. Hardcoded in `index.php` → `#0651A2` and `rgba(6,81,162,…)`

When changing the primary color, update all three. The rgba equivalent of `#0651A2` is `rgb(6, 81, 162)`.

### Typography

- **Font**: Tajawal (Google Fonts) — weights 200–900
- **Font stack**: `'Tajawal', sans-serif`
- **CSS var**: `--font-main` in style.css
- **Tailwind**: `font-tajawal` class
- **Language**: Arabic, RTL — `dir="rtl"` on `<html>`
- **Body class**: `rtl font-tajawal` added via `et_body_classes()`

### Spacing & Layout

- **Header height**: `80px` → CSS var `--header-height`
- **Max content width**: `max-w-7xl` (Tailwind = 80rem / 1280px)
- **Breakpoints** (Tailwind defaults):
  - `sm`: 640px — WhatsApp button visibility
  - `md`: 768px — desktop nav appears, hamburger hides
  - `lg`: 1024px — hero layout switches desktop/mobile
  - `xl`: 1280px — larger headline sizes

### Shadows & Borders
- Buttons: `rounded-full` (pills) on desktop, `rounded-2xl` on mobile CTAs
- Images: `rounded-2xl shadow-2xl`
- Cards/Dropdowns: `rounded-xl`

---

## 4. Architecture: How the Theme Works

### WordPress integration points

```php
// functions.php hooks:
add_action('after_setup_theme', 'et_setup');      // supports + menus
add_action('wp_enqueue_scripts', 'et_assets');    // enqueue style.css
add_filter('body_class', 'et_body_classes');      // adds rtl + font-tajawal

// Registered nav menu locations:
'primary' => 'القائمة الرئيسية'   // desktop + mobile drawer
'footer'  => 'قائمة التذييل'       // footer links
```

### Template loading
WordPress loads `index.php` for all pages (no page templates yet). `get_header()` and `get_footer()` include `header.php` and `footer.php`. All page content is hardcoded in `index.php` — no dynamic WP queries yet.

### Tailwind is loaded via CDN
`header.php` loads `https://cdn.tailwindcss.com` and configures it inline:
```javascript
tailwind.config = {
  theme: {
    extend: {
      colors: { primary: '#0651A2', dark: '#1E2D3D', charcoal: '#2C3E50' },
      fontFamily: { tajawal: ['Tajawal', 'sans-serif'] },
    },
  },
};
```
Custom colors (`text-primary`, `bg-primary`, `border-primary`, etc.) only work because of this config. Do not remove it.

---

## 5. Page Sections (index.php)

### Section 1 — Hero (`#hero`)

**Desktop layout** (≥1024px):
- `flex-row-reverse` splits screen: image panel RIGHT (45% width), content panel LEFT (flex-1)
- Image: `main-hero-image.png`, absolute fill, `object-right-top`, parallax on scroll
- Content: white bg, dot pattern decor, badge + H1 + body + two CTA buttons + stats row

**Mobile layout** (<1024px):
- Stacked block flow: image on top, white content card below
- Image: `main-hero-mobile.png` via `<picture>` source, `height: auto`, `object-position: center 30%`, no border-radius
- Content card: white background, `padding: 24px 20px 28px`, badge + H1 + body + CTAs + stats strip

**Key CSS classes** (defined in the `<style>` block inside index.php):

| Class | Purpose |
|---|---|
| `.hero-anim` | Desktop entrance — starts `opacity:0`, animate to visible via JS |
| `.hero-anim-img` | Image entrance — scale-in animation |
| `.hero-mob-item` | Mobile content items — `opacity:1` with staggered `hero-fade-up` |
| `.hero-accent` | Headline span — animated underline shimmer via `::after` |
| `.hero-desktop-panel` | `hidden lg:flex` — desktop content panel |
| `.hero-mobile-panel` | `hidden` → `display:block` via media query — mobile card wrapper |
| `.hero-mob-card` | White card padding container |
| `.hero-stats-strip` | Stats row — `#f4f7fb` bg with `#e4eaf3` border |
| `.hero-img-wrap` | Image container — different sizing on mobile vs desktop |
| `.hero-picture` | `<picture>` element — `position:static` on mobile |
| `.hero-img-pos` | `<img>` — `position:static` on mobile for natural height |
| `.hero-shape-decor` | Dot pattern — fade-in delayed |
| `.btn-primary-hero` | Solid primary CTA — shimmer sweep + lift on hover, ink ripple on click |
| `.btn-outline-hero` | Outline CTA — fill wipe + magnetic pull + spotlight tracking on hover |
| `.reveal` | Generic scroll-reveal — add to any below-fold element |

**Animations** (keyframes in index.php `<style>`):

| Name | Effect | Used on |
|---|---|---|
| `hero-fade-up` | `translateY(22px)→0, opacity 0→1` | All `.hero-anim`, `.hero-mob-item` |
| `hero-scale-in` | `scale(1.05)→1, opacity 0→1` | Image, ripple |
| `hero-fade-in` | `opacity 0→1` | Decorative shape, ripple |
| `shimmer-line` | `width 0→60px` | Headline underline accent |
| `pulse-ring` | `scale 1→1.9, opacity→0` | Previously on outline button |

**JavaScript behaviors** (inline `<script>` after `</section><!-- /hero -->`):

1. **`triggerHeroAnims()`** — immediately adds `.is-visible` to all `.hero-anim`, `.hero-anim-img`, `.hero-accent` on DOMContentLoaded. Do not use IntersectionObserver for above-fold hero elements — it misfires.
2. **`revealIO`** — IntersectionObserver (threshold 0.08) watching `.reveal` elements below hero. Adds `.revealed` class.
3. **`animateCount(el)`** — ease-out-cubic counter from 0 to `data-count` value over 1400ms. Triggered by its own IO observer (threshold 0.4). Elements need `data-count="500"` and `data-suffix="+"`.
4. **Desktop parallax** — scroll listener moves `#hero-img` at `scrollY * 0.12`. Only runs on `innerWidth >= 1024`. Skipped if `prefers-reduced-motion`.
5. **Ink ripple** — `pointerdown` on `.btn-primary-hero` spawns a white circle at click coordinates, scales out, auto-removes after 600ms.
6. **Magnetic pull + spotlight** — `mousemove` on `.btn-outline-hero` nudges the button toward cursor (6px max) and sets `--mx`/`--my` CSS vars for the radial spotlight. Reset on `mouseleave`.

---

### Section 2 — Banner (`#banner`)

Full-width image section using `<picture>`:
```html
<section id="banner" class="w-full mt-20 mb-32">
```
- Image: `banner-desktop.jpg`
- Same image for both mobile and desktop (no separate mobile asset)
- Lazy loaded

---

### Section 3 — About (`#about`)

```html
<section id="about" class="bg-cover bg-no-repeat bg-top mt-20 mb-32"
  style="background-image: url('.../about-bg.png');">
```
- Background: `about-bg.png` — dark navy wave graphic provides all color/background
- Layout: `grid grid-cols-1 lg:grid-cols-2 gap-12 items-center`
- **RTL grid**: first DOM child renders visually RIGHT, second renders LEFT — text first (right), image second (left)
- Text column: white headline "من نحن", 4 body paragraphs in `text-gray-200`, two CTA buttons
- Image column: `about-worker.jpg`, `rounded-2xl shadow-2xl`

---

### Section 4 — Why Choose Us (`#why-us`)

```html
<section id="why-us">
```
- Heading: "ما يجعلنا الخيار الأفضل"
- Layout: 5-column grid (`.why-grid`) — all columns equal width, `direction: rtl`
- White card container with border + box-shadow, `border-radius: 28px`
- 5 value pillars, each (`.why-col`): SVG icon (54×54, dark navy `#04366C`) + title + description text
  1. الجودة (Quality)
  2. الابتكار (Innovation)
  3. الاستدامة (Sustainability)
  4. الشفافية (Transparency)
  5. المصداقية (Credibility)
- Entrance animation: columns start `opacity:0`, staggered via CSS `transition-delay` on `.in-view` class added by IntersectionObserver
- **Mobile**: 2-column grid on small screens, single column fallback

---

### Section 5 — Services (`#services`)

```html
<section id="services">
```
- Heading: "خدماتنا"
- Layout: `.services-grid` — 3 equal cards side by side
- Each `.service-card` has:
  - `.service-card__clip`: clipping container for image + overlay
  - `.service-card__img`: photo, lazy-loaded
  - `.service-card__overlay`: dark overlay on hover
  - `.service-card__bottom`: wave SVG + title (white text)
  - Wave SVG shape (`#5C6369` fill) creates a curved title bar at card bottom
- 3 services: كشف وصيانة تسريبات المياه, أعمال العوازل, ترميم وصيانة المنازل
- **Images used**: `service-leaks.jpg`, `about-worker.jpg` (placeholder), `service-renovation.jpg`
  - Note: `service-leaks.jpg` and `service-renovation.jpg` are **not yet in assets/images/** — need to be added
- **JS behaviors**: IntersectionObserver adds `.in-view` class per card; 3-D tilt + glow on `mousemove` (`perspective(800px) rotateX/Y`), reset on `mouseleave`

---

### Section 6 — Results & Trust (`#results`)

```html
<section id="results">
```
- Layout: 2-column grid (`.results-inner`), `max-width: 1300px`, RTL — text column RIGHT, image LEFT
- **Image column** (`.results-img-wrap`): `results-section.png`, `640×520`, overlay div for subtle effect
- **Text column** (`.results-text`):
  - Heading: "نتائج ملموسة... وثقة مستمرة"
  - Body paragraph describing track record
  - 3 stat counters using `data-count` / `data-suffix` (same JS mechanism as hero):
    - 24 ساعة — response time
    - 980+ — clients served
    - 1250+ — completed projects
  - Two CTAs: `.results-btn-primary` (→ `#services`) and `.results-btn-outline` (→ WhatsApp)
- **JS**: IntersectionObserver on `#results` adds `.in-view` class — triggers staggered CSS transitions on `.results-heading`, `.results-desc`, `.results-stats`, `.results-btns`, `.results-img-wrap`. Animated counters use the same `animateCount()` function from the hero section.

---

## 6. RTL Rules — Always Follow These

This is an Arabic RTL site. These rules are non-negotiable:

1. **`dir="rtl"`** on `<html>` — never remove
2. **`text-right`** is the default for all content blocks
3. **Flex row = `flex-row-reverse`** for side-by-side layouts where the visual right should be DOM first
4. **Gradients**: use `to left` (not `to right`) for RTL-natural direction
5. **`transform-origin`**: use `right center` for RTL wipes, flip to `left center` on hover
6. **Phone numbers**: wrap in `dir="ltr"` to prevent digit reversal
7. **Tailwind responsive prefixes**: `lg:flex-row-reverse` is the hero layout trigger — do not change
8. **Arabic font**: Tajawal must always be loaded. Never use a Latin-only font as primary.

---

## 7. Mobile Hero — Critical Rules

The mobile hero has been through multiple iterations. The current correct approach:

- **Layout**: Block stacked — image top, white card below. NOT full-bleed overlay.
- **Image**: `<picture>` with `<source media="(max-width: 1023px)">` serving `main-hero-mobile.png`
- **Image height**: `height: auto` — drives natural height from the image's intrinsic dimensions
- **Image position**: `object-position: center 30%` to show workers clearly
- **NO border-radius on image**
- **NO gradient overlays on mobile**
- **Content card**: pure white, dark text — badge + H1 + body + CTAs + stats
- **Stats strip**: light gray `#f4f7fb` background, NOT frosted glass

The CSS media query at `@media (max-width: 1023px)` in index.php overrides the desktop absolute-positioning to make the image and picture elements flow naturally with `position: static`.

**Do NOT reintroduce**:
- `min-h-[100svh]` on mobile hero
- `position: absolute` on the picture/image inside `hero-img-wrap` on mobile
- gradient text overlays on mobile
- `border-radius` on the hero image panel on mobile

---

## 8. Header & Navigation

### Sticky header
- `position: fixed; top: 0; z-index: 50` — always visible
- Height exactly `--header-height: 80px`
- All page sections that need to not be obscured by it use `padding-top: var(--header-height)` or `-mt-10` negative margin technique

### Navigation structure (RTL order, left-to-right in DOM)
```
[WhatsApp CTA + Hamburger]  [Nav links]  [Logo]
      ← visual left             center    visual right →
```
In RTL, DOM order right = visual right, so logo is last in DOM but visually right.

### Mobile menu
- Hamburger (`#mobile-menu-btn`) toggles `#mobile-menu` drawer
- Animated X transformation via inline JS in header.php
- ARIA `aria-expanded` and `aria-hidden` managed correctly

---

## 9. Footer

Three-column grid (`md:grid-cols-3`):
1. **Brand column**: Logo (inverted for dark bg), tagline, social icons (WhatsApp, Twitter, Instagram)
2. **Links column**: `wp_nav_menu()` with `footer` location, fallback hardcoded list
3. **Contact column**: Phone, email, address, WhatsApp CTA button

Footer uses `bg-dark` (`#1E2D3D`) with white text. Logo is CSS-inverted: `filter: brightness(0) invert(1)`.

Copyright bar: dynamic year via `gmdate('Y')`, site name via `bloginfo('name')`.

---

## 10. How to Add New Sections

1. Add the HTML **after `</section><!-- /faq -->` and before `</main>`** in `index.php`
2. For scroll-reveal animation, add class `reveal` to the section or its children
3. Use `max-w-7xl mx-auto px-6` for consistent container width
4. RTL grid: `grid grid-cols-1 lg:grid-cols-2 gap-12`
5. Use Tailwind color classes (`text-primary`, `bg-dark`, etc.) — they work because of the Tailwind config in `header.php`
6. For new image assets: place in `assets/images/`, reference via `<?php echo esc_url(get_template_directory_uri() . '/assets/images/filename.ext'); ?>`

---

## 11. How to Add New Page Templates

1. Create `page-[slug].php` in the theme root (e.g., `page-services.php`)
2. Add the WordPress template header comment:
   ```php
   <?php /* Template Name: Services Page */ ?>
   ```
3. Call `get_header()` and `get_footer()`
4. In WordPress admin: Pages → Add New → set Page Attributes → Template

---

## 12. WhatsApp Number

Current placeholder: `966500000000`

Appears in:
- `header.php` (desktop nav CTA + mobile drawer)
- `index.php` (hero CTAs desktop + about section)
- `footer.php` (brand column + contact column)

To update: search and replace `966500000000` across all four files.

---

## 13. Common Tasks — Quick Reference

### Change primary color
1. `style.css` line 21: `--color-primary: #newcolor`
2. `header.php` Tailwind config: `primary: '#NEWCOLOR'`
3. `index.php`: replace all `#0651A2` and `rgba(6,81,162,…)` with new values

### Add a stat counter
```html
<span data-count="200" data-suffix="+">0</span>
```
The JS in index.php automatically picks up any `[data-count]` element and animates it on scroll.

### Add scroll-reveal to any element
```html
<div class="reveal">...</div>
```
The `revealIO` observer in index.php handles the rest.

### Add a new image to hero (mobile vs desktop)
```html
<picture>
  <source media="(max-width: 1023px)" srcset="<?php echo esc_url(get_template_directory_uri() . '/assets/images/mobile-version.jpg'); ?>">
  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/desktop-version.jpg'); ?>" ...>
</picture>
```

### Enqueue a new JS file
In `functions.php`, inside `et_assets()`:
```php
wp_enqueue_script(
    'engineering-theme-main',
    get_template_directory_uri() . '/assets/js/main.js',
    [],
    wp_get_theme()->get('Version'),
    true  // load in footer
);
```

---

## 14. What Is NOT Built Yet

The following sections are referenced in navigation but have no content or templates:
- `#projects` — Projects/portfolio section
- `#blog` — Blog/articles (no WP posts configured)
- `#waterproofing`, `#insulation`, `#roofing`, `#maintenance` — Service detail sections
- Contact form / actual contact page
- Individual post/page templates (`single.php`, `page.php`, `archive.php`)
- Search results (`search.php`)
- 404 page (`404.php`)

The theme currently uses `index.php` as a catch-all for everything.

### Section 7 — FAQ (`#faq`)

```html
<section id="faq">
```
- Heading: "الأسئلة الشائعة"
- Layout: single column, `max-width: 900px`, white background, generous padding
- **Accordion**: `<ul class="faq-list">` → `<li class="faq-item">` items. Each item has a `<button class="faq-btn">` (question + chevron icon) and a `<div class="faq-answer">` (answer text)
- **Chevron**: custom SVG (`#5C6369`, 21×11px) rotates 180° via CSS when `.is-open` is present
- **Answer transition**: `max-height: 0 → 600px` + `opacity 0 → 1` for smooth open/close. Only one item open at a time (siblings closed on click)
- **Entrance animation**: section adds `.faq-visible` class via IntersectionObserver (threshold 0.08). Heading fades up, then each `.faq-item` staggered by 80ms increments
- **Accessibility**: `aria-expanded` toggled on button, `role="region"` on answer panel, `:focus-visible` outline
- **Hover**: question text transitions to `#0651A2` on hover
- 6 Q&A items covering: leak detection, insulation warranty, payment methods, project duration, service coverage, free inspection

**Do NOT add**: colored card backgrounds, icon bubbles per item, or heavy borders — design is intentionally bare/typographic.

---

**Missing assets** (referenced in code but not yet in `assets/images/`):
- `service-leaks.jpg` — Services section card 1
- `service-renovation.jpg` — Services section card 3

---

## 15. Performance Notes

- Hero image (`main-hero-image.png` at 497 KB) should be converted to WebP in production
- `main-hero-mobile.png` (401 KB) — same
- `about-bg.png` (449 KB) — large PNG, convert to WebP
- Tailwind CDN Play is for development only — in production, replace with a purged Tailwind CSS build
- Google Fonts: preconnect links are in place; consider self-hosting in production for privacy and speed
- No caching plugin configured — Local's FastCGI cache salt is set in wp-config.php (`WP_CACHE_KEY_SALT`)

---

## 16. Debugging

- **XDebug**: available at `http://aman-almyah.local/local-xdebuginfo.php`
- **WP_DEBUG**: currently off — enable in `app/public/wp-config.php` by setting `WP_DEBUG` to `true`
- **WP_ENVIRONMENT_TYPE**: set to `'local'`
- **Email testing**: Mailpit — logs at `logs/mailpit/`
- **Server config**: Nginx via Handlebars `.hbs` templates in `conf/` — managed by Local, do not edit directly
