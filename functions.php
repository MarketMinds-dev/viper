<?php
// Enqueue Styles
function viper_theme_enqueue_styles() {
    wp_enqueue_style('main-styles', get_template_directory_uri() . '/build/main-styles.css');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'viper_theme_enqueue_styles');

// Enqueue Scripts
function viper_theme_enqueue_scripts() {
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/build/script.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'viper_theme_enqueue_scripts');

// Theme Setup
function viper_theme_setup() {
    add_theme_support('post-thumbnails'); // Enable support for Post Thumbnails on posts and pages
    add_theme_support('custom-logo');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('build/editor-styles.css'); // Ensure you have this file to style the editor
}
add_action('after_setup_theme', 'viper_theme_setup');

// Register Products Custom Post Type
function viper_register_products_cpt() {
    $labels = array(
        'name'               => _x('Products', 'post type general name', 'viper-theme'),
        'singular_name'      => _x('Product', 'post type singular name', 'viper-theme'),
        'menu_name'          => _x('Products', 'admin menu', 'viper-theme'),
        'name_admin_bar'     => _x('Product', 'add new on admin bar', 'viper-theme'),
        'add_new'            => _x('Add New', 'product', 'viper-theme'),
        'add_new_item'       => __('Add New Product', 'viper-theme'),
        'new_item'           => __('New Product', 'viper-theme'),
        'edit_item'          => __('Edit Product', 'viper-theme'),
        'view_item'          => __('View Product', 'viper-theme'),
        'all_items'          => __('All Products', 'viper-theme'),
        'search_items'       => __('Search Products', 'viper-theme'),
        'parent_item_colon'  => __('Parent Products:', 'viper-theme'),
        'not_found'          => __('No products found.', 'viper-theme'),
        'not_found_in_trash' => __('No products found in Trash.', 'viper-theme')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'product'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'author')
    );

    register_post_type('product', $args);
}
add_action('init', 'viper_register_products_cpt');

// Register Taxonomy
function viper_register_product_taxonomy() {
    $labels = array(
        'name'              => _x('Product Types', 'taxonomy general name', 'viper-theme'),
        'singular_name'     => _x('Product Type', 'taxonomy singular name', 'viper-theme'),
        'search_items'      => __('Search Product Types', 'viper-theme'),
        'all_items'         => __('All Product Types', 'viper-theme'),
        'parent_item'       => __('Parent Product Type', 'viper-theme'),
        'parent_item_colon' => __('Parent Product Type:', 'viper-theme'),
        'edit_item'         => __('Edit Product Type', 'viper-theme'),
        'update_item'       => __('Update Product Type', 'viper-theme'),
        'add_new_item'      => __('Add New Product Type', 'viper-theme'),
        'new_item_name'     => __('New Product Type Name', 'viper-theme'),
        'menu_name'         => __('Product Types', 'viper-theme'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'product-type'),
    );

    register_taxonomy('product-type', array('product'), $args);
}
add_action('init', 'viper_register_product_taxonomy');

// Register Custom Post Type
function viper_register_how_to_apply_cpt() {
    $labels = array(
        'name'               => _x('How to Apply', 'post type general name', 'viper-theme'),
        'singular_name'      => _x('How to Apply', 'post type singular name', 'viper-theme'),
        'menu_name'          => _x('How to Apply', 'admin menu', 'viper-theme'),
        'name_admin_bar'     => _x('How to Apply', 'add new on admin bar', 'viper-theme'),
        'add_new'            => _x('Add New', 'how to apply', 'viper-theme'),
        'add_new_item'       => __('Add New How to Apply', 'viper-theme'),
        'new_item'           => __('New How to Apply', 'viper-theme'),
        'edit_item'          => __('Edit How to Apply', 'viper-theme'),
        'view_item'          => __('View How to Apply', 'viper-theme'),
        'all_items'          => __('All How to Apply', 'viper-theme'),
        'search_items'       => __('Search How to Apply', 'viper-theme'),
        'parent_item_colon'  => __('Parent How to Apply:', 'viper-theme'),
        'not_found'          => __('No how to apply found.', 'viper-theme'),
        'not_found_in_trash' => __('No how to apply found in Trash.', 'viper-theme')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'how-to-apply'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt')
    );

    register_post_type('how_to_apply', $args);
}
add_action('init', 'viper_register_how_to_apply_cpt');

