<?php get_header(); ?>

<div class="content-area">
    <main>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">HOW TO APPLY <?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php if ($video_file = get_field('video')) : ?>
                        <div class="video-container">
                            <video controls>
                                <source src="<?php echo esc_url($video_file['url']); ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    <?php elseif ($oembed_video = get_field('video')) : ?>
                        <div class="video-container">
                            <?php echo $oembed_video; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </article>
    </main>
</div>

<?php get_footer(); ?>