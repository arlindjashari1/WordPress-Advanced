<?php
/**
 * Sample Restaurant Menu Data
 * 
 * This file demonstrates how to programmatically create sample data
 * for testing the Restaurant Menu theme. Run this once, then delete it.
 * 
 * Usage:
 * 1. Upload this file to your theme directory
 * 2. Access it via: http://yoursite.com/wp-content/themes/WordPress-Advanced/sample-data.php
 * 3. Delete it after running
 */

// Load WordPress
require_once('../../../../../../wp-load.php');

// Check if user is admin
if (!current_user_can('manage_options')) {
    die('Unauthorized access');
}

echo '<h1>Creating Sample Restaurant Menu Data...</h1>';

// Sample Categories
$categories = array(
    array(
        'name' => 'Appetizers',
        'slug' => 'appetizers',
        'description' => 'Start your meal with our delicious appetizers',
    ),
    array(
        'name' => 'Main Courses',
        'slug' => 'main-courses',
        'description' => 'Our signature main dishes',
    ),
    array(
        'name' => 'Desserts',
        'slug' => 'desserts',
        'description' => 'Sweet treats to finish your meal',
    ),
    array(
        'name' => 'Beverages',
        'slug' => 'beverages',
        'description' => 'Refreshing drinks',
    ),
);

// Create categories
foreach ($categories as $category) {
    $term = term_exists($category['slug'], 'food_category');
    if (!$term) {
        wp_insert_term($category['name'], 'food_category', array(
            'slug' => $category['slug'],
            'description' => $category['description'],
        ));
        echo '<p>✓ Created category: ' . esc_html($category['name']) . '</p>';
    }
}

