<div class="xa-container">

  <div class="row">
    <div class="col-md-12">
      <form  class="delivery_form" action="" method="post" enctype="multipart/form-data" name="delivery_form" id="delivery_form">
        <fieldset id="pick_up_info">
          <div class="form-group">
            <div class="row">
              <div class="form-group col-md-12 col-sm-12">
                <div class="headmid">
                  <h3>Pickup Location </h3>
                </div>
              </div>
              <div class="xa-row">
                <div class="xa-col-md-12">
                  <label class="xa-label">Address Title.</label>
                  <input type="text" class="xa-input required" id="pick_address" name="pick_address">
                </div>
                <div class="xa-col-md-12">
                  <label class="xa-label">Pickup Notes:</label>
                  <textarea rows="3" class="xa-textarea required" id="pickup_notes" name="pickup_notes"></textarea>
                </div>
                <div class="xa-col-md-12">
                  <label class="xa-label">Pickup Phone:</label>
                  <input type="text" class="xa-input required" id="pickup_phone" name="pickup_phone">
                </div>
                <div class="xa-col-md-12 xa-pt2">
                  <input class="" name="pick_input" id="pick_input" type="text" placeholder="Search Here...">
                  <input type="hidden" name="latitude_pick" id="latitude_pick" value="" />
                  <input type="hidden" name="longitude_pick" id="longitude_pick" value="" />
                  <div id="start_map" class="map_div"></div>
                  <div id="infowindow-content"> <img src="" width="16" height="16" id="place-icon"> <span id="place-name"  class="title"></span><br>
                    <span id="place-address"></span> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="button" class="btn btn-next">Next</button>
          </div>
        </fieldset>
        <fieldset id="dropoff_info">
          <div class="form-group">
            <div class="row">
              <div class="form-group col-md-12 col-sm-12">
                <div class="headmid">
                  <h3>Drop off Location</h3>
                </div>
              </div>
                <div class="xa-row">

                <div class="xa-col-md-12">
                    <label class="xa-label">Address Title: </label>
                    <input type="text" class="xa-input required" id="drop_address" name="drop_address">
                </div>
                <div class="xa-col-md-12">
                    <label class="xa-label">Drop Off Notes:</label>
                    <textarea rows="3" class="xa-textarea required" id="dropoff_notes" name="dropoff_notes"></textarea>
                </div>
                <div class="xa-col-md-12">
                    <label class="xa-label">Pickup Phone:</label>
                    <input type="text" class="xa-input required" id="drop_phone" name="drop_phone">
                </div>
                <div class="xa-col-md-6">
                    <label class="xa-label">Drop of Time::</label>
                    <select name="drop_of_time" class="xa-select required" id="drop_of_time">
                        <option value="ASAP">ASAP</option>
                        <option value="Morning">Morning</option>
                        <option value="Afternoon">Afternoon</option>
                        <option value="early evening">Early Evening</option>
                        <option value="evening">Evening</option>
                    </select>
                </div>
                <div class="xa-col-md-6 ">
                    <label class="xa-label">Drop of Date::</label>
                    <input type="date" class="xa-input required" name="drop_date" id="drop_date">
                </div>
                <div class="xa-col-md-12">
                    <p class="xa-py-1">
                        <b>* ASAP: </b>
                        The request will be handled right after its being created.
                        <br>
                        <b>* Morning: </b>
                        Delivery will be handled between 8 am and 12 pm.
                        <br>
                        <b>* Afternoon: </b>
                        Delivery will be handled between 12 pm and 4 pm.
                        <br>
                        <b>* Early Evening: </b>
                        Delivery will be handled between 4 pm and 6 pm.
                        <br>
                        <b>* Evening: </b>
                        Delivery will be handled between 6 pm and 8 pm.
                    </p>
                </div>
               
                  <div class="xa-col-md-12 xa-pt2">
         <input class="" name="loc_drop" id="loc_drop" type="text" placeholder="Search Here...">
         <input type="hidden" name="lat_drop" id="lat_drop" value="" />
         <input type="hidden" name="long_drop" id="long_drop" value="" />
     <div id="drop_map" class="map_div"></div>
    <div id="infowindow-content-drop">
      <img src="" width="16" height="16" id="drop-place-icon">
      <span id="drop-place-name"  class="title"></span><br>
      <span id="drop-place-address"></span>
    </div>
                </div>
                  
                  
                   
                <div class="xa-clearfix"></div>
            </div>
             </div>
          </div>
          <div class="text-center">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
           </div>
        </fieldset>
        <fieldset id="items_info">
          <div class="form-group">
            <div class="row">
              <div class="form-group col-md-12 col-sm-12">
                <div class="headmid">
                  <h3>Items</h3>
                </div>
              </div>
                <label id="add-button" class="btn btn-primary mb-2">Add More Items</label>
                <div class="appned_div_item">
                <div class="panel panel-primary">
                  <div class="panel-heading"><h3 class="panel-title">Add Item</h3> </div>
                 <div class="panel-body">
                  <div class="xa-row">
                <div class="xa-col-md-4">
                    <label class="xa-label">item </label>
                    <br/>
                    <input type="text" class="xa-input required" name="item_name[]" id="item_name">
                </div>
                <div class="xa-col-md-4">
                    <label class="xa-label">Qty:</label>
                    <input type="text" class="xa-input required" name="item_qty[]" id="item_qty">
                </div>
                <div class="xa-col-md-4">
                    <label class="xa-label">Price:</label>
                    <input type="text" class="xa-input required" name="item_price[]" id="item_price">
                </div>
                <div class="xa-col-md-12">
                    <label class="xa-label">Description and details</label>
                    <textarea rows="3" class="xa-textarea required" name="item_detail[]" id="item_detail"></textarea>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="xa-col-md-12">
                    <p style="text-align: center; margin: 30px 0px 30px;">
                        Type in the top container and a new empty row will show up automatically
                        <br>(Please fill atleast one Item)</p>
                 </div>
                  </div>
             </div>
              <div class="text-center">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next">Next</button>
              </div>
            
        </fieldset>
        <fieldset id="payment_info">
          <div class="form-group">
            <div class="row">
              <div class="form-group col-md-12 col-sm-12">
                <div class="headmid">
                  <h3>Payment Details</h3>
                </div>
              </div>
                <div class="xa-row">


                <div class="xa-col-md-6">
                    <label class="xa-label">Delivery Cost:</label>
                    <input type="text" class="xa-input required" name="delivery_cost" id="delivery_cost">
                </div>
                <div class="xa-col-md-6">
                    <label class="xa-label">Delivery fee:</label>
                    <input type="text" class="xa-input required" name="delivery_fee" id="delivery_fee">
                </div>
                <div class="xa-col-md-6">
                    <label class="xa-label">Tax:</label>
                    <input type="text" class="xa-input required" name="tax" id="tax">
                </div>
                <div class="xa-col-md-6">
                    <label class="xa-label">Custom delivery Cost:</label>
                    <input type="text" class="xa-input required" name="custom_delivery_cost" id="custom_delivery_cost">
                </div>
                <div class="xa-col-md-6">
                    <label class="xa-label">Payment Method:</label>
                    <input type="text" class="xa-input required" name="payment_method" id="payment_method">
                </div>
                <div class="xa-col-md-6">
                    <input class="cash-collect" type="checkbox" name="check_cash_collect" id="check_cash_collect">
                    <label class="xa-label">Request cash collection</label>
                 <div class="collect" style="display:none">
                    <input type="text" class="xa-input" name="cash_collect" id="cash_collect" placeholder="Cash to Collect">
                </div>
                </div>
               
            </div>
              </div>
          </div>
              <div class="text-center">
                <button type="button" class="btn btn-previous">Previous</button>
                <button type="button" class="btn btn-next review" id="review_data">Review</button>
              </div>
            
        </fieldset>
        
        <fieldset id="review_info">
          <div class="form-group">
            <div class="row">
              <div class="form-group col-md-12 col-sm-12">
                <div class="headmid">
                  <h3>Review Info</h3>
                </div>
              </div>
                <div class="review_data_div"></div>
              </div>
          </div>
              <div class="text-center">
                <button type="button" class="btn btn-previous">Previous</button>
                 <?php wp_nonce_field('jobs_nonce', 'jobs_nonce_field'); ?>
                <button type="submit" class="btn" name="submit" value="submit" id="btn_emitra">Submit</button>
              </div>
            
        </fieldset>
      </form>
    </div>
    
  
  </div>
</div>
<script>
function initialize() {
	initMap();
  initMap2();
}
</script>    
    
       
   