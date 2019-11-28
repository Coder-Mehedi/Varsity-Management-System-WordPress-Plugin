<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       mehedi.journeybyweb.com
 * @since      1.0.0
 *
 * @package    Varsity_Management_System
 * @subpackage Varsity_Management_System/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Varsity_Management_System
 * @subpackage Varsity_Management_System/admin
 * @author     Mehedi <mehedi5051@gmail.com>
 */
class Varsity_Management_System_Admin {

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
	public function enqueue_styles($screen) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Varsity_Management_System_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Varsity_Management_System_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if($screen == 'varsity-management_page_students'){
			

			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/varsity-management-system-admin.css', array(), $this->version, 'all' );

			// wp_enqueue_style( 'table-responsive', plugin_dir_url( __FILE__ ) . 'css/table-responsive.css', array(), $this->version, 'all' );

			// wp_enqueue_style( 'to-do', plugin_dir_url( __FILE__ ) . 'css/to-do.css', array(), $this->version, 'all' );

			// wp_enqueue_style( 'zabuto_calendar', plugin_dir_url( __FILE__ ) . 'css/zabuto_calendar.css', array(), $this->version, 'all' );

			wp_enqueue_style( 'materialize', '//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css');

			// wp_enqueue_style( 'main-style', plugin_dir_url( __FILE__ ) . 'css/style.css', array(), $this->version, 'all' );

			// wp_enqueue_style( 'style-responsive', plugin_dir_url( __FILE__ ) . 'css/style-responsive.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts($screen) {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Varsity_Management_System_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Varsity_Management_System_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/varsity-management-system-admin.js', array( 'jquery','materialize' ), $this->version, false );

			// wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . 'lib/bootstrap/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'jquery-dcjqaccordion', plugin_dir_url( __FILE__ ) . 'lib/jquery.dcjqaccordion.2.7.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'jquery-scrollto', plugin_dir_url( __FILE__ ) . 'lib/jquery.scrollTo.min.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'jquery-nicescroll', plugin_dir_url( __FILE__ ) . 'lib/jquery.nicescroll.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'jquery-sparkline', plugin_dir_url( __FILE__ ) . 'lib/jquery.sparkline.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'common-scripts', plugin_dir_url( __FILE__ ) . 'lib/common-scripts.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'jquery_gritter', plugin_dir_url( __FILE__ ) . 'lib/gritter/js/jquery.gritter.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'gritter-conf', plugin_dir_url( __FILE__ ) . 'lib/gritter-conf.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'sparkline-chart', plugin_dir_url( __FILE__ ) . 'lib/sparkline-chart.js', array( 'jquery' ), $this->version, false );

			// wp_enqueue_script( 'zabuto_calendar', plugin_dir_url( __FILE__ ) . 'lib/zabuto_calendar.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'materialize', '//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js');
		

	}

}
