<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
		        ?>
                <?php if (get_post_type() == 'events_calendar') { ?>

                    <div class="event-date-place">

	                    <?php
	                    $event_time = get_post_meta( $post->ID, '_event_time', true);
	                    $event_position = get_post_meta( $post->ID, '_event_position', true);

	                    if (!empty($event_time)) { ?>
                            <span>Когда: <strong><?php echo date( 'd.m.Y G:i', $event_time ); ?></strong></span>
	                    <?php } ?>

	                    <?php if (!empty($event_position)) { ?>
                            <span>Где: <strong><?php echo $event_position; ?></strong></span>
	                    <?php } ?>

                    </div>

                <?php } else { ?>
                    <div class="internal-page-date"><?php the_time('d.m.Y'); ?></div>
		        <?php } ?>
                <?php
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<?php
	// Post thumbnail.
	//twentyfifteen_post_thumbnail();
	?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

		?>
	</div><!-- .entry-content -->

    <div>
	    <?php if (get_post_type() == 'contests') { ?>
		    <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
	    <?php } ?>
    </div>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
