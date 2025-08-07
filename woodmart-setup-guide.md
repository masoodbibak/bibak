# 🎯 راهنمای کامل نصب Elementza در WoodMart

## 📋 مرحله 1: آماده‌سازی فایل‌ها

### 1. ایجاد Child Theme
```bash
# در پوشه wp-content/themes/ ایجاد کنید:
woodmart-child/
├── style.css
├── functions.php
├── assets/
│   ├── css/
│   │   └── elementza-custom.css
│   ├── js/
│   │   └── elementza-custom.js
│   └── images/
│       ├── logo.png
│       ├── logo-white.png
│       ├── course-1.jpg
│       ├── course-2.jpg
│       └── course-3.jpg
└── README.md
```

### 2. فایل style.css
```css
/*
Theme Name: WoodMart Child - Elementza
Description: Child theme for WoodMart with Elementza customizations
Author: Your Name
Template: woodmart
Version: 1.0.0
*/
```

### 3. فایل functions.php
```php
<?php
// WoodMart Child Theme Functions

// Enqueue parent and child theme styles
function elementza_enqueue_styles() {
    // Parent theme style
    wp_enqueue_style('woodmart-style', get_template_directory_uri() . '/style.css');
    
    // Child theme style
    wp_enqueue_style('elementza-custom', get_stylesheet_directory_uri() . '/assets/css/elementza-custom.css');
    
    // Custom JavaScript
    wp_enqueue_script('elementza-custom', get_stylesheet_directory_uri() . '/assets/js/elementza-custom.js', array('jquery'), '1.0', true);
    
    // Google Fonts
    wp_enqueue_style('elementza-fonts', 'https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&family=Montserrat:wght@400;600;700&display=swap');
}
add_action('wp_enqueue_scripts', 'elementza_enqueue_styles');

// Add custom header elements
function elementza_custom_header_elements() {
    // Add login button
    add_action('whb_header_actions', 'elementza_login_button');
    
    // Add cart icon
    add_action('whb_header_actions', 'elementza_cart_icon');
}
add_action('init', 'elementza_custom_header_elements');

function elementza_login_button() {
    echo '<a href="' . wp_login_url() . '" class="whb-login-btn">ورود</a>';
}

function elementza_cart_icon() {
    if (class_exists('WooCommerce')) {
        echo '<a href="' . wc_get_cart_url() . '" class="whb-cart-icon">
                <i class="fas fa-shopping-cart"></i>
                <span class="whb-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>
              </a>';
    }
}

// Add custom CSS variables
function elementza_add_custom_css() {
    echo '<style>
        :root {
            --elementza-primary: #0e96f7;
            --elementza-secondary: #007acc;
            --elementza-gradient-start: #667eea;
            --elementza-gradient-end: #764ba2;
        }
    </style>';
}
add_action('wp_head', 'elementza_add_custom_css');
?>
```

## 📋 مرحله 2: نصب در WordPress

### 1. آپلود Child Theme
```
WordPress Admin → Appearance → Themes → Add New → Upload Theme
```
فایل ZIP پوشه `woodmart-child` را آپلود کنید

### 2. فعال‌سازی Child Theme
- روی "Activate" کلیک کنید
- تنظیمات اولیه را انجام دهید

## 📋 مرحله 3: تنظیم Header Builder

### 1. دسترسی به Header Builder
```
WordPress Admin → WoodMart → Header Builder
```

### 2. تنظیم ساختار Header
```
Logo (Right) → Navigation (Center) → Actions (Left)
```

### 3. تنظیم Actions
- Login Button
- Cart Icon
- Search Icon (اختیاری)

## 📋 مرحله 4: ایجاد صفحات با Elementor

### 1. نصب Elementor
```
Plugins → Add New → Search "Elementor" → Install → Activate
```

### 2. ایجاد صفحه اصلی
```
Pages → Add New → "صفحه اصلی" → Edit with Elementor
```

### 3. اضافه کردن بخش‌ها

#### Hero Section:
```html
<!-- Hero Section -->
<section class="elementza-hero">
    <div class="container">
        <div class="hero-content">
            <h1>شروع خلق هنر</h1>
            <h2>دیگر نگران ابزارها نباشید</h2>
            <p>آموزش تخصصی مدلینگ سه‌بعدی با تمرکز بر topology و workflow تولیدی</p>
            <a href="#courses" class="elementza-btn-primary">شروع کنید</a>
        </div>
    </div>
</section>
```

#### Trial Section:
```html
<!-- Trial Section -->
<section class="elementza-trial">
    <div class="container">
        <div class="trial-content">
            <h3>نمی‌دانید از کجا شروع کنید؟</h3>
            <p>با یک دوره رایگان شروع کنید و تکنیک‌های ساده topology را یاد بگیرید</p>
            <form class="elementza-trial-form">
                <input type="text" placeholder="نام" required>
                <input type="email" placeholder="ایمیل" required>
                <button type="submit" class="elementza-btn-primary">شروع رایگان</button>
            </form>
        </div>
    </div>
</section>
```

