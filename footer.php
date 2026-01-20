       </main>
    
    <footer class="site-footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>
                    <?php if (has_custom_logo()) {
                        the_custom_logo();
                    } ?>
                    <?php bloginfo('name'); ?>
                </h3>
                <p><?php echo esc_html(get_restaurant_description()); ?></p>
            </div>
            
            <div class="footer-section">
                <h4>Contact Info</h4>
                <p>
                    <?php 
                    $phone = get_restaurant_phone();
                    $email = get_restaurant_email();
                    $address = get_restaurant_address();
                    
                    if ($phone) echo '<strong>Phone:</strong> ' . esc_html($phone) . '<br>';
                    if ($email) echo '<strong>Email:</strong> <a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a><br>';
                    if ($address) echo '<strong>Address:</strong> ' . nl2br(esc_html($address ?? ''));
                    ?>
                </p>
            </div>
            
            <div class="footer-section">
                <h4>Hours</h4>
                <p>
                    <?php 
                    $hours = get_restaurant_hours();
                    if ($hours) {
                        echo nl2br(esc_html($hours));
                    }
                    ?>
                </p>
            </div>
            
            <div class="footer-section">
                <h4>Menu</h4>
                <nav class="footer-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'wp_devs_footer_menu',
                        'depth' => 1,
                        'fallback_cb' => 'wp_page_menu',
                    ));
                    ?>
                </nav>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            <p>Powered by WordPress</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>