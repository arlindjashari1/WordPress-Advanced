<?php
/**
 * Restaurant Menu Theme - Template Helper Functions
 * 
 * Use these functions in your templates to display menu data
 */

/**
 * Display menu items by category with elegant styling
 * 
 * @param string $category_slug The slug of the food category
 * @param array $args Optional arguments
 */
function display_menu_items_by_category($category_slug, $args = array()) {
    $defaults = array(
        'show_image' => true,
        'show_description' => true,
        'show_price' => true,
        'show_ingredients' => false,
    );
    
    $args = wp_parse_args($args, $defaults);
    $items = get_menu_items_by_category($category_slug);
    
    if (empty($items)) {
        return '<p>No items in this category.</p>';
    }
    
    $html = '<div class="menu-items">';
    
    foreach ($items as $item) {
        $html .= '<div class="menu-item">';
        
        if ($args['show_image'] && has_post_thumbnail($item->ID)) {
            $html .= '<div class="item-image">';
            $html .= get_the_post_thumbnail($item->ID, 'medium');
            $html .= '</div>';
        }
        
        $html .= '<div class="item-content">';
        $html .= '<h3 class="item-title">' . esc_html($item->post_title) . '</h3>';
        
        if ($args['show_description'] && !empty($item->post_excerpt)) {
            $html .= '<p class="item-description">' . esc_html($item->post_excerpt) . '</p>';
        }
        
        if ($args['show_ingredients']) {
            $ingredients = get_post_meta($item->ID, '_menu_ingredients', true);
            if (!empty($ingredients)) {
                $html .= '<p class="item-ingredients">';
                $html .= '<strong>Ingredients:</strong> ' . esc_html($ingredients);
                $html .= '</p>';
            }
        }
        
        $html .= '<div class="item-footer">';
        if ($args['show_price']) {
            $price = get_post_meta($item->ID, '_menu_price', true);
            if (!empty($price)) {
                $html .= '<span class="item-price">$' . esc_html(number_format($price, 2)) . '</span>';
            }
        }
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    
    return $html;
}

/**
 * Display all food categories with their items
 * 
 * @param array $args Optional arguments
 */
function display_all_food_menu($args = array()) {
    $defaults = array(
        'show_category_description' => true,
        'show_image' => true,
        'show_price' => true,
        'columns' => 3,
    );
    
    $args = wp_parse_args($args, $defaults);
    $categories = get_all_food_categories();
    
    if (empty($categories)) {
        return '<p>No menu categories found.</p>';
    }
    
    $html = '<div class="complete-menu">';
    
    foreach ($categories as $category) {
        $html .= '<div class="menu-category">';
        $html .= '<h2 class="category-title">' . esc_html($category->name) . '</h2>';
        
        if ($args['show_category_description'] && !empty($category->description)) {
            $html .= '<p class="category-description">' . esc_html($category->description) . '</p>';
        }
        
        $items = get_menu_items_by_category($category->slug);
        
        if (!empty($items)) {
            $html .= '<div class="menu-items" style="display: grid; grid-template-columns: repeat(' . intval($args['columns']) . ', 1fr); gap: 20px;">';
            
            foreach ($items as $item) {
                $html .= '<div class="menu-item">';
                
                if ($args['show_image'] && has_post_thumbnail($item->ID)) {
                    $html .= get_the_post_thumbnail($item->ID, 'medium');
                }
                
                $html .= '<div class="item-content">';
                $html .= '<h3>' . esc_html($item->post_title) . '</h3>';
                $html .= '<p>' . esc_html($item->post_excerpt) . '</p>';
                
                if ($args['show_price']) {
                    $price = get_post_meta($item->ID, '_menu_price', true);
                    if (!empty($price)) {
                        $html .= '<strong>$' . esc_html(number_format($price, 2)) . '</strong>';
                    }
                }
                
                $html .= '</div>';
                $html .= '</div>';
            }
            
            $html .= '</div>';
        } else {
            $html .= '<p>No items in this category</p>';
        }
        
        $html .= '</div>';
    }
    
    $html .= '</div>';
    
    return $html;
}

/**
 * Get single menu item data
 * 
 * @param int $post_id The menu item post ID
 * @return array Item data array
 */
function get_menu_item_data($post_id) {
    $item = get_post($post_id);
    
    if (!$item || $item->post_type !== 'menu_item') {
        return false;
    }
    
    return array(
        'id' => $item->ID,
        'title' => $item->post_title,
        'description' => $item->post_excerpt,
        'content' => $item->post_content,
        'price' => get_post_meta($item->ID, '_menu_price', true),
        'ingredients' => get_post_meta($item->ID, '_menu_ingredients', true),
        'image' => get_the_post_thumbnail_url($item->ID, 'medium'),
        'categories' => get_the_terms($item->ID, 'food_category'),
        'permalink' => get_permalink($item->ID),
    );
}

/**
 * Display featured menu items (special items)
 * 
 * @param int $number Number of items to display
 * @param array $category_slugs Optional category filters
 */
function display_featured_menu_items($number = 6, $category_slugs = array()) {
    $args = array(
        'post_type' => 'menu_item',
        'posts_per_page' => $number,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    if (!empty($category_slugs)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'food_category',
                'field' => 'slug',
                'terms' => $category_slugs,
            )
        );
    }
    
    $items = get_posts($args);
    
    if (empty($items)) {
        return '<p>No featured items found.</p>';
    }
    
    $html = '<div class="featured-items grid">';
    
    foreach ($items as $item) {
        $price = get_post_meta($item->ID, '_menu_price', true);
        $image = get_the_post_thumbnail_url($item->ID, 'medium');
        
        $html .= '<div class="featured-item">';
        
        if ($image) {
            $html .= '<img src="' . esc_url($image) . '" alt="' . esc_attr($item->post_title) . '">';
        }
        
        $html .= '<h4>' . esc_html($item->post_title) . '</h4>';
        $html .= '<p>' . esc_html($item->post_excerpt) . '</p>';
        
        if ($price) {
            $html .= '<strong class="featured-price">$' . esc_html(number_format($price, 2)) . '</strong>';
        }
        
        $html .= '<a href="' . esc_url(get_permalink($item->ID)) . '" class="btn">View Details</a>';
        $html .= '</div>';
    }
    
    $html .= '</div>';
    
    return $html;
}

