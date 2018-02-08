<?php
/**
 * for section break code
 */

$break_content = get_sub_field( 'break_content_group' );
if( $break_content['show_subtitle'] == '1' ) {
	echo '<h6 class="subtitle">' . esc_html( $break_content['subtitle'] ) . '</h6>';
}

if( $break_content['show_content_area'] == '1' ) {
	echo '<div class="content">' . do_shortcode( $break_content['content_area'] ) . '</div>';
}

echo '<div class="cta-container">';
if( $break_content['show_cta_supporing_text'] == '1' ) {
	echo '<div class="cta-supporting-text">' . esc_html( $break_content['cta_supporting_text'] ) . '</div>';
}

if( $break_content['show_cta_button'] == '1' ) {
	$cta_details = $break_content['cta_details'];
	echo '<div class="cta-button"><a href="' . esc_url( $cta_details['cta_button_url'] ) . '" class="button">' . esc_html( $cta_details['cta_button_text'] ) . '</a></div>';
}

echo '</div>';
