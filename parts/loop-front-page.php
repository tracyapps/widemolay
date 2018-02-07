<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<?php
	$hero_background = '';
	$hero_background_choice = get_field( 'hero_background' );

	if ( $hero_background_choice == 'image' ) :
		$hero_background = ' style="background-image: linear-gradient(-60deg, rgba( 0, 213, 251, 0.85 ) 0%, rgba( 7, 26, 51, 0.85 ) 100%), url(' . esc_url( get_field( 'hero_background_image' ) ) . ')" ';
	endif;
	?>
	<section class="homepage-hero" <?php echo __( $hero_background ); ?>>

		<?php if ( $hero_background_choice == 'video' ) : ?>
		<div class="video-container">
			<video loop muted autoplay class="background-video">
				<?php
				if ( get_sub_field( 'mp4' ) ) :
					echo '<source type="video/mp4" src="' . esc_url( get_sub_field( 'mp4' ) ) . '" />';
				endif;
				if ( get_sub_field( 'webm' ) ) :
					echo '<source type="video/webm" src="' . esc_url( get_sub_field( 'webm' ) ) . '" />';
				endif;
				if ( get_sub_field( 'ogg' ) ) :
					echo '<source type="video/ogg" src="' . esc_url( get_sub_field( 'ogg' ) ) . '" />';
				endif;
				?>
			</video>
		</div>
		<?php else ( $hero_background_choice == 'slideshow' ) :
		
		endif; ?>
		<div class="hero-content">
			<?php if ( get_field( 'hero_text_line_one' ) ) :
			echo '<h1>' . the_field( 'hero_text_line_one' ) . '</h1>';
			endif;

			if ( get_field( 'hero_text_line_two' ) ) :
				echo '<h2>' . the_field( 'hero_text_line_two' ) . '</h2>';
			endif;

			if ( get_field( 'hero_text_paragraph' ) ) :
				echo '<div class="hero-text">' . the_field( 'hero_text_paragraph' ) . '</div>';
			endif;  ?>


		</div>
	</section>

	<?php get_template_part( 'parts/sections' ); ?>


</article> <!-- end article -->
