<?php
$term = get_term_by('slug', 'application-type', 'application-type');
$term_link = $term ? get_term_link($term) : '#';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>
    <?php
    // Output the title in the format "Page Title - Site Name"
    if (is_front_page() || is_home()) {
        echo 'Home - ' . get_bloginfo('name');
    } elseif (is_page('all-products')) {
        echo 'All Products - ' . get_bloginfo('name');
    } elseif (is_page('primers')) {
        echo 'Primers - ' . get_bloginfo('name');
    } elseif (is_page('coatings')) {
        echo 'Coatings - ' . get_bloginfo('name');
    } elseif (is_post_type_archive('product')) {
        echo 'Products - ' . get_bloginfo('name');
    } elseif (is_tax()) {
        // Get current term object
        $term = get_queried_object();
        if ($term && !is_wp_error($term)) {
            // Check if term name is 'BASECOAT'
            if ($term->name === 'BASECOAT') {
                echo 'Special Basecoat Product - ' . get_bloginfo('name');
            } else {
                // Default behavior
                single_term_title();
                echo ' - ' . get_bloginfo('name');
            }
        }
    } else {
        wp_title('-', true, 'right');
        echo ' ' . get_bloginfo('name');
    }
    ?>
</title>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav>
            <div class="logo">
                <?php
                if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/build/assets/Viper Assets-16.png" alt="Viper Logo" />
                    </a>
                    <?php
                }
                ?>
            </div>
            <div class="menu-toggle" id="menu-toggle">☰</div>
            <ul id="nav-menu" class="nav-menu">
                <li>
                    <a href="#" class="<?php echo is_post_type_archive('product') || is_singular('product') || is_tax('product-tag') || is_page('all-products') || is_tax('product-type', 'primer') || is_tax('product-type', 'coating') ? 'active' : ''; ?>">Products</a>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_id'        => 'nav-menu',
                        'container'      => 'ul',
                        'menu_class'     => 'dropdown',
                    ));
                    ?>
                </li>
                <li>
                    <a href="#" class="<?php echo is_page('how_to_apply') || is_page('catalogue') || is_tax('application-type') || is_singular('how_to_apply') || is_post_type_archive('how_to_apply') ? 'active' : ''; ?>">Explore</a>
                    <ul class="dropdown">
                        <li>
                            <a href="<?php $how_to_apply_page = get_page_by_path('how-to-apply'); echo get_permalink($how_to_apply_page->ID); ?>" <?php if (is_page('how-to-apply')) echo 'class="active"'; ?>>How to Apply</a>
                        </li>
                        <li><a href="<?php echo site_url("/our-catalogue"); ?>">Catalogue</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('/about'); ?>" <?php if (is_page('about')) echo 'class="active"'; ?>>About Us</a>
                </li>
                <li>
                    <a href="<?php echo site_url('/contact'); ?>" <?php if (is_page('contact')) echo 'class="active"'; ?>>Contact Us</a>
                </li>
            </ul>
        </nav>
    </header>

