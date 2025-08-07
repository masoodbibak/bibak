# 🎨 WoodMart Child Theme - Elementza

## 📋 توضیحات

این Child Theme برای WoodMart طراحی شده تا سایت Elementza را با تمام ویژگی‌های مورد نیاز پیاده‌سازی کند.

## 🚀 ویژگی‌ها

### ✅ طراحی و ظاهر
- **رنگ‌بندی سفارشی:** آبی و بنفش گرادیانت
- **فونت‌های فارسی:** Archivo و Montserrat
- **طراحی ریسپانسیو:** سازگار با تمام دستگاه‌ها
- **انیمیشن‌های نرم:** برای تجربه کاربری بهتر

### ✅ بخش‌های اصلی
- **Hero Section:** با گرادیانت زیبا
- **Trial Section:** فرم ثبت‌نام رایگان
- **Courses Section:** نمایش دوره‌ها
- **Philosophy Section:** معرفی فلسفه سایت

### ✅ قابلیت‌های تعاملی
- **فرم‌های هوشمند:** با اعتبارسنجی
- **سیستم اعلان:** برای بازخورد کاربر
- **سبد خرید:** یکپارچه با WooCommerce
- **جستجو:** قابلیت جستجوی پیشرفته

### ✅ بهینه‌سازی
- **SEO دوستانه:** ساختار مناسب
- **سرعت بالا:** بهینه‌سازی شده
- **امنیت:** محافظت شده
- **دسترسی:** سازگار با WCAG

## 📁 ساختار فایل‌ها

```
woodmart-child/
├── style.css                 # فایل اصلی child theme
├── functions.php             # توابع سفارشی
├── assets/
│   ├── css/
│   │   └── elementza-custom.css    # استایل‌های سفارشی
│   ├── js/
│   │   └── elementza-custom.js     # جاوااسکریپت سفارشی
│   └── images/
│       ├── logo.png                # لوگوی اصلی
│       ├── logo-white.png          # لوگوی سفید
│       ├── course-1.jpg            # تصویر دوره 1
│       ├── course-2.jpg            # تصویر دوره 2
│       └── course-3.jpg            # تصویر دوره 3
└── README.md                # این فایل
```

## 🛠️ نصب و راه‌اندازی

### مرحله 1: آپلود Child Theme
1. فایل ZIP پوشه `woodmart-child` را آماده کنید
2. به WordPress Admin بروید
3. Appearance → Themes → Add New → Upload Theme
4. فایل ZIP را آپلود کنید
5. روی "Activate" کلیک کنید

### مرحله 2: تنظیم Header Builder
1. WoodMart → Header Builder
2. ساختار Header را تنظیم کنید:
   - Logo (Right)
   - Navigation (Center)
   - Actions (Left)
3. Actions را تنظیم کنید:
   - Login Button
   - Cart Icon

### مرحله 3: ایجاد صفحات
1. Pages → Add New
2. صفحه اصلی را ایجاد کنید
3. با Elementor ویرایش کنید
4. بخش‌های مورد نیاز را اضافه کنید

## 🎯 بخش‌های قابل استفاده

### Hero Section
```html
<section class="elementza-hero">
    <div class="container">
        <div class="hero-content">
            <h1>شروع خلق هنر</h1>
            <h2>دیگر نگران ابزارها نباشید</h2>
            <p>آموزش تخصصی مدلینگ سه‌بعدی</p>
            <a href="#courses" class="elementza-btn-primary">شروع کنید</a>
        </div>
    </div>
</section>
```

### Trial Section
```html
<section class="elementza-trial">
    <div class="container">
        <div class="trial-content">
            <h3>نمی‌دانید از کجا شروع کنید؟</h3>
            <p>با یک دوره رایگان شروع کنید</p>
            <form class="elementza-trial-form">
                <input type="text" placeholder="نام" required>
                <input type="email" placeholder="ایمیل" required>
                <button type="submit" class="elementza-btn-primary">شروع رایگان</button>
            </form>
        </div>
    </div>
</section>
```

### Courses Section
```html
<section class="elementza-courses" id="courses">
    <div class="container">
        <div class="elementza-section-header">
            <h2>مدل‌سازی هوشمند، مجسمه‌سازی تمیز</h2>
            <p>کمتر وقت صرف تعمیر کنید، بیشتر وقت خلق کنید</p>
        </div>
        <div class="elementza-courses-grid">
            <!-- Course cards here -->
        </div>
    </div>
</section>
```

## 🎨 شخصی‌سازی

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

### اضافه کردن بخش جدید
```php
// در functions.php
function elementza_new_section() {
    // کد بخش جدید
}
add_action('wp_footer', 'elementza_new_section');
```

## 📱 ریسپانسیو

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

## 🔧 Shortcode ها

### نمایش دوره‌ها
```
[elementza_courses category="modeling" posts_per_page="6"]
```

### فرم ثبت‌نام
```
[elementza_trial_form title="ثبت‌نام رایگان"]
```

## 🛒 WooCommerce

### محصولات دوره‌ها
- Custom Post Type برای دوره‌ها
- Meta Fields برای قیمت و سطح
- تصاویر بهینه شده
- دکمه‌های سفارشی

### سبد خرید
- آیکون سبد خرید در header
- شمارنده محصولات
- اعلان‌های اضافه شدن

## 🎯 Elementor

### Widget های سفارشی
- Hero Section Widget
- Trial Form Widget
- Course Grid Widget
- Philosophy Widget

### استایل‌های سفارشی
- دکمه‌های Elementza
- کارت‌های دوره
- فرم‌های سفارشی

## 📊 SEO

### Meta Tags
- Title و Description مناسب
- Open Graph tags
- Twitter Cards

### Schema Markup
- Course Schema
- Organization Schema
- Breadcrumb Schema

## 🚀 Performance

### بهینه‌سازی
- Minified CSS/JS
- Optimized images
- Lazy loading
- Caching support

### سرعت
- Lightweight theme
- Efficient queries
- Optimized assets

## 🔒 امنیت

### محافظت
- Sanitized inputs
- Nonce verification
- SQL injection protection
- XSS protection

## 📞 پشتیبانی

### مشکلات رایج
1. **فونت‌ها لود نمی‌شوند:**
   - بررسی اتصال اینترنت
   - اضافه کردن فونت‌ها به صورت local

2. **CSS اعمال نمی‌شود:**
   - پاک کردن کش
   - بررسی مسیر فایل‌ها

3. **JavaScript کار نمی‌کند:**
   - بررسی Console در Developer Tools
   - بررسی تداخل با سایر افزونه‌ها

### تماس
- **WordPress Support:** wordpress.org/support
- **WoodMart Support:** xtemos.com/support
- **Elementor Support:** elementor.com/support

## 📝 تغییرات

### نسخه 1.0.0
- ✅ ایجاد Child Theme
- ✅ اضافه کردن استایل‌های سفارشی
- ✅ پیاده‌سازی JavaScript
- ✅ یکپارچگی با WooCommerce
- ✅ پشتیبانی از Elementor

## 📄 لایسنس

این Child Theme تحت لایسنس GPL v2 یا بالاتر منتشر شده است.

---

**نکته:** این Child Theme برای استفاده با WoodMart طراحی شده و نیاز به نصب WoodMart دارد.