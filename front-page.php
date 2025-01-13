<?php
/* Template Name: Home */
get_header(); ?>
<div class="content-area">
    <main>
        <!-- Your home page content here -->
        <?php viper_hero_section(); ?>
        <section class="product-carousel">
            <h2>Discover Our Products</h2>
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
                                <p><?php echo get_the_title(); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn">Learn more</a>
                            </li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                </div>
                <button class="carousel-control next" id="nextBtn">❯</button>
            </div>
        </section>

        <section class="hero-section" style="background-image: url('<?php the_field('how_to_apply_background'); ?>');">
            <h1><?php the_field('how_to_apply_title'); ?></h1>
            <p><?php the_field('how_to_apply_text'); ?></p>
            <a href="<?php $how_to_apply_page = get_page_by_path('how-to-apply'); echo get_permalink($how_to_apply_page->ID); ?>" class="btn">Watch And Learn</a>
        </section>
        
    </main>
</div>
<?php get_footer(); ?>
