<?php 
get_header();

$current_product_id = get_the_ID();
$product_images = [
    get_field('product_image_1'),
    get_field('product_image_2'),
    get_field('product_image_3')
];
$product_name = get_the_title();
$product_description = get_the_content();
$product_specs = get_field('product_specs_content');

$product_code = get_field('product_name');
$product_sizepack = get_field('product_sizepack');
$product_color = get_field('product_color');
$product_ctn = get_field('product_ctn');
$product_safety_data_sheet = get_field('product_safety_data_sheet');
$product_technical_data_sheet = get_field('product_technical_data_sheet');

$product_taxonomies = wp_get_post_terms($current_product_id, 'product-type', array('fields' => 'slugs'));

?>

<section class="product-detail-section" style="margin-top: 5rem;">
    <div class="container">
        <div class="product-detail-wrapper">
            <!-- Image Gallery -->
            <div class="product-image-gallery">
                <div class="img-display">
                    <div class="img-showcase">
                        <?php 
                        if (in_array('coating', $product_taxonomies)) {
                            // Show only the main product thumbnail for coating
                            $thumbnail_url = get_the_post_thumbnail_url($current_product_id, 'full') ?: 'path-to-default-image.jpg';
                            echo '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($product_name) . '">';
                        } else {
                            // Show gallery images for other product types
                            foreach ($product_images as $image) {
                                if ($image) {
                                    echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <?php if (!in_array('coating', $product_taxonomies)) : ?>
                    <!-- Thumbnail Selector for Non-Coating Products -->
                    <div class="img-select">
                        <?php 
                        foreach ($product_images as $index => $image) {
                            if ($image) {
                                echo '<div class="img-item">';
                                echo '<a href="#" data-id="' . ($index + 1) . '">';
                                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                                echo '</a>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Product Details -->
            <div class="product-details">
                <h2 class="product-title1"><?php echo esc_html($product_name); ?></h2>
                <div class="product-description1">
                    <?php echo apply_filters('the_content', $product_description); ?>
                </div>
                <div class="product-specs1">
                    <h3>Product Specs</h3>
                    <ul>
                        <?php
                        $specs = explode(PHP_EOL, $product_specs);
                        foreach ($specs as $spec) {
                            echo '<li>' . esc_html($spec) . '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="table-single-product">
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Size</th>
                <?php if (in_array('coating', $product_taxonomies)) : ?>
                    <th>Color</th>
                <?php endif; ?>
                <th>Safety Data Sheet</th>
                <th>Technical Data Sheet</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo esc_html($product_name); ?></td>
                <td><?php echo esc_html($product_sizepack); ?></td>
                <?php if (in_array('coating', $product_taxonomies)) : ?>
                    <td><?php echo esc_html($product_color); ?></td>
                <?php endif; ?>
                <td>
                    <a href="<?php echo esc_url($product_safety_data_sheet); ?>">SDS</a>
                </td>
                <td>
                    <a href="<?php echo esc_url($product_technical_data_sheet); ?>">TDS</a>
                </td>
            </tr>
        </tbody>
    </table>

    <?php 
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 3,
        'post__not_in'   => array($current_product_id),
        'tax_query'      => array(
            array(
                'taxonomy' => 'product-type',
                'field'    => 'id',
                'terms'    => wp_get_post_terms($current_product_id, 'product-type', array('fields' => 'ids')),
            ),
        ),
    );

    $product_query = new WP_Query($args);

    if ($product_query->have_posts()) :
    ?>
        <div class="container">
            <div class="related-products">
                <h1>Related Products</h1>
                <div class="product-grid">
                    <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
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
            </div>
        </div>
    <?php 
    endif;
    wp_reset_postdata();
    ?>
</section>

<?php get_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const imgItems = document.querySelectorAll(".img-item a");
    const imgShowcase = document.querySelector(".img-showcase");

    imgItems.forEach((imgItem, idx) => {
        imgItem.addEventListener("click", (e) => {
            e.preventDefault();
            imgShowcase.style.transform = `translateX(${-100 * idx}%)`;
        });
    });
});
</script>
