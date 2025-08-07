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
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
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

// Add custom menu locations
function elementza_register_menus() {
    register_nav_menus(array(
        'elementza-primary' => 'منوی اصلی Elementza',
        'elementza-footer' => 'منوی فوتر Elementza'
    ));
}
add_action('init', 'elementza_register_menus');

// Add custom post types for courses
function elementza_custom_post_types() {
    // Courses Post Type
    register_post_type('courses', array(
        'labels' => array(
            'name' => 'دوره‌ها',
            'singular_name' => 'دوره',
            'add_new' => 'افزودن دوره جدید',
            'add_new_item' => 'افزودن دوره جدید',
            'edit_item' => 'ویرایش دوره',
            'new_item' => 'دوره جدید',
            'view_item' => 'مشاهده دوره',
            'search_items' => 'جستجوی دوره‌ها',
            'not_found' => 'دوره‌ای یافت نشد',
            'not_found_in_trash' => 'دوره‌ای در سطل زباله یافت نشد'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-welcome-learn-more',
        'rewrite' => array('slug' => 'courses')
    ));
    
    // Course Categories
    register_taxonomy('course_category', 'courses', array(
        'labels' => array(
            'name' => 'دسته‌بندی دوره‌ها',
            'singular_name' => 'دسته‌بندی',
            'search_items' => 'جستجوی دسته‌بندی‌ها',
            'all_items' => 'همه دسته‌بندی‌ها',
            'parent_item' => 'دسته‌بندی والد',
            'parent_item_colon' => 'دسته‌بندی والد:',
            'edit_item' => 'ویرایش دسته‌بندی',
            'update_item' => 'به‌روزرسانی دسته‌بندی',
            'add_new_item' => 'افزودن دسته‌بندی جدید',
            'new_item_name' => 'نام دسته‌بندی جدید',
            'menu_name' => 'دسته‌بندی‌ها'
        ),
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'course-category')
    ));
}
add_action('init', 'elementza_custom_post_types');

