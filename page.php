<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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
    <div class="col-md-9">
        <figure class="internal-page">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						get_template_part( 'content', 'page' );

						// End the loop.
					endwhile;
					?>

                </main><!-- .site-main -->
            </div><!-- .content-area -->
        </figure>
    </div>
    <div class="col-md-3">
        <?php if ((is_page('about')) || (electro_parent_slug() == 'about')) { // Меню дочерних страниц О нас
	        // Set up the objects needed
	        $my_wp_query = new WP_Query();
	        $all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));

            // Get the page as an Object
	        $about =  get_page_by_path('about');

            // Filter through all pages and find About's children
	        $about_children = get_page_children( $about->ID, $all_wp_pages );

            ?>
            <figure class="subpages-menu">
                <?php
	            foreach ($about_children as $child) { ?>
                    <? if (is_page($child->post_name)) { ?> <span><?php echo $child->post_title; ?></span> <?php } else { ?>
                        <a class=" "href="<?php echo get_the_permalink($child->ID); ?>"><?php echo $child->post_title; ?></a>
                    <?php } ?>
                <?php } ?>
            </figure>
        <?php
        } else {
	        get_sidebar();
        } ?>

    </div>
</div>

<?php get_footer(); ?>
