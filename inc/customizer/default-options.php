<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package GT Concept
 */

/**
* Get a single theme option
*
* @return mixed
*/
function gt_concept_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = gt_concept_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function gt_concept_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'gt_concept_theme_options', array() ), gt_concept_default_options() );

	// Return theme options.
	return apply_filters( 'gt_concept_theme_options', $theme_options );
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function gt_concept_default_options() {

	$default_options = array(
		'site_title'         => true,
		'site_description'   => true,
		'meta_date'          => true,
		'meta_author'        => true,
		'meta_categories'    => true,
		'meta_tags'          => false,
		'primary_color'      => '#ff7755',
		'secondary_color'    => '#d9512f',
		'accent_color'       => '#55aaff',
		'highlight_color'    => '#00bb88',
		'light_gray_color'   => '#e4e4e4',
		'gray_color'         => '#848484',
		'dark_gray_color'    => '#242424',
		'link_color'         => '#ff7755',
		'header_color'       => '#ffffff',
		'navi_color'         => '#ff7755',
		'title_color'        => '#242424',
		'title_hover_color'  => '#ff7755',
		'footer_color'       => '#d9512f',
		'text_font'          => 'SystemFontStack',
		'title_font'         => 'SystemFontStack',
		'title_is_bold'      => true,
		'title_is_uppercase' => false,
		'navi_font'          => 'SystemFontStack',
		'navi_is_bold'       => true,
		'navi_is_uppercase'  => false,
		'license_key'        => '',
		'license_status'     => 'inactive',
	);

	return apply_filters( 'gt_concept_default_options', $default_options );
}
