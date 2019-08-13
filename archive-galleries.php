<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="row">
    <div class="col-md-12">
        <section id="primary" class="content-area archive-feed galleries-feed">
            <main id="main" class="site-main" role="main">

			    <?php if ( have_posts() ) : ?>

                    <header>
                        <h1 class="archive-title">Фото и Видео</h1>
                    </header><!-- .page-header -->

                    <div class="galleries-grid">

				    <?php
				    // Start the Loop.
				    while ( have_posts() ) : the_post();
				    ?>
                        <section id="post-<?php the_ID(); ?>" class="archive-item">
                            <a href="<?php the_permalink(); ?>">
                                <div class="archive-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                            </a>

                            <div class="archive-item-title">
		                        <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
                            </div>
                            <div class="gallery-meta clearfix">
                                <div class="pull-left archive-item-date"><?php the_time('d.m.Y'); ?></div>
                                <div class="pull-left photos">
	                                <?php

	                                $galleries = get_post_galleries( get_the_ID(), false );
	                                $items = $galleries[0]['ids'];
	                                $items = explode(",",$items);
	                                echo count($items);
	                                ?> фото
                                </div>

	                            <?php
	                            $content = get_the_content();
	                            $videos = electro_count_videos($content);
	                            if ($videos > 0) { ?>
                                    <div class="pull-left videos">
	                                    <?php echo $videos.' видео'; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </section>

                    <?php
					// End the loop.
				    endwhile; ?>

                    </div>

                    <?php

				    electro_numeric_posts_nav();

			    // If no content, include the "No posts found" template.
			    else :
				    get_template_part( 'content', 'none' );

			    endif;
			    ?>

            </main><!-- .site-main -->
        </section><!-- .content-area -->
    </div>
</div>

<?php get_footer(); ?>
