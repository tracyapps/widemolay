<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">

	<!-- Force IE to use the latest rendering engine available -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Mobile Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>


</head>

<body <?php body_class('individual-chapter-page'); ?>>

<header class="chapter-page-header dark-blue-background" role="banner">
	<nav class="return-to-main-site">
		<a href="<?php echo bloginfo( 'home' ); ?>">&laquo; Return to WI DeMolay main site</a>
		<div class="logo">
			<a href="<?php echo bloginfo( 'home' ); ?>"><?php get_template_part( 'parts/content', 'logo' ); ?></a>
		</div>
	</nav>
	<h1 class="page-title"><?php the_title(); ?></h1>
</header>
<div class="site-content">
<?php $current_fp = get_query_var('fpage'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<nav class="chapter-page-navigation yellow-background centered-text">
		<ul class="nav">
			<li class="menu-item"><a href="<?php echo get_permalink(); ?>">Home</a></li>
			<?php

			$calendar_page_option = get_field( 'calendar' );
			$photo_gallery_option = get_field( 'photo_gallery' );
			$newsletter_page_option = get_field( 'newsletter' );


			if( $calendar_page_option[ 'add_calendar_page' ] ) {
				echo '<li class="menu-item"><a href="' . get_permalink() . 'calendar/">Calendar of Events</a></li>';
			}

			$chapter_details = get_field( 'chapter_details' );
			if( have_rows( 'chapter_details' ) ) : while( have_rows( 'chapter_details' ) ) : the_row();

				if ( have_rows( 'chapter_officers' ) ) {
					echo '<li class="menu-item"><a href="' . get_permalink() . 'officers/">Chapter Officers</a></li>';
				}

			endwhile;
			endif;

			if( have_rows( 'chapter_details' ) ) : while( have_rows( 'chapter_details' ) ) : the_row();

				if ( have_rows( 'chapter_advisors' ) ) {
					echo '<li class="menu-item"><a href="' . get_permalink() . 'advisors/">Chapter Advisors</a></li>';
				}

			endwhile;
			endif;

			if( $photo_gallery_option[ 'add_photo_page' ] ) {
				echo '<li class="menu-item"><a href="' . get_permalink() . 'photos/">Photo Gallery</a></li>';
			}

			if( $newsletter_page_option[ 'add_newsletter_page' ] ) {
				echo '<li class="menu-item"><a href="' . get_permalink() . 'newsletter/">Newsletters</a></li>';
			}

			?>
		</ul>
	</nav>

	<div id="content" class="container">
		
		<div id="inner-content" class="row">

			<?php

			if (!$current_fp) { ?>
				<header class="sub-page-header full-width">
					<h2 class="section-title">Home</h2>
				</header>
				<main class="main-column" role="main">
					<?php the_field( 'home_content' ) ?>
				</main> <!-- end #main -->

			<?php } else {
				get_template_part( 'single', 'chapter-child' );
			}; ?>


			<aside class="secondary-column sidebar">
				<h4 class="widget-title"><?php the_title(); ?></h4>
				<?php echo start_chapter_display_address();	?>

				<?php echo start_display_chapter_google_map(); ?>

				<h4 class="widget-title">Meetings</h4>
					<?php echo start_chapter_meeting_times(); ?>

				<?php if( get_field( 'chapter_email_address' ) || get_field( 'chapter_phone_number' ) || have_rows( 'chapter_social_media' ) ) : ?>
				<h4 class="widget-title">Contact</h4>
					<?php echo start_chapter_display_contact_information(); ?>
					<?php echo start_chapter_display_social_media_profiles(); ?>

				<?php endif; ?>
			</aside>
			
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	<?php endwhile; endif; ?>

<?php get_footer(); ?>