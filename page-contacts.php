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

<figure class="contacts-page">
    <header>
        <h1 class="contacts-title">Контакты</h1>
    </header>

    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A7009cc55c26a5ecdfb8ceaa75832f6580e9f838eb94d4cbea7d68998e6ab63a8&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <div class="col-sm-6">

                <div class="contacts-content">

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

			                <?php
			                // Start the loop.
			                while ( have_posts() ) : the_post();

				                the_content();

				                // End the loop.
			                endwhile;
			                ?>

                        </main><!-- .site-main -->
                    </div><!-- .content-area -->

                    <div class="contact-button">
                        <a href="#" data-modal="contact" class="modal-button btn btn-block gold-button">Напишите нам</a>
                    </div>

                </div>

            </div>
        </div>
    </div>

</figure>



<?php get_footer(); ?>
