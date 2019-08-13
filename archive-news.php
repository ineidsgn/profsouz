<?php

get_header(); ?>

<div class="row">
    <div class="col-md-9">
        <section id="primary" class="content-area archive-feed news-feed">
            <main id="main" class="site-main" role="main">

			    <?php if ( have_posts() ) : ?>

                    <header>
                        <h1 class="archive-title">Новости</h1>
                    </header><!-- .page-header -->

				    <?php
				    // Start the Loop.
				    while ( have_posts() ) : the_post();
				    ?>
                         <section id="post-<?php the_ID(); ?>" class="archive-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="archive-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="archive-item-title">
                                        <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
                                    </div>
                                    <div class="archive-item-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <div class="archive-item-date"><?php the_time('d.m.Y'); ?></div>
                                </div>
                            </div>
                        </section>

                    <?php
					// End the loop.
				    endwhile;

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
