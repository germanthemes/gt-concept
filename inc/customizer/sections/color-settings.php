<?php
/**
 * Color Settings
 *
 * @package GT Concept
 */

/**
 * Adds all Color settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function gt_concept_customize_register_theme_color_settings( $wp_customize ) {

	// Add Section for Theme Colors.
	$wp_customize->add_section( 'gt_concept_section_colors', array(
		'title'    => esc_html_x( 'Colors', 'theme colors', 'gt-concept' ),
		'priority' => 10,
		'panel'    => 'gt_concept_options_panel',
	) );

	// Get Default Colors from settings.
	$default = gt_concept_default_options();

	// Add Primary Color setting.
	$wp_customize->add_setting( 'gt_concept_theme_options[primary_color]', array(
		'default'           => $default['primary_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_concept_theme_options[primary_color]', array(
			'label'    => esc_html_x( 'Primary', 'block color', 'gt-concept' ),
			'section'  => 'gt_concept_section_colors',
			'settings' => 'gt_concept_theme_options[primary_color]',
			'priority' => 10,
		)
	) );

	// Add Secondary Color setting.
	$wp_customize->add_setting( 'gt_concept_theme_options[secondary_color]', array(
		'default'           => $default['secondary_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_concept_theme_options[secondary_color]', array(
			'label'    => esc_html_x( 'Secondary', 'block color', 'gt-concept' ),
			'section'  => 'gt_concept_section_colors',
			'settings' => 'gt_concept_theme_options[secondary_color]',
			'priority' => 20,
		)
	) );

	// Add Header Color setting.
	$wp_customize->add_setting( 'gt_concept_theme_options[header_color]', array(
		'default'           => $default['header_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_concept_theme_options[header_color]', array(
			'label'    => esc_html_x( 'Header', 'theme colors', 'gt-concept' ),
			'section'  => 'gt_concept_section_colors',
			'settings' => 'gt_concept_theme_options[header_color]',
			'priority' => 30,
		)
	) );

	// Add Navigation Color setting.
	$wp_customize->add_setting( 'gt_concept_theme_options[navi_color]', array(
		'default'           => $default['navi_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_concept_theme_options[navi_color]', array(
			'label'    => esc_html_x( 'Navigation', 'theme colors', 'gt-concept' ),
			'section'  => 'gt_concept_section_colors',
			'settings' => 'gt_concept_theme_options[navi_color]',
			'priority' => 40,
		)
	) );

	// Add Footer Color setting.
	$wp_customize->add_setting( 'gt_concept_theme_options[footer_color]', array(
		'default'           => $default['footer_color'],
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control(
		$wp_customize, 'gt_concept_theme_options[footer_color]', array(
			'label'    => esc_html_x( 'Footer Widgets', 'theme colors', 'gt-concept' ),
			'section'  => 'gt_concept_section_colors',
			'settings' => 'gt_concept_theme_options[footer_color]',
			'priority' => 50,
		)
	) );
}
add_action( 'customize_register', 'gt_concept_customize_register_theme_color_settings' );