// Add custom meta boxes for courses
function elementza_add_course_meta_boxes() {
    add_meta_box(
        'course_details',
        'جزئیات دوره',
        'elementza_course_meta_box_callback',
        'courses',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'elementza_add_course_meta_boxes');

function elementza_course_meta_box_callback($post) {
    wp_nonce_field('elementza_save_course_meta', 'elementza_course_meta_nonce');
    
    $course_price = get_post_meta($post->ID, '_course_price', true);
    $course_level = get_post_meta($post->ID, '_course_level', true);
    $course_duration = get_post_meta($post->ID, '_course_duration', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="course_price">قیمت دوره:</label></th>';
    echo '<td><input type="text" id="course_price" name="course_price" value="' . esc_attr($course_price) . '" class="regular-text" /></td></tr>';
    
    echo '<tr><th><label for="course_level">سطح دوره:</label></th>';
    echo '<td><select id="course_level" name="course_level">';
    echo '<option value="مبتدی"' . selected($course_level, 'مبتدی', false) . '>مبتدی</option>';
    echo '<option value="متوسط"' . selected($course_level, 'متوسط', false) . '>متوسط</option>';
    echo '<option value="پیشرفته"' . selected($course_level, 'پیشرفته', false) . '>پیشرفته</option>';
    echo '</select></td></tr>';
    
    echo '<tr><th><label for="course_duration">مدت دوره:</label></th>';
    echo '<td><input type="text" id="course_duration" name="course_duration" value="' . esc_attr($course_duration) . '" class="regular-text" placeholder="مثال: 10 ساعت" /></td></tr>';
    echo '</table>';
}

function elementza_save_course_meta($post_id) {
    if (!isset($_POST['elementza_course_meta_nonce']) || !wp_verify_nonce($_POST['elementza_course_meta_nonce'], 'elementza_save_course_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (isset($_POST['course_price'])) {
        update_post_meta($post_id, '_course_price', sanitize_text_field($_POST['course_price']));
    }
    
    if (isset($_POST['course_level'])) {
        update_post_meta($post_id, '_course_level', sanitize_text_field($_POST['course_level']));
    }
    
    if (isset($_POST['course_duration'])) {
        update_post_meta($post_id, '_course_duration', sanitize_text_field($_POST['course_duration']));
    }
}
add_action('save_post', 'elementza_save_course_meta');

// Add custom shortcodes
function elementza_course_grid_shortcode($atts) {
    $atts = shortcode_atts(array(
        'category' => '',
        'posts_per_page' => 6
    ), $atts);
    
    $args = array(
        'post_type' => 'courses',
        'posts_per_page' => $atts['posts_per_page'],
        'post_status' => 'publish'
    );
    
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'course_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $courses = new WP_Query($args);
    
    ob_start();
    
    if ($courses->have_posts()) {
        echo '<div class="elementza-courses-grid">';
        
        while ($courses->have_posts()) {
            $courses->the_post();
            $course_price = get_post_meta(get_the_ID(), '_course_price', true);
            $course_level = get_post_meta(get_the_ID(), '_course_level', true);
            
            echo '<div class="elementza-course-card">';
            echo '<div class="elementza-course-image">';
            if (has_post_thumbnail()) {
                the_post_thumbnail('medium');
            }
            echo '</div>';
            echo '<div class="elementza-course-content">';
            echo '<h3>' . get_the_title() . '</h3>';
            echo '<p class="elementza-course-level">' . $course_level . '</p>';
            echo '<div class="elementza-course-price">' . $course_price . '</div>';
            echo '<a href="' . get_permalink() . '" class="elementza-btn-secondary">بیشتر بدانید</a>';
            echo '</div>';
            echo '</div>';
        }
        
        echo '</div>';
    }
    
    wp_reset_postdata();
    
    return ob_get_clean();
}
add_shortcode('elementza_courses', 'elementza_course_grid_shortcode');

// Add custom widgets
function elementza_register_widgets() {
    register_widget('Elementza_Trial_Form_Widget');
}
add_action('widgets_init', 'elementza_register_widgets');

class Elementza_Trial_Form_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'elementza_trial_form',
            'فرم ثبت‌نام رایگان Elementza',
            array('description' => 'فرم ثبت‌نام برای دوره رایگان')
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        
        echo '<div class="elementza-trial-form">';
        echo '<form method="post" action="">';
        echo '<input type="text" name="trial_name" placeholder="نام" required />';
        echo '<input type="email" name="trial_email" placeholder="ایمیل" required />';
        echo '<button type="submit" class="elementza-btn-primary">شروع رایگان</button>';
        echo '</form>';
        echo '</div>';
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        echo '<p>';
        echo '<label for="' . $this->get_field_id('title') . '">عنوان:</label>';
        echo '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . esc_attr($title) . '">';
        echo '</p>';
    }
    
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

// Add custom REST API endpoints
function elementza_register_rest_routes() {
    register_rest_route('elementza/v1', '/courses', array(
        'methods' => 'GET',
        'callback' => 'elementza_get_courses',
        'permission_callback' => '__return_true'
    ));
}
add_action('rest_api_init', 'elementza_register_rest_routes');

function elementza_get_courses($request) {
    $args = array(
        'post_type' => 'courses',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );
    
    $courses = get_posts($args);
    $data = array();
    
    foreach ($courses as $course) {
        $data[] = array(
            'id' => $course->ID,
            'title' => $course->post_title,
            'excerpt' => $course->post_excerpt,
            'price' => get_post_meta($course->ID, '_course_price', true),
            'level' => get_post_meta($course->ID, '_course_level', true),
            'duration' => get_post_meta($course->ID, '_course_duration', true),
            'thumbnail' => get_the_post_thumbnail_url($course->ID, 'medium'),
            'link' => get_permalink($course->ID)
        );
    }
    
    return $data;
}

// Add custom admin menu
function elementza_admin_menu() {
    add_menu_page(
        'Elementza Settings',
        'Elementza',
        'manage_options',
        'elementza-settings',
        'elementza_settings_page',
        'dashicons-welcome-learn-more',
        30
    );
}
add_action('admin_menu', 'elementza_admin_menu');

function elementza_settings_page() {
    echo '<div class="wrap">';
    echo '<h1>تنظیمات Elementza</h1>';
    echo '<p>به بخش تنظیمات Elementza خوش آمدید!</p>';
    echo '</div>';
}

// Add theme support
function elementza_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'elementza_theme_support');

// Add custom image sizes
function elementza_image_sizes() {
    add_image_size('course-thumbnail', 500, 400, true);
    add_image_size('hero-background', 1920, 1080, true);
}
add_action('after_setup_theme', 'elementza_image_sizes');

// Add custom body classes
function elementza_body_classes($classes) {
    if (is_page_template('page-elementza.php')) {
        $classes[] = 'elementza-page';
    }
    return $classes;
}
add_filter('body_class', 'elementza_body_classes');

// Add custom excerpt length
function elementza_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'elementza_excerpt_length');