// Register Taxonomy
function viper_register_how_to_apply_taxonomy() {
    $labels = array(
        'name'              => _x('Application Types', 'taxonomy general name', 'viper-theme'),
        'singular_name'     => _x('Application Type', 'taxonomy singular name', 'viper-theme'),
        'search_items'      => __('Search Application Types', 'viper-theme'),
        'all_items'         => __('All Application Types', 'viper-theme'),
        'parent_item'       => __('Parent Application Type', 'viper-theme'),
        'parent_item_colon' => __('Parent Application Type:', 'viper-theme'),
        'edit_item'         => __('Edit Application Type', 'viper-theme'),
        'update_item'       => __('Update Application Type', 'viper-theme'),
        'add_new_item'      => __('Add New Application Type', 'viper-theme'),
        'new_item_name'     => __('New Application Type Name', 'viper-theme'),
        'menu_name'         => __('Application Types', 'viper-theme'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'application-type'),
    );

    register_taxonomy('application-type', array('how_to_apply'), $args);

    // Add ACF fields for application-type taxonomy
    if(function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'group_application_type_fields',
            'title' => 'Application Type Fields',
            'fields' => array(
                array(
                    'key' => 'field_image1',
                    'label' => 'Image',
                    'name' => 'image1',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_video',
                    'label' => 'Video',
                    'name' => 'video',
                    'type' => 'file',
                    'return_format' => 'array',
                    'library' => 'all',
                    'mime_types' => 'mp4,webm',
                    'instructions' => 'Upload a video file (MP4 or WebM format)',
                )
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'taxonomy',
                        'operator' => '==',
                        'value' => 'application-type',
                    ),
                ),
            ),
        ));
        
    endif;
}
add_action('init', 'viper_register_how_to_apply_taxonomy');


function viper_hero_section() {
    get_template_part('components/hero-section');
}

function viper_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'viper-theme'),
        'footer-menu'  => __('Footer Menu', 'viper-theme'),
    ));
}
add_action('init', 'viper_register_menus');


function enqueue_live_search_scripts() {
    wp_enqueue_script('live-search', get_template_directory_uri() . '/js/live-search.js', array('jquery'), null, true);
    wp_localize_script('live-search', 'ajaxurl', admin_url('admin-ajax.php'));
}
add_action('wp_enqueue_scripts', 'enqueue_live_search_scripts');

function live_search() {
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';

    // Fetch Coatings
    $coating_args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        's' => $search_query,
        'tax_query' => array(
            array(
                'taxonomy' => 'product-type',
                'field'    => 'slug',
                'terms'    => 'coating', // Change this to your actual coating slug
            ),
        ),
    );

    $coating_query = new WP_Query($coating_args);
    $coatings = array();
    if ($coating_query->have_posts()) {
        while ($coating_query->have_posts()) {
            $coating_query->the_post();
            $coatings[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'url' => get_the_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'excerpt' => get_the_excerpt(),
            );
        }
    }
    wp_reset_postdata();

    // Fetch Primers
    $primer_args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        's' => $search_query,
        'tax_query' => array(
            array(
                'taxonomy' => 'product-type',
                'field'    => 'slug',
                'terms'    => 'primer', // Change this to your actual primer slug
            ),
        ),
    );

    $primer_query = new WP_Query($primer_args);
    $primers = array();
    if ($primer_query->have_posts()) {
        while ($primer_query->have_posts()) {
            $primer_query->the_post();
            $primers[] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'url' => get_the_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'excerpt' => get_the_excerpt(),
            );
        }
    }
    wp_reset_postdata();

    // Send response
    wp_send_json_success(array(
        'coatings' => $coatings,
        'primers' => $primers,
    ));
}

