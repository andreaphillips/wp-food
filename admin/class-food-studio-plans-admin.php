<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://foodstudiocr.com
 * @since      1.0.0
 *
 * @package    Food_Studio_Plans
 * @subpackage Food_Studio_Plans/admin
 */

class Food_Studio_Plans_Admin {

    private $plugin_name;
    private $version;

    public function __construct( $plugin_name, $version ) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_filter('woocommerce_product_data_tabs', array($this, 'add_custom_product_data_tabs'));
        add_action('woocommerce_product_data_panels', array($this, 'add_custom_product_data_fields'));
    }
    

    public function enqueue_styles() {
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/food-studio-plans-admin.css', array(), $this->version, 'all' );
    }

    public function enqueue_scripts() {
        global $post_type;

        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/food-studio-plans-admin.js', array( 'jquery' ), $this->version, false );

        if ('product' == $post_type) {
            wp_enqueue_script('custom-product-type-admin', plugin_dir_url(__FILE__) . 'js/admin-custom-product-type.js', array('jquery'), null, true);
        }
    }

    public function add_custom_product_data_tabs($tabs) {
        $tabs['prepaid_plan_options'] = array(
            'label' => __('Prepaid Plan Options', 'food-studio-plans'),
            'target' => 'prepaid_plan_options',
        );
        return $tabs;
    }

public function add_custom_product_data_fields() {
        echo '<div id="prepaid_plan_options" class="panel woocommerce_options_panel">';

        woocommerce_wp_text_input(
            array(
                'id' => '_discount_percentage',
                'label' => __('Discount Percentage', 'food-studio-plans'),
                'description' => __('Enter the discount percentage for this prepaid plan.', 'food-studio-plans'),
                'desc_tip' => true,
                'type' => 'number',
                'custom_attributes' => array(
                    'step' => 'any',
                    'min' => '0',
                ),
            )
        );

        woocommerce_wp_text_input(
            array(
                'id' => '_shipping_discount',
                'label' => __('Shipping Discount', 'food-studio-plans'),
                'description' => __('Enter the shipping discount for this prepaid plan.', 'food-studio-plans'),
                'desc_tip' => true,
                'type' => 'number',
                'custom_attributes' => array(
                    'step' => 'any',
                    'min' => '0',
                ),
            )
        );

        echo '</div>';
    }

}
