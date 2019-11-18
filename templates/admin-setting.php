<div class="wrap">
 <h1><?php _e("Xameel API Settings", "xameel-api"); ?></h1>
 
<form method="post" action="<?php echo admin_url( 'admin-post.php'); ?>">

   <input type="hidden" name="action" value="xameel_update_settings" />

  
<?php   
   if ( isset($_GET['status']) && $_GET['status']=='success') { 
?>
   <div id="message" class="updated notice is-dismissible">
      <p><?php _e("Settings updated successfully!", "xameel-api"); ?></p>
      <button type="button" class="notice-dismiss">
         <span class="screen-reader-text"><?php _e("Dismiss this notice.", "github-api"); ?></span>
      </button>
   </div>
<?php
} ?>
<table class="form-table" role="presentation">

<tbody><tr>
<th>
   <label><?php _e("Xameel API Key:", "xameel-api"); ?></label></th>
  <td> <input class="regular-text" type="text" name="x_api_key" value="<?php echo get_option('x_api_key'); ?>" /></td>
  </tr>
   

  <tr>
  <th>
   <label><?php _e("Xameel API Access:", "xameel-api"); ?></label></th>
   <td><input class="regular-text" type="text" name="x_api_access" value="<?php echo get_option('x_api_access'); ?>" /></td>
   </tr>
   
   <tr>
   <th>
   <label><?php _e("Xameel API Password:", "xameel-api"); ?></label></th>
  <td> <input class="regular-text" type="text" name="x_api_pass" value="<?php echo get_option('x_api_pass'); ?>" /></td>
   </tr>
   
    <tr>
   <th>
   <label><?php _e("Google Map API Key:", "xameel-api"); ?></label></th>
  <td> <input class="regular-text" type="text" name="x_google_api" value="<?php echo get_option('x_google_api'); ?>" /></td>
   </tr>
   
   <tr>
   <th>
   <label><?php _e("Show API Response in:", "xameel-api"); ?></label></th>
  <td> <select name="x_output">
  <option <?php if(get_option('x_output')=='html'){ echo 'selected'; } ?> value="html">HTML</option>
  <option <?php if(get_option('x_output')=='json'){ echo 'selected'; } ?> value="json">JSON</option>
  </select>
  </td>
   </tr>
   
   </tbody>
   </table>
   <p class="submit">
   
   	<input class="button button-primary" type="submit" value="<?php _e("Save", "xameel-api"); ?>" />
   
   </p>

   

</form>

</div>