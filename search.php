<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="row container">

		<main id="main" class="full" role="main">
			<header>
				<h1 class="page-title"><span class="smaller">Search results for:</span> <?php echo esc_attr( get_search_query() ); ?></h1>
			</header>

			<?php if ( have_posts() ) :


				while( have_posts() ) :
					the_post();

					$all_search_results[] = $post->ID;
					endwhile;

				foreach( $all_search_results as $result ) :

					if( get_post_type( $result ) == 'post' ) :
						the_post( $result );
						get_template_part( 'parts/loop', 'archive-list' );

					elseif( get_post_type( $result ) == 'page' ) :
						the_post( $result );
						get_template_part( 'parts/loop', 'archive-simple' );

					endif;
					wp_reset_postdata();
				endforeach;
				?>

				<?php start_page_navi(); ?>

			<?php else : ?>

				<p>Sorry, no results are found</p>

			<?php endif; ?>

		</main> <!-- end #main -->

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>
