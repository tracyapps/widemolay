<?php
/**
 * The template for displaying the child pages, and a grid, with options (coming soon)
 */


if ( has_children() ) :
	echo '<h5 class="centered-text">Pages in this section:</h5>';
	echo start_display_child_pages_with_options();
endif;
