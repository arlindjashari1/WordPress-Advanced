<?php
/**
 * Template Name: Restaurant Menu
 */
get_header();
?>

<div class="menu-container">
    <div class="menu-header">
        <h1><?php the_custom_logo(); echo get_bloginfo('name'); ?></h1>
        <p class="tagline"><?php echo get_bloginfo('description'); ?></p>
    </div>

    <div class="menu-content">
        <?php
        $categories = get_all_food_categories();
        
        if (!empty($categories)) {
            foreach ($categories as $category) {
                echo '<div class="menu-category">';
                echo '<h2 class="category-title">' . esc_html($category->name) . '</h2>';
                
                if (!empty($category->description)) {
                    echo '<p class="category-description">' . esc_html($category->description) . '</p>';
                }
                
                $items = get_menu_items_by_category($category->slug);
                
                if (!empty($items)) {
                    echo '<div class="menu-items">';
                    foreach ($items as $item) {
                        $price = get_post_meta($item->ID, '_menu_price', true);
                        $ingredients = get_post_meta($item->ID, '_menu_ingredients', true);
                        $image = get_the_post_thumbnail_url($item->ID, 'medium');
                        
                        echo '<div class="menu-item">';
                        
                        if ($image) {
                            echo '<img src="' . esc_url($image) . '" alt="' . esc_attr($item->post_title) . '" class="item-image">';
                        }
                        
                        echo '<div class="item-content">';
                        echo '<h3 class="item-title">' . esc_html($item->post_title) . '</h3>';
                        
                        if (!empty($item->post_excerpt)) {
                            echo '<p class="item-description">' . esc_html($item->post_excerpt) . '</p>';
                        }
                        
                        if (!empty($ingredients)) {
                            echo '<p class="item-ingredients"><strong>Ingredients:</strong> ' . esc_html($ingredients) . '</p>';
                        }
                        
                        echo '<div class="item-footer">';
                        if (!empty($price)) {
                            echo '<span class="item-price">$' . esc_html(number_format($price, 2)) . '</span>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo '<p class="no-items">No items in this category</p>';
                }
                
                echo '</div>';
            }
        } else {
            echo '<p class="no-categories">No menu categories found. Please create food categories and menu items in the dashboard.</p>';
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
