<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

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
		$this->register();
		

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xameel-master-admin.css', array(), $this->version, 'all' );

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
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xameel-master-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	function register(){		
		add_action('admin_menu',array($this,'add_admin_pages'));		
		add_action( 'admin_post_xameel_update_settings', array($this,'xameel_api_settings_save' ));
			
	}
	
	function add_admin_pages(){
		//add_menu_page('My Plugin', 'My Plugin', 'manage_options', __FILE__, 'clivern_render_plugin_page', plugins_url('/img/icon.png',__DIR__));
   //add_submenu_page(__FILE__, 'Custom', 'Custom', 'manage_options', __FILE__.'/custom', 'clivern_render_custom_page');
   //add_submenu_page(__FILE__, 'About', 'About', 'manage_options', __FILE__.'/about', 'clivern_render_about_page');
 
		add_menu_page('Xameel','Xameel','manage_options','xameel_top_level',array($this,'admin_xameel_dashboard'),plugins_url('/img/xameel_logo.png',__DIR__)); 		
		
		add_submenu_page('xameel_top_level' ,'API Setting','API Setting','manage_options','xameel-settings',array($this,'admin_xameel_setting'));
	}
	
	
	function admin_xameel_dashboard(){
	//require template
	require_once plugin_dir_path( __FILE__ ) . '../templates/admin-dashboard.php';
	}
	
	function admin_xameel_setting(){
	//require template
  		require_once plugin_dir_path( __FILE__ ) . '../templates/admin-setting.php';
	}
	
	// Save Xameel API settings
	
	function xameel_api_settings_save() {
		
		   // Get the options that were sent
		   $x_api_key = (!empty($_POST["x_api_key"])) ? $_POST["x_api_key"] : NULL;
		   $x_api_access = (!empty($_POST["x_api_access"])) ? $_POST["x_api_access"] : NULL;
		   $x_api_pass = (!empty($_POST["x_api_pass"])) ? $_POST["x_api_pass"] : NULL;
		   $x_google_api = (!empty($_POST["x_google_api"])) ? $_POST["x_google_api"] : NULL;
		    $x_output = (!empty($_POST["x_output"])) ? $_POST["x_output"] : NULL;
		
		   // Validation would go here
		
		   // Update the values
		   update_option( "x_api_key", $x_api_key, TRUE );
		   update_option( "x_api_access", $x_api_access, TRUE );
		   update_option("x_api_pass", $x_api_pass, TRUE);
		   update_option("x_google_api", $x_google_api, TRUE);
			update_option("x_output", $x_output, TRUE);
		   // Redirect back to settings page
		   // The ?page=github corresponds to the "slug" 
		   // set in the fourth parameter of add_submenu_page() above.
		   $redirect_url = get_bloginfo("url") . "/wp-admin/admin.php?page=xameel-settings&status=success";
		   header("Location: ".$redirect_url);
		   exit;
	}
	
	
	

}
