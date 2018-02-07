<?php get_header(); ?>

	<div id="content">

		<div id="inner-content" class="row container">

			<main id="main" class="main" role="main">

				<header>
					<?php start_the_archive_title( '<h1 class="page-title">', '</h1>', 'smaller'); ?>
					<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
				</header>

				<?php if ( have_posts() ) :
					echo '<section class="archive-list-container">';
					while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'parts/loop', 'archive-list' ); ?>


				<?php endwhile; ?>

					</section>

					<?php start_page_navi(); ?>

				<?php else : ?>

					<?php get_template_part( 'parts/content', 'missing' ); ?>

				<?php endif; ?>

			</main> <!-- end #main -->
			

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>