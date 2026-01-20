    <?php
/**
 * Main Index Template
 * This is the default template for displaying content
 * 
 * WordPress core functions are used throughout
 */

// phpcs:disable WordPress.NamingConventions -- WordPress core functions

get_header();
?>

<div class="container">
    <div class="content-area">
        <?php
        if (have_posts()) {
            echo '<div class="posts-container">';
            
            while (have_posts()) {
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>
                    
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                    
                    <footer class="entry-footer">
                        <p class="entry-meta">
                            Posted on <?php the_date(); ?> by <?php the_author(); ?>
                        </p>
                    </footer>
                </article>
                <?php
            }
            
            echo '</div>';
            
            // Pagination
            echo '<div class="pagination">';
            echo paginate_links();
            echo '</div>';
        } else {
            echo '<p>No posts found. Please come back later.</p>';
        }
        ?>
    </div>
    
    <?php get_sidebar(); ?>
</div>

<?php get_footer();
