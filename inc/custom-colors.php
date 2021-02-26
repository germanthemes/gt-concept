<?php
/**
 * Custom Colors
 *
 * Generates Custom CSS code for Color Settings
 *
 * @package GT Concept
 */

/**
 * Custom Colors Class
 */
class GT_Concept_Custom_Colors {

	/**
	 * Actions Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Add Custom Fonts CSS code to frontend.
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'add_custom_colors_in_frontend' ), 11 );

		// Add Custom Fonts CSS code to editor.
		add_action( 'enqueue_block_editor_assets', array( __CLASS__, 'add_custom_colors_in_editor' ), 11 );
	}

	/**
	 * Add Font Family CSS styles in the head area of the theme.
	 */
	static function add_custom_colors_in_frontend() {
		wp_add_inline_style( 'gt-concept-stylesheet', self::get_custom_colors_css() );
	}

	/**
	 * Add Font Family CSS styles in the head area of the Gutenberg editor.
	 */
	static function add_custom_colors_in_editor() {
		wp_add_inline_style( 'gt-concept-editor-styles', self::get_custom_colors_css() );
	}

	/**
	 * Generate Color CSS styles to override default colors.
	 *
	 * @return string CSS code
	 */
	static function get_custom_colors_css() {

		// Get theme options from database.
		$theme_options = gt_concept_theme_options();

		// Get default colors.
		$default = gt_concept_default_options();

		// Color Variables.
		$color_variables = '';

		// Set Primary Color.
		if ( $theme_options['primary_color'] !== $default['primary_color'] ) {
			$color_variables .= '--gt-concept--primary-color: ' . $theme_options['primary_color'] . ';';
		}

		// Set Secondary Color.
		if ( $theme_options['secondary_color'] !== $default['secondary_color'] ) {
			$color_variables .= '--gt-concept--secondary-color: ' . $theme_options['secondary_color'] . ';';
		}

		// Set Accent Color.
		if ( $theme_options['accent_color'] !== $default['accent_color'] ) {
			$color_variables .= '--gt-concept--accent-color: ' . $theme_options['accent_color'] . ';';
		}

		// Set Highlight Color.
		if ( $theme_options['highlight_color'] !== $default['highlight_color'] ) {
			$color_variables .= '--gt-concept--highlight-color: ' . $theme_options['highlight_color'] . ';';
		}

		// Set Light Gray Color.
		if ( $theme_options['light_gray_color'] !== $default['light_gray_color'] ) {
			$color_variables .= '--gt-concept--light-gray-color: ' . $theme_options['light_gray_color'] . ';';
		}

		// Set Gray Color.
		if ( $theme_options['gray_color'] !== $default['gray_color'] ) {
			$color_variables .= '--gt-concept--gray-color: ' . $theme_options['gray_color'] . ';';
		}

		// Set Dark Gray Color.
		if ( $theme_options['dark_gray_color'] !== $default['dark_gray_color'] ) {
			$color_variables .= '--gt-concept--dark-gray-color: ' . $theme_options['dark_gray_color'] . ';';
		}

		// Set Link Color.
		if ( $theme_options['link_color'] !== $default['link_color'] ) {
			$color_variables .= '--gt-concept--link-color: ' . $theme_options['link_color'] . ';';
			$color_variables .= '--gt-concept--button-color: ' . $theme_options['link_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['link_color'] ) ) {
				$color_variables .= '--gt-concept--button-text-color: #242424;';
			}
		}

		// Set Header Color.
		if ( $theme_options['header_color'] !== $default['header_color'] ) {
			$color_variables .= '--gt-concept--header-background-color: ' . $theme_options['header_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_dark( $theme_options['header_color'] ) ) {
				$color_variables .= '--gt-concept--header-text-color: #ffffff;';
				$color_variables .= '--gt-concept--header-border-color: rgba(255, 255, 255, 0.1);';
			}
		}

		// Set Navigation Color.
		if ( $theme_options['navi_color'] !== $default['navi_color'] ) {
			$color_variables .= '--gt-concept--header-text-hover-color: ' . $theme_options['navi_color'] . ';';
		}

		// Set Title Color.
		if ( $theme_options['title_color'] !== $default['title_color'] ) {
			$color_variables .= '--gt-concept--title-color: ' . $theme_options['title_color'] . ';';
		}

		// Set Title Hover Color.
		if ( $theme_options['title_hover_color'] !== $default['title_hover_color'] ) {
			$color_variables .= '--gt-concept--title-hover-color: ' . $theme_options['title_hover_color'] . ';';
		}

		// Set Footer Color.
		if ( $theme_options['footer_color'] !== $default['footer_color'] ) {
			$color_variables .= '--gt-concept--footer-background-color: ' . $theme_options['footer_color'] . ';';

			// Check if a light background color was chosen.
			if ( self::is_color_light( $theme_options['footer_color'] ) ) {
				$color_variables .= '--gt-concept--footer-text-color: #242424;';
				$color_variables .= '--gt-concept--footer-link-color: rgba(0, 0, 0, 0.6);';
				$color_variables .= '--gt-concept--footer-link-hover-color: #242424;';
			}
		}

		// Return if no color variables were defined.
		if ( '' === $color_variables ) {
			return;
		}

		// Sanitize CSS Code.
		$custom_css = ':root {' . $color_variables . '}';
		$custom_css = wp_kses( $custom_css, array( '\'', '\"' ) );
		$custom_css = str_replace( '&gt;', '>', $custom_css );
		$custom_css = preg_replace( '/\n/', '', $custom_css );
		$custom_css = preg_replace( '/\t/', '', $custom_css );

		return $custom_css;
	}

	/**
	 * Returns color brightness.
	 *
	 * @param int Number of brightness.
	 */
	static function get_color_brightness( $hex_color ) {

		// Remove # string.
		$hex_color = str_replace( '#', '', $hex_color );

		// Convert into RGB.
		$r = hexdec( substr( $hex_color, 0, 2 ) );
		$g = hexdec( substr( $hex_color, 2, 2 ) );
		$b = hexdec( substr( $hex_color, 4, 2 ) );

		return ( ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000 );
	}

	/**
	 * Check if the color is light.
	 *
	 * @param bool True if color is light.
	 */
	static function is_color_light( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) > 130 );
	}

	/**
	 * Check if the color is dark.
	 *
	 * @param bool True if color is dark.
	 */
	static function is_color_dark( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) <= 130 );
	}
}

// Run Class.
GT_Concept_Custom_Colors::setup();
