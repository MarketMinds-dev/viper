<?php
/* Template Name: How to Apply Page */

get_header(); ?>

<section class="hero-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/build/assets/Banner How to apply.jpg');">
    <h1> Discover How to Apply </h1>
    <p><?php the_field('hero_paragraph'); ?></p>
    <?php if (get_field('show_the_lean_more_button')) : ?>
        <a href="<?php the_field('hero_button_link'); ?>" class="btn">Learn More</a>
    <?php endif; ?>
</section>

<div class="content-area">
    <main>
        <div class="page-content">
            <div class="product-search">
                <input type="text" id="term-search" placeholder="Search application types...">
            </div>
            <div id="term-results" class="product-grid">
                <?php
                $terms = get_terms(array(
                    'taxonomy' => 'application-type',
                    'hide_empty' => false,
                ));
                if (!empty($terms) && !is_wp_error($terms)) :
                ?>
                    <?php foreach ($terms as $term) :
                        $term_image = get_field('image1', 'application-type_' . $term->term_id); // Get the ACF image field
                    ?>
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
                                <a href="<?php echo get_term_link($term); ?>" class="btn">Watch Video</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p><?php _e('Sorry, no application types found.', 'viper-theme'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
