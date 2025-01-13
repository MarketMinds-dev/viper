<?php get_header(); ?>

<section class="hero-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/build/assets/Banner for primers products.jpg');">
    <h1> Discover our Primers Products </h1>
    <p><?php the_field('hero_paragraph'); ?></p>
    <?php if( get_field('show_the_lean_more_button') ): ?>
        <a href="<?php the_field('hero_button_link'); ?>" class="btn">Learn More</a>
    <?php endif; ?>
</section>

<div class="content-area">
    <main>
        <div class="page-content">
            <?php if (have_posts()) : ?>
                <div class="product-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('product-card'); ?>>
                            <div class="product-image">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                                </a>
                            </div>
                            <div class="product-content">
                                <a href="<?php the_permalink(); ?>"><?php the_title('<h2 class="product-title">', '</h2>'); ?></a>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 8); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn">Learn more</a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                <?php the_posts_navigation(); ?>
            <?php else : ?>
                <p><?php _e('Sorry, no primers found.', 'viper-theme'); ?></p>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>
