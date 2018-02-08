<?php
/**
 * The template for displaying page grid section
 */

?>
<div class="section-intro-text container">
	<?php the_sub_field( 'page_grid_intro_text' ); ?>
</div>

<?php

echo '<div class="page-grid-container">';

while ( have_rows( 'page_grid_page' ) ) :
	the_row();
	// Get the Page title from the URL
	$the_page_url = get_sub_field( 'page_select' );
	$the_page_id = url_to_postid( $the_page_url );
	$the_page_title = get_the_title( $the_page_id );

	if( get_sub_field( 'page_title_override') ) :
		$the_page_title = get_sub_field( 'page_title_override' );
	endif;
	?>

	<div class="page-grid-item" data-image="<?php echo esc_attr( get_sub_field( 'background_image' ) ); ?>" style="background-image: url('<?php echo esc_attr( get_sub_field( 'background_image' ) ); ?>');">
		<a href="<?php echo esc_url( $the_page_url ); ?>"><?php echo esc_html( $the_page_title ); ?></a>
	</div>

<?php
endwhile;
echo '</div>';
?>
