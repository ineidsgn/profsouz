<?php
/**
 * The template for displaying Home page
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

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <figure class="home-page">

                <div class="row">
                    <div class="col-md-8 news-wrap">
                        <figure class="news-carousel">
	                        <?php

	                        global $post;
	                        $args = array(
		                        'posts_per_page' => 4,
		                        'post_type' => 'news',
		                        'post_status' => 'publish'
	                        );

	                        $myposts = get_posts( $args );
	                        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                                <div class="news-frame">
                                    <div class="image-wrap" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                                    <div class="news-category">Главное</div>
                                    <div class="news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                </div>

	                        <?php

	                        endforeach;
	                        wp_reset_postdata();

	                        ?>

                        </figure>
                    </div>
                    <div class="col-md-4 events-wrap">
                        <div class="calendar-top"></div>
                        <div class="events-calendar">Календарь событий</div>
                        <figure class="events-carousel">
	                        <?php

	                        global $post;
	                        $args = array(
		                        'posts_per_page' => 3,
		                        'post_type' => 'events_calendar',
		                        'post_status' => 'publish',
		                        'meta_key' => '_event_time',
		                        'orderby' => 'meta_value',
		                        'order' => 'DESC'

	                        );

	                        $myposts = get_posts( $args );
	                        if ($myposts) {
	                          foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

		                          <?php
		                          $event_time = get_post_meta( $post->ID, '_event_time', true);
		                          ?>

				                        <div class="event-frame">
					                        <div class="event-image"></div>
					                        <div class="event-date"><?php echo date('d.m.Y',$event_time); ?></div>

					                        <div class="event-excerpt">
						                        <div class="event-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
						                        <p><?php the_excerpt(); ?></p>
					                        </div>
				                        </div>

	                          <?php endforeach;
	                        } else {
	                          ?>

		                        <div class="event-frame">
			                        <div class="event-image"></div>
			                        <div class="event-date"></div>

			                        <div class="event-excerpt">
				                        <div class="event-title"></div>
				                        <p>На ближайшее время ничего не запланировано.</p>
			                        </div>
		                        </div>

	                          <?php
	                        }

	                        wp_reset_postdata();?>

                        </figure>
                    </div>
                </div>

                <div class="row">
	                <?php if ( function_exists( 'democracy_poll' ) ): ?>
                    <div class="col-md-4">
                        <figure class="home-poll">
                            <div class="poll-title">Внимание, опрос!</div>
                            <div class="poll-body">
	                            <?php democracy_poll();?>
                            </div>
                        </figure>
                    </div>
	                <?php endif; ?>
                    <div class="col-md-<?php if ( function_exists( 'democracy_poll' )){echo "8";} else {echo "12";} ?>">
                        <figure class="announcements">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="announcements-title">
                                        Объявления
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="all-ans" href="announce"><strong>Все объявления</strong></a>
                                </div>
                            </div>
                            <div class="row">

                                <?php

	                            global $post;

	                            $args = array(
		                            'posts_per_page' => 3,
		                            'post_type' => 'announces',
		                            'post_status' => 'publish',
		                            'offset' => 0
	                            );

	                            $myposts = get_posts( $args );
	                            foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                                    <div class="col-md-4">
                                        <section class="announce">
                                            <div class="announce-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');">
                                            </div>
                                            <div class="announce-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                            <div class="announce-excerpt">
                                                <p><?php the_excerpt(); ?></p>
                                            </div>
                                            <div class="announce-date"><?php the_time('d.m.Y'); ?></div>
                                        </section>
                                    </div>

	                            <?php endforeach;
	                            wp_reset_postdata();?>

                            </div>
                        </figure>

                    </div>
                </div>

                <figure class="sep"></figure>

                <div class="row">
                    <div class="col-md-9">
                        <figure class="news-feed">
                            <section class="news-title">Новости</section>

	                        <?php

	                        global $post;
	                        $args = array(
		                        'posts_per_page' => 4,
		                        'post_type' => 'news',
		                        'post_status' => 'publish',
                                'offset' => 3
	                        );

	                        $myposts = get_posts( $args );
	                        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                                <section class="news-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="news-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="news-item-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                            <div class="news-item-excerpt">
                                                <p><?php the_excerpt(); ?></p>
                                            </div>
                                            <div class="news-item-date"><?php the_time('d.m.Y'); ?></div>
                                        </div>
                                    </div>
                                </section>

	                        <?php endforeach;
	                        wp_reset_postdata();?>

                            <div>
                                <a href="news" class="btn btn-block gold-button">Смотреть все новости</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-3">
			            <?php get_sidebar(); ?>
                    </div>
                </div>

                <figure class="sep"></figure>

	            <?php get_template_part('content', 'map'); ?>

            </figure>
		</main><!-- .site-main -->
	</div><!-- .content-area -->


<?php get_footer(); ?>
