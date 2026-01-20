<?php
/**
 * Single Menu Item Template
 */
get_header();
?>

<div class="container single-menu-item">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            
            $price = get_post_meta(get_the_ID(), '_menu_price', true);
            $ingredients = get_post_meta(get_the_ID(), '_menu_ingredients', true);
            $categories = get_the_terms(get_the_ID(), 'food_category');
            ?>
            
            <article class="menu-item-detail">
                <div class="item-image-wrapper">
                    <?php 
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full');
                    }
                    ?>
                </div>
                
                <div class="item-detail-content">
                    <h1><?php the_title(); ?></h1>
                    
                    <?php if (!empty($categories) && !is_wp_error($categories)) { ?>
                        <p class="item-categories">
                            <strong>Category:</strong>
                            <?php foreach ($categories as $cat) {
                                echo '<a href="' . esc_url(get_term_link($cat)) . '">' . esc_html($cat->name) . '</a> ';
                            } ?>
                        </p>
                    <?php } ?>
                    
                    <?php if (!empty($price)) { ?>
                        <p class="item-price-detail">
                            <strong>Price:</strong> <span class="price">$<?php echo esc_html(number_format($price, 2)); ?></span>
                        </p>
                    <?php } ?>
                    
                    <div class="item-description">
                        <?php the_content(); ?>
                    </div>
                    
                    <?php if (!empty($ingredients)) { ?>
                        <div class="item-ingredients-detail">
                            <h3>Ingredients</h3>
                            <p><?php echo nl2br(esc_html($ingredients ?? '')); ?></p>
                        </div>
                    <?php } ?>
                    
                    <div class="item-meta">
                        <p>
                            <small>Last updated: <?php echo get_the_modified_date(); ?></small>
                        </p>
                    </div>
                </div>
            </article>
            
            <?php
        }
    }
    ?>
</div>

<?php get_footer(); ?>
