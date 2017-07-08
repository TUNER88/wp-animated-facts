<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/TUNER88
 * @since             1.0.0
 * @package           Wp_Animated_Facts
 *
 * @wordpress-plugin
 * Plugin Name:       Animated Facts
 * Plugin URI:        https://github.com/TUNER88/wp-animated-facts
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            TUNER88
 * Author URI:        https://github.com/TUNER88
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-animated-facts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-animated-facts-activator.php
 */
function activate_wp_animated_facts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-animated-facts-activator.php';
	Wp_Animated_Facts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-animated-facts-deactivator.php
 */
function deactivate_wp_animated_facts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-animated-facts-deactivator.php';
	Wp_Animated_Facts_Deactivator::deactivate();
}

/**
 * Register custom post type
 */
function register_af_post_type(){
    $labels = [
        'name'               => __('Animated Fact Lists', 'wp-animated-facts'),
        'singular_name'      => __('Animated Fact List', 'wp-animated-facts'),
        'menu_name'          => __('Animated Facts', 'wp-animated-facts'),
        'name_admin_bar'     => __('Fact List', 'wp-animated-facts'),
        'add_new'            => __('Add New', 'wp-animated-facts'),
        'add_new_item'       => __('Add New Fact List', 'wp-animated-facts'),
        'new_item'           => __('New Fact List', 'wp-animated-facts'),
        'edit_item'          => __('Edit Fact List', 'wp-animated-facts'),
        'view_item'          => __('View Fact List', 'wp-animated-facts'),
        'all_items'          => __('All Fact Lists', 'wp-animated-facts'),
        'search_items'       => __('Search Fact Lists', 'wp-animated-facts'),
        'not_found'          => __('No Fact Lists found.', 'wp-animated-facts'),
        'not_found_in_trash' => __('No Fact Lists found in Trash.', 'wp-animated-facts')
    ];

    $args = [
        'labels'             => $labels,
        'public'             => false,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_admin_bar'  => false,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => ['title'],
        'menu_icon'          => 'dashicons-slides'
    ];

    register_post_type( 'animated_facts', $args );
}

add_action( 'init', 'register_af_post_type' );
register_activation_hook( __FILE__, 'activate_wp_animated_facts' );
register_deactivation_hook( __FILE__, 'deactivate_wp_animated_facts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-animated-facts.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_animated_facts() {

	$plugin = new Wp_Animated_Facts();
	$plugin->run();

}
run_wp_animated_facts();
