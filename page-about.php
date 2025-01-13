<?php
/* Template Name: About Us */
get_header(); ?>
<?php viper_hero_section(); ?>
<div class="content-area">
    <main>
        <section class="product-carousel">
          <h2>Elevate roughness with VIPER</h2>
    <p>Discover the ultimate in automotive care with VIPER; a cutting-edge protective coating designed to safeguard your vehicle against the elements.</p>
            <div class="carousel-container">
                <button class="carousel-control prev" id="prevBtn">❮</button>
                <div class="carousel-track-container">
                  <ul class="carousel-track">
            <li class="carousel-slide current-slide">
              <img src="<?php the_field('carousel_image_1'); ?>" alt="Product 1" />
              <h1><?php the_field('carousel_title_1'); ?></h1>
              <p><?php the_field('carousel_descritption_1'); ?></p>
            </li>
            <li class="carousel-slide">
              <img src="<?php the_field('carousel_image_2'); ?>" alt="Product 2" />
              <h1><?php the_field('carousel_title_2'); ?></h1>
              <p><?php the_field('carousel_descritption_2'); ?></p>
            </li>
            <li class="carousel-slide">
              <img src="<?php the_field('carousel_image_3'); ?>" alt="Product 3" />
              <h1><?php the_field('carousel_title_3'); ?></h1>
              <p><?php the_field('carousel_descritption_3'); ?></p>
            </li>
          </ul>
                </div>
                <button class="carousel-control next" id="nextBtn">❯</button>
            </div>
        </section>

           
    <section class="hero-section" style="background-image: url('<?php the_field('how_to_apply_image_section'); ?>');">
    <h1><?php the_field('how_to_apply_title'); ?></h1>
    <p>
        <?php the_field('how_to_apply_description'); ?>
      </p>
</section>
    </main>
</div>
<?php get_footer(); ?>
