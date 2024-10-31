<?php
/**
 * Import admin template.
 *
 * @package    WordPress
 * @subpackage Multiple Products to Cart for WooCommerce
 * @since      7.2.0
 */

defined( 'ABSPATH' ) || exit;

global $mpc__;

$import_success = false;
if( isset( $_POST['mpc_import'] ) && wp_verify_nonce( sanitize_key(wp_unslash($_POST['mpc_import'])), 'mpc_import_nonce' ) ){   
    $import_success = true;
}

$pro_cls = false === $mpc__['has_pro'] ? 'mpcex-disabled' : '';

do_action( 'mpc_pro_import' );

?>
<div class="mpcdp_settings_section">
	<div class="mpcdp_settings_section_title"><?php echo esc_html__( 'Import Settings', 'multiple-products-to-cart-for-woocommerce' ); ?></div>
    <div class="mpcdp_settings_toggle mpcdp_container" data-toggle-id="footer_theme_customizer">
		<div class="mpcdp_settings_option visible" data-field-id="footer_theme_customizer">
			<div class="mpcdp_settings_option_field_theme_customizer first_customizer_field">
				<span class="theme_customizer_icon dashicons dashicons-upload"></span>
				<div class="mpcdp_settings_option_description">
                    <?php if( false === $mpc__['has_pro'] ) : ?>
                        <div class="mpcdp_settings_option_ribbon mpcdp_settings_option_ribbon_new">
                            <?php echo esc_html__( 'PRO', 'multiple-products-to-cart-for-woocommerce' ); ?>
                        </div>
                    <?php endif; ?>
					<div class="mpcdp_option_label">Import MPC Tables and Settings</div>
					<div class="mpcdp_option_description">
                        <br>
                        The file name will be `mpc_export.json` or enumarated `mpc_export(1).json`.
                        <br><br>
                        Choose the .json file and click on `Import`. This will import `Multiple products to cart for WooCommerce` tables and settings.
                        <br><br>
                        <?php if( false === $mpc__['has_pro'] ) : ?>
                            The import feature is only available for PRO plugin.
                        <?php endif; ?>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="mpcdp_settings_toggle mpcdp_container" id="column-sorting">
        <?php if( $import_success ) : ?>
            <div class="mpcdp_settings_option visible" data-field-id="footer_theme_customizer">
                <div class="mpcdp_settings_option_field_theme_customizer first_customizer_field">
                    <span class="theme_customizer_icon dashicons dashicons-saved"></span>
                    <div class="mpcdp_settings_option_description">
                        <div class="mpcdp_option_label"><?php echo esc_html__( 'Imported successfully.', 'multiple-products-to-cart-for-woocommerce' ); ?></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
		<div class="mpcdp_settings_option visible">
            <div class="mpcdp_row">
                <div class="mpcdp_settings_option_description col-md-12">
                    <div class="mpcdp_option_label">Import</div>
                    <div class="mpcdp_option_description">Import MPC settings and tables</div>
                </div>
            </div>
            <div class="mpcdp_row">
                <div class="mpcdp_settings_option_description col-md-6">
                    <input name="mpc_import_file" type="file" class="mpc-file-uploader" accept=".json">
                </div>
                <div class="mpcdp_settings_option_field mpcdp_settings_option_field_text col-md-6">
                    <div class="mpcdp_settings_submit mpc-file">
                        <div class="submit">
                            <button class="mpcdp_submit_button <?php echo esc_attr( $pro_cls ); ?>" title="Import">
                                <div class="save-text">Import settings</div>
                                <div class="save-text save-text-mobile">Import</div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<?php

wp_nonce_field( 'mpc_import_nonce', 'mpc_import' );
