<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

	<header class="article-header">
		<h2 class="page-title"><?php the_title(); ?></h2>
	</header> <!-- end article header -->

	<div class="container">
		<section class="entry-content" itemprop="articleBody">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</section> <!-- end article section -->

		<footer class="article-footer">

		</footer> <!-- end article footer -->

		<?php comments_template(); ?>
	</div>
</article> <!-- end article -->