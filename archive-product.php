<?php get_header(); ?>
<section class="hero-section">
    <div class="hero-background">
        <?php echo do_shortcode('[metaslider id="326"]'); ?>
    </div>
    <div class="hero-content">
        <h1>Discover our Products</h1>
        <p><?php the_field('hero_paragraph'); ?></p>
        <?php if( get_field('show_the_lean_more_button') ): ?>
            <a href="<?php the_field('hero_button_link'); ?>" class="btn">Learn More</a>
        <?php endif; ?>
    </div>
</section>

<div class="content-area">
    <main>
        <div class="page-content">
            <div class="product-search">
                <input type="text" id="product-search" placeholder="Search products...">
            </div>
            <div id="product-results" class="product-grid">
                <!-- Product results will be appended here by AJAX -->
            </div>
            <div id="pagination">
                <?php the_posts_navigation(); ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
<style>
.hero-section {
    position: relative;
    width: 100%;
    height: 750px; /* Updated: Fixed height */
    overflow: hidden;
}

.hero-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.hero-background .metaslider {
    width: 100% !important;
    height: 750px !important; /* Updated: Fixed height and aspect ratio */
    margin: 0 auto !important; /* Updated: Maintain aspect ratio */
}

.hero-background .metaslider .slides,
.hero-background .metaslider .slide,
.hero-background .metaslider .slide img {
    width: auto !important;
    height: 100% !important;
    object-fit: contain !important;
    margin: 0 auto !important;
    display: block !important;
    max-width: 100% !important;
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    color: #fff;
    text-align: center;
    padding: 20px;
    width: 80%;
    max-width: 800px;
}

.hero-content h1,
.hero-content p,
.hero-content .btn {
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #f9d131;
    color: #000;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #3d543f;
    color: #fff;
}

.hero-section::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.3);
    z-index: 5;
}

.hero-background .metaslider .flex-control-nav,
.hero-background .metaslider .nivo-controlNav,
.hero-background .metaslider .coin-slider-nav {
    z-index: 20;
    bottom: 20px !important;
    position: absolute;
}

.hero-background .metaslider .caption-wrap {
    z-index: 20;
    position: absolute;
    background: rgba(0,0,0,0.7) !important;
    opacity: 1 !important;
    bottom: 0 !important;
    width: 100% !important;
}

.hero-background .metaslider .caption {
    padding: 10px 20px !important;
    text-align: center !important;
}

.hero-background .metaslider .flexslider {
    background: none !important;
    margin-bottom: 0 !important;
}

@media (max-width: 768px) {
    .hero-section,
    .hero-background .metaslider,
    .hero-background .metaslider .slides,
    .hero-background .metaslider .slide,
    .hero-background .metaslider .slide img {
        height: auto !important;
    }
    .hero-background .metaslider .slides img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position:center;
    display: block;
}
    .hero-background .metaslider {
        margin-top: 100px; /* Adjust this value to match your navigation bar's height */
        object-fit: contain;
    object-position:center;
    }

    /* If needed, adjust other elements to maintain layout */
    .hero-section {
        padding-top: 100px; /* Optional: Prevent the hero section from being cropped */
    }

    
    .hero-content h1 {
        font-size: 24px;
    }
    
    .hero-content p {
        font-size: 16px;
    }
}
</style>