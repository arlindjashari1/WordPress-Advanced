<?php
/**
 * WordPress Bootstrap for PHPStan/PHP Linting
 * This file tells the linter to recognize WordPress functions
 */

// Define WordPress constants to prevent undefined constant errors
if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

if (!function_exists('get_template_directory')) {
    function get_template_directory() {}
}

if (!function_exists('get_template_directory_uri')) {
    function get_template_directory_uri() {}
}

if (!function_exists('get_stylesheet_uri')) {
    function get_stylesheet_uri() {}
}

if (!function_exists('wp_enqueue_style')) {
    function wp_enqueue_style() {}
}

if (!function_exists('wp_enqueue_script')) {
    function wp_enqueue_script() {}
}

if (!function_exists('add_action')) {
    function add_action() {}
}

if (!function_exists('add_filter')) {
    function add_filter() {}
}

if (!function_exists('register_nav_menus')) {
    function register_nav_menus() {}
}

if (!function_exists('add_theme_support')) {
    function add_theme_support() {}
}

if (!function_exists('register_post_type')) {
    function register_post_type() {}
}

if (!function_exists('register_taxonomy')) {
    function register_taxonomy() {}
}

if (!function_exists('register_rest_field')) {
    function register_rest_field() {}
}

if (!function_exists('get_post_meta')) {
    function get_post_meta() {}
}

if (!function_exists('update_post_meta')) {
    function update_post_meta() {}
}

if (!function_exists('add_meta_box')) {
    function add_meta_box() {}
}

if (!function_exists('esc_attr')) {
    function esc_attr() {}
}

if (!function_exists('esc_textarea')) {
    function esc_textarea() {}
}

if (!function_exists('sanitize_text_field')) {
    function sanitize_text_field() {}
}

if (!function_exists('sanitize_textarea_field')) {
    function sanitize_textarea_field() {}
}

if (!function_exists('get_posts')) {
    function get_posts() {}
}

if (!function_exists('get_terms')) {
    function get_terms() {}
}

if (!function_exists('get_header')) {
    function get_header() {}
}

if (!function_exists('have_posts')) {
    function have_posts() {}
}

if (!function_exists('the_post')) {
    function the_post() {}
}

if (!function_exists('the_ID')) {
    function the_ID() {}
}

if (!function_exists('post_class')) {
    function post_class() {}
}

if (!function_exists('get_footer')) {
    function get_footer() {}
}

if (!function_exists('the_content')) {
    function the_content() {}
}

if (!function_exists('wp_footer')) {
    function wp_footer() {}
}

if (!function_exists('current_user_can')) {
    function current_user_can() {}
}

if (!function_exists('term_exists')) {
    function term_exists() {}
}

if (!function_exists('wp_insert_term')) {
    function wp_insert_term() {}
}

if (!function_exists('esc_html')) {
    function esc_html() {}
}

if (!function_exists('wp_insert_post')) {
    function wp_insert_post() {}
}

if (!function_exists('get_term_by')) {
    function get_term_by() {}
}

if (!function_exists('wp_set_post_terms')) {
    function wp_set_post_terms() {}
}

if (!function_exists('the_custom_logo')) {
    function the_custom_logo() {}
}

if (!function_exists('get_bloginfo')) {
    function get_bloginfo() {}
}

if (!function_exists('get_the_post_thumbnail_url')) {
    function get_the_post_thumbnail_url() {}
}

if (!function_exists('esc_url')) {
    function esc_url() {}
}

if (!function_exists('language_attributes')) {
    function language_attributes() {}
}

if (!function_exists('bloginfo')) {
    function bloginfo() {}
}

if (!function_exists('wp_head')) {
    function wp_head() {}
}

if (!function_exists('body_class')) {
    function body_class() {}
}

if (!function_exists('wp_body_open')) {
    function wp_body_open() {}
}

if (!function_exists('has_custom_logo')) {
    function has_custom_logo() {}
}

if (!function_exists('home_url')) {
    function home_url() {}
}

if (!function_exists('wp_nav_menu')) {
    function wp_nav_menu() {}
}

if (!function_exists('post_type_archive_title')) {
    function post_type_archive_title() {}
}

if (!function_exists('get_the_ID')) {
    function get_the_ID() {}
}

if (!function_exists('get_the_terms')) {
    function get_the_terms() {}
}

if (!function_exists('the_permalink')) {
    function the_permalink() {}
}

if (!function_exists('the_title_attribute')) {
    function the_title_attribute() {}
}

if (!function_exists('the_title')) {
    function the_title() {}
}

if (!function_exists('is_wp_error')) {
    function is_wp_error() {}
}

if (!function_exists('the_excerpt')) {
    function the_excerpt() {}
}

if (!function_exists('paginate_links')) {
    function paginate_links() {}
}

if (!function_exists('has_post_thumbnail')) {
    function has_post_thumbnail() {}
}

if (!function_exists('the_post_thumbnail')) {
    function the_post_thumbnail() {}
}

if (!function_exists('get_term_link')) {
    function get_term_link() {}
}

if (!function_exists('get_the_modified_date')) {
    function get_the_modified_date() {}
}

if (!function_exists('wp_parse_args')) {
    function wp_parse_args() {}
}

if (!function_exists('get_the_post_thumbnail')) {
    function get_the_post_thumbnail() {}
}

if (!function_exists('get_post')) {
    function get_post() {}
}

if (!function_exists('get_permalink')) {
    function get_permalink() {}
}

if (!function_exists('__')) {
    function __() {}
}

if (!class_exists('WP_Customize_Color_Control')) {
    class WP_Customize_Color_Control {}
}

if (!function_exists('get_theme_mod')) {
    function get_theme_mod() {}
}

if (!function_exists('wp_add_inline_style')) {
    function wp_add_inline_style() {}
}

if (!function_exists('the_date')) {
    function the_date() {}
}

if (!function_exists('the_author')) {
    function the_author() {}
}

if (!function_exists('get_sidebar')) {
    function get_sidebar() {}
}

if (!function_exists('is_active_sitebar')) {
    function is_active_sitebar() {}
}

if (!function_exists('nl2br')) {
    function nl2br() {}
}

if (!function_exists('dynamic_sidebar')) {
    function dynamic_sidebar() {}
}

if (!class_exists('WP_Query')) {
    class WP_Query {
        public function have_posts() {}
        public function the_post() {}
    }
}

if (!function_exists('get_template_part')) {
    function get_template_part() {}
}

if (!function_exists('wp_reset_postdata')) {
    function wp_reset_postdata() {}
}

if (!class_exists('PhpCsFixer\Finder')) {
    class Finder {
        public static function create() {}
        public function in() {}
        public function exclude() {}
    }
}

if (!class_exists('PhpCsFixer\Config')) {
    class Config {
        public function setRules() {}
        public function setFinder() {}
    }
}
