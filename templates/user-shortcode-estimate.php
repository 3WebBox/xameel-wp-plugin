<form method="post" action="">
  <h3>
    <?php _e("Get Delivery Cost Estimate", "xameel-api"); ?>
  </h3>
  <?php   
   if ( isset($_GET['status']) && $_GET['status']=='success') { 
?>
  <div id="message" class="updated notice is-dismissible">
    <p>
      <?php _e("Settings updated successfully!", "xameel-api"); ?>
    </p>
    <button type="button" class="notice-dismiss"> <span class="screen-reader-text">
    <?php _e("Dismiss this notice.", "github-api"); ?>
    </span> </button>
  </div>
  <?php
} ?>


  <div class="xa-pt2">
    <label>
      <?php _e("Origin Location:", "xameel-api"); ?>
    </label>
    <input type="text" name="origin_location" id="origin_location" />
    <input class="" type="hidden" name="o_lat" id="o_lat" />
    <input class="" type="hidden" name="o_long" id="o_long" />
    <div id="estart_map" class="map_div"></div>
    <div id="einfowindow-content"> <img src="" width="16" height="16" id="eplace-icon"> <span id="eplace-name"  class="title"></span>													<br>
      <span id="eplace-address"></span> </div>
  </div>
  
  
  <div class="xa-pt2">
    <label>
      <?php _e("Destination Location:", "xameel-api"); ?>
    </label>
    <input type="text" name="dest_location" id="dest_location" />
    <input class="" type="hidden" name="d_lat" id="d_lat" />
    <input class="" type="hidden" name="d_long" id="d_long" />
    <div id="dstart_map" class="map_div"></div>
    <div id="dinfowindow-content"> <img src="" width="16" height="16" id="dplace-icon"> <span id="dplace-name"  class="title"></span>													<br>
      <span id="dplace-address"></span> </div>
  </div>
  
  
 
  <?php wp_nonce_field('jobs_nonce', 'jobs_nonce_field'); ?>
  <input class="button button-primary" type="submit" value="<?php _e("Get Delivery Cost", "xameel-api"); ?>" />
</form>
<script>
function initialize() { 
  einitMap();
  dinitMap();
}
</script>