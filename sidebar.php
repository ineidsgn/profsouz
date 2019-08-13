<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="secondary" class="secondary">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
		<?php endif; ?>

	</div><!-- .secondary -->

<?php endif; ?>

<?php if ( ( is_archive() ) && ( function_exists( 'democracy_poll' ) ) ) : ?>
    <figure class="home-poll sidebar">
        <div class="poll-title">Внимание, опрос!</div>
        <div class="poll-body">
	        <?php democracy_poll();?>
        </div>
    </figure>
<?php endif; ?>

<?php if ( ( is_archive() ) || ( is_front_page() ) ) : ?>
    <figure class="contact-widget">

        <div class="top-border"></div>
        <div class="contact-title">Напишите нам</div>
        <div class="contact-text">Наш сайт создан для того, чтобы помогать. Если у Вас есть вопрос, или Вы нуждаетесь в помощи - напишите нам!</div>
        <div class="contact-button">
            <a href="#" data-modal="contact" class="modal-button btn btn-block gold-button">Задать вопрос</a>
        </div>
        <div class="bottom-border"></div>

    </figure>

<?php endif; ?>

<?php if (( is_archive() ) && ( is_post_type_archive('news') ) ) { ?>

    <figure class="news-widget">
        <section class="announcements-title">Объявления</section>
		<?php

		global $post;
		$args = array(
			'posts_per_page' => 3,
			'post_type' => 'announces',
			'post_status' => 'publish',
			'orderby' => 'date',
			'order'       => 'DESC'
		);

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

            <section class="news-item">
                <div class="row">
                    <div class="col-md-12">
                        <div class="news-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                        <div class="news-item-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <div class="news-item-date"><?php the_time('d.m.Y'); ?></div>
                    </div>
                </div>
            </section>

		<?php endforeach;
		wp_reset_postdata();?>

        <div>
            <a href="<?php echo home_url(); ?>/announce" class="btn btn-block gold-button">Все объявления</a>
        </div>
    </figure>

    <figure class="news-widget">
        <div class="subscription-box">
            <section class="news-title">Подписка на новости</section>
            <?php es_subbox($namefield = "YES", $desc = "", $group = "Public"); ?>
        </div>
    </figure>

<?php } ?>

<?php if ( is_single() ) : ?>

    <figure class="news-widget">
        <section class="news-title">Новости</section>
		<?php

		global $post;
		$args = array(
		        'posts_per_page' => 3,
                'post_type' => 'news',
		        'post_status' => 'publish',
		        'orderby' => 'date',
		        'order'       => 'DESC'
        );

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>

                <section class="news-item">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="news-image" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>');"></div>
                            <div class="news-item-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </div>
                            <div class="news-item-date"><?php the_time('d.m.Y'); ?></div>
                        </div>
                    </div>
                </section>

		<?php endforeach;
		wp_reset_postdata();?>

        <div>
            <a href="<?php echo home_url(); ?>/news" class="btn btn-block gold-button">Смотреть все новости</a>
        </div>
    </figure>

<?php endif; ?>