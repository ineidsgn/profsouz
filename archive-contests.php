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
    <div class="col-md-9">
        <section id="primary" class="content-area archive-feed news-feed">
            <main id="main" class="site-main" role="main">

			    <?php if ( have_posts() ) : ?>

                    <header>
                        <?php $title = post_type_archive_title('',false); ?>
                        <?php if (empty($title)) { ?>
                            <?php the_archive_title( '<h1 class="archive-title">', '</h1>' ); ?>
                        <?php } else { ?>
                            <h1 class="archive-title"><?php post_type_archive_title(); ?></h1>
                        <?php } ?>
                    </header><!-- .page-header -->

				    <?php

				    $taxonomy = 'contest';
				    $terms = get_terms($taxonomy); // Get all terms of a taxonomy
                    $terms = array_slice($terms, 0, 10);

				    if ( $terms && !is_wp_error( $terms ) ) :
					    ?>
                        <figure class="contests-list">
                            <ul>
		                        <?php foreach ( $terms as $term ) { ?>
                                    <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
		                        <?php } ?>
                            </ul>
                        </figure>

				    <?php endif;?>

				    <?php

			    // If no content, include the "No posts found" template.
			    else :
				    get_template_part( 'content', 'none' );

			    endif;
			    ?>

            </main><!-- .site-main -->
        </section><!-- .content-area -->
    </div>
    <div class="col-md-3">
	    <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
