<?php
/**
 * Archive Template for Menu Items
 */
get_header();
?>

<div class="archive-menu">
    <h1><?php post_type_archive_title(); ?></h1>
    <p class="archive-description">Browse our complete menu</p>
    
    <div class="menu-items-grid">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                
                $price = get_post_meta(get_the_ID(), '_menu_price', true);
                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $categories = get_the_terms(get_the_ID(), 'food_category');
                ?>
                
                <div class="menu-item-card">
                    <?php if ($image) { ?>
                        <div class="card-image">
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>">
                            </a>
                        </div>
                    <?php } ?>
                    
                    <div class="card-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        
                        <?php if (!empty($categories) && !is_wp_error($categories)) { ?>
                            <p class="card-categories">
                                <?php foreach ($categories as $cat) {
                                    echo '<span class="badge">' . esc_html($cat->name) . '</span> ';
                                } ?>
                            </p>
                        <?php } ?>
                        
                        <p class="card-excerpt"><?php the_excerpt(); ?></p>
                        
                        <div class="card-footer">
                            <?php if (!empty($price)) { ?>
                                <span class="price">$<?php echo esc_html(number_format($price, 2)); ?></span>
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-view">View Details</a>
                        </div>
                    </div>
                </div>
                
                <?php
            }
            
            // Pagination
            echo '<div class="pagination">';
            echo paginate_links();
            echo '</div>';
        } else {
            echo '<p>No menu items found.</p>';
        }
        ?>
    </div>
</div>

<?php get_footer(); ?>
