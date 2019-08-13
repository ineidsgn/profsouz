<?php

get_header(); ?>

<div class="row">
    <div class="col-md-9">
        <section id="primary" class="content-area archive-feed digest-feed">
            <main id="main" class="site-main" role="main">

			    <?php if ( have_posts() ) : ?>

                    <header>
                        <h1 class="archive-title">Дайджест профсоюзных СМИ</h1>
                    </header><!-- .page-header -->

                    <figure class="prof-medias">
                        <h2>Профсоюзные СМИ:</h2>

                        <div class="profmedia-grid">
	                        <?php

	                        global $post;
	                        $args = array(
		                        'post_type' => 'profmedia',
		                        'post_status' => 'publish',
		                        'numberposts' => -1
	                        );

	                        $myposts = get_posts( $args );
	                        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                                <figure class="profimedia-item">
                                    <div class="profimedia-logo">
                                        <div class="media-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                                    </div>
                                    <div class="profimedia-url"><a target="_blank" href="<?php echo get_post_meta( $post->ID, '_media_url', true); ?>"><?php echo get_post_meta( $post->ID, '_media_url', true); ?></a></div>
                                    <div class="profimedia-title"><?php the_title(); ?></div>
                                </figure>

	                        <?php endforeach;
	                        wp_reset_postdata();?>

                        </div>
                    </figure>

                    <figure class="digest-grid">

                        <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post(); ?>

                            <div class="digest-item">

                                <section id="post-<?php the_ID(); ?>" class="archive-item ">
                                    <div class="archive-item-title">
                                        <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
                                    </div>
                                    <div class="archive-item-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="archive-item-date"><?php the_time('d.m.Y'); ?></div>
                                </section>

                            </div>

                            <?php
                            // End the loop.
                        endwhile; ?>

                    </figure>


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
    <div class="col-md-3">
	    <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
