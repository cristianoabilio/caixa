<?php
/* Title Tag */
function thb_theme_setup() {
   /* Text Domain */
   load_theme_textdomain('thevoux', THB_THEME_ROOT_ABS . '/inc/languages');
   
   /* Background Support */
   add_theme_support( 'custom-background', array( 'default-color' => 'ffffff') );
   
   /* Image Settings */
   add_theme_support( 'post-thumbnails' );
   set_post_thumbnail_size( 100, 90, true );
   add_image_size('thevoux-featured', 1170, 500, true );
   add_image_size('thevoux-single', 800, 600, true );
   add_image_size('thevoux-megamenu', 240, 150, true );
   add_image_size('thevoux-masonry', 600, 9999, false );
   add_image_size('thevoux-blog-list', 370, 190, true );
   add_image_size('thevoux-style1', 600, 460, true );
   add_image_size('thevoux-style2', 600, 600, true );
   add_image_size('thevoux-style3', 570, 450, true );
   add_image_size('thevoux-style8', 570, 450, true );
   add_image_size('thevoux-style3-small', 540, 280, true );
   add_image_size('thevoux-widget', 340, 150, true );
   add_image_size('thevoux-vertical', 320, 380, true );
   /* Post Formats */
   add_theme_support('post-formats', array('image', 'gallery', 'video'));
   
   /* HTML5 Galleries */
   add_theme_support( 'html5', array( 'gallery', 'caption', 'comment-list' ) );
   add_filter( 'use_default_gallery_style', '__return_false' );
   
   /* Editor Styling */
   $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lora:300,400,400italic,500,600,700' );
   add_editor_style( array($font_url, 'assets/css/editor-style.css') );
   
   /* Required Settings */
   if(!isset($content_width)) $content_width = 1170;
   add_theme_support( 'automatic-feed-links' );
   
   /* Title Support */
   add_theme_support( 'title-tag' );
   
   /* WooCommerce Support */
   add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'thb_theme_setup' );


/* Youtube & Vimeo Embeds */
function thb_remove_youtube_controls($code){
  if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false || strpos($code, 'player.vimeo.com') !== false){
  		if(strpos($code, 'youtu.be') !== false || strpos($code, 'youtube.com') !== false) {
      	$return = preg_replace("@src=(['\"])?([^'\">\s]*)@", "src=$1$2&showinfo=0&rel=0&modestbranding=1", $code);
  		} else {
      	$return = $code;
  		}
      $return = '<div class="flex-video widescreen'.(strpos($code, 'player.vimeo.com') !== false ? ' vimeo' : ' youtube').'">'.$return.'</div>';
  } else {
      $return = $code;
  }
  return $return;
}
 
add_filter('embed_handler_html', 'thb_remove_youtube_controls');
add_filter('embed_oembed_html', 'thb_remove_youtube_controls');

/* Author FB, TW & G+ Links */
function thb_my_new_contactmethods( $contactmethods ) {
// Add Position
$contactmethods['position'] = 'Position';
// Add Twitter
$contactmethods['twitter'] = 'Twitter URL';
// Add Facebook
$contactmethods['facebook'] = 'Facebook URL';
// Add Google+
$contactmethods['googleplus'] = 'Google Plus URL';

return $contactmethods;
}
add_filter('user_contactmethods','thb_my_new_contactmethods',10,1);