#### Courses Section:
```html
<!-- Courses Section -->
<section class="elementza-courses" id="courses">
    <div class="container">
        <div class="elementza-section-header">
            <h2>مدل‌سازی هوشمند، مجسمه‌سازی تمیز</h2>
            <p>کمتر وقت صرف تعمیر کنید، بیشتر وقت خلق کنید</p>
        </div>
        
        <div class="elementza-courses-grid">
            <!-- Course 1 -->
            <div class="elementza-course-card">
                <div class="elementza-course-image">
                    <img src="assets/images/course-1.jpg" alt="3D Modeling Masterclass">
                </div>
                <div class="elementza-course-content">
                    <h3>3D Modeling Masterclass</h3>
                    <p class="elementza-course-level">مبتدی - پیشرفته</p>
                    <div class="elementza-course-price">229€</div>
                    <a href="#" class="elementza-btn-secondary">بیشتر بدانید</a>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="elementza-course-card">
                <div class="elementza-course-image">
                    <img src="assets/images/course-2.jpg" alt="Intro to Hard Surface in Zbrush">
                </div>
                <div class="elementza-course-content">
                    <h3>آموزش Hard Surface در ZBrush</h3>
                    <p class="elementza-course-level">مبتدی - متوسط</p>
                    <div class="elementza-course-price">119€</div>
                    <a href="#" class="elementza-btn-secondary">بیشتر بدانید</a>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="elementza-course-card">
                <div class="elementza-course-image">
                    <img src="assets/images/course-3.jpg" alt="Mastering 3D Modeling">
                </div>
                <div class="elementza-course-content">
                    <h3>تسلط بر مدلینگ سه‌بعدی</h3>
                    <p class="elementza-course-level">مبتدی - متوسط</p>
                    <div class="elementza-course-price">69€</div>
                    <a href="#" class="elementza-btn-secondary">بیشتر بدانید</a>
                </div>
            </div>
        </div>
    </div>
</section>
```

#### Philosophy Section:
```html
<!-- Philosophy Section -->
<section class="elementza-philosophy">
    <div class="container">
        <div class="philosophy-content">
            <h2>فلسفه</h2>
            <div class="elementza-philosophy-grid">
                <div class="elementza-philosophy-item">
                    <div class="elementza-philosophy-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h3>فرآیند خلاقانه</h3>
                    <p>اگر به فرآیند خلاقانه و ذهنیت هنری علاقه‌مند هستید،</p>
                </div>
                <div class="elementza-philosophy-item">
                    <div class="elementza-philosophy-icon">
                        <i class="fas fa-pen-fancy"></i>
                    </div>
                    <h3>بلاگ آموزشی</h3>
                    <p>می‌توانید بلاگ ما را دنبال کنید</p>
                </div>
            </div>
        </div>
    </div>
</section>
```

## 📋 مرحله 5: تنظیم WooCommerce

### 1. نصب WooCommerce
```
Plugins → Add New → WooCommerce → Install → Activate
```

### 2. ایجاد محصولات
```
Products → Add New
```
برای هر دوره یک محصول ایجاد کنید:
- **3D Modeling Masterclass** - 229€
- **Intro to Hard Surface in Zbrush** - 119€
- **Mastering 3D Modeling** - 69€

### 3. تنظیم تصاویر محصولات
- تصاویر دوره‌ها را آپلود کنید
- Alt text مناسب اضافه کنید

## 📋 مرحله 6: تنظیمات نهایی

### 1. SEO
```
Plugins → Add New → Yoast SEO → Install → Activate
```

### 2. Performance
```
Plugins → Add New → WP Rocket (یا LiteSpeed Cache)
```

### 3. Security
```
Plugins → Add New → Wordfence Security
```

## 📋 مرحله 7: شخصی‌سازی

### تغییر رنگ‌ها
در فایل `assets/css/elementza-custom.css`:
```css
:root {
    --elementza-primary: #0e96f7;
    --elementza-secondary: #007acc;
    --elementza-gradient-start: #667eea;
    --elementza-gradient-end: #764ba2;
}
```

### تغییر فونت‌ها
```css
body {
    font-family: 'Your-Font', sans-serif;
}
```

### تغییر محتوا
- در Elementor Editor
- در WordPress Admin → Pages
- در فایل‌های PHP

## 🔧 عیب‌یابی

### مشکلات رایج:

1. **فونت‌ها لود نمی‌شوند:**
   - بررسی اتصال اینترنت
   - اضافه کردن فونت‌ها به صورت local

2. **CSS اعمال نمی‌شود:**
   - پاک کردن کش
   - بررسی مسیر فایل‌ها

3. **JavaScript کار نمی‌کند:**
   - بررسی Console در Developer Tools
   - بررسی تداخل با سایر افزونه‌ها

## 📱 تست ریسپانسیو

### Desktop (1200px+)
- تمام قابلیت‌ها فعال
- Grid layouts
- Hover effects

### Tablet (768px - 1199px)
- منوی responsive
- Grid به single column
- Font sizes کوچک‌تر

### Mobile (320px - 767px)
- Hamburger menu
- Stacked layouts
- Touch-friendly buttons

## 🚀 بهینه‌سازی نهایی

### Performance
- Minify CSS/JS
- Optimize images
- Enable caching
- Use CDN

### SEO
- XML Sitemap
- Robots.txt
- Schema markup
- Meta descriptions

### Security
- SSL certificate
- Regular backups
- Security plugins
- Strong passwords

## 📞 پشتیبانی

برای مشکلات:
- **WordPress Support:** wordpress.org/support
- **WoodMart Support:** xtemos.com/support
- **Elementor Support:** elementor.com/support

---

**نکته:** این راهنما برای نسخه‌های فعلی نرم‌افزارها نوشته شده است. برای نسخه‌های جدید ممکن است تغییراتی وجود داشته باشد.