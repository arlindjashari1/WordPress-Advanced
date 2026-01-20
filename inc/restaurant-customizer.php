<?php
/**
 * Restaurant Menu Theme Customizer
 * 
 * Allows users to customize theme settings from the WordPress Customizer
 */

function restaurant_menu_customize_register($wp_customize) {
    
    // Add Restaurant Info Section
    $wp_customize->add_section('restaurant_info', array(
        'title' => __('Restaurant Information', 'restaurant-menu'),
        'description' => __('Add your restaurant details', 'restaurant-menu'),
        'priority' => 30,
    ));
    
    // Restaurant Name
    $wp_customize->add_setting('restaurant_name', array(
        'default' => get_bloginfo('name'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('restaurant_name', array(
        'label' => __('Restaurant Name', 'restaurant-menu'),
        'section' => 'restaurant_info',
        'type' => 'text',
    ));
    
    // Restaurant Description
    $wp_customize->add_setting('restaurant_description', array(
        'default' => 'Welcome to our restaurant',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('restaurant_description', array(
        'label' => __('Restaurant Description', 'restaurant-menu'),
        'section' => 'restaurant_info',
        'type' => 'textarea',
    ));
    
    // Add Colors Section
    $wp_customize->add_section('restaurant_colors', array(
        'title' => __('Restaurant Colors', 'restaurant-menu'),
        'description' => __('Customize your theme colors', 'restaurant-menu'),
        'priority' => 40,
    ));
    
    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default' => '#d4af37',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color',
            array(
                'label' => __('Primary Color (Gold)', 'restaurant-menu'),
                'section' => 'restaurant_colors',
                'settings' => 'primary_color',
            )
        )
    );
    
    // Accent Color
    $wp_customize->add_setting('accent_color', array(
        'default' => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'accent_color',
            array(
                'label' => __('Accent Color (Text)', 'restaurant-menu'),
                'section' => 'restaurant_colors',
                'settings' => 'accent_color',
            )
        )
    );
    
    // Add Contact Section
    $wp_customize->add_section('restaurant_contact', array(
        'title' => __('Contact Information', 'restaurant-menu'),
        'description' => __('Add your contact details', 'restaurant-menu'),
        'priority' => 50,
    ));
    
    // Phone
    $wp_customize->add_setting('restaurant_phone', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('restaurant_phone', array(
        'label' => __('Phone Number', 'restaurant-menu'),
        'section' => 'restaurant_contact',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('restaurant_email', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('restaurant_email', array(
        'label' => __('Email Address', 'restaurant-menu'),
        'section' => 'restaurant_contact',
        'type' => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('restaurant_address', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('restaurant_address', array(
        'label' => __('Address', 'restaurant-menu'),
        'section' => 'restaurant_contact',
        'type' => 'textarea',
    ));
    
    // Hours
    $wp_customize->add_setting('restaurant_hours', array(
        'default' => 'Mon - Sun: 10:00 AM - 10:00 PM',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('restaurant_hours', array(
        'label' => __('Operating Hours', 'restaurant-menu'),
        'section' => 'restaurant_contact',
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'restaurant_menu_customize_register');

/**
 * Output custom CSS based on customizer settings
 */
function restaurant_menu_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#d4af37');
    $accent_color = get_theme_mod('accent_color', '#333333');
    
    $css = '
    :root {
        --primary-color: ' . esc_attr($primary_color) . ';
        --accent-color: ' . esc_attr($accent_color) . ';
    }
    
    .menu-header,
    .category-title,
    .item-price,
    .badge,
    .btn-view,
    .price {
        --color: ' . esc_attr($primary_color) . ';
    }
    
    .item-title,
    .card-content h3,
    .menu-header h1 {
        --color: ' . esc_attr($accent_color) . ';
    }
    ';
    
    wp_add_inline_style('style', $css);
}

add_action('wp_enqueue_scripts', 'restaurant_menu_customizer_css');

/**
 * Helper functions to get customizer values
 */
function get_restaurant_phone() {
    return get_theme_mod('restaurant_phone', '');
}

function get_restaurant_email() {
    return get_theme_mod('restaurant_email', '');
}

function get_restaurant_address() {
    return get_theme_mod('restaurant_address', '');
}

function get_restaurant_hours() {
    return get_theme_mod('restaurant_hours', '');
}

function get_restaurant_description() {
    return get_theme_mod('restaurant_description', 'Welcome to our restaurant');
}
