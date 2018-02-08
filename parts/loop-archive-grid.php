<?php
/**
 *  Displays archive entries with just featured image, title, category/tag, 
 * date posted and then the link
 */
 ?>



<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid' ); ?> role="article" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>')">

	<div class="top-space">
		<a href="<?php the_permalink() ?>"><span></span></a>
	</div>

	<header class="article-header">
		<h3 class="title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php
		$article_type = get_post_type( $post->ID );

		if( $article_type == 'person' ) :
			echo '<h6 class="person-title">' . get_field( 'person_position' ) . '</h6>';
		elseif( $article_type == 'page' ) :

		elseif( $article_type == 'post' ) :
			get_template_part( 'parts/content', 'byline' );
		endif;
		?>
	</header> <!-- end article header -->

</article> <!-- end article -->

	