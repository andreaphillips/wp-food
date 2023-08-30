<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://foodstudiocr.com
 * @since             1.0.0
 * @package           Food_Studio_Plans
 *
 * @wordpress-plugin
 * Plugin Name:       FoodStudio Planes
 * Plugin URI:        https://foodstudiocr.com
 * Description:       Planes para food studio
 * Version:           1.0.0
 * Author:            Andrea Phillips Rojas
 * Author URI:        https://foodstudiocr.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       food-studio-plans
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FOOD_STUDIO_PLANS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-food-studio-plans-activator.php
 */
function activate_food_studio_plans() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-food-studio-plans-activator.php';
	Food_Studio_Plans_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-food-studio-plans-deactivator.php
 */
function deactivate_food_studio_plans() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-food-studio-plans-deactivator.php';
	Food_Studio_Plans_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_food_studio_plans' );
register_deactivation_hook( __FILE__, 'deactivate_food_studio_plans' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-food-studio-plans.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_food_studio_plans() {

	$plugin = new Food_Studio_Plans();
	$plugin->run();

}
run_food_studio_plans();

function add_custom_product_types( $types ){
    $types[ 'prepaid_plan' ] = __( 'Prepaid Plan' );
    return $types;
}
add_filter( 'product_type_selector', 'add_custom_product_types' );
