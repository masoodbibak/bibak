// Elementza Custom JavaScript for WoodMart Child Theme

jQuery(document).ready(function($) {
    
    // Header scroll effect
    const header = $('.whb-header');
    let lastScrollTop = 0;
    
    $(window).scroll(function() {
        const scrollTop = $(window).scrollTop();
        
        if (scrollTop > 100) {
            header.css({
                'background': 'rgba(255, 255, 255, 0.95)',
                'backdrop-filter': 'blur(10px)'
            });
        } else {
            header.css({
                'background': '#fff',
                'backdrop-filter': 'none'
            });
        }
        
        lastScrollTop = scrollTop;
    });
    
    // Smooth scrolling for navigation links
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        const target = $(this.getAttribute('href'));
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 800);
        }
    });
    
    // Trial form submission
    $('.elementza-trial-form').on('submit', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const submitBtn = form.find('button[type="submit"]');
        const originalText = submitBtn.text();
        
        // Show loading state
        submitBtn.prop('disabled', true).text('در حال ارسال...');
        
        // Simulate form submission
        setTimeout(function() {
            showNotification('ثبت‌نام شما با موفقیت انجام شد!', 'success');
            form[0].reset();
            submitBtn.prop('disabled', false).text(originalText);
        }, 2000);
    });
    
    // Course card hover effects
    $('.elementza-course-card').hover(
        function() {
            $(this).find('.elementza-course-image img').css('transform', 'scale(1.05)');
        },
        function() {
            $(this).find('.elementza-course-image img').css('transform', 'scale(1)');
        }
    );
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    $('.elementza-course-card, .elementza-philosophy-item').each(function() {
        $(this).css({
            'opacity': '0',
            'transform': 'translateY(30px)',
            'transition': 'opacity 0.6s ease, transform 0.6s ease'
        });
        observer.observe(this);
    });
    
    // Cart functionality
    let cartCount = 0;
    
    $('.elementza-course-card .elementza-btn-secondary').on('click', function(e) {
        e.preventDefault();
        
        cartCount++;
        updateCartCount();
        showNotification('دوره به سبد خرید اضافه شد!', 'success');
    });
    
    function updateCartCount() {
        $('.whb-cart-count').text(cartCount);
    }
    
    // Notification system
    function showNotification(message, type = 'info') {
        const notification = $('<div class="elementza-notification">' + message + '</div>');
        
        // Add type-specific styling
        if (type === 'success') {
            notification.css('background', '#4CAF50');
        } else if (type === 'error') {
            notification.css('background', '#f44336');
        } else {
            notification.css('background', '#2196F3');
        }
        
        $('body').append(notification);
        
        // Show notification
        setTimeout(function() {
            notification.addClass('show');
        }, 100);
        
        // Hide notification after 3 seconds
        setTimeout(function() {
            notification.removeClass('show');
            setTimeout(function() {
                notification.remove();
            }, 300);
        }, 3000);
    }
    
    // Back to top button
    const backToTopBtn = $('<button class="elementza-back-to-top"><i class="fas fa-arrow-up"></i></button>');
    $('body').append(backToTopBtn);
    
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            backToTopBtn.addClass('show');
        } else {
            backToTopBtn.removeClass('show');
        }
    });
    
    backToTopBtn.on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
    });
    
    // Mobile menu toggle
    $('.whb-mobile-menu-toggle').on('click', function() {
        $('.whb-mobile-menu').toggleClass('active');
    });
    
    // Search functionality
    $('.whb-search-toggle').on('click', function() {
        $('.whb-search-form').toggleClass('active');
    });
    
    // Tooltip functionality
    $('[data-tooltip]').hover(
        function() {
            const tooltip = $('<div class="elementza-tooltip">' + $(this).data('tooltip') + '</div>');
            $('body').append(tooltip);
            
            const rect = this.getBoundingClientRect();
            tooltip.css({
                'position': 'absolute',
                'top': rect.top - tooltip.outerHeight() - 10 + 'px',
                'left': rect.left + (rect.width / 2) - (tooltip.outerWidth() / 2) + 'px',
                'background': '#333',
                'color': 'white',
                'padding': '8px 12px',
                'border-radius': '4px',
                'font-size': '12px',
                'z-index': '10000',
                'pointer-events': 'none'
            });
        },
        function() {
            $('.elementza-tooltip').remove();
        }
    );
    
    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        $('img[data-src]').each(function() {
            imageObserver.observe(this);
        });
    }
    
    // Parallax effect for hero section
    $(window).scroll(function() {
        const scrolled = $(window).scrollTop();
        const parallax = $('.elementza-hero');
        const speed = 0.5;
        
        parallax.css('transform', 'translateY(' + (scrolled * speed) + 'px)');
    });
    
    // Form validation
    $('.elementza-trial-form input[required]').on('blur', function() {
        const input = $(this);
        const value = input.val().trim();
        
        if (!value) {
            input.addClass('error');
            showNotification('لطفاً تمام فیلدها را پر کنید.', 'error');
        } else {
            input.removeClass('error');
        }
        
        // Email validation
        if (input.attr('type') === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                input.addClass('error');
                showNotification('لطفاً ایمیل معتبر وارد کنید.', 'error');
            } else {
                input.removeClass('error');
            }
        }
    });
    
    // Course filter functionality
    $('.elementza-course-filter').on('click', function() {
        const filter = $(this).data('filter');
        
        $('.elementza-course-filter').removeClass('active');
        $(this).addClass('active');
        
        if (filter === 'all') {
            $('.elementza-course-card').show();
        } else {
            $('.elementza-course-card').hide();
            $('.elementza-course-card[data-category="' + filter + '"]').show();
        }
    });
    
    // Modal functionality
    $('.elementza-modal-trigger').on('click', function(e) {
        e.preventDefault();
        
        const modalId = $(this).data('modal');
        const modal = $('#' + modalId);
        
        modal.addClass('active');
        $('body').addClass('modal-open');
    });
    
    $('.elementza-modal-close').on('click', function() {
        $('.elementza-modal').removeClass('active');
        $('body').removeClass('modal-open');
    });
    
    // Close modal when clicking outside
    $(document).on('click', function(e) {
        if ($(e.target).hasClass('elementza-modal')) {
            $('.elementza-modal').removeClass('active');
            $('body').removeClass('modal-open');
        }
    });
    
    // Keyboard navigation
    $(document).keydown(function(e) {
        if (e.keyCode === 27) { // ESC key
            $('.elementza-modal').removeClass('active');
            $('body').removeClass('modal-open');
        }
    });
    
    // WooCommerce integration
    if (typeof wc_add_to_cart_params !== 'undefined') {
        $(document.body).on('added_to_cart', function(event, fragments, cart_hash, button) {
            cartCount++;
            updateCartCount();
            showNotification('محصول به سبد خرید اضافه شد!', 'success');
        });
    }
    
    // Elementor integration
    if (typeof elementorFrontend !== 'undefined') {
        elementorFrontend.hooks.addAction('frontend/element_ready/widget', function($scope, $) {
            // Initialize Elementor widgets
            if ($scope.find('.elementza-course-card').length) {
                $scope.find('.elementza-course-card').each(function() {
                    $(this).hover(
                        function() {
                            $(this).find('.elementza-course-image img').css('transform', 'scale(1.05)');
                        },
                        function() {
                            $(this).find('.elementza-course-image img').css('transform', 'scale(1)');
                        }
                    );
                });
            }
        });
    }
    
    // Performance optimization
    let resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            // Recalculate positions and sizes
            $('.elementza-tooltip').remove();
        }, 250);
    });
    
    // Accessibility improvements
    $('.elementza-btn-primary, .elementza-btn-secondary').on('keydown', function(e) {
        if (e.keyCode === 13 || e.keyCode === 32) { // Enter or Space
            e.preventDefault();
            $(this).click();
        }
    });
    
    // Add focus indicators
    $('a, button, input, textarea, select').on('focus', function() {
        $(this).addClass('focused');
    }).on('blur', function() {
        $(this).removeClass('focused');
    });
    
    // Initialize on page load
    function initElementza() {
        // Set initial cart count
        updateCartCount();
        
        // Add loading animation
        $('.elementza-course-card').each(function(index) {
            $(this).css('animation-delay', (index * 0.1) + 's');
        });
        
        // Initialize tooltips
        $('[data-tooltip]').attr('tabindex', '0');
        
        // Add skip link for accessibility
        if (!$('.skip-link').length) {
            $('body').prepend('<a href="#main-content" class="skip-link">پرش به محتوای اصلی</a>');
        }
    }
    
    // Call initialization
    initElementza();
    
    // Export functions for global use
    window.Elementza = {
        showNotification: showNotification,
        updateCartCount: updateCartCount,
        initElementza: initElementza
    };
    
});

// Additional utility functions
function elementzaFormatPrice(price) {
    return new Intl.NumberFormat('fa-IR', {
        style: 'currency',
        currency: 'EUR'
    }).format(price);
}

function elementzaValidateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function elementzaDebounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Performance monitoring
if (typeof performance !== 'undefined') {
    window.addEventListener('load', function() {
        setTimeout(function() {
            const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
            console.log('Elementza load time:', loadTime + 'ms');
        }, 0);
    });
}