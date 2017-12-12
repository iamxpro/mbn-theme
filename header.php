<?php
/**
 * header (header.php)
 * @package WordPress
 * @subpackage MBN
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php /* RSS */ ?>
        <link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
        <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
        <link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!--[if lt IE 9]>
        <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav" aria-expanded="false">
                                    <span class="sr-only">Menu</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                                    <?php
                                    $custom_logo_id = get_theme_mod('custom_logo');
                                    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                                    if (!empty($image)) {
                                        echo '<img src="' . $image[0] . '" class="img-responsive">';
                                    } else {
                                        echo '<h1>' . bloginfo('name') . '<h1>';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="collapse navbar-collapse" id="topnav">
                                <?php
                                $args = array(
                                    'theme_location' => 'main_menu',
                                    'container' => false,
                                    'menu_id' => 'top-nav-ul',
                                    'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
                                    'menu_class' => 'top-menu',
                                    'walker' => new bootstrap_menu(true)
                                );
                                wp_nav_menu($args);
                                ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>