<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<div class="person-photo-container">
		<?php the_post_thumbnail( 'large' ); ?>
	</div>

	<header class="person-header red-gradient-background centered-text">
		<h1 class="page-title person-name"><?php the_title(); ?></h1>
		<?php
		if ( get_field( 'person_position' ) ) :
		echo '<h2 class="person-title">' . get_field( 'person_position' ) . '</h2>';
		endif;
		?>
	</header> <!-- end article header -->

	<section class="person-additional-details container">
		<?php echo start_person_display_additional_fields(); ?>
	</section>
	<section class="entry-content container" itemprop="articleBody">

		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="person-footer">
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'start' ),
			'after' => '</div>'
		) ); ?>
		<p class="tags"><?php the_tags( '<span class="tags-title">' . __( 'Tags:', 'start' ) . '</span> ', ', ',
				'' ); ?></p>
	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->