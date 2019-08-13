<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div class="row">
    <div class="col-md-12">
	    <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' &rarr; '); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <figure class="internal-page gallery-post">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

			          <?php
			          // Start the loop.
			          while ( have_posts() ) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <header class="entry-header">
						                    <?php the_title( '<h1 class="entry-title">', '</h1>' );  ?>

                                <div class="gallery-meta clearfix">
                                    <div class="archive-item-date"><?php the_time('d.m.Y'); ?></div>
                                    <div class="photos">
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
                                        <div class="videos">
			                                <?php echo $videos.' видео'; ?>
                                        </div>
	                                <?php } ?>

                                </div>

                            </header><!-- .entry-header -->

                            <div class="entry-content">
						        <?php
						        /* translators: %s: Name of current post */
						        the_content( sprintf(
							        __( 'Continue reading %s', 'twentyfifteen' ),
							        the_title( '<span class="screen-reader-text">', '</span>', false )
						        ) );

							        ?>
                                <div class="gallery-container" id="videos_wrap"></div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

				    <?php    // End the loop.
			        endwhile;
			        ?>

                </main><!-- .site-main -->
            </div><!-- .content-area -->
        </figure>
    </div>
</div>

<?php get_footer(); ?>
