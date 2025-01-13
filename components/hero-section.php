<section class="hero-section" style="background-image: url('<?php the_field('hero_background_image'); ?>');">
    <h1><?php the_field('hero_title'); ?></h1>
    <p><?php the_field('hero_paragraph'); ?></p>
    <?php if( get_field('show_the_lean_more_button') ): ?>
        <a href="<?php the_field('hero_button_link'); ?>" class="btn">Learn More</a>
    <?php endif; ?>
</section>
