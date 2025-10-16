<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DLAP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="gradient">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/36.png">

    <!-- Add to home screen for Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="DLA Quick Facts">
    <link rel="icon" sizes="512x512" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/s512.png">

    <!-- Splash screen for iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="DLA Quick Facts">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/180.png">
	<link rel="apple-touch-icon" sizes="167x167" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/167.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/152.png">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/144.png">

	<!-- Set startup background color -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="theme-color" content="#152B48">

<!-- iPhone SE (1st generation), iPod Touch -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-640x1136.png"
      media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">

<!-- iPhone 6, 6S, 7, 8, SE (2nd & 3rd generation) -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-750x1334.png"
      media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">

<!-- iPhone 6/7/8 Plus -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1242x2208.png"
      media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">

<!-- iPhone XR, 11 -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-828x1792.png"
      media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">

<!-- iPhone XS Max, 11 Pro Max -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1242x2688.png"
      media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">

<!-- iPhone X, XS, 11 Pro -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1125x2436.png"
      media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">

<!-- iPhone 12, 12 Pro, 13, 13 Pro -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1170x2532.png"
      media="(device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">

<!-- iPhone 14, iPhone 15, iPhone 15 Plus -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1179x2556.png"
      media="(device-width: 393px) and (device-height: 852px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">

<!-- iPhone 12/13/14/15 Pro Max, iPhone 16, iPhone 16 Pro -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1290x2796.png"
      media="(device-width: 430px) and (device-height: 932px) and (-webkit-device-pixel-ratio: 3) and (orientation: portrait)">

<!-- iPad Mini, iPad Air, iPad (7th generation and later) -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1536x2048.png"
      media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">

<!-- iPad Pro 10.5" -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-1668x2224.png"
      media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">

<!-- iPad Pro 12.9" -->
<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/assets/splash/launch-2048x2732.png"
      media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2) and (orientation: portrait)">




    <!-- Splash screen for Microsoft -->
    <meta name="msapplication-TileColor" content="#144774">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/144.png">

	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/192.png" sizes="192x192" type="image/png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/app-icon/v2/512.png" sizes="512x512" type="image/png">


	<?php wp_head(); ?>
	<!--<script src="https://cdn.jsdelivr.net/npm/js-circle-progress/dist/circle-progress.min.js" type="module"></script>-->
	<script src="https://tigrr.github.io/circle-progress/js/circle-progress.js"></script>


	<style>
		/* remove this after development */
		#wpadminbar { display: none; }
		html { margin-top: 0!important; }
	</style>
	<?php $slug = get_post_field( 'post_name', get_post() ); ?>
	<?php if ($slug == 'business-card'): ?>
		<script src="https://cdn.jsdelivr.net/npm/qrcode@1.4.4/build/qrcode.min.js"></script>
	<?php endif; ?>
</head>

<body class="<?php echo is_mobile_or_tablet() ? 'mobile' : 'desktop' ?> min-h-screen pb-20 <?php echo isV2() ? 'dlap-v2' : ''; ?>">

