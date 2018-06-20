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
			<a href="<?php echo bloginfo( 'home' ); ?>"><?php get_template_part( 'parts/content', 'logo' ); ?></a>
		</div>
	</div>

	<nav class="main-navigation">
		<?php start_top_nav(); ?>
	</nav>


</header> <!-- / .site-header -->
<nav class="utility-navigation">
	<ul class="user-welcome">
		<li class="icon-user">
			<svg class="icon-user-dims icon">
				<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#user'></use>
			</svg>
			<?php
			if ( is_user_logged_in() ) {
				global $current_user;
				get_currentuserinfo();
				echo '<span>Welcome ' . $current_user->display_name . '! </span>';
				echo '<span class="red-text"> (';
				wp_loginout();
				echo ')</span>';
			} else {
				echo '<span class="red-text"><a href="/login/">Log in</a> or <a href="/create-an-account/">Create an account</a>.</span>';
			}
			?>
		</li>

	</ul>
	<ul>
		<li class="icon-location">
			<a href="/location/">
				<span>
					<svg class="icon-location-dims icon">
						<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#location'></use>
						<text x="15" y="35" class="tooltip">Chapter Locator</text>
					</svg>
				</span>
			</a>
		</li>
		<li class="icon-calendar">
			<a href="/calendar/">
				<span>
					<svg class="icon-calendar-dims icon">
						<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#calendar'></use>
						<text x="15" y="35" class="tooltip">Calendar</text>
					</svg>
				</span>
			</a>
		</li>
		<li class="icon-mail">
			<a href="/contact/">
				<span>
					<svg class="icon-mail-dims icon">
						<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#mail'></use>
						<text x="15" y="35" class="tooltip">Contact us</text>
					</svg>

				</span>
			</a>
		</li>
		<li class="icon-search">
			<div class="show-hide-search-button">
				<span>
					<svg class="icon-search-dims icon">
						<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#search'></use>
						<text x="15" y="35" class="tooltip">Search</text>
					</svg>

				</span>
			</div>
		</li>
		<li class="search-form-area" id="search-form">
			<?php get_search_form(); ?>
		</li>
	</ul>
</nav>
<div class="mobile-nav-button">
	<div class="mobile-nav-button__line"></div>
	<div class="mobile-nav-button__line"></div>
	<div class="mobile-nav-button__line"></div>
</div>
<nav class="main-navigation-sticky main-navigation mobile-menu">
	<?php start_top_nav(); ?>
	<div class="mobile-only-utility-navigation">
		<nav class="utility-navigation">
			<ul>
				<li class="icon-calendar">
					<a href="/calendar/">
					<span>
						<svg class="icon-calendar-dims icon">
							<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#calendar'></use>
						</svg>
					</span>
					</a>
				</li>
				<li class="icon-mail">
					<a href="/contact/">
					<span>
						<svg class="icon-mail-dims icon">
							<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#mail'></use>
						</svg>
					</span>
					</a>
				</li>
				<li class="icon-search">
					<div class="show-hide-mobile-search-button">
					<span>
						<svg class="icon-search-dims icon">
							<use xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href='#search'></use>
						</svg>
					</span>
					</div>
				</li>
				<li class="mobile-search-form-area" id="mobile-search-form">
					<?php get_search_form(); ?>
				</li>
			</ul>
		</nav>
	</div>
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