/* Font Awesome Array */
function thb_getIconArray(){
	$icons = array(
		'' => '', 'fa-glass' => 'fa-glass', 'fa-music' => 'fa-music', 'fa-search' => 'fa-search', 'fa-envelope-o' => 'fa-envelope-o', 'fa-heart' => 'fa-heart', 'fa-star' => 'fa-star', 'fa-star-o' => 'fa-star-o', 'fa-user' => 'fa-user', 'fa-film' => 'fa-film', 'fa-th-large' => 'fa-th-large', 'fa-th' => 'fa-th', 'fa-th-list' => 'fa-th-list', 'fa-check' => 'fa-check', 'fa-times' => 'fa-times', 'fa-search-plus' => 'fa-search-plus', 'fa-search-minus' => 'fa-search-minus', 'fa-power-off' => 'fa-power-off', 'fa-signal' => 'fa-signal', 'fa-cog' => 'fa-cog', 'fa-trash-o' => 'fa-trash-o', 'fa-home' => 'fa-home', 'fa-file-o' => 'fa-file-o', 'fa-clock-o' => 'fa-clock-o', 'fa-road' => 'fa-road', 'fa-download' => 'fa-download', 'fa-arrow-circle-o-down' => 'fa-arrow-circle-o-down', 'fa-arrow-circle-o-up' => 'fa-arrow-circle-o-up', 'fa-inbox' => 'fa-inbox', 'fa-play-circle-o' => 'fa-play-circle-o', 'fa-repeat' => 'fa-repeat', 'fa-refresh' => 'fa-refresh', 'fa-list-alt' => 'fa-list-alt', 'fa-lock' => 'fa-lock', 'fa-flag' => 'fa-flag', 'fa-headphones' => 'fa-headphones', 'fa-volume-off' => 'fa-volume-off', 'fa-volume-down' => 'fa-volume-down', 'fa-volume-up' => 'fa-volume-up', 'fa-qrcode' => 'fa-qrcode', 'fa-barcode' => 'fa-barcode', 'fa-tag' => 'fa-tag', 'fa-tags' => 'fa-tags', 'fa-book' => 'fa-book', 'fa-bookmark' => 'fa-bookmark', 'fa-print' => 'fa-print', 'fa-camera' => 'fa-camera', 'fa-font' => 'fa-font', 'fa-bold' => 'fa-bold', 'fa-italic' => 'fa-italic', 'fa-text-height' => 'fa-text-height', 'fa-text-width' => 'fa-text-width', 'fa-align-left' => 'fa-align-left', 'fa-align-center' => 'fa-align-center', 'fa-align-right' => 'fa-align-right', 'fa-align-justify' => 'fa-align-justify', 'fa-list' => 'fa-list', 'fa-outdent' => 'fa-outdent', 'fa-indent' => 'fa-indent', 'fa-video-camera' => 'fa-video-camera', 'fa-picture-o' => 'fa-picture-o', 'fa-pencil' => 'fa-pencil', 'fa-map-marker' => 'fa-map-marker', 'fa-adjust' => 'fa-adjust', 'fa-tint' => 'fa-tint', 'fa-pencil-square-o' => 'fa-pencil-square-o', 'fa-share-square-o' => 'fa-share-square-o', 'fa-check-square-o' => 'fa-check-square-o', 'fa-arrows' => 'fa-arrows', 'fa-step-backward' => 'fa-step-backward', 'fa-fast-backward' => 'fa-fast-backward', 'fa-backward' => 'fa-backward', 'fa-play' => 'fa-play', 'fa-pause' => 'fa-pause', 'fa-stop' => 'fa-stop', 'fa-forward' => 'fa-forward', 'fa-fast-forward' => 'fa-fast-forward', 'fa-step-forward' => 'fa-step-forward', 'fa-eject' => 'fa-eject', 'fa-chevron-left' => 'fa-chevron-left', 'fa-chevron-right' => 'fa-chevron-right', 'fa-plus-circle' => 'fa-plus-circle', 'fa-minus-circle' => 'fa-minus-circle', 'fa-times-circle' => 'fa-times-circle', 'fa-check-circle' => 'fa-check-circle', 'fa-question-circle' => 'fa-question-circle', 'fa-info-circle' => 'fa-info-circle', 'fa-crosshairs' => 'fa-crosshairs', 'fa-times-circle-o' => 'fa-times-circle-o', 'fa-check-circle-o' => 'fa-check-circle-o', 'fa-ban' => 'fa-ban', 'fa-arrow-left' => 'fa-arrow-left', 'fa-arrow-right' => 'fa-arrow-right', 'fa-arrow-up' => 'fa-arrow-up', 'fa-arrow-down' => 'fa-arrow-down', 'fa-share' => 'fa-share', 'fa-expand' => 'fa-expand', 'fa-compress' => 'fa-compress', 'fa-plus' => 'fa-plus', 'fa-minus' => 'fa-minus', 'fa-asterisk' => 'fa-asterisk', 'fa-exclamation-circle' => 'fa-exclamation-circle', 'fa-gift' => 'fa-gift', 'fa-leaf' => 'fa-leaf', 'fa-fire' => 'fa-fire', 'fa-eye' => 'fa-eye', 'fa-eye-slash' => 'fa-eye-slash', 'fa-exclamation-triangle' => 'fa-exclamation-triangle', 'fa-plane' => 'fa-plane', 'fa-calendar' => 'fa-calendar', 'fa-random' => 'fa-random', 'fa-comment' => 'fa-comment', 'fa-magnet' => 'fa-magnet', 'fa-chevron-up' => 'fa-chevron-up', 'fa-chevron-down' => 'fa-chevron-down', 'fa-retweet' => 'fa-retweet', 'fa-shopping-cart' => 'fa-shopping-cart', 'fa-folder' => 'fa-folder', 'fa-folder-open' => 'fa-folder-open', 'fa-arrows-v' => 'fa-arrows-v', 'fa-arrows-h' => 'fa-arrows-h', 'fa-bar-chart' => 'fa-bar-chart', 'fa-twitter-square' => 'fa-twitter-square', 'fa-facebook-square' => 'fa-facebook-square', 'fa-camera-retro' => 'fa-camera-retro', 'fa-key' => 'fa-key', 'fa-cogs' => 'fa-cogs', 'fa-comments' => 'fa-comments', 'fa-thumbs-o-up' => 'fa-thumbs-o-up', 'fa-thumbs-o-down' => 'fa-thumbs-o-down', 'fa-star-half' => 'fa-star-half', 'fa-heart-o' => 'fa-heart-o', 'fa-sign-out' => 'fa-sign-out', 'fa-linkedin-square' => 'fa-linkedin-square', 'fa-thumb-tack' => 'fa-thumb-tack', 'fa-external-link' => 'fa-external-link', 'fa-sign-in' => 'fa-sign-in', 'fa-trophy' => 'fa-trophy', 'fa-github-square' => 'fa-github-square', 'fa-upload' => 'fa-upload', 'fa-lemon-o' => 'fa-lemon-o', 'fa-phone' => 'fa-phone', 'fa-square-o' => 'fa-square-o', 'fa-bookmark-o' => 'fa-bookmark-o', 'fa-phone-square' => 'fa-phone-square', 'fa-twitter' => 'fa-twitter', 'fa-facebook' => 'fa-facebook', 'fa-github' => 'fa-github', 'fa-unlock' => 'fa-unlock', 'fa-credit-card' => 'fa-credit-card', 'fa-rss' => 'fa-rss', 'fa-hdd-o' => 'fa-hdd-o', 'fa-bullhorn' => 'fa-bullhorn', 'fa-bell' => 'fa-bell', 'fa-certificate' => 'fa-certificate', 'fa-hand-o-right' => 'fa-hand-o-right', 'fa-hand-o-left' => 'fa-hand-o-left', 'fa-hand-o-up' => 'fa-hand-o-up', 'fa-hand-o-down' => 'fa-hand-o-down', 'fa-arrow-circle-left' => 'fa-arrow-circle-left', 'fa-arrow-circle-right' => 'fa-arrow-circle-right', 'fa-arrow-circle-up' => 'fa-arrow-circle-up', 'fa-arrow-circle-down' => 'fa-arrow-circle-down', 'fa-globe' => 'fa-globe', 'fa-wrench' => 'fa-wrench', 'fa-tasks' => 'fa-tasks', 'fa-filter' => 'fa-filter', 'fa-briefcase' => 'fa-briefcase', 'fa-arrows-alt' => 'fa-arrows-alt', 'fa-users' => 'fa-users', 'fa-link' => 'fa-link', 'fa-cloud' => 'fa-cloud', 'fa-flask' => 'fa-flask', 'fa-scissors' => 'fa-scissors', 'fa-files-o' => 'fa-files-o', 'fa-paperclip' => 'fa-paperclip', 'fa-floppy-o' => 'fa-floppy-o', 'fa-square' => 'fa-square', 'fa-bars' => 'fa-bars', 'fa-list-ul' => 'fa-list-ul', 'fa-list-ol' => 'fa-list-ol', 'fa-strikethrough' => 'fa-strikethrough', 'fa-underline' => 'fa-underline', 'fa-table' => 'fa-table', 'fa-magic' => 'fa-magic', 'fa-truck' => 'fa-truck', 'fa-pinterest' => 'fa-pinterest', 'fa-pinterest-square' => 'fa-pinterest-square', 'fa-google-plus-square' => 'fa-google-plus-square', 'fa-google-plus' => 'fa-google-plus', 'fa-money' => 'fa-money', 'fa-caret-down' => 'fa-caret-down', 'fa-caret-up' => 'fa-caret-up', 'fa-caret-left' => 'fa-caret-left', 'fa-caret-right' => 'fa-caret-right', 'fa-columns' => 'fa-columns', 'fa-sort' => 'fa-sort', 'fa-sort-desc' => 'fa-sort-desc', 'fa-sort-asc' => 'fa-sort-asc', 'fa-envelope' => 'fa-envelope', 'fa-linkedin' => 'fa-linkedin', 'fa-undo' => 'fa-undo', 'fa-gavel' => 'fa-gavel', 'fa-tachometer' => 'fa-tachometer', 'fa-comment-o' => 'fa-comment-o', 'fa-comments-o' => 'fa-comments-o', 'fa-bolt' => 'fa-bolt', 'fa-sitemap' => 'fa-sitemap', 'fa-umbrella' => 'fa-umbrella', 'fa-clipboard' => 'fa-clipboard', 'fa-lightbulb-o' => 'fa-lightbulb-o', 'fa-exchange' => 'fa-exchange', 'fa-cloud-download' => 'fa-cloud-download', 'fa-cloud-upload' => 'fa-cloud-upload', 'fa-user-md' => 'fa-user-md', 'fa-stethoscope' => 'fa-stethoscope', 'fa-suitcase' => 'fa-suitcase', 'fa-bell-o' => 'fa-bell-o', 'fa-coffee' => 'fa-coffee', 'fa-cutlery' => 'fa-cutlery', 'fa-file-text-o' => 'fa-file-text-o', 'fa-building-o' => 'fa-building-o', 'fa-hospital-o' => 'fa-hospital-o', 'fa-ambulance' => 'fa-ambulance', 'fa-medkit' => 'fa-medkit', 'fa-fighter-jet' => 'fa-fighter-jet', 'fa-beer' => 'fa-beer', 'fa-h-square' => 'fa-h-square', 'fa-plus-square' => 'fa-plus-square', 'fa-angle-double-left' => 'fa-angle-double-left', 'fa-angle-double-right' => 'fa-angle-double-right', 'fa-angle-double-up' => 'fa-angle-double-up', 'fa-angle-double-down' => 'fa-angle-double-down', 'fa-angle-left' => 'fa-angle-left', 'fa-angle-right' => 'fa-angle-right', 'fa-angle-up' => 'fa-angle-up', 'fa-angle-down' => 'fa-angle-down', 'fa-desktop' => 'fa-desktop', 'fa-laptop' => 'fa-laptop', 'fa-tablet' => 'fa-tablet', 'fa-mobile' => 'fa-mobile', 'fa-circle-o' => 'fa-circle-o', 'fa-quote-left' => 'fa-quote-left', 'fa-quote-right' => 'fa-quote-right', 'fa-spinner' => 'fa-spinner', 'fa-circle' => 'fa-circle', 'fa-reply' => 'fa-reply', 'fa-github-alt' => 'fa-github-alt', 'fa-folder-o' => 'fa-folder-o', 'fa-folder-open-o' => 'fa-folder-open-o', 'fa-smile-o' => 'fa-smile-o', 'fa-frown-o' => 'fa-frown-o', 'fa-meh-o' => 'fa-meh-o', 'fa-gamepad' => 'fa-gamepad', 'fa-keyboard-o' => 'fa-keyboard-o', 'fa-flag-o' => 'fa-flag-o', 'fa-flag-checkered' => 'fa-flag-checkered', 'fa-terminal' => 'fa-terminal', 'fa-code' => 'fa-code', 'fa-reply-all' => 'fa-reply-all', 'fa-star-half-o' => 'fa-star-half-o', 'fa-location-arrow' => 'fa-location-arrow', 'fa-crop' => 'fa-crop', 'fa-code-fork' => 'fa-code-fork', 'fa-chain-broken' => 'fa-chain-broken', 'fa-question' => 'fa-question', 'fa-info' => 'fa-info', 'fa-exclamation' => 'fa-exclamation', 'fa-superscript' => 'fa-superscript', 'fa-subscript' => 'fa-subscript', 'fa-eraser' => 'fa-eraser', 'fa-puzzle-piece' => 'fa-puzzle-piece', 'fa-microphone' => 'fa-microphone', 'fa-microphone-slash' => 'fa-microphone-slash', 'fa-shield' => 'fa-shield', 'fa-calendar-o' => 'fa-calendar-o', 'fa-fire-extinguisher' => 'fa-fire-extinguisher', 'fa-rocket' => 'fa-rocket', 'fa-maxcdn' => 'fa-maxcdn', 'fa-chevron-circle-left' => 'fa-chevron-circle-left', 'fa-chevron-circle-right' => 'fa-chevron-circle-right', 'fa-chevron-circle-up' => 'fa-chevron-circle-up', 'fa-chevron-circle-down' => 'fa-chevron-circle-down', 'fa-html5' => 'fa-html5', 'fa-css3' => 'fa-css3', 'fa-anchor' => 'fa-anchor', 'fa-unlock-alt' => 'fa-unlock-alt', 'fa-bullseye' => 'fa-bullseye', 'fa-ellipsis-h' => 'fa-ellipsis-h', 'fa-ellipsis-v' => 'fa-ellipsis-v', 'fa-rss-square' => 'fa-rss-square', 'fa-play-circle' => 'fa-play-circle', 'fa-ticket' => 'fa-ticket', 'fa-minus-square' => 'fa-minus-square', 'fa-minus-square-o' => 'fa-minus-square-o', 'fa-level-up' => 'fa-level-up', 'fa-level-down' => 'fa-level-down', 'fa-check-square' => 'fa-check-square', 'fa-pencil-square' => 'fa-pencil-square', 'fa-external-link-square' => 'fa-external-link-square', 'fa-share-square' => 'fa-share-square', 'fa-compass' => 'fa-compass', 'fa-caret-square-o-down' => 'fa-caret-square-o-down', 'fa-caret-square-o-up' => 'fa-caret-square-o-up', 'fa-caret-square-o-right' => 'fa-caret-square-o-right', 'fa-eur' => 'fa-eur', 'fa-gbp' => 'fa-gbp', 'fa-usd' => 'fa-usd', 'fa-inr' => 'fa-inr', 'fa-jpy' => 'fa-jpy', 'fa-rub' => 'fa-rub', 'fa-krw' => 'fa-krw', 'fa-btc' => 'fa-btc', 'fa-file' => 'fa-file', 'fa-file-text' => 'fa-file-text', 'fa-sort-alpha-asc' => 'fa-sort-alpha-asc', 'fa-sort-alpha-desc' => 'fa-sort-alpha-desc', 'fa-sort-amount-asc' => 'fa-sort-amount-asc', 'fa-sort-amount-desc' => 'fa-sort-amount-desc', 'fa-sort-numeric-asc' => 'fa-sort-numeric-asc', 'fa-sort-numeric-desc' => 'fa-sort-numeric-desc', 'fa-thumbs-up' => 'fa-thumbs-up', 'fa-thumbs-down' => 'fa-thumbs-down', 'fa-youtube-square' => 'fa-youtube-square', 'fa-youtube' => 'fa-youtube', 'fa-xing' => 'fa-xing', 'fa-xing-square' => 'fa-xing-square', 'fa-youtube-play' => 'fa-youtube-play', 'fa-dropbox' => 'fa-dropbox', 'fa-stack-overflow' => 'fa-stack-overflow', 'fa-instagram' => 'fa-instagram', 'fa-flickr' => 'fa-flickr', 'fa-adn' => 'fa-adn', 'fa-bitbucket' => 'fa-bitbucket', 'fa-bitbucket-square' => 'fa-bitbucket-square', 'fa-tumblr' => 'fa-tumblr', 'fa-tumblr-square' => 'fa-tumblr-square', 'fa-long-arrow-down' => 'fa-long-arrow-down', 'fa-long-arrow-up' => 'fa-long-arrow-up', 'fa-long-arrow-left' => 'fa-long-arrow-left', 'fa-long-arrow-right' => 'fa-long-arrow-right', 'fa-apple' => 'fa-apple', 'fa-windows' => 'fa-windows', 'fa-android' => 'fa-android', 'fa-linux' => 'fa-linux', 'fa-dribbble' => 'fa-dribbble', 'fa-skype' => 'fa-skype', 'fa-foursquare' => 'fa-foursquare', 'fa-trello' => 'fa-trello', 'fa-female' => 'fa-female', 'fa-male' => 'fa-male', 'fa-gratipay' => 'fa-gratipay', 'fa-sun-o' => 'fa-sun-o', 'fa-moon-o' => 'fa-moon-o', 'fa-archive' => 'fa-archive', 'fa-bug' => 'fa-bug', 'fa-vk' => 'fa-vk', 'fa-weibo' => 'fa-weibo', 'fa-renren' => 'fa-renren', 'fa-pagelines' => 'fa-pagelines', 'fa-stack-exchange' => 'fa-stack-exchange', 'fa-arrow-circle-o-right' => 'fa-arrow-circle-o-right', 'fa-arrow-circle-o-left' => 'fa-arrow-circle-o-left', 'fa-caret-square-o-left' => 'fa-caret-square-o-left', 'fa-dot-circle-o' => 'fa-dot-circle-o', 'fa-wheelchair' => 'fa-wheelchair', 'fa-vimeo-square' => 'fa-vimeo-square', 'fa-try' => 'fa-try', 'fa-plus-square-o' => 'fa-plus-square-o', 'fa-space-shuttle' => 'fa-space-shuttle', 'fa-slack' => 'fa-slack', 'fa-envelope-square' => 'fa-envelope-square', 'fa-wordpress' => 'fa-wordpress', 'fa-openid' => 'fa-openid', 'fa-university' => 'fa-university', 'fa-graduation-cap' => 'fa-graduation-cap', 'fa-yahoo' => 'fa-yahoo', 'fa-google' => 'fa-google', 'fa-reddit' => 'fa-reddit', 'fa-reddit-square' => 'fa-reddit-square', 'fa-stumbleupon-circle' => 'fa-stumbleupon-circle', 'fa-stumbleupon' => 'fa-stumbleupon', 'fa-delicious' => 'fa-delicious', 'fa-digg' => 'fa-digg', 'fa-pied-piper-pp' => 'fa-pied-piper-pp', 'fa-pied-piper-alt' => 'fa-pied-piper-alt', 'fa-drupal' => 'fa-drupal', 'fa-joomla' => 'fa-joomla', 'fa-language' => 'fa-language', 'fa-fax' => 'fa-fax', 'fa-building' => 'fa-building', 'fa-child' => 'fa-child', 'fa-paw' => 'fa-paw', 'fa-spoon' => 'fa-spoon', 'fa-cube' => 'fa-cube', 'fa-cubes' => 'fa-cubes', 'fa-behance' => 'fa-behance', 'fa-behance-square' => 'fa-behance-square', 'fa-steam' => 'fa-steam', 'fa-steam-square' => 'fa-steam-square', 'fa-recycle' => 'fa-recycle', 'fa-car' => 'fa-car', 'fa-taxi' => 'fa-taxi', 'fa-tree' => 'fa-tree', 'fa-spotify' => 'fa-spotify', 'fa-deviantart' => 'fa-deviantart', 'fa-soundcloud' => 'fa-soundcloud', 'fa-database' => 'fa-database', 'fa-file-pdf-o' => 'fa-file-pdf-o', 'fa-file-word-o' => 'fa-file-word-o', 'fa-file-excel-o' => 'fa-file-excel-o', 'fa-file-powerpoint-o' => 'fa-file-powerpoint-o', 'fa-file-image-o' => 'fa-file-image-o', 'fa-file-archive-o' => 'fa-file-archive-o', 'fa-file-audio-o' => 'fa-file-audio-o', 'fa-file-video-o' => 'fa-file-video-o', 'fa-file-code-o' => 'fa-file-code-o', 'fa-vine' => 'fa-vine', 'fa-codepen' => 'fa-codepen', 'fa-jsfiddle' => 'fa-jsfiddle', 'fa-life-ring' => 'fa-life-ring', 'fa-circle-o-notch' => 'fa-circle-o-notch', 'fa-rebel' => 'fa-rebel', 'fa-empire' => 'fa-empire', 'fa-git-square' => 'fa-git-square', 'fa-git' => 'fa-git', 'fa-hacker-news' => 'fa-hacker-news', 'fa-tencent-weibo' => 'fa-tencent-weibo', 'fa-qq' => 'fa-qq', 'fa-weixin' => 'fa-weixin', 'fa-paper-plane' => 'fa-paper-plane', 'fa-paper-plane-o' => 'fa-paper-plane-o', 'fa-history' => 'fa-history', 'fa-circle-thin' => 'fa-circle-thin', 'fa-header' => 'fa-header', 'fa-paragraph' => 'fa-paragraph', 'fa-sliders' => 'fa-sliders', 'fa-share-alt' => 'fa-share-alt', 'fa-share-alt-square' => 'fa-share-alt-square', 'fa-bomb' => 'fa-bomb', 'fa-futbol-o' => 'fa-futbol-o', 'fa-tty' => 'fa-tty', 'fa-binoculars' => 'fa-binoculars', 'fa-plug' => 'fa-plug', 'fa-slideshare' => 'fa-slideshare', 'fa-twitch' => 'fa-twitch', 'fa-yelp' => 'fa-yelp', 'fa-newspaper-o' => 'fa-newspaper-o', 'fa-wifi' => 'fa-wifi', 'fa-calculator' => 'fa-calculator', 'fa-paypal' => 'fa-paypal', 'fa-google-wallet' => 'fa-google-wallet', 'fa-cc-visa' => 'fa-cc-visa', 'fa-cc-mastercard' => 'fa-cc-mastercard', 'fa-cc-discover' => 'fa-cc-discover', 'fa-cc-amex' => 'fa-cc-amex', 'fa-cc-paypal' => 'fa-cc-paypal', 'fa-cc-stripe' => 'fa-cc-stripe', 'fa-bell-slash' => 'fa-bell-slash', 'fa-bell-slash-o' => 'fa-bell-slash-o', 'fa-trash' => 'fa-trash', 'fa-copyright' => 'fa-copyright', 'fa-at' => 'fa-at', 'fa-eyedropper' => 'fa-eyedropper', 'fa-paint-brush' => 'fa-paint-brush', 'fa-birthday-cake' => 'fa-birthday-cake', 'fa-area-chart' => 'fa-area-chart', 'fa-pie-chart' => 'fa-pie-chart', 'fa-line-chart' => 'fa-line-chart', 'fa-lastfm' => 'fa-lastfm', 'fa-lastfm-square' => 'fa-lastfm-square', 'fa-toggle-off' => 'fa-toggle-off', 'fa-toggle-on' => 'fa-toggle-on', 'fa-bicycle' => 'fa-bicycle', 'fa-bus' => 'fa-bus', 'fa-ioxhost' => 'fa-ioxhost', 'fa-angellist' => 'fa-angellist', 'fa-cc' => 'fa-cc', 'fa-ils' => 'fa-ils', 'fa-meanpath' => 'fa-meanpath', 'fa-buysellads' => 'fa-buysellads', 'fa-connectdevelop' => 'fa-connectdevelop', 'fa-dashcube' => 'fa-dashcube', 'fa-forumbee' => 'fa-forumbee', 'fa-leanpub' => 'fa-leanpub', 'fa-sellsy' => 'fa-sellsy', 'fa-shirtsinbulk' => 'fa-shirtsinbulk', 'fa-simplybuilt' => 'fa-simplybuilt', 'fa-skyatlas' => 'fa-skyatlas', 'fa-cart-plus' => 'fa-cart-plus', 'fa-cart-arrow-down' => 'fa-cart-arrow-down', 'fa-diamond' => 'fa-diamond', 'fa-ship' => 'fa-ship', 'fa-user-secret' => 'fa-user-secret', 'fa-motorcycle' => 'fa-motorcycle', 'fa-street-view' => 'fa-street-view', 'fa-heartbeat' => 'fa-heartbeat', 'fa-venus' => 'fa-venus', 'fa-mars' => 'fa-mars', 'fa-mercury' => 'fa-mercury', 'fa-transgender' => 'fa-transgender', 'fa-transgender-alt' => 'fa-transgender-alt', 'fa-venus-double' => 'fa-venus-double', 'fa-mars-double' => 'fa-mars-double', 'fa-venus-mars' => 'fa-venus-mars', 'fa-mars-stroke' => 'fa-mars-stroke', 'fa-mars-stroke-v' => 'fa-mars-stroke-v', 'fa-mars-stroke-h' => 'fa-mars-stroke-h', 'fa-neuter' => 'fa-neuter', 'fa-genderless' => 'fa-genderless', 'fa-facebook-official' => 'fa-facebook-official', 'fa-pinterest-p' => 'fa-pinterest-p', 'fa-whatsapp' => 'fa-whatsapp', 'fa-server' => 'fa-server', 'fa-user-plus' => 'fa-user-plus', 'fa-user-times' => 'fa-user-times', 'fa-bed' => 'fa-bed', 'fa-viacoin' => 'fa-viacoin', 'fa-train' => 'fa-train', 'fa-subway' => 'fa-subway', 'fa-medium' => 'fa-medium', 'fa-y-combinator' => 'fa-y-combinator', 'fa-optin-monster' => 'fa-optin-monster', 'fa-opencart' => 'fa-opencart', 'fa-expeditedssl' => 'fa-expeditedssl', 'fa-battery-full' => 'fa-battery-full', 'fa-battery-three-quarters' => 'fa-battery-three-quarters', 'fa-battery-half' => 'fa-battery-half', 'fa-battery-quarter' => 'fa-battery-quarter', 'fa-battery-empty' => 'fa-battery-empty', 'fa-mouse-pointer' => 'fa-mouse-pointer', 'fa-i-cursor' => 'fa-i-cursor', 'fa-object-group' => 'fa-object-group', 'fa-object-ungroup' => 'fa-object-ungroup', 'fa-sticky-note' => 'fa-sticky-note', 'fa-sticky-note-o' => 'fa-sticky-note-o', 'fa-cc-jcb' => 'fa-cc-jcb', 'fa-cc-diners-club' => 'fa-cc-diners-club', 'fa-clone' => 'fa-clone', 'fa-balance-scale' => 'fa-balance-scale', 'fa-hourglass-o' => 'fa-hourglass-o', 'fa-hourglass-start' => 'fa-hourglass-start', 'fa-hourglass-half' => 'fa-hourglass-half', 'fa-hourglass-end' => 'fa-hourglass-end', 'fa-hourglass' => 'fa-hourglass', 'fa-hand-rock-o' => 'fa-hand-rock-o', 'fa-hand-paper-o' => 'fa-hand-paper-o', 'fa-hand-scissors-o' => 'fa-hand-scissors-o', 'fa-hand-lizard-o' => 'fa-hand-lizard-o', 'fa-hand-spock-o' => 'fa-hand-spock-o', 'fa-hand-pointer-o' => 'fa-hand-pointer-o', 'fa-hand-peace-o' => 'fa-hand-peace-o', 'fa-trademark' => 'fa-trademark', 'fa-registered' => 'fa-registered', 'fa-creative-commons' => 'fa-creative-commons', 'fa-gg' => 'fa-gg', 'fa-gg-circle' => 'fa-gg-circle', 'fa-tripadvisor' => 'fa-tripadvisor', 'fa-odnoklassniki' => 'fa-odnoklassniki', 'fa-odnoklassniki-square' => 'fa-odnoklassniki-square', 'fa-get-pocket' => 'fa-get-pocket', 'fa-wikipedia-w' => 'fa-wikipedia-w', 'fa-safari' => 'fa-safari', 'fa-chrome' => 'fa-chrome', 'fa-firefox' => 'fa-firefox', 'fa-opera' => 'fa-opera', 'fa-internet-explorer' => 'fa-internet-explorer', 'fa-television' => 'fa-television', 'fa-contao' => 'fa-contao', 'fa-500px' => 'fa-500px', 'fa-amazon' => 'fa-amazon', 'fa-calendar-plus-o' => 'fa-calendar-plus-o', 'fa-calendar-minus-o' => 'fa-calendar-minus-o', 'fa-calendar-times-o' => 'fa-calendar-times-o', 'fa-calendar-check-o' => 'fa-calendar-check-o', 'fa-industry' => 'fa-industry', 'fa-map-pin' => 'fa-map-pin', 'fa-map-signs' => 'fa-map-signs', 'fa-map-o' => 'fa-map-o', 'fa-map' => 'fa-map', 'fa-commenting' => 'fa-commenting', 'fa-commenting-o' => 'fa-commenting-o', 'fa-houzz' => 'fa-houzz', 'fa-vimeo' => 'fa-vimeo', 'fa-black-tie' => 'fa-black-tie', 'fa-fonticons' => 'fa-fonticons', 'fa-reddit-alien' => 'fa-reddit-alien', 'fa-edge' => 'fa-edge', 'fa-credit-card-alt' => 'fa-credit-card-alt', 'fa-codiepie' => 'fa-codiepie', 'fa-modx' => 'fa-modx', 'fa-fort-awesome' => 'fa-fort-awesome', 'fa-usb' => 'fa-usb', 'fa-product-hunt' => 'fa-product-hunt', 'fa-mixcloud' => 'fa-mixcloud', 'fa-scribd' => 'fa-scribd', 'fa-pause-circle' => 'fa-pause-circle', 'fa-pause-circle-o' => 'fa-pause-circle-o', 'fa-stop-circle' => 'fa-stop-circle', 'fa-stop-circle-o' => 'fa-stop-circle-o', 'fa-shopping-bag' => 'fa-shopping-bag', 'fa-shopping-basket' => 'fa-shopping-basket', 'fa-hashtag' => 'fa-hashtag', 'fa-bluetooth' => 'fa-bluetooth', 'fa-bluetooth-b' => 'fa-bluetooth-b', 'fa-percent' => 'fa-percent', 'fa-gitlab' => 'fa-gitlab', 'fa-wpbeginner' => 'fa-wpbeginner', 'fa-wpforms' => 'fa-wpforms', 'fa-envira' => 'fa-envira', 'fa-universal-access' => 'fa-universal-access', 'fa-wheelchair-alt' => 'fa-wheelchair-alt', 'fa-question-circle-o' => 'fa-question-circle-o', 'fa-blind' => 'fa-blind', 'fa-audio-description' => 'fa-audio-description', 'fa-volume-control-phone' => 'fa-volume-control-phone', 'fa-braille' => 'fa-braille', 'fa-assistive-listening-systems' => 'fa-assistive-listening-systems', 'fa-american-sign-language-interpreting' => 'fa-american-sign-language-interpreting', 'fa-deaf' => 'fa-deaf', 'fa-glide' => 'fa-glide', 'fa-glide-g' => 'fa-glide-g', 'fa-sign-language' => 'fa-sign-language', 'fa-low-vision' => 'fa-low-vision', 'fa-viadeo' => 'fa-viadeo', 'fa-viadeo-square' => 'fa-viadeo-square', 'fa-snapchat' => 'fa-snapchat', 'fa-snapchat-ghost' => 'fa-snapchat-ghost', 'fa-snapchat-square' => 'fa-snapchat-square', 'fa-pied-piper' => 'fa-pied-piper', 'fa-first-order' => 'fa-first-order', 'fa-yoast' => 'fa-yoast', 'fa-themeisle' => 'fa-themeisle', 'fa-google-plus-official' => 'fa-google-plus-official', 'fa-font-awesome' => 'fa-font-awesome'
	);
  return $icons;
}

