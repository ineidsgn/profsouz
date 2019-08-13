<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

            </div><!-- container -->
        </div><!-- .site-content -->

        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" class="img-responsive" alt="Электропрофсоюз"/>
                            </div>
                            <div class="col-md-8 site-desc">
                                <?php
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description"><?php echo $description; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-12 counters-box"></div>
                        </div>
                    </div>
                    <div class="col-md-4 footer-menu">
                        <div class="row">
                            <div class="col-md-6">
                                <?php
                                // Primary navigation menu.
                                wp_nav_menu( array(
                                    'theme_location' => 'footer-menu-1'
                                ) );
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                // Primary navigation menu.
                                wp_nav_menu( array(
                                    'theme_location' => 'footer-menu-2'
                                ) );
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="phone-number text-right">
                            <span>
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/phone_footer.png"/> +7 (3812) 355-412
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 site-copyright">
                        2017 - Все права защищены
                    </div>
                </div>
            </div>


        </footer><!-- .site-footer -->

        <figure class="popup contact" style="display: none;">
            <div class="modal-body">
                <div class="close-modal"></div>
                <h2 class="text-center">Напишите нам</h2>
                <p class="text-center">Наш сайт создан для того, чтобы помогать. Если у Вас есть вопрос, или Вы нуждаетесь в помощи - напишите нам!</p>
                <?php echo do_shortcode('[contact-form-7 id="66" title="Напишите нам"]'); ?>
            </div>

        </figure>

    </div><!-- .site -->

    <?php wp_footer(); ?>

    <script>
        jQuery(document).ready(function( $ ) {
            $('.news-carousel').bxSlider({auto: true, pause: 5000});
            $('.events-carousel').bxSlider();
        });
    </script>

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter47535010 = new Ya.Metrika({ id:47535010, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/47535010" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

</body>
</html>