// Sample Menu Items
$menu_items = array(
    // Appetizers
    array(
        'title' => 'Garlic Bread',
        'content' => 'Crispy toasted bread brushed with garlic butter and fresh herbs.',
        'excerpt' => 'Toasted bread with garlic and herbs',
        'category' => 'appetizers',
        'price' => '6.99',
        'ingredients' => 'Bread, Garlic, Butter, Parsley, Oregano',
    ),
    array(
        'title' => 'Bruschetta',
        'content' => 'Toasted bread topped with tomatoes, garlic, basil, and olive oil.',
        'excerpt' => 'Traditional Italian appetizer',
        'category' => 'appetizers',
        'price' => '7.99',
        'ingredients' => 'Bread, Tomatoes, Garlic, Basil, Olive Oil, Balsamic Vinegar',
    ),
    array(
        'title' => 'Calamari Fritti',
        'content' => 'Golden fried squid rings served with marinara sauce.',
        'excerpt' => 'Crispy fried squid',
        'category' => 'appetizers',
        'price' => '8.99',
        'ingredients' => 'Squid, Flour, Oil, Salt, Pepper, Marinara Sauce',
    ),
    
    // Main Courses
    array(
        'title' => 'Grilled Salmon',
        'content' => 'Fresh Atlantic salmon fillet grilled to perfection, served with seasonal vegetables and rice pilaf.',
        'excerpt' => 'Wild-caught salmon with vegetables',
        'category' => 'main-courses',
        'price' => '24.99',
        'ingredients' => 'Salmon Fillet, Lemon, Garlic, Olive Oil, Seasonal Vegetables, Rice',
    ),
    array(
        'title' => 'Ribeye Steak',
        'content' => '16oz premium ribeye steak, perfectly grilled and served with mashed potatoes and asparagus.',
        'excerpt' => 'Premium aged ribeye',
        'category' => 'main-courses',
        'price' => '34.99',
        'ingredients' => 'Ribeye Steak, Butter, Garlic, Salt, Pepper, Potatoes, Asparagus',
    ),
    array(
        'title' => 'Pasta Carbonara',
        'content' => 'Classic Italian pasta with a creamy sauce of eggs, cheese, and pancetta.',
        'excerpt' => 'Traditional Italian pasta',
        'category' => 'main-courses',
        'price' => '16.99',
        'ingredients' => 'Pasta, Pancetta, Eggs, Pecorino Cheese, Black Pepper, Garlic',
    ),
    array(
        'title' => 'Chicken Marsala',
        'content' => 'Tender chicken breast in a rich mushroom Marsala wine sauce, served with pasta.',
        'excerpt' => 'Chicken in Marsala wine sauce',
        'category' => 'main-courses',
        'price' => '18.99',
        'ingredients' => 'Chicken Breast, Mushrooms, Marsala Wine, Garlic, Butter, Pasta',
    ),
    
    // Desserts
    array(
        'title' => 'Tiramisu',
        'content' => 'Classic Italian dessert made with espresso-soaked ladyfingers, mascarpone cream, and cocoa powder.',
        'excerpt' => 'Italian coffee dessert',
        'category' => 'desserts',
        'price' => '7.99',
        'ingredients' => 'Ladyfingers, Espresso, Mascarpone Cheese, Eggs, Sugar, Cocoa Powder',
    ),
    array(
        'title' => 'Chocolate Lava Cake',
        'content' => 'Warm chocolate cake with a melting center, served with vanilla ice cream.',
        'excerpt' => 'Warm chocolate with molten center',
        'category' => 'desserts',
        'price' => '8.99',
        'ingredients' => 'Dark Chocolate, Butter, Eggs, Sugar, Flour, Vanilla Ice Cream',
    ),
    array(
        'title' => 'Panna Cotta',
        'content' => 'Silky smooth Italian cream dessert topped with berry compote.',
        'excerpt' => 'Creamy Italian dessert',
        'category' => 'desserts',
        'price' => '7.99',
        'ingredients' => 'Heavy Cream, Gelatin, Sugar, Vanilla, Berries, Coulis',
    ),
    
    // Beverages
    array(
        'title' => 'Espresso',
        'content' => 'Rich and bold single or double shot of freshly pulled espresso.',
        'excerpt' => 'Strong Italian coffee',
        'category' => 'beverages',
        'price' => '3.50',
        'ingredients' => 'Coffee Beans, Water',
    ),
    array(
        'title' => 'Cappuccino',
        'content' => 'Espresso with steamed milk and a layer of foam.',
        'excerpt' => 'Classic cappuccino',
        'category' => 'beverages',
        'price' => '4.50',
        'ingredients' => 'Espresso, Milk, Foam',
    ),
    array(
        'title' => 'House Wine Selection',
        'content' => 'Our carefully curated selection of reds, whites, and rosés from top vineyards.',
        'excerpt' => 'Premium wine by the glass or bottle',
        'category' => 'beverages',
        'price' => '8.99',
        'ingredients' => 'Wine',
    ),
);

// Create menu items
foreach ($menu_items as $item) {
    $post_data = array(
        'post_title' => $item['title'],
        'post_content' => $item['content'],
        'post_excerpt' => $item['excerpt'],
        'post_type' => 'menu_item',
        'post_status' => 'publish',
    );
    
    $post_id = wp_insert_post($post_data);
    
    if ($post_id) {
        // Assign category
        $category = get_term_by('slug', $item['category'], 'food_category');
        if ($category) {
            wp_set_post_terms($post_id, $category->term_id, 'food_category');
        }
        
        // Add meta fields
        update_post_meta($post_id, '_menu_price', $item['price']);
        update_post_meta($post_id, '_menu_ingredients', $item['ingredients']);
        
        echo '<p>✓ Created menu item: ' . esc_html($item['title']) . ' - $' . esc_html($item['price']) . '</p>';
    }
}

echo '<h2 style="color: green; margin-top: 30px;">✓ Sample data created successfully!</h2>';
echo '<p><strong>Next steps:</strong></p>';
echo '<ol>';
echo '<li>Go to <strong>Pages → Add New</strong></li>';
echo '<li>Set title to "Menu" or "Our Menu"</li>';
echo '<li>Select <strong>Template: Restaurant Menu</strong> from the right sidebar</li>';
echo '<li>Click <strong>Publish</strong></li>';
echo '<li>Visit your new menu page to see the items</li>';
echo '</ol>';
echo '<p><strong>Important:</strong> Delete this file (sample-data.php) after running it.</p>';
?>