/**
 * Shorten large numbers into abbreviations (i.e. 1,500 = 1.5k)
 *
 * @param int    $number  Number to shorten
 * @return String   A number with a symbol
 */ 
function thb_numberAbbreviation($number) {
    $abbrevs = array(12 => "T", 9 => "B", 6 => "M", 3 => "K", 0 => "");

	if ($number > 999) {
	    foreach($abbrevs as $exponent => $abbrev) {
	        if($number >= pow(10, $exponent)) {
	        	$display_num = $number / pow(10, $exponent);
	        	$decimals = ($exponent >= 3 && round($display_num) < 100) ? 1 : 0;
	            return number_format($display_num,$decimals) . $abbrev;
	        }
	    }
	} else {
		return $number;	
	}
}
//Get Facebook Likes Count of a page
function thb_fbLikeCount($pageID, $debug = false) {
	$cache = get_transient( 'thb_page_fbcount' );
	switch (ot_get_option('sharing_cache', '1')) {
		case '1h':
			$time = 3600;
			break;
		case '1':
			$time = DAY_IN_SECONDS;
			break;
		case '7':
			$time = WEEK_IN_SECONDS;
			break;
		case '30':
			$time = DAY_IN_SECONDS * 30;
			break;
	}
	if ( empty( $cache ) ) {
		$url_prefix = is_ssl() ? 'https:' : 'http:';
		
		$thb_fb_secret_cache = get_transient( 'thb_fb_secret_cache' );
		
		if (empty($thb_fb_secret_cache)) {
			//Construct a Facebook URL
			$secret = wp_remote_get('https://graph.facebook.com/oauth/access_token?type=client_cred&client_id='.ot_get_option('facebook_app_id').'&client_secret='.ot_get_option('facebook_app_secret').'');
			if ( is_wp_error( $secret ) ) {
				echo $error_string = $secret->get_error_message();
				return;
			}
			$thb_fb_secret_cache = wp_remote_retrieve_body( $secret );
			
			set_transient( 'thb_fb_secret_cache', $thb_fb_secret_cache, 3600 );
		}
		
		$json_url = 'https://graph.facebook.com/v2.7/'.$pageID.'?'.$thb_fb_secret_cache.'&fields=id,fan_count';
		$json = wp_remote_get($json_url);
		// Check for error
		if ( is_wp_error( $json ) ) {
			echo $error_string = $json->get_error_message();
			return;
		}
		$data = wp_remote_retrieve_body( $json );
		$json_output = json_decode($data);
	 	set_transient( 'thb_page_fbcount', $json_output->fan_count, $time );
	 	
		//Extract the likes count from the JSON object
		$likes = $json_output->fan_count ? $json_output->fan_count : 0;
		
	} else {
		$likes = $cache;
	}
	if ($debug) {
		$secret = wp_remote_get('https://graph.facebook.com/oauth/access_token?type=client_cred&client_id='.ot_get_option('facebook_app_id').'&client_secret='.ot_get_option('facebook_app_secret').'');
		if ( is_wp_error( $secret ) ) {
			echo $error_string = $secret->get_error_message();
			return;
		}
		$secret = wp_remote_retrieve_body( $secret );
		$json_url = 'https://graph.facebook.com/v2.7/'.$pageID.'?'.$secret.'&fields=id,name,likes,fan_count';
		$json = wp_remote_get($json_url);
		// Check for error
		if ( is_wp_error( $json ) ) {
			echo $error_string = $json->get_error_message();
			return;
		}
		$data = wp_remote_retrieve_body( $json );
		$json_output = json_decode($data);
		var_dump($json_output);	
	}
	echo thb_numberAbbreviation($likes);
}
add_filter( 'thb_fbLikeCount', 'thb_fbLikeCount', 99, 2 );

