<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800&amp;subset=cyrillic" rel="stylesheet">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->
	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text hidden" href="#content"><?php _e( 'Skip to content', 'twentyfifteen' ); ?></a>

    <header id="masthead" class="site-header" role="banner">
        <div class="container">
            <div class="row ">
                <div class="col-sm-3 col-md-5 hidden-xs">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 main-logo">
	                        <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" class="img-responsive" alt="Электропрофсоюз"/>
                            </a>
                        </div>
                        <div class="hidden-sm col-md-8 site-desc">
	                        <?php
	                        $description = get_bloginfo( 'description', 'display' );
	                        if ( $description || is_customize_preview() ) : ?>
                            <p class="site-description"><?php echo $description; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 hidden-xs"><?php get_search_form(); ?></div>

                <div class="col-lg-1"></div>

                <div class="col-sm-5 col-md-4 col-lg-3">
                    <div class="row lang-login">
                        <div class="col-xs-6">
                            <ul class="lang-selector">

                                <!-- GTranslate: https://gtranslate.io/ -->
                                <li onclick="doGTranslate('ru|en');return false;" title="English" class="glink nturl notranslate" alt="Russian">EN</li><li onclick="doGTranslate('ru|ru');return false;" title="Russian" class="glink nturl notranslate" alt="Russian">RU</li><style type="text/css">
                                    #goog-gt-tt {display:none !important;}
                                    .goog-te-banner-frame {display:none !important;}
                                    .goog-te-menu-value:hover {text-decoration:none !important;}
                                    .goog-text-highlight {background-color:transparent !important;box-shadow:none !important;}
                                    body {top:0 !important;}
                                    #google_translate_element2 {display:none!important;}
                                </style>

                                <div id="google_translate_element2"></div>
                                <script type="text/javascript">
                                    function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'ru',autoDisplay: false}, 'google_translate_element2');}
                                </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


                                <script type="text/javascript">
                                    function GTranslateGetCurrentLang() {var keyValue = document['cookie'].match('(^|;) ?googtrans=([^;]*)(;|$)');return keyValue ? keyValue[2].split('/')[2] : null;}
                                    function GTranslateFireEvent(element,event){try{if(document.createEventObject){var evt=document.createEventObject();element.fireEvent('on'+event,evt)}else{var evt=document.createEvent('HTMLEvents');evt.initEvent(event,true,true);element.dispatchEvent(evt)}}catch(e){}}
                                    function doGTranslate(lang_pair){if(lang_pair.value)lang_pair=lang_pair.value;if(lang_pair=='')return;var lang=lang_pair.split('|')[1];if(GTranslateGetCurrentLang() == null && lang == lang_pair.split('|')[0])return;var teCombo;var sel=document.getElementsByTagName('select');for(var i=0;i<sel.length;i++)if(/goog-te-combo/.test(sel[i].className)){teCombo=sel[i];break;}if(document.getElementById('google_translate_element2')==null||document.getElementById('google_translate_element2').innerHTML.length==0||teCombo.length==0||teCombo.innerHTML.length==0){setTimeout(function(){doGTranslate(lang_pair)},500)}else{teCombo.value=lang;GTranslateFireEvent(teCombo,'change');GTranslateFireEvent(teCombo,'change')}}
                                </script>

                            </ul>
                        </div>
                        <div class="col-xs-6 text-right">
                            <a class="sign-in" href="<?php echo wp_login_url(); ?>">
                                Войти на сайт
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 phone-number">
                            <span><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/phone.png"/> +7 (3812) 355-412</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5 col-lg-5 text-center top-10">
                            <a class="youtube-link" href="https://www.youtube.com/channel/UC0mUB2Lj4ifbkXUtS9dJRIQ" target="_blank"><img width="70" src="<?php echo get_stylesheet_directory_uri(); ?>/img/you_tube.png" title="YouTube"/></a>
                        </div>
	                    <div class="col-xs-3 col-lg-3 text-center top-10">
		                    <a class="instagram-link" href="https://www.instagram.com/ppo_omskenergo/" target="_blank"><img width="20" src="<?php echo get_stylesheet_directory_uri(); ?>/img/instagram.png" title="Instagram"/></a>
	                    </div>
	                    <div class="col-xs-4 col-lg-3 text-center top-10">
		                    <a class="vk-link" href="https://vk.com/public189369364" target="_blank"><img width="20" src="<?php echo get_stylesheet_directory_uri(); ?>/img/vk_icon.png" title="Вконтакте"/></a>
	                    </div>
                    </div>
	                <div class="top-10"></div>
                </div>

                <div class="visible-sm col-sm-12">
	                <?php
	                $description = get_bloginfo( 'description', 'display' );
	                if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo $description; ?></p>
	                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="main-menu-wrap">
            <div class="container">
                <div class="navbar-header">
                    <button aria-controls="bs-navbar" aria-expanded="false" class="collapsed navbar-toggle" data-target="#bs-navbar" data-toggle="collapse" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
                    <a href="../" class="navbar-brand visible-xs"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Электропрофсоюз"/></a>
                </div>
                <nav class="collapse navbar-collapse" id="bs-navbar">
                    <div class="visible-xs"><?php get_search_form(); ?></div>
	                <?php
	                // Primary navigation menu.
	                wp_nav_menu( array(
		                'menu_class'     => 'nav navbar-nav',
		                'theme_location' => 'primary',
	                ) );
	                ?>
                </nav>
            </div>
        </div>
    </header><!-- .site-header -->

    <div id="content" class="site-content">
        <div class="container">