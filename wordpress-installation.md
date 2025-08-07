# 🚀 راهنمای نصب Elementza در WordPress

## 📋 پیش‌نیازها

### نرم‌افزارهای مورد نیاز:
- WordPress 5.0+
- PHP 7.4+
- MySQL 5.7+
- تم WoodMart
- افزونه Elementor (رایگان یا Pro)

## 🎯 مراحل نصب

### مرحله 1: نصب تم WoodMart

1. **دانلود تم:**
   - به [ThemeForest](https://themeforest.net/item/woodmart-woocommerce-wordpress-theme/20264492) بروید
   - WoodMart را خریداری و دانلود کنید

2. **نصب در WordPress:**
   ```
   WordPress Admin → Appearance → Themes → Add New → Upload Theme
   ```
   فایل ZIP تم را آپلود کنید

3. **فعال‌سازی:**
   - روی "Activate" کلیک کنید
   - تنظیمات اولیه را انجام دهید

### مرحله 2: نصب Elementor

1. **نصب افزونه:**
   ```
   WordPress Admin → Plugins → Add New → Search "Elementor"
   ```

2. **فعال‌سازی:**
   - روی "Install Now" کلیک کنید
   - سپس "Activate" را بزنید

3. **تنظیمات اولیه:**
   - به Elementor → Settings بروید
   - تنظیمات پیش‌فرض را تایید کنید

### مرحله 3: آپلود فایل‌های سفارشی

1. **ایجاد پوشه‌ها:**
   ```bash
   wp-content/themes/woodmart-child/
   ├── assets/
   │   ├── css/
   │   ├── js/
   │   └── images/
   └── functions.php
   ```

2. **آپلود فایل‌ها:**
   - `woodmart-custom.css` را در `assets/css/` قرار دهید
   - `main.js` را در `assets/js/` قرار دهید
   - تصاویر را در `assets/images/` قرار دهید

### مرحله 4: تنظیم Child Theme

1. **ایجاد functions.php:**
   ```php
   <?php
   // WoodMart Child Theme Functions
   
   // Enqueue parent and child theme styles
   function elementza_enqueue_styles() {
       // Parent theme style
       wp_enqueue_style('woodmart-style', get_template_directory_uri() . '/style.css');
       
       // Child theme style
       wp_enqueue_style('elementza-custom', get_stylesheet_directory_uri() . '/assets/css/woodmart-custom.css');
       
       // Custom JavaScript
       wp_enqueue_script('elementza-custom', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
   }
   add_action('wp_enqueue_scripts', 'elementza_enqueue_styles');
   
   // Add custom fonts
   function elementza_add_google_fonts() {
       wp_enqueue_style('elementza-fonts', 'https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700&family=Montserrat:wght@400;600;700&display=swap');
   }
   add_action('wp_enqueue_scripts', 'elementza_add_google_fonts');
   
   // Custom header builder support
   function elementza_header_builder() {
       // Add custom header elements
       add_action('whb_header_builder', 'elementza_custom_header_elements');
   }
   add_action('init', 'elementza_header_builder');
   
   function elementza_custom_header_elements() {
       // Add login button
       add_action('whb_header_actions', 'elementza_login_button');
       
       // Add cart icon
       add_action('whb_header_actions', 'elementza_cart_icon');
   }
   
   function elementza_login_button() {
       echo '<a href="' . wp_login_url() . '" class="whb-login-btn">ورود</a>';
   }
   
   function elementza_cart_icon() {
       echo '<a href="' . wc_get_cart_url() . '" class="whb-cart-icon">
               <i class="fas fa-shopping-cart"></i>
               <span class="whb-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>
             </a>';
   }
   ?>
   ```

2. **ایجاد style.css:**
   ```css
   /*
   Theme Name: WoodMart Child - Elementza
   Description: Child theme for WoodMart with Elementza customizations
   Author: Your Name
   Template: woodmart
   Version: 1.0.0
   */
   ```

### مرحله 5: تنظیم Header Builder

1. **دسترسی به Header Builder:**
   ```
   WordPress Admin → WoodMart → Header Builder
   ```

2. **تنظیم ساختار:**
   ```
   Logo (Right) → Navigation (Center) → Actions (Left)
   ```

3. **تنظیم Actions:**
   - Login Button
   - Cart Icon
   - Search Icon (اختیاری)

### مرحله 6: ایجاد صفحات با Elementor

#### صفحه اصلی (Homepage)

1. **ایجاد صفحه جدید:**
   ```
   Pages → Add New → "صفحه اصلی"
   ```

2. **ویرایش با Elementor:**
   - روی "Edit with Elementor" کلیک کنید

3. **اضافه کردن بخش‌ها:**

   **Hero Section:**
   - Section با Background Gradient
   - Heading: "شروع خلق هنر"
   - Subheading: "دیگر نگران ابزارها نباشید"
   - Button: "شروع کنید"

   **Trial Section:**
   - Section با Background Light Gray
   - Heading: "نمی‌دانید از کجا شروع کنید؟"
   - Form: نام و ایمیل
   - Button: "شروع رایگان"

   **Courses Section:**
   - Section Header: "مدل‌سازی هوشمند، مجسمه‌سازی تمیز"
   - Grid Layout با 3 کارت دوره
   - هر کارت شامل: تصویر، عنوان، سطح، قیمت، دکمه

   **Philosophy Section:**
   - Section با Background Gradient
   - Heading: "فلسفه"
   - Grid با 2 آیتم: آیکون، عنوان، متن

### مرحله 7: تنظیم WooCommerce

1. **نصب WooCommerce:**
   ```
   Plugins → Add New → WooCommerce
   ```

2. **تنظیم محصولات:**
   - ایجاد محصولات برای دوره‌ها
   - تنظیم قیمت‌ها
   - آپلود تصاویر

3. **تنظیم صفحه‌ها:**
   ```
   WooCommerce → Settings → Advanced → Page Setup
   ```

### مرحله 8: تنظیمات نهایی

#### SEO
1. **نصب Yoast SEO:**
   ```
   Plugins → Add New → Yoast SEO
   ```

2. **تنظیم Meta Tags:**
   - Title: "Elementza 3D Art Training"
   - Description: "آموزش تخصصی مدلینگ سه‌بعدی"

#### Performance
1. **نصب افزونه کش:**
   ```
   Plugins → Add New → WP Rocket (یا LiteSpeed Cache)
   ```

2. **بهینه‌سازی تصاویر:**
   ```
   Plugins → Add New → Smush
   ```

#### Security
1. **نصب افزونه امنیت:**
   ```
   Plugins → Add New → Wordfence Security
   ```

## 🎨 شخصی‌سازی

### تغییر رنگ‌ها
در فایل `woodmart-custom.css`:
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

### تست عملکرد:
1. **PageSpeed Insights**
2. **GTmetrix**
3. **Mobile-Friendly Test**

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