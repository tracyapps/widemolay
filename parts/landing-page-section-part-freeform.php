<?php
/**
 * landing page section: full -> freeform
 */

$section_content_classes = array();
$section_content_classes[] = esc_html( get_sub_field( 'freeform_content_size' ) );
$section_content_classes[] = esc_html( get_sub_field( 'freeform_content_alignment' ) );
?>

<div class="section-content-container <?php echo implode( ' ', $section_content_classes ); ?>">
	<?php echo do_shortcode( get_sub_field( 'freeform_content_area' ) ); ?>
</div>
