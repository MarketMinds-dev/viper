<?php
/* Template Name: Home */
get_header(); ?>
<div class="content-area">
    <main>
        <!-- Your home page content here -->
        <?php viper_hero_section(); ?>
        <section class="product-carousel">
            <h2>Discover Our Latest Products</h2>
            <div class="carousel-container">
                <button class="carousel-control prev" id="prevBtn">❮</button>
                <div class="carousel-track-container">
                    <ul class="carousel-track">
                        <?php
                        // Query the products
                        $args = array(
                            'post_type' => 'product', // Ensure this matches your registered post type
                            'posts_per_page' => -1, // Show all products
                        );
                        $loop = new WP_Query($args);

                        // Loop through the products
                        while ($loop->have_posts()) : $loop->the_post();
                            ?>
                            <li class="carousel-slide <?php if ($loop->current_post == 0) echo 'current-slide'; ?>">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                                <p><?php echo wp_trim_words(get_the_excerpt(), 8); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn">Learn more</a>
                            </li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                </div>
                <button class="carousel-control next" id="nextBtn">❯</button>
            </div>
        </section>
        <section class="section-how-to-apply">
            <h1>Learn How to Apply</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla atque voluptatum asperiores officiis ullam rerum sunt perspiciatis reprehenderit modi quos. Ipsum vero nobis quod praesentium libero, nihil eligendi cumque quas.</p>
            <a href="<?php $how_to_apply_page = get_page_by_path('how-to-apply'); echo get_permalink($how_to_apply_page->ID); ?>" class="btn">Watch And Learn</a>
        </section>
        <section class="section-project">
            <div class="container">
                <h1>Our Latest Projects</h1>
                <div class="image-gallery-container">
                    <div class="image-gallery-left">
                        <img src="<?php echo get_template_directory_uri(); ?>/build/assets/Homepage-Header-1.jpg" alt="Project Image 1">
                    </div>
                    <div class="image-gallery-right">
                        <div class="image-thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/build/assets/Homepage-Header-1.jpg" alt="Project Thumbnail 1">
                        </div>
                        <div class="image-thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/build/assets/Homepage-Header-1.jpg" alt="Project Thumbnail 2">
                        </div>
                        <div class="image-thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/build/assets/Homepage-Header-1.jpg" alt="Project Thumbnail 3">
                        </div>
                        <div class="image-thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/build/assets/Homepage-Header-1.jpg" alt="Project Thumbnail 4">
                        </div>
                    </div>
                </div>
                <a href="" class="btn">Show All Projects</a>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>