//Get Twitter Follower Count of a page
function thb_getTwitterFollowers($debug = false) {
    $settings = array(
        'oauth_access_token' => ot_get_option('twitter_bar_accesstoken'),
        'oauth_access_token_secret' => ot_get_option('twitter_bar_accesstokensecret'),
        'consumer_key' => ot_get_option('twitter_bar_consumerkey'),
        'consumer_secret' => ot_get_option('twitter_bar_consumersecret')
    );
    $url = 'https://api.twitter.com/1.1/users/show.json';
    $requestMethod = 'GET';
    $getfield = '?screen_name='.ot_get_option('twitter_bar_username');
    
    $cache = get_transient( 'thb_page_twcount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    if ( empty( $cache ) ) {
	    $twitter = new thb_TwitterAPIExchange($settings);
	    $twitter_data = json_decode($twitter->set_get_field($getfield)
	                 ->build_oauth($url, $requestMethod)
	                 ->process_request());
	    if (isset($twitter_data->errors)) {
	    	echo $twitter_data->errors[0]->message;
	    	return;
	    } else {
	      $followers = $twitter_data->followers_count;
	      set_transient( 'thb_page_twcount', $followers, $time );
	    }
    } else {
    	$followers = $cache;
    }
    if ($debug) {
    	$twitter = new thb_TwitterAPIExchange($settings);
    	$twitter_data = json_decode($twitter->set_get_field($getfield)
    	             ->build_oauth($url, $requestMethod)
    	             ->process_request());
    	var_dump($twitter_data);	
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_twFollowerCount', 'thb_getTwitterFollowers', 99, 1 );

//Get Instagram Follower Count
function thb_getInstagramFollowers() {
    $id = ot_get_option('instagram_id');
    $api_key = ot_get_option('instagram_accesstoken');
    
    $cache = get_transient( 'thb_page_inscount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    
    if ( empty( $cache ) ) {
	    $request = @wp_remote_get( 'https://api.instagram.com/v1/users/' . $id . '?access_token=' . $api_key );
	    
      if ( false == $request ) {
        return null;
      }
  
      $response = json_decode( @wp_remote_retrieve_body( $request ) );
  
      if ( isset( $response->data ) && isset( $response->data->counts ) && isset( $response->data->counts->followed_by ) ) {
      	
      	$followers = $response->data->counts->followed_by;
        set_transient( 'thb_page_inscount', $followers, $time );
      }
        
        
    } else {
    	$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_insFollowerCount', 'thb_getInstagramFollowers', 99, 1 );

//Get Google+ Follower Count
function thb_getGplusFollowers() {
    $id = ot_get_option('gp_username');
    $apikey = ot_get_option('gp_apikey');
    
    $cache = get_transient( 'thb_page_gpcount' );
    
    switch (ot_get_option('sharing_cache', '1')) {
    	case '1h':
    		$time = 3600;
    		break;
    	case '1':
    		$time = DAY_IN_SECONDS;
    		break;
    	case '7':
    		$time = WEEK_IN_SECONDS;
    		break;
    	case '30':
    		$time = DAY_IN_SECONDS * 30;
    		break;
    }
    
    if ( empty( $cache ) ) {
	    $request = @wp_remote_get( 'https://www.googleapis.com/plus/v1/people/' . $id . '?key=' . $apikey );
	    
			if ( false == $request ) {
			 return null;
			}
  
			$response = json_decode( @wp_remote_retrieve_body( $request ) );
      
      if ( isset( $response->circledByCount ) ) {
      	
      	$followers = $response->circledByCount;
        set_transient( 'thb_page_gpcount', $followers, $time );
      }
        
        
    } else {
    	$followers = $cache;
    }
    echo thb_numberAbbreviation($followers);
}
add_filter( 'thb_gpFollowerCount', 'thb_getGplusFollowers', 99, 1 );

/* Social */
function thb_fb_information() {
	$sharing_type =  ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
	$general_disable_og_tags = ot_get_option('general_disable_og_tags');
	if ($general_disable_og_tags !== 'on') {
		if (in_array('facebook',$sharing_type) && is_single()) {
			$image_id = get_post_thumbnail_id();
		  $image_link = wp_get_attachment_image_src($image_id,'full');
		  if (function_exists('wpb_resize') && has_post_thumbnail()) {
				$image = wpb_resize( $image_id, null, 200, 200, true);
		  }
			?>
			<meta property="og:title" content="<?php the_title_attribute(); ?>" />
			<meta property="og:description" content="<?php echo esc_html(thb_excerpt(200, false, false)); ?>" />
			<?php if (function_exists('wpb_resize') && has_post_thumbnail()) { ?>
			<meta property="og:image" content="<?php echo esc_attr($image['url']); ?>" />
			<?php } ?>
			<meta property="og:url" content="<?php the_permalink(); ?>" />
			<?php
		}
	}
}
add_action( 'thb_fb_information', 'thb_fb_information',3 );

/* Review Box */
function thb_is_review() {
	$id = get_the_ID();
	if (get_post_meta($id, 'is_review', TRUE) == 'yes') {
		echo ' has-review';
	} else {
		return false;
	}
}
add_action( 'thb_is_review', 'thb_is_review', 1 );
function thb_post_review_average() {
	$id = get_the_ID();
	if (get_post_meta($id, 'is_review', TRUE) == 'yes') {
		$features = get_post_meta($id, 'post_ratings_percentage', TRUE);
		$count = sizeof($features);
		$total = 0;
		$return = '';
		if ($count > 0 && !empty($features)) {
			foreach($features as $feature) {
				$total += $feature['feature_score'];
			}
			$return = round($total / $count, 1);
		} else {
			$return = '<i class="fa fa-star"></i>';	
		}
		echo '<span class="ave">'.$return.'</span>';
	}
}
add_action( 'thb_post_review_average', 'thb_post_review_average' );
function thb_post_review() {
	$id = get_the_ID();
	if (get_post_meta($id, 'is_review', TRUE) == 'yes') {
		$review_title = get_post_meta($id, 'post_ratings_title', TRUE);
		$comments = get_post_meta($id, 'post_ratings_comments', TRUE);
		$features = get_post_meta($id, 'post_ratings_percentage', TRUE); 
		$count = count($features);
		$comment_count = count($comments);
		$total = 0;
		?>
		<div class="post-review cf" itemscope itemtype="http://schema.org/Review">
			<?php if ($review_title) { ?><strong itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing"><span itemprop="name"><?php echo esc_html($review_title); ?></span></strong><?php } ?>
			<ul>
			<?php if ($features) { foreach($features as $feature) {
				$total += $feature['feature_score'];
				?>
				
				<li>
					<div class="row cf">
						<div class="small-12 medium-9 columns"><?php echo esc_attr($feature['title']); ?></div>
						<div class="small-12 medium-3 columns hide-for-small"><?php echo esc_attr($feature['feature_score']); ?></div>
					</div>
					<div class="progress">
						<span style="width: <?php echo 10*$feature['feature_score'] ?>%;"></span>
					</div>
				</li>
				
	
			<?php } }?>
			</ul>
			<div class="row">
				<div class="small-12 medium-9 columns">
					<div class="row">
						<div class="small-12 medium-6 columns comment_section">
							<span class="post_comment good"><?php _e('The Good', 'thevoux'); ?></span>
							<?php if ($comments) { foreach($comments as $comment) { ?>
								<?php if ($comment['feature_comment_type'] == 'positive') { ?>
								<p class="positive"><?php echo esc_attr($comment['title']); ?></p>
								<?php } ?>
							<?php } } ?>
						</div>
						<div class="small-12 medium-6 columns comment_section">
							<span class="post_comment bad"><?php _e('The Bad', 'thevoux'); ?></span>
							<?php if ($comments) { foreach($comments as $comment) { ?>
								<?php if ($comment['feature_comment_type'] == 'negative') { ?>
								<p class="negative"><?php echo esc_attr($comment['title']); ?></p>
								<?php } ?>
							<?php } } ?>
						</div>
					</div>
				</div>
				<?php if ($features) { ?>
				<div class="small-12 medium-3 columns">
					<figure class="average" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"><span itemprop="ratingValue"><?php echo round($total / $count, 1); ?></span><span class="hide" itemprop="bestRating">10</span></figure>
				</div>
				<?php } ?>
				<span class="hide" itemprop="author" itemscope itemtype="http://schema.org/Person">
			    <span itemprop="name"><?php the_author_meta('display_name', $id ); ?></span>
			  </span>
			</div>
		</div>
		<?php
	}
}
add_action( 'thb_post_review', 'thb_post_review' );

/* Author Box */
function thb_author($id) {
	$id = $id ? $id : get_the_author_meta( 'ID' );
	?>
	<?php echo get_avatar( $id , '164'); ?>
	<div class="author-content">
		<h5><a href="<?php echo get_author_posts_url( $id ); ?>"><?php the_author_meta('display_name', $id ); ?></a></h5>
		<?php if(get_the_author_meta('position', $id) != '') { ?>
			<h4><?php echo get_the_author_meta('position', $id ); ?></h4>
		<?php } ?>
		<p><?php the_author_meta('description', $id ); ?></p>
		<?php if(get_the_author_meta('url', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('url', $id ); ?>" class="boxed-icon fill"><i class="fa fa-link"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('twitter', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('twitter', $id ); ?>" class="boxed-icon fill twitter"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('facebook', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('facebook', $id ); ?>" class="boxed-icon fill facebook"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if(get_the_author_meta('googleplus', $id ) != '') { ?>
			<a href="<?php echo get_the_author_meta('googleplus', $id ); ?>" class="boxed-icon fill google-plus"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
	</div>
	<?php
}
add_action( 'thb_author', 'thb_author',3 );

function thb_is_gallery() {
	$format = get_post_format();
	
	if ($format == 'gallery') {
		echo 'has-gallery';
	} else if ($format == 'video'){
		echo 'has-gallery has-video';
	} else {
		return false;
	}
}
add_action( 'thb_is_gallery', 'thb_is_gallery', 1 );

function thb_social_article_totalshares($id) {
	$id = $id ? $id : get_the_ID();
	
	$total = pssc_all($id);
	
	return thb_numberAbbreviation($total);
}
add_action( 'thb_social_article_totalshares', 'thb_social_article_totalshares',3 );

function thb_social_article($id) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
 ?>
 	<?php if (!empty($sharing_type)) { ?>
		<?php if (in_array('facebook',$sharing_type)) { ?>
		<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="boxed-icon social fill facebook"><i class="fa fa-facebook"></i></a>
		<?php } ?>
		<?php if (in_array('twitter',$sharing_type)) { ?>
		<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="boxed-icon social fill twitter"><i class="fa fa-twitter"></i></a>
		<?php } ?>
		<?php if (in_array('google-plus',$sharing_type)) { ?>
		<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon social fill google-plus"><i class="fa fa-google-plus"></i></a>
		<?php } ?>
		<?php if (in_array('pinterest',$sharing_type)) { ?>
		<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description='.htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" class="boxed-icon social fill pinterest" data-pin-no-hover="true"><i class="fa fa-pinterest"></i></a>
		<?php } ?>
		<?php if (in_array('linkedin',$sharing_type)) { ?>
		<a href="<?php echo 'https://www.linkedin.com/cws/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon social fill linkedin"><i class="fa fa-linkedin"></i></a>
		<?php } ?>
	<?php } ?>
<?php
}
add_action( 'thb_social_article', 'thb_social_article', 3 );

function thb_social_article_detail($id = false, $fixed = false, $class = false) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
	
	$hide_zero_shares = ot_get_option('hide_zero_shares', 'off'); 
 ?>
	<aside class="share-article hide-on-print<?php if ($fixed) { ?> fixed-me<?php } ?> <?php echo esc_attr($class); ?>">
		<?php if (in_array('facebook',$sharing_type)) { ?>
		<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="boxed-icon facebook social"><i class="fa fa-facebook"></i>
			<?php if ($hide_zero_shares === 'off' || pssc_facebook($id) !== '0') { ?>
			<span><?php echo thb_numberAbbreviation(pssc_facebook($id)); ?></span>
			<?php } ?>
		</a>
		<?php } ?>
		<?php if (in_array('twitter',$sharing_type)) { ?>
		<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="boxed-icon twitter social "><i class="fa fa-twitter"></i>
			<?php if ($hide_zero_shares === 'off' || pssc_twitter($id) !== '0') { ?>
			<span><?php echo thb_numberAbbreviation(pssc_twitter($id)); ?></span>
			<?php } ?>
		</a>
		<?php } ?>
		<?php if (in_array('google-plus',$sharing_type)) { ?>
		<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon google-plus social"><i class="fa fa-google-plus"></i>
			<?php if ($hide_zero_shares === 'off' || pssc_gplus($id) !== '0') { ?>
			<span><?php echo thb_numberAbbreviation(pssc_gplus($id)); ?></span>
			<?php } ?>
		<?php } ?>
		<?php if (in_array('pinterest',$sharing_type)) { ?>
		<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description='.htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8'); ?>" class="boxed-icon pinterest social" data-pin-no-hover="true"><i class="fa fa-pinterest"></i>
			<?php if ($hide_zero_shares === 'off' || pssc_pinterest($id) !== '0') { ?>
			<span><?php echo thb_numberAbbreviation(pssc_pinterest($id)); ?></span>
			<?php } ?>
		<?php } ?>
		<?php if (in_array('linkedin',$sharing_type)) { ?>
		<a href="<?php echo 'https://www.linkedin.com/cws/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon linkedin social"><i class="fa fa-linkedin"></i>
			<?php if ($hide_zero_shares === 'off' || pssc_linkedin($id) !== '0') { ?>
			<span><?php echo thb_numberAbbreviation(pssc_linkedin($id)); ?></span>
			<?php } ?>
		</a>
		<?php } ?>
		<a href="<?php the_permalink(); ?>" class="boxed-icon comment"><span><?php echo get_comments_number(); ?></span></a>
	</aside>
<?php
}
add_action( 'thb_social_article_detail', 'thb_social_article_detail', 3, 3 );

function thb_social_product($id = false) {
	$id = $id ? $id : get_the_ID();
	$permalink = get_permalink($id);
	$title = the_title_attribute(array('echo' => 0, 'post' => $id) );
	$image_id = get_post_thumbnail_id($id);
	$image = wp_get_attachment_image_src($image_id,'full');
	$twitter_user = ot_get_option('twitter_bar_username', 'anteksiler');
	$sharing_type = ot_get_option('sharing_buttons') ? ot_get_option('sharing_buttons') : array();
 ?>
 <?php if (!empty($sharing_type)) { ?>
 <aside class="share-article">
 	<?php if (in_array('facebook',$sharing_type)) { ?>
 	<a href="<?php echo 'http://www.facebook.com/sharer.php?u=' . urlencode( esc_url( $permalink ) ).''; ?>" class="boxed-icon facebook social"><i class="fa fa-facebook"></i><span><?php echo thb_numberAbbreviation(pssc_facebook($id)); ?></span></a>
 	<?php } ?>
 	<?php if (in_array('twitter',$sharing_type)) { ?>
 	<a href="<?php echo 'https://twitter.com/intent/tweet?text=' . htmlspecialchars(urlencode(html_entity_decode($title, ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') . '&url=' . urlencode( esc_url( $permalink ) ) . '&via=' . urlencode( $twitter_user ? $twitter_user : get_bloginfo( 'name' ) ) . ''; ?>" class="boxed-icon twitter social "><i class="fa fa-twitter"></i><span><?php echo thb_numberAbbreviation(pssc_twitter($id)); ?></span></a>
 	<?php } ?>
 	<?php if (in_array('google-plus',$sharing_type)) { ?>
 	<a href="<?php echo 'http://plus.google.com/share?url=' . esc_url( $permalink ) . ''; ?>" class="boxed-icon google-plus social"><i class="fa fa-google-plus"></i><span><?php echo thb_numberAbbreviation(pssc_gplus($id)); ?></span></a>
 	<?php } ?>
 	<?php if (in_array('pinterest',$sharing_type)) { ?>
 	<a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . ''; ?>" class="boxed-icon pinterest social" nopin="nopin" data-pin-no-hover="true"><i class="fa fa-pinterest"></i><span><?php echo thb_numberAbbreviation(pssc_pinterest($id)); ?></span></a>
 	<?php } ?>
 </aside>
 <?php } ?>
<?php
}
add_action( 'thb_social_product', 'thb_social_product', 3, 3 );

/* Thb Header Search */
function thb_quick_search() {
 ?>
 	<aside id="quick_search">
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="search_icon" x="0" y="0" width="20" height="20" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><path d="M19.8 18.4l-5.4-5.4c1.1-1.4 1.8-3.1 1.8-5 0-4.4-3.6-8-8-8 -4.4 0-8 3.6-8 8s3.6 8 8 8c1.8 0 3.5-0.6 4.8-1.6l5.4 5.4c0.2 0.2 0.5 0.3 0.7 0.3 0.3 0 0.5-0.1 0.7-0.3C20.2 19.4 20.2 18.8 19.8 18.4zM2.1 8.1c0-3.3 2.7-6 6-6s6 2.7 6 6c0 3.3-2.7 6-6 6S2.1 11.4 2.1 8.1z"/></svg>
		<?php get_search_form(true); ?>
	</aside>
<?php
}
add_action( 'thb_quick_search', 'thb_quick_search',3 );

/* THB Social Icons */
function thb_social() {
 ?>
	<?php if (ot_get_option('fb_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('fb_link')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if (ot_get_option('pinterest_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('pinterest_link')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if (ot_get_option('twitter_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('twitter_link')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if (ot_get_option('linkedin_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('linkedin_link')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if (ot_get_option('instragram_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('instragram_link')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if (ot_get_option('xing_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('xing_link')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if (ot_get_option('tumblr_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('tumblr_link')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if (ot_get_option('vk_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('vk_link')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
	<?php } ?>
	<?php if (ot_get_option('googleplus_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('googleplus_link')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if (ot_get_option('soundcloud_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('soundcloud_link')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
	<?php } ?>
	<?php if (ot_get_option('dribbble_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('dribbble_link')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
	<?php } ?>
	<?php if (ot_get_option('youtube_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('youtube_link')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
	<?php } ?>
	<?php if (ot_get_option('spotify_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('spotify_link')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
	<?php } ?>
<?php
}
add_action( 'thb_social', 'thb_social',3 );

function thb_social_header() {
	$social_style = ot_get_option('header_socialstyle', 'style1');
	
	if ($social_style == 'style1') {
 ?>
	<aside id="social_header">
		<div>
			<?php if (ot_get_option('fb_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('fb_link_header')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if (ot_get_option('pinterest_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('pinterest_link_header')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
			<?php } ?>
			<?php if (ot_get_option('twitter_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('twitter_link_header')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if (ot_get_option('linkedin_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('linkedin_link_header')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if (ot_get_option('instragram_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('instragram_link_header')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
			<?php } ?>
			<?php if (ot_get_option('xing_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('xing_link_header')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
			<?php } ?>
			<?php if (ot_get_option('tumblr_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('tumblr_link_header')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
			<?php } ?>
			<?php if (ot_get_option('vk_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('vk_link_header')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
			<?php } ?>
			<?php if (ot_get_option('googleplus_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('googleplus_link_header')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if (ot_get_option('soundcloud_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('soundcloud_link_header')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
			<?php } ?>
			<?php if (ot_get_option('dribbble_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('dribbble_link_header')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
			<?php } ?>
			<?php if (ot_get_option('youtube_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('youtube_link_header')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			<?php if (ot_get_option('spotify_link_header')) { ?>
			<a href="<?php echo esc_url(ot_get_option('spotify_link_header')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
			<?php } ?>
		</div>
		<i><svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="social_icon" x="0" y="0" width="20" height="20" viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve"><path d="M11.5 14.2c-0.4 0.5-1 0.9-1.5 1.3 -0.6 0.3-1.1 0.5-1.7 0.5 -0.6 0-1.2-0.2-1.8-0.5 -0.6-0.4-1.1-0.9-1.4-1.7 -0.4-0.8-0.6-1.6-0.6-2.5 0-1.1 0.3-2.2 0.9-3.3C5.9 6.8 6.6 6 7.5 5.5 8.3 4.9 9.1 4.6 9.9 4.6c0.6 0 1.2 0.1 1.7 0.5 0.6 0.3 1 0.8 1.4 1.4l0.4-1.6h1.9l-1.5 7c-0.2 1-0.3 1.5-0.3 1.6 0 0.2 0.1 0.4 0.2 0.5 0.1 0.1 0.3 0.2 0.5 0.2 0.4 0 0.8-0.2 1.5-0.6 0.8-0.6 1.4-1.3 1.9-2.2 0.5-0.9 0.7-1.9 0.7-2.9 0-1.2-0.3-2.2-0.9-3.2 -0.6-1-1.5-1.8-2.7-2.4 -1.2-0.6-2.5-0.9-3.9-0.9 -1.7 0-3.1 0.4-4.5 1.2C4.9 3.8 3.9 4.9 3.1 6.3 2.4 7.7 2 9.2 2 10.8c0 1.7 0.4 3.2 1.1 4.4 0.7 1.2 1.8 2.1 3.2 2.7 1.4 0.6 3 0.9 4.7 0.9 1.8 0 3.4-0.3 4.6-0.9s2.2-1.4 2.8-2.2h1.9c-0.4 0.7-1 1.5-1.8 2.2 -0.9 0.8-1.9 1.3-3.1 1.8 -1.2 0.4-2.7 0.7-4.3 0.7 -1.6 0-3-0.2-4.3-0.6 -1.3-0.4-2.4-1-3.4-1.8 -0.9-0.8-1.6-1.7-2.1-2.7 -0.6-1.3-0.9-2.7-0.9-4.2 0-1.7 0.4-3.3 1.1-4.8 0.9-1.9 2.1-3.3 3.7-4.3 1.6-1 3.5-1.5 5.7-1.5 1.7 0 3.3 0.4 4.7 1 1.4 0.7 2.5 1.8 3.3 3.1 0.7 1.2 1 2.5 1 3.9 0 2-0.7 3.8-2.1 5.4 -1.3 1.4-2.7 2.1-4.2 2.1 -0.5 0-0.9-0.1-1.2-0.2 -0.3-0.1-0.5-0.3-0.7-0.6C11.6 14.9 11.6 14.6 11.5 14.2L11.5 14.2zM6.4 11.4c0 0.9 0.2 1.7 0.7 2.2 0.5 0.5 1 0.8 1.6 0.8 0.4 0 0.8-0.1 1.3-0.4 0.4-0.2 0.9-0.6 1.3-1 0.4-0.5 0.7-1 1-1.7 0.3-0.7 0.4-1.4 0.4-2.1 0-0.9-0.3-1.7-0.7-2.2 -0.5-0.5-1.1-0.8-1.7-0.8 -0.4 0-0.9 0.1-1.3 0.3 -0.4 0.2-0.8 0.6-1.2 1.1 -0.4 0.5-0.7 1.1-0.9 1.8C6.5 10.1 6.4 10.8 6.4 11.4z"/></svg></i>
	</aside>
 <?php		
	} else if ($social_style == 'style2') {
 ?>
	<?php if (ot_get_option('fb_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('fb_link_header')); ?>" class="facebook icon-1x" target="_blank"><i class="fa fa-facebook"></i></a>
	<?php } ?>
	<?php if (ot_get_option('pinterest_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('pinterest_link_header')); ?>" class="pinterest icon-1x" target="_blank"><i class="fa fa-pinterest"></i></a>
	<?php } ?>
	<?php if (ot_get_option('twitter_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('twitter_link_header')); ?>" class="twitter icon-1x" target="_blank"><i class="fa fa-twitter"></i></a>
	<?php } ?>
	<?php if (ot_get_option('linkedin_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('linkedin_link_header')); ?>" class="linkedin icon-1x" target="_blank"><i class="fa fa-linkedin"></i></a>
	<?php } ?>
	<?php if (ot_get_option('instragram_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('instragram_link_header')); ?>" class="instagram icon-1x" target="_blank"><i class="fa fa-instagram"></i></a>
	<?php } ?>
	<?php if (ot_get_option('xing_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('xing_link_header')); ?>" class="xing icon-1x" target="_blank"><i class="fa fa-xing"></i></a>
	<?php } ?>
	<?php if (ot_get_option('tumblr_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('tumblr_link_header')); ?>" class="tumblr icon-1x" target="_blank"><i class="fa fa-tumblr"></i></a>
	<?php } ?>
	<?php if (ot_get_option('vk_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('vk_link_header')); ?>" class="vk icon-1x" target="_blank"><i class="fa fa-vk"></i></a>
	<?php } ?>
	<?php if (ot_get_option('googleplus_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('googleplus_link_header')); ?>" class="google-plus icon-1x" target="_blank"><i class="fa fa-google-plus"></i></a>
	<?php } ?>
	<?php if (ot_get_option('soundcloud_link')) { ?>
	<a href="<?php echo esc_url(ot_get_option('soundcloud_link')); ?>" class="soundcloud icon-1x" target="_blank"><i class="fa fa-soundcloud"></i></a>
	<?php } ?>
	<?php if (ot_get_option('dribbble_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('dribbble_link_header')); ?>" class="dribbble icon-1x" target="_blank"><i class="fa fa-dribbble"></i></a>
	<?php } ?>
	<?php if (ot_get_option('youtube_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('youtube_link_header')); ?>" class="youtube icon-1x" target="_blank"><i class="fa fa-youtube"></i></a>
	<?php } ?>
	<?php if (ot_get_option('spotify_link_header')) { ?>
	<a href="<?php echo esc_url(ot_get_option('spotify_link_header')); ?>" class="spotify icon-1x" target="_blank"><i class="fa fa-spotify"></i></a>
	<?php } ?>
<?php
	}
}
add_action( 'thb_social_header', 'thb_social_header',3 );

/* Add Category slug as class to categories */
function thb_add_class_callback( $result ) {
	$class = strtolower( $result[2] );
	$class = str_replace( ' ', '-', $class );
	$class = sanitize_title($class);
	
	$replacement = sprintf( ' class="%s">%s</a>', 'cat-'.$class, $result[2] );
	
	return preg_replace( '#>([^<]+)</a>#Uis', $replacement, $result[0] );
}

function thb_add_category_slug( $html ) {
	$search  = '#<a[^>]+(\>([^<]+)\</a>)#Uuis';
	$html = preg_replace_callback( $search, 'thb_add_class_callback', $html );
	
	return $html;
}

add_filter( 'the_category', 'thb_add_category_slug', 99, 1 );

/* Post Categories Array */
function thb_blogCategories(){
	$blog_categories = get_categories();
	$out = array();
	foreach($blog_categories as $category) {
		$out[$category->name] = $category->cat_ID;
	}
	return $out;
}

/* First letter of Content */
function thb_FirstLetter() {
	$content = get_the_excerpt();
	return mb_substr($content,0,1, "utf-8");
}

/* Human time */
function thb_human_time_diff_enhanced( $duration = 60 ) {

	$post_time = get_the_time('U');
	$human_time = '';

	$time_now = date('U');

	// use human time if less that $duration days ago (60 days by default)
	// 60 seconds * 60 minutes * 24 hours * $duration days
	if ( $post_time > $time_now - ( 60 * 60 * 24 * $duration ) ) {
		$human_time = sprintf( __( '%s ago', 'thevoux'), human_time_diff( $post_time, current_time( 'timestamp' ) ) );
	} else {
		$human_time = get_the_date();
	}
	if (ot_get_option('relative_dates', 'on') == 'off') {
		return get_the_date();
	} else {
		return $human_time;
	}
}
/* Add Lightbox Class */
function thb_image_rel($content) {	
	$pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
	$replacement = '<a$1href=$2$3.$4$5 rel="mfp"$6>$7</a>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}
add_filter('the_content', 'thb_image_rel');

/* Custom filter function to modify default gallery shortcode output */
function thb_article_lightbox_inner($content) {
  $pattern = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
  $replacement = '<a$1href=$2$3.$4$5 rel="mfp"$6>$7</a>';
  $content = preg_replace($pattern, $replacement, $content);
  return $content;
}
add_filter('wp_get_attachment_link', 'thb_article_lightbox_inner');

/* Encoding */
function thb_encode( $value ) {

  $func = 'base64' . '_encode';
  return $func( $value );
  
}
function thb_decode( $value ) {

  $func = 'base64' . '_decode';
  return $func( $value );
  
}
// VC AJAX Support
function thb_register_vc_shortcodes() {
  if ( class_exists("WPBMap") && method_exists("WPBMap", "addAllMappedShortcodes") ) {
		WPBMap::addAllMappedShortcodes();
  }
}
add_action("thb_vc_ajax", "thb_register_vc_shortcodes", 10);

// DNS Prefetching
function thb_dns_prefetch() {
	echo '<meta http-equiv="x-dns-prefetch-control" content="on">
	<link rel="dns-prefetch" href="//fonts.googleapis.com" />
	<link rel="dns-prefetch" href="//fonts.gstatic.com" />
	<link rel="dns-prefetch" href="//0.gravatar.com/" />
	<link rel="dns-prefetch" href="//2.gravatar.com/" />
	<link rel="dns-prefetch" href="//1.gravatar.com/" />';
}
add_action('wp_head', 'thb_dns_prefetch', 0);

// Redirect
function thb_disable_redirect_canonical($redirect_url) {
	if (is_singular() && is_page()) { $redirect_url = false; }
	return $redirect_url;
}
add_filter('redirect_canonical','thb_disable_redirect_canonical');

/*--------------------------------------------------------------------*/                							
/*  ADD DASHBOARD LINK			                							
/*--------------------------------------------------------------------*/
function thb_admin_menu_new_items() {
    global $submenu;
    $submenu['index.php'][500] = array( 'Fuelthemes.net', 'manage_options' , 'http://fuelthemes.net/?ref=wp_sidebar' ); 
}
add_action( 'admin_menu' , 'thb_admin_menu_new_items' );


/*--------------------------------------------------------------------*/         							
/*  FOOTER TYPE EDIT									 					
/*--------------------------------------------------------------------*/
function thb_footer_admin() {  
  echo sprintf(
  	__( 'Thank you for choosing %1$sFuel Themes%2$s', 'thevoux' ),
  	'<a href="http://fuelthemes.net/?ref=wp_footer" target="blank">',
  	'</a>'
  );
}
add_filter('admin_footer_text', 'thb_footer_admin'); 