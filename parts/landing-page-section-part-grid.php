<?php
/**
 * landing page section: full -> grid
 */

while( have_rows( 'grid_blocks' ) ) :
	the_row();

	$background_options = get_sub_field( 'block_background_option_group' );
	$cta_link_options = get_sub_field( 'block_link_option_group' ); 
	
	$block_classes = array();
	$block_classes[] = esc_html( $background_options['block_background_options'] );
	$block_classes[] = esc_html( $background_options['text_color_options'] );

	$manual_styles = array();
	if( $background_options['block_background_options'] == 'color-bg' || $background_options['block_background_options'] == 'image-bg' ) {
		$manual_styles[] = ( $background_options['block_background_color'] ? 'style="background-color: ' . esc_attr( $background_options['block_background_color'] ) . ';' : 'style="background-image: url(' . esc_url( $background_options['block_background_image'] ) . ');' );
		$manual_styles[] = ( ( $background_options['text_color_options'] == 'manual' ) ? 'color:' . esc_attr( $background_options['manual_text_color'] ) . ';' : '');
		$manual_styles[] = '"';
		}
	
	?>
	

	<div class="block <?php echo implode( ' ', $block_classes ); ?>"
		<?php echo implode( ' ', $manual_styles ); ?>
	>

		<h6><?php the_sub_field( 'block_title' ); ?></h6>
		<?php echo do_shortcode( get_sub_field( 'block_content' ) ); ?>

		<?php
		if( $cta_link_options['block_link_to'] == 'internal' || $cta_link_options['block_link_to'] == 'external' ) {
			$cta_link_url = ( $cta_link_options['block_select_link'] ?  $cta_link_options['block_select_link'] : $cta_link_options['block_link_url'] );
			printf( '<div class="cta-button-area">
						<a href="%s" class="button">%s</a>
					</div>',
				esc_url( $cta_link_url ),
				esc_html( $cta_link_options['block_button_text'] )
				);
		}
		?>
	</div>
<?php
endwhile;