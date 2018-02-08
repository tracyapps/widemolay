<?php
/**
 *  Displays archive entries with featured image, tag/category (etc) and short excerpt
 */
?>



<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-list archive' ); ?> role="article">

	<section class="featured-image" itemprop="articleBody"
		<?php if( has_post_thumbnail() ) :
			echo ' style ="background-image: url(';
			the_post_thumbnail_url( 'large' );
			echo ');" ';
		endif; ?>
	>
		<a href="<?php the_permalink() ?>" rel="bookmark" class="blue-gradient-background">
			<span class="screen-reader-text">View &raquo;</span>
		</a>
	</section>

	<section class="archive-content-container">
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

		<section class="entry-content" itemprop="articleBody">
			<?php the_excerpt(); ?>
		</section> <!-- end article section -->
	</section>
	

</article> <!-- end article -->

	