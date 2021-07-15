<?php
/**
 * Theme Info Settings
 *
 * Register Theme Info Settings
 *
 * @package GT Concept
 */

/**
 * Adds all Theme Info settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_concept_customize_register_theme_info_settings( $wp_customize ) {

	// Add Section for Theme Fonts.
	$wp_customize->add_section( 'gt_concept_section_theme_info', array(
		'title'    => esc_html__( 'Theme Info', 'gt-concept' ),
		'priority' => 200,
		'panel'    => 'gt_concept_options_panel',
	) );

	// Add Theme Links control.
	$wp_customize->add_control( new GT_Concept_Customize_Links_Control(
		$wp_customize, 'gt_concept_theme_links', array(
			'section'  => 'gt_concept_section_theme_info',
			'settings' => array(),
			'priority' => 10,
		)
	) );
}
add_action( 'customize_register', 'gt_concept_customize_register_theme_info_settings' );