// Add custom excerpt more
function elementza_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'elementza_excerpt_more');

// Add custom login redirect
function elementza_login_redirect($redirect_to, $request, $user) {
    if (isset($user->roles) && is_array($user->roles)) {
        if (in_array('administrator', $user->roles)) {
            return admin_url();
        } else {
            return home_url();
        }
    }
    return $redirect_to;
}
add_filter('login_redirect', 'elementza_login_redirect', 10, 3);

// Add custom footer text
function elementza_footer_text() {
    echo '<p>&copy; ' . date('Y') . ' Elementza 3D Art Training. تمامی حقوق محفوظ است.</p>';
}
add_action('wp_footer', 'elementza_footer_text');

// Add custom head meta
function elementza_head_meta() {
    echo '<meta name="theme-color" content="#0e96f7">';
    echo '<meta name="msapplication-TileColor" content="#0e96f7">';
}
add_action('wp_head', 'elementza_head_meta');

// Add custom admin styles
function elementza_admin_styles() {
    echo '<style>
        .elementza-admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
    </style>';
}
add_action('admin_head', 'elementza_admin_styles');

// Add custom admin notice
function elementza_admin_notice() {
    if (isset($_GET['page']) && $_GET['page'] === 'elementza-settings') {
        echo '<div class="notice notice-success is-dismissible">';
        echo '<p>Elementza theme activated successfully!</p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'elementza_admin_notice');

// Add custom dashboard widget
function elementza_dashboard_widget() {
    wp_add_dashboard_widget(
        'elementza_dashboard_widget',
        'Elementza Statistics',
        'elementza_dashboard_widget_callback'
    );
}
add_action('wp_dashboard_setup', 'elementza_dashboard_widget');

function elementza_dashboard_widget_callback() {
    $courses_count = wp_count_posts('courses')->publish;
    echo '<p>تعداد دوره‌های فعال: <strong>' . $courses_count . '</strong></p>';
    echo '<p><a href="' . admin_url('edit.php?post_type=courses') . '">مدیریت دوره‌ها</a></p>';
}

// Add custom activation hook
function elementza_activation_hook() {
    // Flush rewrite rules
    flush_rewrite_rules();
    
    // Create default pages
    $pages = array(
        'صفحه اصلی' => 'home',
        'دوره‌ها' => 'courses',
        'درباره ما' => 'about',
        'تماس با ما' => 'contact'
    );
    
    foreach ($pages as $title => $slug) {
        if (!get_page_by_path($slug)) {
            wp_insert_post(array(
                'post_title' => $title,
                'post_name' => $slug,
                'post_status' => 'publish',
                'post_type' => 'page'
            ));
        }
    }
}
register_activation_hook(__FILE__, 'elementza_activation_hook');

// Add custom deactivation hook
function elementza_deactivation_hook() {
    // Flush rewrite rules
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'elementza_deactivation_hook');

?>