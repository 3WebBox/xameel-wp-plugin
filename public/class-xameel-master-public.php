<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->register();
		
		$this->api_key = get_option('x_api_key');
		$this->api_access = get_option('x_api_access');
		$this->api_pass = get_option('x_api_pass');
		$this->api_output = get_option('x_output');

	}
	
	public function register(){
		
		add_action( 'init', array($this,'xameel_estimate_shortcode_call' ));
		add_action( 'admin_post_nopriv_xameel_estimate_save', array($this,'xameel_estimate_save' ));
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/xameel-master-public.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( 'xameel-grid', plugin_dir_url( __FILE__ ) . 'css/xa-grid.css' );
		
		wp_enqueue_style( 'xameel-style', plugin_dir_url( __FILE__ ) . 'css/style.css');
		
		wp_enqueue_style( 'xameel-spacing', plugin_dir_url( __FILE__ ) . 'css/spacing.css' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/xameel-master-public.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('xameel-validation', plugin_dir_url( __FILE__ ) . 'js/validation/jquery.validate.js', array( 'jquery' ), $this->version, true);
		wp_enqueue_script('xameel-validation-2', plugin_dir_url( __FILE__ ) . 'js/validation/additional-methods.js', array( 'jquery' ), $this->version, true );
		
		wp_enqueue_script( 'xameel-custom', plugin_dir_url( __FILE__ ) . 'js/xameel-custom.js', array( 'jquery' ), $this->version, true );
		
		wp_enqueue_script( 'xameel-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAY0iXbSmvQSxjus3PEJoKnJZreLXQuP1Y&libraries=places&callback=initialize', array( 'jquery' ), $this->version, true );

	}
	
	public function xameel_estimate_shortcode_call(){
		
		add_shortcode('XameelForm', array($this,'xameel_estimate_shortcode'));
		add_shortcode('xameelestimate', array($this,'xameel_estimate_shortcode_withpara'));
		add_shortcode('XameelAddRequest', array($this,'xameel_addrequest_shortcode'));
		add_shortcode('XameelGetRequest', array($this,'xameel_getrequest_shortcode'));
		
		
	}
	
	public function xameel_estimate_shortcode(){
		if(isset($_POST['jobs_nonce_field']) && wp_verify_nonce($_POST['jobs_nonce_field'], 'jobs_nonce')) {
		//$redirect_url = $_SERVER['HTTP_REFERER'];
		 // Get the options that were sent
		   $olat = (!empty($_POST["o_lat"])) ? $_POST["o_lat"] : NULL;
		   $olng = (!empty($_POST["o_long"])) ? $_POST["o_long"] : NULL;
		   $dlat = (!empty($_POST["d_lat"])) ? $_POST["d_lat"] : NULL;
		   $dlng = (!empty($_POST["d_long"])) ? $_POST["d_long"] : NULL;
		
		   	$url = 'https://core.xameel.com/api/v1/call/estimate';
			$args = array( 'originLocation' => array(
								'lat'=> $olat,
								'long'=>$olng),
							'destinationLocation' => array(
								'lat'=> $dlat,
								'long'=>$dlng)
					);
			$method = 'POST'; // or 'POST', 'HEAD', etc
			$headers = array(
				 	'Content-Type'=> 'application/json',
    				'Accept'=> 'application/json',
					'Api-Key'=> $this->api_key,
    				'Api-Access'=> $this->api_access,
    				'Api-Password'=> $this->api_pass
			);
			$request = array(
				'headers' => $headers,
				'method'  => $method,
			);
			
			if ( $method == 'GET' && ! empty( $args ) && is_array( $args ) ) {
				$url = add_query_arg( $args, $url );
			} else {
				$request['body'] = json_encode( $args );
			}
		
			$response = wp_remote_request( $url, $request );
			$response_array= wp_remote_retrieve_body($response);
			
			// Custom Output
			$response_array='{
				"code": 200,
				"status": "success",
				"message": "Estimation completed",
				"data": {
					"cost": 17,
					"distance": "12.9 km",
					"time": "20 mins"
				}
			}';
			if($this->api_output=='json'){
				$output_html= $response_array;
			}else{
			$res_code= json_decode($response_array);
			if($res_code->code==200){
			 $output_html ='<div class="shortcode_output success">
			 <h3>Delivery Cost Estimate:</h3>
			 <p>Cost: '.$res_code->data->cost.'</p>
			 <p>Distance: '.$res_code->data->distance.'</p>
			 <p>Time: '.$res_code->data->time.'</p>	
			 <a href="'.$_POST['_wp_http_referer'].'">Go Back</a>		 
			 </div>';
			}
			else
			{
			 $output_html ='<div class="shortcode_output error">
			 <h3>'.$res_code->code.' Found</h3>
			 <p>Message: '.$res_code->message.'</p>
					 
			 </div>';
			}
			}
			
		   
		  return $output_html;
		   	
			
		}else{
			require_once plugin_dir_path( __FILE__ ) . '../templates/user-shortcode-estimate.php';	  
		}
	}
	
	public function xameel_estimate_shortcode_withpara($atts){
		// get parameter(s) from the shortcode
			extract( shortcode_atts( array(
				"olat"    => 'olat',
				"olng"    => 'olng',
				"dlat"    => 'dlat',
				"dlng"    => 'dlng',
			), $atts ) );

    // check whether the parameter is not empty AND if there is
    // something in the $_GET[]
		if ( $olat != '' && $olng != '' && $dlat != '' && $dlng != '') {
			
			$url = 'https://core.xameel.com/api/v1/call/estimate';
			$args = array( 'originLocation' => array(
								'lat'=> $olat,
								'long'=>$olng),
							'destinationLocation' => array(
								'lat'=> $dlat,
								'long'=>$dlng)
					);
			$method = 'POST'; // or 'POST', 'HEAD', etc
			$headers = array(
				 	'Content-Type'=> 'application/json',
    				'Accept'=> 'application/json',
					'Api-Key'=> $this->api_key,
    				'Api-Access'=> $this->api_access,
    				'Api-Password'=> $this->api_pass
			);
			$request = array(
				'headers' => $headers,
				'method'  => $method,
			);
			
			if ( $method == 'GET' && ! empty( $args ) && is_array( $args ) ) {
				$url = add_query_arg( $args, $url );
			} else {
				$request['body'] = json_encode( $args );
			}
		
			$response = wp_remote_request( $url, $request );
			$response_array= wp_remote_retrieve_body($response);
			
			// Custom Output
			$response_array='{
				"code": 200,
				"status": "success",
				"message": "Estimation completed",
				"data": {
					"cost": 17,
					"distance": "12.9 km",
					"time": "20 mins"
				}
			}';
			if($this->api_output=='json'){
				$output_html= $response_array;
			}else{
			$res_code= json_decode($response_array);
			if($res_code->code==200){
			 $output_html ='<div class="shortcode_output success">
			 <h3>Delivery Cost Estimate:</h3>
			 <p>Cost: '.$res_code->data->cost.'</p>
			 <p>Distance: '.$res_code->data->distance.'</p>
			 <p>Time: '.$res_code->data->time.'</p>	
			 <a href="'.$_POST['_wp_http_referer'].'">Go Back</a>		 
			 </div>';
			}
			else
			{
			 $output_html ='<div class="shortcode_output error">
			 <h3>'.$res_code->code.' Found</h3>
			 <p>Message: '.$res_code->message.'</p>
					 
			 </div>';
			}
			}
			
		
		}
		else
		{
			$output_html="Invalid shortcode";
		}
		
		return $output_html;
	}
	
	public function xameel_addrequest_shortcode(){
		if(isset($_POST['jobs_nonce_field']) && wp_verify_nonce($_POST['jobs_nonce_field'], 'jobs_nonce')) {
		//$redirect_url = $_SERVER['HTTP_REFERER'];
		 // Get the options that were sent
		   
		
		   	$url = 'https://core.xameel.com/api/v1/call/estimate';
			$args = array( 'originLocation' => array(
								'lat'=> 'fdgd',
								'long'=>'fdgdfg'),
							'destinationLocation' => array(
								'lat'=> 'fdgd',
								'long'=>'dfgdfg') 
					);
			$method = 'POST'; // or 'POST', 'HEAD', etc
			$headers = array(
				 	'Content-Type'=> 'application/json',
    				'Accept'=> 'application/json',
					'Api-Key'=> $this->api_key,
    				'Api-Access'=> $this->api_access,
    				'Api-Password'=> $this->api_pass
			);
			$request = array(
				'headers' => $headers,
				'method'  => $method,
			);
			
			if ( $method == 'GET' && ! empty( $args ) && is_array( $args ) ) {
				$url = add_query_arg( $args, $url );
			} else {
				$request['body'] = json_encode( $args );
			}
		
			$response = wp_remote_request( $url, $request );
			$response_array= wp_remote_retrieve_body($response);
			
			// Custom Output
			$response_array='{
				"code": 200,
				"status": "success",
				"message": "Delivery created successfully"
			}';
			
			if($this->api_output=='json'){
				$output_html= $response_array;
			}else{
			$res_code= json_decode($response_array);
			if($res_code->code==200){
			 $output_html ='<div class="shortcode_output success">
			 <h3>Response:</h3>
			 <p>Status: '.$res_code->status.'</p>	
			 <p>Message: '.$res_code->message.'</p>			 
			 <a href="'.$_POST['_wp_http_referer'].'">Go Back</a>		 
			 </div>';
			}
			else
			{
			 $output_html ='<div class="shortcode_output error">
			 <h3>'.$res_code->code.' Found</h3>
			 <p>Message: '.$res_code->message.'</p>
					 
			 </div>';
			}
			}
		   
		  return $output_html;
		   	
			
		}else{
			require_once plugin_dir_path( __FILE__ ) . '../templates/user-shortcode-addrequest.php';	  
		}
	}
	
	
	public function xameel_getrequest_shortcode(){
		if(isset($_POST['jobs_nonce_field']) && wp_verify_nonce($_POST['jobs_nonce_field'], 'jobs_nonce')) {
		//$redirect_url = $_SERVER['HTTP_REFERER'];
		 // Get the options that were sent
		   $deliveryuuid = (!empty($_POST["deliveryuuid"])) ? $_POST["deliveryuuid"] : NULL;
		   
		
		   	$url = 'https://core.xameel.com/api/v1/call/delivery/';
			
			$method = 'GET'; // or 'POST', 'HEAD', etc
			$headers = array(
				 	'Content-Type'=> 'application/json',
    				'Accept'=> 'application/json',
					'Api-Key'=> $this->api_key,
    				'Api-Access'=> $this->api_access,
    				'Api-Password'=> $this->api_pass
			);
			$request = array(
				'headers' => $headers, 
				'method'  => $method
			);
			
			
			$url = $url.$deliveryuuid;
			
		
			$response = wp_remote_get( $url, $request );
			$response_array= wp_remote_retrieve_body($response);
		   if($this->api_output=='json'){
				$output_html= $response_array;
			}else{
		  	$res_code= json_decode($response_array);
			if($res_code->code==200){
			$item_html='';	
			foreach($res_code->data->items as $k=>$each){
				$item_html.='<tr>
                            <td class="xa-table-right">'.($k+1).'</td>
                            <td>
                                <h3>'.$each->item.'</h3>
                                <p>'.$each->description.'</p>
                            </td>
                            <td class="xa-table-right right-aligned">'.$each->quantity.'</td>
                            <td class="xa-table-right right-aligned">'.$each->price.'</td>
                        </tr>';
					
				}
				
			 $output_html ='<div class="xa-container"><section class="xa-section">
           
            <div class="xa-row">
                <div class="xa-col-md-8">
                    <div class="capital-letters">Origin:</div>
                    <p>'.$res_code->data->origin.'
                        <br>'.$res_code->data->origin_phone.' </p>
                   
                </div>
                <div class="xa-col-md-4">
                    <div class="left aligned column">
                        <div class="capital-letters">Destination:</div>
                    <p>'.$res_code->data->destination.'
                        <br>'.$res_code->data->destination_phone.' </p>
                    
                    </div>
                </div>
				<div class="xa-col-md-12">
                    <h3 class="xa-text-center xa-py-1 items-size">ITEMS AND DESCRIPTION</h3>
                    <table class="xa-table">'.$item_html.'</table>

                </div>
                <div class="xa-col-md-12">
                    <h2 class="xa-text-center">Details</h2>
                    <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Payment Method:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->payment_method.'</div>
                    </div>
					 <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Status:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->status.'</div>
                    </div>
                   

                    <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Delivery Distance:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->estimated_distance.'</div>
                    </div>

                   
					 <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong>Estimated Delivery Cost:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->estimated_delivery_cost.'</div>
                    </div>
					
                    <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong>Custom Delivery Cost:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->custom_delivery_cost.'</div>
                    </div>
					 <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Sub Total:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->sub_total.'</div>
                    </div>
					  <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Tax:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->tax.'</div>
                    </div>
					 <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Grand Total:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->total.'</div>
                    </div>

                    <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Cash to Collect:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->collect_cash.'</div>
                    </div>
                     <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong> Amount to Collect:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->amount_to_collect.'</div>
                    </div>
                   
                   <div class="xa-row">
                        <div class="xa-col-xs-8">
                            <strong>Amount Collected:</strong>
                        </div>
                        <div class="xa-col-xs-4 right-aligned">'.$res_code->data->amount_collected.'</div>
                    </div>
                   
                </div>
            </div>
        </section></div>';
		
		//print_r($res_code->data->items);
				//foreach($res_code->data->items as $each){
					
					
				//}
			}
			else
			{
			 $output_html ='<div class="shortcode_output error">
			 <h3>'.$res_code->code.' Found</h3>
			 <p>Message: '.$res_code->message.'</p>
					 
			 </div>';
			}
			}
		   
		  return $output_html;
		   	
			
		}else{
			require_once plugin_dir_path( __FILE__ ) . '../templates/user-shortcode-getrequest.php';	  
		}
	}
	
	
}
