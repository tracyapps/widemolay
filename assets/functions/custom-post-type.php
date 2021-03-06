<?php
/* start Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

*/

// let's create the function for the custom type
function start_custom_post_types() {
	
	/**
	 * CPT: Person
	 */

	$labels = array(
		'name'                => _x( 'People', 'Post Type General Name', 'start' ),
		'singular_name'       => _x( 'Person', 'Post Type Singular Name', 'start' ),
		'menu_name'           => __( 'People', 'start' ),
		'parent_item_colon'   => __( '', 'start' ),
		'all_items'           => __( 'All people', 'start' ),
		'view_item'           => __( '', 'start' ),
		'add_new_item'        => __( 'Add new person', 'start' ),
		'add_new'             => __( 'Add new person', 'start' ),
		'edit_item'           => __( 'Edit person', 'start' ),
		'update_item'         => __( 'Update person', 'start' ),
		'search_items'        => __( 'Search all people', 'start' ),
		'not_found'           => __( 'No people found', 'start' ),
		'not_found_in_trash'  => __( 'No people found in trash', 'start' ),
	);
	$args = array(
		'label'               => __( 'people', 'start' ),
		'description'         => __( 'People', 'start' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-nametag',
		'rewrite'             => array( 'slug' => 'people' ),
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// NEVER USE 'action' HERE, IT'S A RESERVED WORD
	register_post_type( 'person', $args );


	/**
	 * CPT: Chapter
	 */

	$labels = array(
		'name'                => _x( 'Chapters', 'Post Type General Name', 'start' ),
		'singular_name'       => _x( 'Chapter', 'Post Type Singular Name', 'start' ),
		'menu_name'           => __( 'Chapters', 'start' ),
		'parent_item_colon'   => __( '', 'start' ),
		'all_items'           => __( 'All chapters', 'start' ),
		'view_item'           => __( '', 'start' ),
		'add_new_item'        => __( 'Add new chapter', 'start' ),
		'add_new'             => __( 'Add new chapter', 'start' ),
		'edit_item'           => __( 'Edit chapter', 'start' ),
		'update_item'         => __( 'Update chapter', 'start' ),
		'search_items'        => __( 'Search all chapters', 'start' ),
		'not_found'           => __( 'No chapters found', 'start' ),
		'not_found_in_trash'  => __( 'No chapters found in trash', 'start' ),
	);
	$args = array(
		'label'               => __( 'Chapters', 'start' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-flag',
		'rewrite'             => array( 'slug' => 'chapter', 'with_front' => true ),
		'query_var' 		  => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'map_meta_cap'		  => true,
	);

	// NEVER USE 'action' HERE, IT'S A RESERVED WORD
	register_post_type( 'chapter', $args );


	/**
	 * CPT: landing page
	 */
	register_post_type( 'landing-page', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array(
			'labels' => array(
				'name' => __( 'Landing Pages', 'start' ),
				'singular_name' => __( 'Landing Page', 'start' ),
				'all_items' => __( 'All Landing Pages', 'start' ),
				'add_new' => __( 'Add New', 'start' ),
				'add_new_item' => __( 'Add New', 'start' ),
				'edit' => __( 'Edit', 'start' ),
				'edit_item' => __( 'Edit', 'start' ),
				'new_item' => __( 'New Landing Page', 'start' ),
				'view_item' => __( 'View Landing Page', 'start' ),
				'search_items' => __( 'Search Pages', 'start' ),
				'not_found' => __( 'Nothing found.', 'start' ),
				'not_found_in_trash' => __( 'Nothing found in Trash', 'start' ),
				'parent_item_colon' => ''
			),
			/* end of arrays */
			'description' => __( 'Landing pages for all the things', 'start' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 20,
			'menu_icon' => 'dashicons-welcome-widgets-menus',
			'rewrite' => array(
				'slug' => '!',
				'with_front' => false
			),
			/* you can specify its url slug */
			'has_archive' => false,
			/* you can rename the slug here */
			'capability_type' => 'page',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array(
				'title',
				'editor',
				'author',
				'excerpt',
				'custom-fields',
				'revisions'
			)
		) /* end of options */
	); /* end of register CPT: landing-page */

	/* this adds your post categories to your custom post type(s) */
	// register_taxonomy_for_object_type( 'category', 'portfolio' );
	/* this adds your post tags to your custom post type(s) */
	// register_taxonomy_for_object_type( 'post_tag', 'portfolio' );

}

// adding the function to the Wordpress init
add_action( 'init', 'start_custom_post_types' );



/**
 * custom Tax: group
 */
register_taxonomy(
	'group',		// Taxonomy machine name.
	'person',		      // Post types supported, can be array('post', 'page' ... )
	array(			      // Labels. See http://codex.wordpress.org/Function_Reference/register_taxonomy for full details.
							'label'        => __( 'Group', 'start' ),
							'rewrite'      => array( 'slug' => 'group' ),
							'hierarchical' => true,
	)
);


/**
 * Modify the post edit screen's title field placeholder
 */
function start_change_person_post_type_title_text( $title ) {
	$screen = get_current_screen();

	if ( 'person' === $screen->post_type ) {
		$title = 'Enter person\'s full name';
	}

	return $title;
}
add_filter( 'enter_title_here', 'start_change_person_post_type_title_text' );


/**
 * On post save, map values from 'person_short_bio' and 'person_photo'
 * to WordPress's native excerpt and featured image fields, respectively
 */
function start_person_proxy_fields( $post_id ) {

	// bail if not a person
	if ( 'person' !== get_post_type( $post_id ) ) {
		return;
	}

	// bail if this is not a normal save
	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) ||
		( defined( 'DOING_AJAX' ) && DOING_AJAX ) ||
		( defined( 'DOING_CRON' ) && DOING_CRON ) ) {
		return;
	}

	$bio   = strip_tags( get_field( 'person_short_bio', $post_id ) );
	$thumb = get_field( 'person_photo', $post_id );

	if ( $bio ) {
		$the_post = array(
			'ID' => $post_id,
			'post_excerpt' => $bio,
		);

		// update the excerpt
		wp_update_post( $the_post );
	}

	if ( is_integer( $thumb ) ) {
		set_post_thumbnail( $post_id, $thumb );
	}

}
add_action( 'acf/save_post', 'start_person_proxy_fields', 15 );


/**
 * ------ Template Tags for person element display ----- **
 */

/**
 * Display Additional Fields (repeater field)
 *
 * @return string
 */
function start_person_display_additional_fields() {

	$output = '';

	// Displaying additional fields if the profile type is not  set to 'simple'
	// If a profile is set to 'simple' the fields won;t be output, even if empty.
	if ( have_rows( 'person_additional_fields' ) && get_field( 'simple_or_extended_profile' ) !== 'simple' ) :

		$output = '<ul class="person-additional-details">';

		while ( have_rows( 'person_additional_fields' ) ) :

			the_row();

			$output .= sprintf(
				'<li class="row person-detail">
					<span class="label"><p>%s</p></span>
					<span class="detail">%s</span>
				</li>',
				esc_html( get_sub_field( 'detail_label' ) ),
				wp_kses_post( get_sub_field( 'detail_content' ) )
			);

		endwhile;

		$output .= '</ul>';

	endif;

	return $output;
}



/**
 * Display basic contact information of a person.
 *
 * @return string
 */
function start_person_display_contact_information() {

	$output = '';

	// display basic contact info
	if ( get_field( 'person_email_address' ) || get_field( 'person_phone_number' ) || get_field( 'person_fax' ) ) :

		$output .= '<div class="person-contact-information">';

		$output .= ( get_field( 'person_email_address' ) ) ? '<div class="person-email row"><span class="label">Email: </span><span class="detail"><a href="mailto:' . get_field( 'person_email_address' ) . '">' . get_field( 'person_email_address' ) . '</a></span></div>' : '';
		$output .= ( get_field( 'person_phone_number' ) ) ? '<div class="person-phone row"><span class="label">Phone: </span><span class="detail">' . get_field( 'person_phone_number' ) . '</span></div>' : '';
		$output .= ( get_field( 'person_fax' ) ) ? '<div class="person-phone row"><span class="label">Fax: </span><span class="detail">' . get_field( 'person_fax' ) . '</span></div>' : '';

		$output .= '</div>';
	endif;

	return $output;
}


/**
 * Display Social Media Links (repeater field)
 *
 * @return string
 */
function start_person_display_social_media_profiles() {

	$output = '';

	// displaying social media links (repeater)
	if ( have_rows( 'person_social_media' ) ) :

		$output = '<ul class="person-social-media-profiles">';

		while ( have_rows( 'person_social_media' ) ) :

			the_row();

			$output .= sprintf(
				'<li class="row social-detail %s">
					<a href="%s" class="icon icon-%s">
					<span><svg class="icon-%s-dims icon">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#%s"></use>
						<text>%s</text>
					</svg></span>
					</a>
				</li>',
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_url( get_sub_field( 'profile_link' ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( ucfirst( get_sub_field( 'service' ) ) )
			);

		endwhile;

		$output .= '</ul>';

	endif;

	return $output;
}

/**
 * Display basic contact information of a chapter.
 *
 * @return string
 */
function start_chapter_display_contact_information() {

	$output = '';

	// display basic contact info

	$output .= '<div class="chapter-contact-information">';

	$output .= ( get_field( 'chapter_email_address' ) ) ? '<div class="chapter-email row"><span class="label">Email: </span><span class="detail"><a href="mailto:' . get_field( 'chapter_email_address' ) . '">' . get_field( 'chapter_email_address' ) . '</a></span></div>' : '';
	$output .= ( get_field( 'chapter_phone_number' ) ) ? '<div class="chapter-phone row"><span class="label">Phone: </span><span class="detail">' . get_field( 'chapter_phone_number' ) . '</span></div>' : '';

	$output .= '</div>';

	return $output;
}

/**
 * Display Social Media Links (repeater field) for Chapters
 *
 * @return string
 */
function start_chapter_display_social_media_profiles() {

	$output = '';

	// displaying social media links (repeater)
	if ( have_rows( 'chapter_social_media' ) ) :

		$output = '<ul class="chapter-social-media-profiles">';

		while ( have_rows( 'chapter_social_media' ) ) :

			the_row();

			$output .= sprintf(
				'<li class="row social-detail %s">
					<a href="%s" class="icon icon-%s">
					<span><svg class="icon-%s-dims icon">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#%s"></use>
						<text>%s</text>
					</svg></span>
					</a>
				</li>',
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_url( get_sub_field( 'profile_link' ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( strtolower( get_sub_field( 'service' ) ) ),
				esc_html( ucfirst( get_sub_field( 'service' ) ) )
			);

		endwhile;

		$output .= '</ul>';

	endif;

	return $output;
}


/**
 * Display Link to Associated User's author page.
 *
 * @return mixed
 */
function start_person_display_author_posts_link() {
	$user_array = get_field( 'person_associated_user' );
	return esc_url( get_author_posts_url( $user_array['ID'] ) );
}


/**
 * Smarter display of Person Name.
 * if a first name is added in the extended profile, it will display that instead of the title (full name)
 *
 * @return mixed
 */
function start_person_display_name() {

	if ( get_field( 'person_first_name' ) ) :
		$output = esc_html( get_field( 'person_first_name' ) );
	else :
		$output = esc_html( get_the_title() );
	endif;

	return $output;
}

/**
 * Display basic Chapter address.
 *
 * @return string
 */

function start_chapter_display_address() {
	$output = '<div class="chapter-address">';
	
	$chapter_address = get_field( 'address' );

	if( $chapter_address[ 'lodge_name' ] ) {
		$output .= '<span class="lodge-name"><strong>' . esc_html( $chapter_address[ 'lodge_name' ] ) . '</strong></span>';
	}
	if( $chapter_address[ 'address_line_1' ] ) {
		$output .= '<span class="address-line-one">' . esc_html( $chapter_address[ 'address_line_1' ] ) . '</span>';
	}
	if( $chapter_address[ 'address_line_2' ]) {
		$output .= '<span class="address-line-two">' . esc_html( $chapter_address[ 'address_line_2' ] ) . '</span>';
	}
	if( $chapter_address[ 'city' ] || $chapter_address[ 'zip_code' ] ) {
		$output .= '<span class="city-state-zip">' . esc_html( $chapter_address[ 'city' ]) . ', WI ' . esc_html( $chapter_address[ 'zip_code' ] ) . '</span>';
	}

	$output .= '</div>';

	return $output;
}

function start_chapter_meeting_times() {
	$output ='';

	$chapter_details = get_field( 'chapter_details' );

	if( $chapter_details[ 'meeting_times' ] ) :
		$output .= '<span class="meeting-times">' . wp_kses_post( $chapter_details[ 'meeting_times' ] ) . '</span>';
	endif;

	return $output;
}


/**
 * Display google map
 *
 * @return string
 */

function start_display_chapter_google_map() {
	$chapter_address = get_field( 'address' );
	$output = '';
	$location = $chapter_address[ 'map' ];

	if( !empty($location) ):

		$output .= sprintf(
			'<div class="acf-map"> 
				<div class="marker" data-lat="%s" data-lng="%s"></div>
			</div>',
			$location[ 'lat' ],
			$location[ 'lng' ]
		);
	endif;

	return $output;
}

/**
 * Display Chapter Officers
 *
 * @return string
 */
function start_chapter_display_officers() {
	while ( have_rows( 'chapter_details' ) ) : the_row();

	$output = '<ul class="chapter-officers-list chapter-list">';

	while ( have_rows( 'chapter_officers' ) ) :

		the_row();

		$output .= sprintf(
			'<li class="row chapter-officer">
				<span class="office">%s</span>
				<span class="name">%s</span>
			</li>',
			esc_html( get_sub_field( 'office' ) ),
			esc_html( get_sub_field( 'name' ) )
		);

	endwhile;

	$output .= '</ul>';

	endwhile;

	return $output;
}

/**
 * Display Chapter Advisors
 *
 * @return string
 */
function start_chapter_display_advisors() {
	while ( have_rows( 'chapter_details' ) ) : the_row();

		$output = '<ul class="chapter-advisors-list chapter-list">';

		while ( have_rows( 'chapter_advisors' ) ) :

			the_row();

			$output .= sprintf(
				'<li class="row chapter-advisor">
				<span class="role">%s</span>
				<span class="name">%s</span>
			</li>',
				esc_html( get_sub_field( 'role' ) ),
				esc_html( get_sub_field( 'name' ) )
			);

		endwhile;

		$output .= '</ul>';

	endwhile;

	return $output;
}


/**
 * Functions for the "fake" pages for CHAPTER CPT
 */

// Fake pages' permalinks and titles.

$chapter_fake_pages = array(
	'officers' => 'Chapter Officers',
	'advisors' => 'Chapter Advisors',
	'calendar' => 'Events Calendar',
	'photos' => 'Photo Gallery',
	'newsletter' => 'Newsletters'
);




add_filter('rewrite_rules_array', 'fsp_insertrules');
add_filter('query_vars', 'fsp_insertqv');

// Adding fake pages' rewrite rules
function fsp_insertrules($rules)
{
	global $chapter_fake_pages;

	$newrules = array();
	foreach ($chapter_fake_pages as $slug => $title)
		$newrules['chapter/([^/]+)/' . $slug . '/?$'] = 'index.php?chapter=$matches[1]&fpage=' . $slug;

	return $newrules + $rules;
}

// Tell WordPress to accept our custom query variable
function fsp_insertqv($vars)
{
	array_push($vars, 'fpage');
	return $vars;
}

// Remove WordPress's default canonical handling function

remove_filter('wp_head', 'rel_canonical');
add_filter('wp_head', 'fsp_rel_canonical');
function fsp_rel_canonical()
{
	global $current_fp, $wp_the_query;

	if (!is_singular())
		return;

	if (!$id = $wp_the_query->get_queried_object_id())
		return;

	$link = trailingslashit(get_permalink($id));

	// Make sure fake pages' permalinks are canonical
	if (!empty($current_fp))
		$link .= user_trailingslashit($current_fp);

	echo '<link rel="canonical" href="'.$link.'" />';
}