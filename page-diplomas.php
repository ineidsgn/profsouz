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
        <section id="primary" class="content-area archive-feed achievements-feed">
            <main id="main" class="site-main" role="main">

	            <?php
	            // Start the loop.
	            while ( have_posts() ) : the_post();
	            ?>

                    <header>
                        <h1 class="archive-title">Наши достижения</h1>
                    </header><!-- .page-header -->

                    <div class="achievements-grid">

                    <?php

	                    global $post;
	                    $args = array(
		                    'posts_per_page'=> 6,
		                    'post_type' => 'achievements',
		                    'post_status' => 'publish',
		                    'paged' => get_query_var('paged')
	                    );

						query_posts( $args );
						while ( have_posts() ) :
							the_post(); ?>

			                <section id="post-<?php the_ID(); ?>" class="archive-item">
				                <a data-fancybox="gallery" href="<?php echo get_the_post_thumbnail_url($post->ID, 'full');?>">
					                <div class="archive-image" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full');?>');"></div>
				                </a>

				                <div class="archive-item-title">
					                <?php the_title(); ?>
				                </div>
			                </section>

			            <?php

					    endwhile;

					    ?>


                    </div>

		            <div>
			            <?php electro_numeric_posts_nav(); ?>
		            </div>
		            <?php

		            wp_reset_query();

		            ?>
	            <?php
	            // End the loop.
	            endwhile;
	            ?>

            </main><!-- .site-main -->
        </section><!-- .content-area -->
    </div>
</div>

<?php get_footer(); ?>