<script type="text/javascript"> (function(window, document, dataLayerName, id) { window[dataLayerName]=window[dataLayerName]||[],window[dataLayerName].push({start:(new Date).getTime(),event:"stg.start"});var scripts=document.getElementsByTagName('script')[0],tags=document.createElement('script'); function stgCreateCookie(a,b,c){var d="";if(c){var e=new Date;e.setTime(e.getTime()+24*c*60*60*1e3),d="; expires="+e.toUTCString();f="; SameSite=Strict"}document.cookie=a+"="+b+d+f+"; path=/"} var isStgDebug=(window.location.href.match("stg_debug")||document.cookie.match("stg_debug"))&&!window.location.href.match("stg_disable_debug");stgCreateCookie("stg_debug",isStgDebug?1:"",isStgDebug?14:-1); var qP=[];dataLayerName!=="dataLayer"&&qP.push("data_layer_name="+dataLayerName),isStgDebug&&qP.push("stg_debug");var qPString=qP.length>0?("?"+qP.join("&")):""; tags.async=!0,tags.src="https://dlapiper.containers.piwik.pro/"+id+".js"+qPString,scripts.parentNode.insertBefore(tags,scripts);!function(a,n,i){a[n]=a[n]||{};for(var c=0;c<i.length;c++)!function(i){a[n][i]=a[n][i]||{},a[n][i].api=a[n][i].api||function(){var a=[].slice.call(arguments,0);"string"==typeof a[0]&&window[dataLayerName].push({event:n+"."+i+":"+a[0],parameters:[].slice.call(arguments,1)})}}(i[c])}(window,"ppms",["tm","cm"]); })(window, document, 'dataLayer', '37507639-23e2-45bd-836f-680c45d2b27c'); </script>

	<div class="waves gradient"></div>
	<div class="waves"></div>
	<header class="px-page flex items-center justify-between mt-[10px]<?php echo wp_get_post_parent_id() > 0 || $slug == 'business-card' ? 'inner-page mb-2' : ''; ?>">
		<?php if (wp_get_post_parent_id() > 0 || $slug == 'business-card'): ?>
			<div class="relative w-full">
				<a class="btn-back absolute left-0 top-1/2 opacity-50 hover:opacity-100" href="<?php echo wp_get_post_parent_id() == 0 ? '/' : get_permalink(wp_get_post_parent_id()); ?>">
					<i class="text-12px icon-arrow-left"></i>
				</a>
				<h1 class="<?php echo $slug; ?> header-text w-full px-6 text-center font-noto-serif"><?php the_title(); ?></h1>
			</div>
		<?php else: ?>
			<?php
				$custom_logo_id = (int)get_theme_mod( 'custom_logo' );
				?>
			<a href="/" <?php echo $custom_logo_id > 0 ? '' : 'style="height:12px;"'; ?>>
				<?php

				if ($custom_logo_id > 0):
					$logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' ); // Get the logo URL
					?>
					<img class="max-h-10 w-auto" src="<?php echo $logo_url; ?>" />
				<?php else: ?>
					<?php
					$width = 93.421;
					$height = 10.925;
					if (isV2()) {
						$width = false;
						$height = 13;
					} ?>
					<svg xmlns="http://www.w3.org/2000/svg" <?php echo $width ? 'width="'.$width.'"' : ''; ?> height="<?php echo $height; ?>" viewBox="0 0 93.421 10.925">
					<g id="Group_351" data-name="Group 351" transform="translate(8487 14172.567)">
						<path id="dla-logo-shrinked" d="M1.744,10.925a1.723,1.723,0,0,1-.91-.213,1.646,1.646,0,0,1-.641-.665A1.9,1.9,0,0,1,0,9.088V1.837A1.942,1.942,0,0,1,.189.877,1.668,1.668,0,0,1,.831.213,1.736,1.736,0,0,1,1.744,0h7.45a1.723,1.723,0,0,1,.91.213,1.676,1.676,0,0,1,.645.665,1.971,1.971,0,0,1,.189.96V5.5a.218.218,0,0,1-.239.243c-.15,0-.229-.083-.249-.243A4.548,4.548,0,0,0,9.214,2.784,4.454,4.454,0,0,0,5.988,1.5,4.357,4.357,0,0,0,1.5,5.981a4.5,4.5,0,0,0,1.263,3.2A4.354,4.354,0,0,0,5.469,10.44c.219.023.292.11.292.253a.22.22,0,0,1-.063.166.3.3,0,0,1-.219.066Z" transform="translate(-8487 -14172.567)" fill="#fff"/>
						<g id="desktop-logo" transform="translate(-8468.764 -14172.567)">
						<path id="Path_305" data-name="Path 305" d="M33.873,25.247h2.291a1.524,1.524,0,0,0,1.191-.418,1.667,1.667,0,0,0,.428-1.187,1.556,1.556,0,0,0-.431-1.2,2.009,2.009,0,0,0-1.464-.406H33.873v3.212Zm-2.415-3.731c0-1,.483-1.428,1.443-1.428h3.511a3.977,3.977,0,0,1,2.8.883,3.494,3.494,0,0,1,1.014,2.667,3.325,3.325,0,0,1-3.552,3.552h-2.8v2.6a1.208,1.208,0,1,1-2.415,0V21.516Z" transform="translate(2.353 -20.087)" fill="#fff"/>
						<path id="Path_306" data-name="Path 306" d="M42.187,25.247h2.291a1.521,1.521,0,0,0,1.19-.418,1.664,1.664,0,0,0,.429-1.187,1.559,1.559,0,0,0-.431-1.2,2.01,2.01,0,0,0-1.465-.406H42.187v3.212Zm-2.416-3.731c0-1,.483-1.428,1.443-1.428h3.511a3.978,3.978,0,0,1,2.8.883,3.494,3.494,0,0,1,1.014,2.667,3.324,3.324,0,0,1-3.551,3.552h-2.8v2.6a1.208,1.208,0,1,1-2.416,0V21.516Z" transform="translate(7.839 -20.087)" fill="#fff"/>
						<path id="Path_307" data-name="Path 307" d="M58.077,26.767a3.331,3.331,0,0,0,1.8-3.165,3.41,3.41,0,0,0-1.014-2.63,3.977,3.977,0,0,0-2.8-.883H52.531c-.96,0-1.443.432-1.443,1.428v8.276a1.208,1.208,0,1,0,2.416,0V27.132h2.251l1.791,3.157A1.15,1.15,0,0,0,58.683,31a1.054,1.054,0,0,0,1.1-1.114,1.3,1.3,0,0,0-.208-.642c-.139-.228-.939-1.548-1.5-2.481ZM53.5,22.035h2.04a2.052,2.052,0,0,1,1.464.406,1.473,1.473,0,0,1,.431,1.165,1.59,1.59,0,0,1-.413,1.155,1.73,1.73,0,0,1-1.289.428H53.5V22.035Z" transform="translate(15.306 -20.087)" fill="#fff"/>
						<path id="Path_308" data-name="Path 308" d="M18.847,21.208a4.521,4.521,0,0,0-3.373-1.12h-3.01c-.862,0-1.376.34-1.376,1.426V29.48c0,1.085.514,1.426,1.376,1.426h3.222c2.841,0,4.666-1.768,4.666-5.319a5.8,5.8,0,0,0-1.506-4.379Zm-1.714,7.016a2.29,2.29,0,0,1-1.781.647H13.5V22.123h1.548a2.521,2.521,0,0,1,1.987.624A3.988,3.988,0,0,1,17.9,25.6a3.85,3.85,0,0,1-.772,2.626Z" transform="translate(-11.089 -20.087)" fill="#fff"/>
						<path id="Path_309" data-name="Path 309" d="M31.513,29.015c-.118-.344-2.2-6.278-2.529-7.231a3.08,3.08,0,0,0-.653-1.208,1.734,1.734,0,0,0-1.295-.488,1.815,1.815,0,0,0-1.289.477,2.724,2.724,0,0,0-.646,1.1c-.305.857-2.594,7.079-2.692,7.346a3.125,3.125,0,0,0-.232.923,1.123,1.123,0,0,0,2.179.3c.091-.261.321-.931.616-1.792h3.957c.2.584.4,1.175.6,1.762a1.064,1.064,0,0,0,1.093.779,1.1,1.1,0,0,0,1.131-1.052,3.191,3.191,0,0,0-.235-.923Zm-5.895-2.45c.475-1.388.983-2.873,1.341-3.923l1.331,3.923Z" transform="translate(-3.772 -20.088)" fill="#fff"/>
						<path id="Path_310" data-name="Path 310" d="M39.78,29.792a1.208,1.208,0,1,1-2.416,0V21.309a1.208,1.208,0,1,1,2.416,0v8.483Z" transform="translate(6.25 -20.087)" fill="#fff"/>
						<path id="Path_311" data-name="Path 311" d="M18.73,30.906c-.861,0-1.394-.341-1.394-1.426V21.309a1.208,1.208,0,1,1,2.415,0v7.569h3.729a1.3,1.3,0,0,1,.981.3.97.97,0,0,1,.245.707.994.994,0,0,1-.239.708,1.3,1.3,0,0,1-.987.313Z" transform="translate(-6.966 -20.087)" fill="#fff"/>
						<path id="Path_312" data-name="Path 312" d="M47.062,30.906c-.862,0-1.394-.341-1.394-1.426V21.514c0-1.085.565-1.426,1.428-1.426h5.087a1.3,1.3,0,0,1,.981.3.967.967,0,0,1,.244.707.994.994,0,0,1-.239.707,1.3,1.3,0,0,1-.987.311h-4.1v2.394H51.63a1.389,1.389,0,0,1,.978.28.935.935,0,0,1,.253.708.946.946,0,0,1-.247.7,1.375,1.375,0,0,1-.992.287H48.084v2.39H52.3a1.3,1.3,0,0,1,.981.3.967.967,0,0,1,.245.707.993.993,0,0,1-.239.708,1.3,1.3,0,0,1-.987.312H47.062Z" transform="translate(11.73 -20.087)" fill="#fff"/>
						</g>
					</g>
					</svg>
				<?php endif; ?>
			</a>
			<div class="header-right-content flex items-center gap-[20px]">
				<a id="notification-icon" href="/notifications" class="notifications-header">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/bell.svg" class="bell-icon opacity-70" />
				</a>
				<a href="/business-card" class="business-card-icon-wrapper opacity-70">
					<div class="business-card hidden">
						<?php get_template_part( 'icons/business', 'card'); ?>
					</div>
					<div class="error-icon hidden">
						<?php get_template_part( 'icons/error'); ?>
					</div>
				</a>
			</div>
		<?php endif; ?>
	</header>

	<div class="px-page <?php echo !is_front_page() ? 'inner-page' : ''; ?>">