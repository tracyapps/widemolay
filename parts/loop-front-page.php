<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<section class="homepage-hero">
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
