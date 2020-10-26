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
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WJSK52');</script>
<!-- End Google Tag Manager -->

</head>
<body <?php body_class(); ?> data-themeurl="<?php echo esc_url(get_template_directory_uri()); ?>">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WJSK52"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="wrapper">
	<?php get_template_part( 'inc/header/mobile_menu' ); ?>
	
	<!-- Start Content Container -->
	<section id="content-container">
		<!-- Start Content Click Capture -->
		<div class="click-capture"></div>
		<!-- End Content Click Capture -->
		<?php get_template_part( 'inc/header/'.$header_style ); ?>
		<div role="main" class="cf">