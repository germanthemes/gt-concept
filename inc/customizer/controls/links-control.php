<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package GT Concept
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class GT_Concept_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'gt-concept' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://germanthemes.de/en/themes/gt-concept/', 'gt-concept' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Page', 'gt-concept' ); ?>
					</a>
				</p>

				<p>
					<a href="https://demo.germanthemes.de/?demo=gt-concept" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'gt-concept' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://germanthemes.de/en/docs/gt-concept-documentation/', 'gt-concept' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'gt-concept' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
