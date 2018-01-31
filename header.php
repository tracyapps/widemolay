<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">

	<!-- Force IE to use the latest rendering engine available -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- If Site Icon isn't set in customizer -->
	<?php if ( !function_exists( 'has_site_icon' ) || !has_site_icon() ) { ?>
		<!-- Icons & Favicons -->
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon"/>
		<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	<?php } ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>

<header class="site-header" role="banner">
	<div class="header-content">
		
		<div class="logo">
			<?php get_template_part( 'parts/content', 'logo' ); ?>
		</div>
	</div>

	<nav class="main-navigation">
		<div class="mobile-menu-toggle"><a href="#menu-main-navigation" id="toggle">Menu</a></div>
		<?php start_top_nav(); ?>
	</nav>


</header> <!-- / .site-header -->

<nav class="main-navigation-sticky">
	<div class="mobile-menu-toggle"><a href="#menu-main-navigation" id="toggle">Menu</a></div>
	<?php start_top_nav(); ?>
</nav>

<div class="site-content">
	<?php global $post;
	if ( isset ( $post->ID ) && get_the_post_thumbnail($post->ID) && is_singular() ) : ?>

	<div class="featured-image-background-container">
		<div class="featured-image-background" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>')">
		</div>
		<div class="blue-gradient-background featured-image-cover"></div>
	</div>

	<?php endif; ?>