add_action('wp_ajax_live_search', 'live_search');
add_action('wp_ajax_nopriv_live_search', 'live_search');

// live search for how-to-apply
function live_search_terms() {
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';

    $args = array(
        'taxonomy' => 'application-type',
        'hide_empty' => false,
        'name__like' => $search_query,
    );

    $terms = get_terms($args);

    if (!empty($terms) && !is_wp_error($terms)) :
        foreach ($terms as $term) :
            $term_image = get_field('image1', 'application-type_' . $term->term_id);
            $term_video = get_field('video', 'application-type_' . $term->term_id); ?>
            <article id="term-<?php echo $term->term_id; ?>" class="product-card">
                <div class="product-image">
                    <a href="<?php echo get_term_link($term); ?>">
                        <?php if ($term_image) : ?>
                            <img src="<?php echo esc_url($term_image['url']); ?>" alt="<?php echo esc_attr($term->name); ?>" />
                        <?php else : ?>
                            <p>No image found</p>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="product-content">
                    <a href="<?php echo get_term_link($term); ?>">
                        <h2 class="product-title"><?php echo esc_html($term->name); ?></h2>
                    </a>
                    <p><?php echo wp_trim_words($term->description, 20); ?></p>
                    <a href="<?php echo get_term_link($term); ?>" class="btn">Learn more</a>
                </div>
            </article>
        <?php endforeach;
    else :
        echo '<p>' . __('Sorry, no application types found.', 'viper-theme') . '</p>';
    endif;

    wp_die();
}
add_action('wp_ajax_live_search_terms', 'live_search_terms');
add_action('wp_ajax_nopriv_live_search_terms', 'live_search_terms');

function enqueue_scroll_to_top_script() {
    ?>
    <script>
        //Get the button
        var mybutton = document.getElementById("scrollToTopBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        mybutton.onclick = function() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
    <?php
}
add_action('wp_footer', 'enqueue_scroll_to_top_script');

function handle_project_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize input fields
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);
        
        // Prepare attachments array
        $attachments = [];

        // Process each uploaded file
        if (!empty($_FILES['images']['name'][0])) {
            foreach ($_FILES['images']['name'] as $key => $name) {
                if ($_FILES['images']['error'][$key] === UPLOAD_ERR_OK) {
                    // Build the file array
                    $file = [
                        'name'     => $_FILES['images']['name'][$key],
                        'type'     => $_FILES['images']['type'][$key],
                        'tmp_name' => $_FILES['images']['tmp_name'][$key],
                        'error'    => $_FILES['images']['error'][$key],
                        'size'     => $_FILES['images']['size'][$key],
                    ];

                    // Use wp_handle_upload to move the file and return its path
                    $upload = wp_handle_upload($file, ['test_form' => false]);

                    if (isset($upload['file'])) {
                        $attachments[] = $upload['file'];
                    }
                }
            }
        }

        // Email setup
        $to = 'info@amazonapaints.com'; // Replace with your email
        $subject = 'New Project Submission from ' . $name;
        $body = "Name: $name\nEmail: $email\nMessage:\n$message";
        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        // Send email with attachments
        if (wp_mail($to, $subject, $body, $headers, $attachments)) {
            // Redirect back to the Contact Us page with a success query parameter
            wp_redirect(home_url('/contact')); 
            exit;
        } else {
            // Redirect back to the Contact Us page with a failure query parameter
            wp_redirect(home_url('/contact'));
            exit;
        }
    }
}
add_action('admin_post_submit_project_form', 'handle_project_submission');
add_action('admin_post_nopriv_submit_project_form', 'handle_project_submission');

?>
