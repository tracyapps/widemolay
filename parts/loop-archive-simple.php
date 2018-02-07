<?php
/**
 *  Displays page search results without excerpts and other unrelated things (like posted dates and such)
 */
?>



<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-simple archive' ); ?> role="article">


	<section class="featured-image" itemprop="articleBody"
		<?php if( has_post_thumbnail() ) :
			echo ' style ="background-image: url(';
			the_post_thumbnail_url( 'large' );
			echo ');" ';
		endif; ?>
		>
		<a href="<?php the_permalink() ?>" rel="bookmark" class="red-gradient-background">
			<span class="screen-reader-text">View &raquo;</span>
			<span><?php get_post_type( $post->ID ); ?></span>
		</a>
	</section>


	<section class="archive-content-container">
		<header class="article-header">
			<h3 class="title">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h3>
		</header> <!-- end article header -->
	</section>


</article> <!-- end article -->
