# 🎨 Elementza 3D Art Training Website

یک سایت کامل و مدرن برای آموزش هنر سه‌بعدی و مدلینگ، مشابه سایت اصلی Elementza

## 📋 ویژگی‌ها

### ✨ طراحی و UX
- **طراحی مدرن و ریسپانسیو** - سازگار با تمام دستگاه‌ها
- **انیمیشن‌های نرم** - تجربه کاربری بهتر
- **رنگ‌بندی حرفه‌ای** - ترکیب آبی و بنفش
- **فونت‌های بهینه** - Archivo و Montserrat
- **آیکون‌های Font Awesome** - زیبایی بیشتر

### 🛠️ قابلیت‌های فنی
- **Header ثابت** - با افکت blur در اسکرول
- **فرم ثبت‌نام** - با validation و انیمیشن
- **کارت‌های دوره** - با hover effects
- **سبد خرید** - با شمارنده پویا
- **جستجو و فیلتر** - برای دوره‌ها
- **Back to Top** - دکمه بازگشت به بالا
- **Lazy Loading** - برای تصاویر
- **Parallax Effect** - در بخش hero

### 📱 ریسپانسیو
- **Desktop** - عرض کامل
- **Tablet** - 768px و کمتر
- **Mobile** - 480px و کمتر

## 🚀 نصب و راه‌اندازی

### 1. دانلود فایل‌ها
```bash
git clone [repository-url]
cd elementza-website
```

### 2. ساختار پوشه‌ها
```
elementza-website/
├── index.html
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── main.js
│   └── images/
│       ├── logo.png
│       ├── logo-white.png
│       ├── course-1.jpg
│       ├── course-2.jpg
│       └── course-3.jpg
├── elementor-templates/
│   └── hero-section.json
├── woodmart-custom.css
├── wordpress-installation.md
└── README.md
```

### 3. اضافه کردن تصاویر
تصاویر زیر را در پوشه `assets/images/` قرار دهید:
- `logo.png` - لوگوی اصلی (145x62px)
- `logo-white.png` - لوگوی سفید برای footer
- `course-1.jpg` - تصویر دوره 3D Modeling
- `course-2.jpg` - تصویر دوره ZBrush
- `course-3.jpg` - تصویر دوره Legacy

### 4. اجرای سایت
```bash
# با Python
python -m http.server 8000

# با Node.js
npx serve .

# با PHP
php -S localhost:8000
```

سایت در آدرس `http://localhost:8000` قابل دسترسی خواهد بود.

## 🎯 استفاده با Elementor

### 1. نصب در WordPress
1. فایل‌ها را در پوشه تم خود آپلود کنید
2. یا از طریق FTP در `/wp-content/themes/your-theme/` قرار دهید

### 2. تنظیمات Elementor
1. **Header Section:**
   - Logo در سمت راست
   - Menu در وسط
   - Login/Cart در سمت چپ

2. **Hero Section:**
   - Background gradient
   - Title و Subtitle
   - CTA Button

3. **Trial Section:**
   - Form با دو input
   - Submit button

4. **Courses Section:**
   - Grid layout
   - Course cards با تصاویر
   - قیمت‌ها و دکمه‌ها

5. **Philosophy Section:**
   - Background gradient
   - Icon boxes
   - متن‌های فلسفه

6. **Footer:**
   - Logo
   - سه ستون لینک‌ها
   - Copyright

### 3. تنظیمات WoodMart
```php
// در functions.php تم خود اضافه کنید
function elementza_custom_styles() {
    wp_enqueue_style('elementza-custom', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('elementza-custom', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'elementza_custom_styles');
```

## 🎨 شخصی‌سازی

### تغییر رنگ‌ها
در فایل `assets/css/style.css`:
```css
:root {
    --primary-color: #0e96f7;
    --secondary-color: #007acc;
    --gradient-start: #667eea;
    --gradient-end: #764ba2;
}
```

### تغییر فونت‌ها
```css
body {
    font-family: 'Your-Font', sans-serif;
}
```

### تغییر محتوا
در فایل `index.html`:
- عنوان‌ها و متن‌ها
- قیمت‌ها
- لینک‌ها
- اطلاعات تماس

## 📊 بهینه‌سازی

### SEO
- Meta tags کامل
- Schema markup
- Alt text برای تصاویر
- Semantic HTML

### Performance
- Minified CSS/JS
- Optimized images
- Lazy loading
- CDN ready

### Accessibility
- ARIA labels
- Keyboard navigation
- Focus indicators
- Screen reader friendly

## 🔧 قابلیت‌های پیشرفته

### فرم‌ها
- Validation
- AJAX submission
- Success/Error messages
- Loading states

### انیمیشن‌ها
- Scroll-triggered
- Hover effects
- Page transitions
- Loading animations

### تعامل
- Cart functionality
- Search
- Filtering
- Notifications

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

## 🚀 Deploy

### Netlify
1. فایل‌ها را در GitHub push کنید
2. در Netlify repository را connect کنید
3. Deploy خودکار انجام می‌شود

### Vercel
```bash
npm install -g vercel
vercel
```

### Shared Hosting
1. فایل‌ها را در public_html آپلود کنید
2. DNS را تنظیم کنید
3. SSL certificate فعال کنید

## 📞 پشتیبانی

برای سوالات و مشکلات:
- **Email:** support@elementza.com
- **GitHub Issues:** [repository-url]/issues
- **Documentation:** [wiki-url]

## 📄 لایسنس

این پروژه تحت لایسنس MIT منتشر شده است.

---

**نکته:** این سایت برای استفاده آموزشی و تجاری طراحی شده و کاملاً قابل شخصی‌سازی است.

## 🎯 راهنمای کامل WordPress

برای نصب در WordPress با WoodMart و Elementor، فایل `wordpress-installation.md` را مطالعه کنید.

## 📸 تصاویر مورد نیاز

برای اطلاعات کامل تصاویر مورد نیاز، فایل `assets/images/README.md` را مطالعه کنید.