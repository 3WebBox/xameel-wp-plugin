<form method="post" action=""> 

   <h3><?php _e("Get a Delivery Request", "xameel-api"); ?></h3>

<div class="xa-pt2">
   <label><?php _e("Delivery UUID:", "xameel-api"); ?></label>
   <input class="" type="text" name="deliveryuuid" value="a80fdbde-896b-4c87-ae87-48dff2401cde" />
  </div>
   
 <?php wp_nonce_field('jobs_nonce', 'jobs_nonce_field'); ?>
 <div class="xa-pt2">
   <input class="button button-primary" type="submit" value="<?php _e("Get Delivery Request", "xameel-api"); ?>" />
   </div>

</form>