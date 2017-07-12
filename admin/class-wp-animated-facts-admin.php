<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/TUNER88
 * @since      1.0.0
 *
 * @package    Wp_Animated_Facts
 * @subpackage Wp_Animated_Facts/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Animated_Facts
 * @subpackage Wp_Animated_Facts/admin
 * @author     TUNER88 <anton.pauli@gmail.com>
 */
class Wp_Animated_Facts_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Animated_Facts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Animated_Facts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-animated-facts-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Animated_Facts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Animated_Facts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-animated-facts-admin.js', array( 'jquery' ), $this->version, false );
	}

    /**
     * Register custom post type
     */
	public function register_post_type(){
        $labels = [
            'name'               => __('Animated Fact Lists', 'wp-animated-facts'),
            'singular_name'      => __('Animated Fact List', 'wp-animated-facts'),
            'menu_name'          => __('Animated Facts', 'wp-animated-facts'),
            'name_admin_bar'     => __('Fact List', 'wp-animated-facts'),
            'add_new'            => __('Add New List', 'wp-animated-facts'),
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

    /**
     * Render custom post columns
     *
     * @param $column
     * @param $post_id
     */
    public function render_post_columns($column, $post_id){
        switch ( $column ) {
            case 'af_shortcode' :
                global $post;
                $shortCode = htmlspecialchars('[animated-facts id="'.$post->ID.'"]');
                echo '<span class="shortcode">'.$shortCode.'</span>';
                break;
        }
    }

    /**
     * Register custom columns
     *
     * @param $columns
     * @return array
     */
    public function register_custom_columns($columns){
        return array_merge($columns, ['af_shortcode' => 'Shortcode']);
    }
}
