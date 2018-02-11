<?php
global $current_fp;

if( 'calendar' == $current_fp ) : ?>

	<header class="sub-page-header full-width">
		<h2 class="section-title">Calendar of Events</h2>
	</header>
	<main class="main-column" role="main">
		<?php $calendar = get_field( 'calendar' );
		echo wp_kses_post( $calendar[ 'calendar_page_content' ] ); ?>
	</main> <!-- end #main -->

<?php elseif( 'officers' == $current_fp ) : ?>

	<header class="sub-page-header full-width">
		<h2 class="section-title">Chapter Officers</h2>
	</header>
	<main class="main-column" role="main">
		<?php echo start_chapter_display_officers(); ?>
	</main> <!-- end #main -->

<?php elseif( 'advisors' == $current_fp ) : ?>

	<header class="sub-page-header full-width">
		<h2 class="section-title">Chapter Advisors</h2>
	</header>
	<main class="main-column" role="main">
		<?php echo start_chapter_display_advisors(); ?>
	</main> <!-- end #main -->

<?php elseif( 'photos'  == $current_fp ) : ?>

	<header class="sub-page-header full-width">
		<h2 class="section-title">Photo Gallery</h2>
	</header>
	<main class="main-column" role="main">
		<?php
		$photo_gallery = get_field( 'photo_gallery' );
		$all_photos = $photo_gallery['photo_page_content'];
		$image_ids = '';
		foreach( $all_photos as $photo ) :
			$image_ids .= $photo['id'] . ', ';
		endforeach;

		$shortcode = '[' . 'gallery ids="' . $image_ids . '" size="medium" link="file"]';

		echo do_shortcode( $shortcode );
		  ?>
	</main> <!-- end #main -->

<?php elseif( 'newsletter' == $current_fp ) : ?>

	<header class="sub-page-header full-width">
		<h2 class="section-title">Newsletters</h2>
	</header>
	<main class="main-column" role="main">
		<?php $newsletter = get_field( 'newsletter' );
		echo wp_kses_post( $newsletter[ 'newsletter_page_content' ] ); ?>
	</main> <!-- end #main -->

<?php endif;