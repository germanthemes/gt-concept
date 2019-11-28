<?php
/**
 * License Settings
 *
 * Register License Settings
 *
 * @package GT Concept
 */

/**
 * Adds all License settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_concept_customize_register_license_settings( $wp_customize ) {

	// Add Section for License.
	$wp_customize->add_section( 'gt_concept_section_license', array(
		'title'       => esc_html__( 'License', 'gt-concept' ),
		'description' => esc_html__( 'Please enter your license key. An active license key is necessary for automatic theme updates and support.', 'gt-concept' ),
		'priority'    => 30,
		'panel'       => 'gt_concept_options_panel',
	) );

	// Add Theme Links control.
	$wp_customize->add_control( new GT_Concept_Customize_Links_Control(
		$wp_customize, 'gt_concept_theme_links', array(
			'section'  => 'gt_concept_section_license',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	// Add License Key setting.
	$wp_customize->add_setting( 'gt_concept_theme_options[license_key]', array(
		'default'           => '',
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new GT_Concept_Customize_License_Control(
		$wp_customize, 'license_key', array(
			'label'    => esc_html__( 'License Key', 'gt-concept' ),
			'section'  => 'gt_concept_section_license',
			'settings' => 'gt_concept_theme_options[license_key]',
			'priority' => 20,
		)
	) );
}
add_action( 'customize_register', 'gt_concept_customize_register_license_settings' );
