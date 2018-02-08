<?php
/**
 * If using "Sections" on home page / page (etc), include this file to display the layouts
 */


// check if the repeater field has rows of data
if ( have_rows( 'landing_page_section' ) ):

	// loop through the rows of data
	while ( have_rows( 'landing_page_section' ) ) : the_row();

		// saving some variables we'll need for conditionals
		$section_size = esc_html( get_sub_field( 'section_size' ) ); // determines weather it's a full section or a section break
		$section_background_group = get_sub_field( 'background_option_group' );

		$section_background_type = $section_background_group['background_type'];
		$section_text_color_options = $section_background_group['text_color_options'];

		$display_title_toggle = get_sub_field( 'display_title' );

		$section_classes = array();
		$section_classes[] = esc_html( $section_size );
		$section_classes[] = esc_html( $section_background_type );
		$section_classes[] = esc_html( $section_text_color_options );

		if( $section_size == 'full-section' ) :
			$transitions_array = get_sub_field( 'transition_option_group' );
			$section_classes[] = esc_html( $transitions_array['top_transition'] );
			$section_classes[] = esc_html( $transitions_array['bottom_transition'] );
			$section_classes[] = ( get_sub_field( 'full_height' ) ? 'full-height' : '' );
		endif;

	?>
		<section class="landing-page-section <?php echo implode( ' ', $section_classes ); ?>"
		<?php
		if( $section_background_type == 'color-bg' ) :
			echo ' style="background-color: ' . esc_attr( $section_background_group['background_color'] ) . '"';
		elseif( $section_background_type == 'gradient-bg' ) :
			$gradient_array = $section_background_group['background_gradient_colors'];
			echo ' style="background-image: linear-gradient( 333deg';

			foreach( $gradient_array as $color ) :
				echo ', ' . esc_attr( $color['color'] );
			endforeach;

			echo ')";';
		elseif( $section_background_type == 'image-bg' ) :
			echo ' style="background-image: url(' . esc_url( $section_background_group['background_image']) . ')"';
		endif; ?>
		>
			<div class="container">
				<?php
				$section_title = ( ( $display_title_toggle == '1' ) ? '<h2 class="section-title">' . get_sub_field( 'section_title' ) . '</h2>' : '' );
				echo $section_title;
				?>
				
				<?php if( $section_size == 'break-section' ) {
					get_template_part( 'parts/landing-page-section-break' );
				}
				if( $section_size == 'full-section' ) {
					get_template_part( 'parts/landing-page-section-full' );
				}
				?>

			</div>

		</section>

	<?php endwhile;

else :

	// no rows found

endif;