<?php

get_header(); ?>

<div class="row">
    <div class="col-md-9">
        <section id="primary" class="content-area archive-feed events-feed">
            <main id="main" class="site-main" role="main">

			    <?php if ( have_posts() ) : ?>

                    <header>
                        <h1 class="archive-title">Ближайшие события</h1>
                    </header><!-- .page-header -->

				    <?php
				    $args = array(
					    'posts_per_page'=> 10,
					    'post_status' => 'publish',
					    'post_type' => 'events_calendar',
					    'meta_key' => '_event_time',
					    'orderby' => 'meta_value',
					    'order' => 'DESC'
				    );
				    // Start the Loop.
				    $myposts = get_posts( $args );
				    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                        <section id="post-<?php the_ID(); ?>" class="archive-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="archive-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                                </div>
                                <div class="col-md-10">
                                    <div class="archive-item-title">
                                        <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
                                    </div>
                                    <div class="time-place">
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
                                    <div class="archive-item-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </section>

                    <?php
					// End the loop.
                    endforeach;
				    wp_reset_postdata();

				    electro_numeric_posts_nav();

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
