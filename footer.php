<footer id="footer">
    <div class="footer" style="background-image: url('<?php echo get_template_directory_uri(); ?>/build/assets/Footer.jpg'">
        <div class="container">
            <div class="footer-content">
                <div class="logo-footer">
                     <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    } else {
                        ?>
                        <img src="<?php echo get_template_directory_uri(); ?>assets/Viper Assets-16.png" alt="Viper Logo" />
                        <?php
                    }
                    ?>
                    <div class="footer-icons">
                        <a href="https://www.youtube.com/@amazonapaints5586"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-1">
                    <h3>Products</h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_id'        => 'nav-menu',
                        'container'      => 'ul',
                        'menu_class'     => 'footer-list',
                    ));
                    ?>
                </div>
                <div class="footer-1">
                    <h3>Explore</h3>
                     <ul class="footer-list">
                        <li><a href="<?php $how_to_apply_page = get_page_by_path('how-to-apply'); echo get_permalink($how_to_apply_page->ID); ?>">How to Apply</a></li>
                    <li><a href="<?php echo site_url("/our-catalogue"); ?>">Catalogue</a></li>
                    </ul>
                </div>
                <div class="footer-1">
                    <h3>About Us</h3>
                     <ul class="footer-list">
                        <li><a href="<?php echo get_permalink(get_page_by_path('about')); ?>">About Us</a></li>
                    </ul>
                </div>
                <div class="footer-1">
                    <h3>Contact Us</h3>
                     <ul class="footer-list">
                         <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    } else {
                        ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/build/assets/Viper Assets-16.png" alt="Viper Logo" />
                        <?php
                    }
                    ?>
                     <li><a href="mailto:info@amazonapaints.com">info@amazonapaints.com</a></li>
                     <li><a href="phone:+9619218656">+9619218656</a></li>
                        <li>AMAZONA PAINTS SAL.</li>
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>
            © Copyright <?php echo date('Y'); ?> The Viper Coatings |
            <a href="">Privacy Policy</a> | Terms and Conditions | Cookies
        </p>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" title="Go to top">↑</button>

<?php wp_footer(); ?>
</body>
</html>
