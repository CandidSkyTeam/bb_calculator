<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://candidsky.com
 * @since             1.0.0
 * @package           Bb_calculator
 *
 * @wordpress-plugin
 * Plugin Name:       Budget Buddy Calculator
 * Plugin URI:        https://candidsky.com
 * Description:       Calculator for Budget Loans
 * Version:           1.0.0
 * Author:            Deividas Ambrazevicius(Candidsky)
 * Author URI:        https://candidsky.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bb_calculator
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
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bb_calculator-activator.php
 */
function activate_bb_calculator() {


	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bb_calculator-activator.php';
	Bb_calculator_Activator::activate();
}


add_action('admin_menu', 'setup_menu');

function setup_menu(){
    add_menu_page( 'BB Calculator', 'BB Calculator', 'manage_options', 'bb-calculator', 'test_init' );
}

function test_init(){
    require_once plugin_dir_path( __FILE__ ) . 'includes/backend-menu.php';
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bb_calculator-deactivator.php
 */
function deactivate_bb_calculator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bb_calculator-deactivator.php';
	Bb_calculator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bb_calculator' );
register_deactivation_hook( __FILE__, 'deactivate_bb_calculator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bb_calculator.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bb_calculator() {

	$plugin = new Bb_calculator();
	$plugin->run();

}
run_bb_calculator();
