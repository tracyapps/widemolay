<?php
/**
 * for full section code
 */

while( have_rows( 'section_content' ) ) : the_row();
	$section_type = get_row_layout();
	$full_height = ( get_sub_field( 'full_height' ) ? 'full-height' : '' );
	echo '<div class="landing-page-section-content content-type_' . esc_html( $section_type ) . '">';
	get_template_part( 'parts/landing-page-section-part' , $section_type );
	echo '</div>';
endwhile;