/**
 * Get restaurant contact information
 */
function get_restaurant_info() {
    return array(
        'name' => bloginfo('name'),
        'description' => get_restaurant_description(),
        'phone' => get_restaurant_phone(),
        'email' => get_restaurant_email(),
        'address' => get_restaurant_address(),
        'hours' => get_restaurant_hours(),
    );
}

/**
 * Display restaurant info widget
 */
function display_restaurant_info_widget() {
    $info = get_restaurant_info();
    
    $html = '<div class="restaurant-info-widget">';
    $html .= '<h3>' . esc_html($info['name']) . '</h3>';
    
    if (!empty($info['description'])) {
        $html .= '<p>' . esc_html($info['description']) . '</p>';
    }
    
    if (!empty($info['phone']) || !empty($info['email']) || !empty($info['address'])) {
        $html .= '<div class="restaurant-contact">';
        
        if (!empty($info['phone'])) {
            $html .= '<p><strong>Phone:</strong> <a href="tel:' . esc_attr($info['phone']) . '">' . esc_html($info['phone']) . '</a></p>';
        }
        
        if (!empty($info['email'])) {
            $html .= '<p><strong>Email:</strong> <a href="mailto:' . esc_attr($info['email']) . '">' . esc_html($info['email']) . '</a></p>';
        }
        
        if (!empty($info['address'])) {
            $html .= '<p><strong>Address:</strong> ' . nl2br(esc_html($info['address'] ?? '')) . '</p>';
        }
        
        $html .= '</div>';
    }
    
    if (!empty($info['hours'])) {
        $html .= '<div class="restaurant-hours">';
        $html .= '<h4>Hours</h4>';
        $html .= nl2br(esc_html($info['hours'] ?? ''));
        $html .= '</div>';
    }
    
    $html .= '</div>';
    
    return $html;
}

/**
 * Generate a price range for a category
 * 
 * @param string $category_slug The food category slug
 * @return string Price range e.g., "$8.99 - $24.99"
 */
function get_category_price_range($category_slug) {
    $items = get_menu_items_by_category($category_slug);
    
    if (empty($items)) {
        return false;
    }
    
    $prices = array();
    
    foreach ($items as $item) {
        $price = get_post_meta($item->ID, '_menu_price', true);
        if (!empty($price)) {
            $prices[] = floatval($price);
        }
    }
    
    if (empty($prices)) {
        return false;
    }
    
    $min = min($prices);
    $max = max($prices);
    
    return '$' . number_format($min, 2) . ' - $' . number_format($max, 2);
}
