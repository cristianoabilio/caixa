<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_site_icon(); ?>
	<?php do_action( 'thb_fb_information' ); ?>
	<?php
		$header_style = (isset($_GET['header_style']) ? htmlspecialchars($_GET['header_style']) : ot_get_option('header_style', 'style1'));

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/checkout.css'; ?>" />
</head>
<body <?php body_class(); ?> data-themeurl="<?php echo esc_url(get_template_directory_uri()); ?>">

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WJSK52"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WJSK52');</script>
<!-- End Google Tag Manager -->

<div id="wrapper" class="wrapper-checkout">
	<?php get_template_part( 'inc/header/mobile_menu' ); ?>

	<!-- Start Content Container -->
	<section id="content-container">
		<!-- Start Content Click Capture -->
		<div class="click-capture"></div>
		<!-- End Content Click Capture -->
        <?php
        $id = get_queried_object_id();
        $mobile_icon = ot_get_option('mobile_menu_icon', 'on');
        $header_menu_color = ot_get_option('header_menu_color', 'dark') == 'dark' ? '' : 'light-menu-color';
        if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = THB_THEME_ROOT. '/assets/img/logo.png'; }
        ?>

        <!-- Start Header -->
        <div class="header_container header-checkout">
            <header class="header style2" role="banner">
                <div class="header_top cf">
                    <div class="row full-width-row">
                        <div class="small-4 medium-6 columns logo">
                            <div>
                                <a href="<?php echo esc_url(home_url()); ?>" class="logolink" title="<?php bloginfo('name'); ?>">
                                    <img src="<?php echo esc_url($logo); ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/>
                                </a>
                            </div>
                        </div>
                        <?php
                        global $wp;
                        $currentSlug = add_query_arg(array(), $wp->request);
                        $checkoutStep = 0;
                        if (preg_match('/(cadastro|login)/i', $currentSlug)) {
                            $checkoutStep = 1;
                        }
                        if (stripos($currentSlug, 'entrega') !== false) {
                            $checkoutStep = 2;
                        }
                        if (stripos($currentSlug, 'conclusao') !== false) {
                            $checkoutStep = 3;
                        }
                        ?>
                        
                    </div>
                </div>
            </header>
        </div>
        <!-- End Header -->
		<div role="main" class="cf">
