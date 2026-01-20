<?php
/**
 * Restaurant Menu Theme Functions
 * 
 * WordPress Theme Functions for Restaurant Menu Theme
 * All WordPress functions are properly defined in WordPress core
 */

// phpcs:disable WordPress.NamingConventions -- WordPress core functions

// Load Customizer
require_once(get_template_directory() . '/inc/restaurant-customizer.php');

// Load Template Helpers
require_once(get_template_directory() . '/inc/template-helpers.php');

// Load Scripts and Styles
function load_scripts(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('restaurant-menu-style', get_template_directory_uri() . '/css/restaurant-menu.css');
    wp_enqueue_style('footer-header-style', get_template_directory_uri() . '/css/footer-header.css');
    wp_enqueue_script('dropdown', get_template_directory_uri(). '/js/dropdown.js', array(), '1.0', false);
}
add_action('wp_enqueue_scripts', 'load_scripts');

// Theme Configuration
function config(){
    register_nav_menus(
        array(
         'wp_devs_main_menu' => 'Main Menu ',
         'wp_devs_footer_menu' => 'Footer Menu '
    )
);

    $args = array(
        'height' => 225,
        'width' => 1920
    );
    add_theme_support('custom-header', $args);
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 110,
        'width' => 200,
        'flex-width' => true,
        'flex-height' => true
    ));
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('comment-list', 'search-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'config', 0);

// Register Custom Post Type: Menu Items
function register_menu_items_post_type() {
    $args = array(
        'label' => 'Menu Items',
        'public' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'menu-item'),
        'menu_icon' => 'dashicons-carrot',
    );
    register_post_type('menu_item', $args);
}
add_action('init', 'register_menu_items_post_type');

// Register Custom Taxonomy: Food Categories
function register_food_categories() {
    $args = array(
        'label' => 'Food Categories',
        'public' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'food-category'),
    );
    register_taxonomy('food_category', array('menu_item'), $args);
}
add_action('init', 'register_food_categories');

// Register Custom Meta Fields for Menu Items
function register_menu_item_meta() {
    register_rest_field('menu_item', 'price', array(
        'get_callback' => function($post) {
            return get_post_meta($post->id, '_menu_price', true);
        },
        'update_callback' => function($value, $post) {
            update_post_meta($post->ID, '_menu_price', $value);
        },
    ));
    
    register_rest_field('menu_item', 'ingredients', array(
        'get_callback' => function($post) {
            return get_post_meta($post->id, '_menu_ingredients', true);
        },
        'update_callback' => function($value, $post) {
            update_post_meta($post->ID, '_menu_ingredients', $value);
        },
    ));
}
add_action('init', 'register_menu_item_meta');

// Add Meta Boxes for Menu Items
function add_menu_item_meta_boxes() {
    add_meta_box(
        'menu_item_price',
        'Price',
        'render_price_meta_box',
        'menu_item',
        'normal',
        'high'
    );
    
    add_meta_box(
        'menu_item_ingredients',
        'Ingredients',
        'render_ingredients_meta_box',
        'menu_item',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_menu_item_meta_boxes');

// Render Price Meta Box
function render_price_meta_box($post) {
    $price = get_post_meta($post->ID, '_menu_price', true);
    ?>
    <label for="menu_price">Price ($):</label>
    <input type="number" id="menu_price" name="menu_price" step="0.01" value="<?php echo esc_attr($price); ?>" style="width: 100%; padding: 8px;">
    <?php
}

// Render Ingredients Meta Box
function render_ingredients_meta_box($post) {
    $ingredients = get_post_meta($post->ID, '_menu_ingredients', true);
    ?>
    <label for="menu_ingredients">Ingredients:</label>
    <textarea id="menu_ingredients" name="menu_ingredients" style="width: 100%; height: 150px; padding: 8px;"><?php echo esc_textarea($ingredients); ?></textarea>
    <p style="font-size: 12px; color: #666;">Separate ingredients with commas or new lines</p>
    <?php
}

// Save Meta Box Data
function save_menu_item_meta($post_id) {
    if (isset($_POST['menu_price'])) {
        update_post_meta($post_id, '_menu_price', sanitize_text_field($_POST['menu_price']));
    }
    if (isset($_POST['menu_ingredients'])) {
        update_post_meta($post_id, '_menu_ingredients', sanitize_textarea_field($_POST['menu_ingredients']));
    }
}
add_action('save_post_menu_item', 'save_menu_item_meta');

// Helper Function to Get Menu Items by Category
function get_menu_items_by_category($category_slug) {
    $args = array(
        'post_type' => 'menu_item',
        'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'food_category',
                'field' => 'slug',
                'terms' => $category_slug,
            )
        )
    );
    return get_posts($args);
}

// Helper Function to Get All Food Categories
function get_all_food_categories() {
    return get_terms(array(
        'taxonomy' => 'food_category',
        'hide_empty' => true,
    ));
}
?>