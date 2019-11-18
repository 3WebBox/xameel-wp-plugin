function initMap() {
        var map = new google.maps.Map(document.getElementById('start_map'), {
          center: {lat: 26.922070, lng: 75.778885},
          zoom: 13
        });
        var pickinput = document.getElementById('pick_input');
        var autocomplete = new google.maps.places.Autocomplete(pickinput);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);
 // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
		  var lat_pick = place.geometry.location.lat();
          var lng_pick = place.geometry.location.lng();
		   if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
		  
		   document.getElementById("latitude_pick").value = lat_pick;
           document.getElementById("longitude_pick").value = lng_pick;
        });
		
	 }
    
function initMap2() {
		 
        var map = new google.maps.Map(document.getElementById('drop_map'), {
          center: {lat: 26.922070, lng: 75.778885},
          zoom: 13
        });
        var loc_drop = document.getElementById('loc_drop');
        var autocomplete = new google.maps.places.Autocomplete(loc_drop);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);
 // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content-drop');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
		  var lat_drop = place.geometry.location.lat();
          var long_drop = place.geometry.location.lng();
		   if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['drop-place-icon'].src = place.icon;
          infowindowContent.children['drop-place-name'].textContent = place.name;
          infowindowContent.children['drop-place-address'].textContent = address;
          infowindow.open(map, marker);
		  
		   document.getElementById("lat_drop").value = lat_drop;
           document.getElementById("long_drop").value = long_drop;
        });
		
	 }

function einitMap() {
        var map = new google.maps.Map(document.getElementById('estart_map'), {
          center: {lat: 26.922070, lng: 75.778885},
          zoom: 13
        });
        var pickinput = document.getElementById('origin_location');
        var autocomplete = new google.maps.places.Autocomplete(pickinput);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);
 // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('einfowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
		  var lat_pick = place.geometry.location.lat();
          var lng_pick = place.geometry.location.lng();
		   if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['eplace-icon'].src = place.icon;
          infowindowContent.children['eplace-name'].textContent = place.name;
          infowindowContent.children['eplace-address'].textContent = address;
          infowindow.open(map, marker);
		  
		   document.getElementById("o_lat").value = lat_pick;
           document.getElementById("o_long").value = lng_pick;
        });
		
	 }
	 
function dinitMap() {
        var map = new google.maps.Map(document.getElementById('dstart_map'), {
          center: {lat: 26.922070, lng: 75.778885},
          zoom: 13
        });
        var pickinput = document.getElementById('dest_location');
        var autocomplete = new google.maps.places.Autocomplete(pickinput);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);
 // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('dinfowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
		  var lat_pick = place.geometry.location.lat();
          var lng_pick = place.geometry.location.lng();
		   if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['dplace-icon'].src = place.icon;
          infowindowContent.children['dplace-name'].textContent = place.name;
          infowindowContent.children['dplace-address'].textContent = address;
          infowindow.open(map, marker);
		  
		   document.getElementById("o_lat").value = lat_pick;
           document.getElementById("o_long").value = lng_pick;
        });
		
	 }
	 
	 
	 
    
	jQuery(document).ready(function () {
		
		jQuery('.delivery_form fieldset:first-child').fadeIn('slow');
		
		jQuery('.cash-collect').change(function () {
        if (jQuery(this).prop("checked")) {
                jQuery('.collect').show();
				 jQuery("#cash_collect").addClass("required");
            } else {
                jQuery('.collect').hide();
				jQuery("#cash_collect").removeClass("required");
            }
        });
		
		
    

    jQuery('.delivery_form input,select').on('focus', function () {
     jQuery(this).removeClass('input-error');
     
  });
  
   jQuery('.delivery_form').on('change','input.file', function () {
    
	 jQuery(this).removeClass('input-error');
     jQuery(this).parent().removeClass('has-error');
	 jQuery(this).next( ".help-block" ).text('');
  });
  
   // next step
    jQuery('.delivery_form .btn-next').on('click', function () {
        var parent_fieldset = jQuery(this).parents('fieldset');
        var next_step = true;

       parent_fieldset.find('input[type="text"].required,input[type="email"].required,input[type="file"].required,select.required').each(function () {
      
	        if (jQuery(this).val() == "") {
                jQuery(this).addClass('input-error');
                next_step = false;
            } else {
                jQuery(this).removeClass('input-error');
            }
        });

        if (next_step) {
            parent_fieldset.fadeOut(400, function () {
                jQuery(this).next().fadeIn();
            });
        }

    });

    // previous step
    jQuery('.delivery_form .btn-previous').on('click', function () {
        jQuery(this).parents('fieldset').fadeOut(400, function () {
            jQuery(this).prev().fadeIn();
        });
    });

    // submit
   jQuery('.delivery_form').on('submit', function (e) {

        jQuery(this).find('input[type="text"].required,input[type="email"].required,input[type="file"].required,select.required').each(function () {
              if (jQuery(this).val() == "") {
			   e.preventDefault();
               jQuery(this).addClass('input-error');
               } else {
			 jQuery(this).removeClass('input-error');
          }
		 
		  
		 
		  
        });

    });

  /* ITEMS*/ 


	   var numberIncr = 1;
jQuery(document).on("click", "#add-button", function () {
		
jQuery(".appned_div_item").append('<div class="panel panel-info item_div"><div class="panel-heading"><h3 class="panel-title">Add Item</h3><button class="remove_item pull-right btn btn-sm btn-danger" style="margin-top: -23px;">Remove</button> </div><div class="panel-body"> <div class="xa-row"><div class="xa-col-md-4"><label class="xa-label">item </label> <br/>  <input type="text" class="xa-input required" name="item_name[]" id="item_name'+numberIncr+'"> </div> <div class="xa-col-md-4"> <label class="xa-label">Qty:</label>  <input type="text" class="xa-input required" name="item_qty[]" id="item_qty'+numberIncr+'"> </div><div class="xa-col-md-4"> <label class="xa-label">Price:</label> <input type="text" class="xa-input required" id="item_price'+numberIncr+'" name="item_price[]"> </div> <div class="xa-col-md-12"> <label class="xa-label">Description and details</label> <textarea rows="3" class="xa-textarea required" name="item_detail[]" id="item_detail'+numberIncr+'"></textarea> </div> </div> </div>  </div>');
  numberIncr++;
  jQuery('.xa-input').prop('required',true);
  jQuery(".xa-input").addClass("required");
});

  
jQuery(document).on("click", ".remove_item", function(e) {
     jQuery(this).parents('.item_div').remove();
	 jQuery('.xa-input').prop('required',false);
     jQuery(".xa-input").removeClass("required");
    //Rest of the code
}); 

 });

jQuery(document).ready(function(){
   	jQuery(".btn-next").click(function(){
				var form = jQuery("#delivery_form");
				form.validate({
					errorElement: 'span',
					errorClass: 'help-block',
					highlight: function(element, errorClass, validClass) {
						jQuery(element).closest('.form-group').addClass("has-error");
					},
					unhighlight: function(element, errorClass, validClass) {
						jQuery(element).closest('.form-group').removeClass("has-error");
					},
					rules: {
						pick_address : {
							required: true
						},
						pickup_notes : {
							required: true
						},
						pickup_phone : {
							number:true,
							minlength:10,
							maxlength:10
						},
						pick_input : {
							required:true
							
						},
						latitude_pick : {
							required:true
						},
						longitude_pick : {
							required:true
						}
						
					},
					messages: {
						pick_address: {
							required: "This field is required.",
						},
						pickup_notes : {
							required: "This field is required.",
						},
						pickup_phone : {
							required: "This field is required.",
							minlength:"enter 10 digits",
							maxlength:"not more than 10 digit",
							number:"Please enter a valid number."
							
						},
						pick_input : {
							required: "This field is required."
						},
						latitude_pick : {
							required: "This field is required."
						},
						longitude_pick : {
							required: "This field is required."
							
							
						},
						
					}
				});
				if (form.valid() === true){
					if (jQuery('#pick_up_info').is(":visible")){
						current_fs = jQuery('#pick_up_info');
						next_fs =  jQuery('#dropoff_info');
						next_fs1 = jQuery('#items_info');
						next_fs2 = jQuery('#payment_info');
						next_fs3 = jQuery('#review_info');
					next_fs.show(); 
					current_fs.hide();
					next_fs1.hide();
					next_fs2.hide();
					next_fs3.hide();
					 }else if(jQuery('#dropoff_info').is(":visible")){
						current_fs = jQuery('#dropoff_info');
						next_fs = jQuery('#items_info');
						next_fs1 = jQuery('#payment_info');
						next_fs2 = jQuery('#review_info');
						prev_fs=jQuery('#pick_up_info');
					next_fs.show(); 
					current_fs.hide();
					prev_fs.hide();
					next_fs1.hide();
					next_fs2.hide();
					}else if(jQuery('#items_info').is(":visible")){
						current_fs = jQuery('#items_info');
						next_fs = jQuery('#payment_info');
						next_fs1 = jQuery('#review_info');
						prev_fs=jQuery('#dropoff_info');
						prev_fs1=jQuery('#pick_up_info');
					next_fs.show(); 
					current_fs.hide();
					next_fs1.hide();
					prev_fs.hide();
					prev_fs1.hide();
						}
					else if(jQuery('#payment_info').is(":visible")){
						current_fs = jQuery('#payment_info');
						next_fs = jQuery('#review_info');
						prev_fs=jQuery('#items_info');
						prev_fs1=jQuery('#dropoff_info');
						prev_fs2=jQuery('#pick_up_info');
					next_fs.show(); 
					current_fs.hide();
					next_fs1.hide();
					prev_fs.hide();
					prev_fs1.hide();
					prev_fs2.hide();
					}}
			});
jQuery('.btn-previous').click(function(){
				if(jQuery('#dropoff_info').is(":visible")){
				    current_fs = jQuery('#dropoff_info');
					prev_fs = jQuery('#pick_up_info');
					next_fs = jQuery('#items_info');
					next_fs1 = jQuery('#payment_info');
					next_fs2 = jQuery('#review_info');
					prev_fs.show();
					next_fs.hide();
					next_fs1.hide();
					next_fs2.hide();
					current_fs.hide();
			}else if (jQuery('#items_info').is(":visible")){
					current_fs = jQuery('#items_info');
					prev_fs = jQuery('#dropoff_info');
					prev_fs1 = jQuery('#pick_up_info');
					next_fs = jQuery('#payment_info');
					next_fs1 = jQuery('#review_info');
					prev_fs.show();
					next_fs.hide();
					next_fs1.hide(); 
					prev_fs1.hide();
					current_fs.hide();
			}
			else if (jQuery('#payment_info').is(":visible")){
					current_fs = jQuery('#payment_info');
					prev_fs = jQuery('#items_info');
					prev_fs1 = jQuery('#dropoff_info');
					prev_fs2 = jQuery('#pick_up_info');
					next_fs = jQuery('#review_info');
					current_fs.hide();
					prev_fs.show(); 
					prev_fs1.hide();
					prev_fs2.hide(); 
					next_fs.hide(); 
			}
			else if (jQuery('#review_info').is(":visible")){
					current_fs = jQuery('#review_info');
					prev_fs = jQuery('#payment_info');
					prev_fs1 = jQuery('#items_info');
					prev_fs2 = jQuery('#dropoff_info');
					prev_fs3 = jQuery('#pick_up_info');
					current_fs.hide();
					prev_fs.show(); 
					prev_fs1.hide();
					prev_fs2.hide(); 
					prev_fs3.hide();  
}
});
       });
	   

jQuery.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    jQuery.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
 
 jQuery(document).on('click', '#review_data', function(){  
  // formData=jQuery('.delivery_form').serializeArray();
  // var formData = JSON.stringify(jQuery('.delivery_form').serializeArray()); // store json string
  //var result=jQuery.parseJSON(formData);
   
    var json_data2 = JSON.stringify(jQuery('form').serializeObject());
    var json_data=jQuery.parseJSON(json_data2);
	
	 jQuery(json_data).each(function (index, item) {

               // each iteration
              var pick_address = item.pick_address;
			   var pickup_notes = item.pickup_notes;
			   var pickup_phone = item.pickup_phone;
			    var pick_input = item.pick_input;
				 var latitude_pick = item.latitude_pick;
				  var cash_collect = item.cash_collect;
				
			   var custom_delivery_cost = item.custom_delivery_cost;
               var delivery_cost = item.delivery_cost;
			   var delivery_fee = item.delivery_fee;
			   var drop_address = item.drop_address;
			   var drop_date = item.drop_date;
			   var drop_of_time = item.drop_of_time;
			   var drop_phone = item.drop_phone;
			   var dropoff_notes = item.dropoff_notes;
			   
			    var item_price = item.item_price;
			   var lat_drop = item.lat_drop;
			   var latitude_pick = item.latitude_pick;
			   var loc_drop = item.loc_drop;
			   var long_drop = item.long_drop;
               var longitude_pick = item.longitude_pick;
               var payment_method = item.payment_method;
			    var tax = item.tax;
			  
			   
			 /* var otherElement = jQuery('<li>' + pick_address + '</li><li>' + pickup_notes + '</li><li>' + pickup_phone + '</li><li>' + pick_input + '</li><li>' + latitude_pick + '</li><li>' + cash_collect + '</li><li>' + custom_delivery_cost + '</li><li>' + delivery_cost + '</li><li>' + delivery_fee + '</li><li>' + drop_address + '</li><li>' + drop_date + '</li><li>' + drop_of_time + '</li><li>' + drop_phone + '</li><li>' + dropoff_notes + '</li><li>' + item_price + '</li><li>' + lat_drop + '</li><li>' + latitude_pick + '</li><li>' + loc_drop + '</li><li>' + long_drop + '</li><li>' + longitude_pick + '</li><li>' + payment_method + '</li>');
   			    jQuery('.review_data_div').append(otherElement);
				*/
				
				 var otherElement = jQuery('<div class="xa-row"><div class="xa-col-md-8"><div class="capital-letters">Pickup Location:</div><p>' + pick_address + '<br>' + pickup_phone + ' </p><p class="xa-py-1">' + pick_input + '</p> </div><div class="xa-col-md-4"><div class="left aligned column"><div class="capital-letters">Drop off Location:</div><p>' + drop_address + '<br>' + drop_phone + '</p><p class="xa-py-1">' + loc_drop + '</p></div></div><div class="xa-col-md-12"><h2 class="xa-text-center">Details</h2><div class="xa-row"><div class="xa-col-xs-8"><strong> Payment Method:</strong></div><div class="xa-col-xs-4 right-aligned">'+payment_method+'</div></div> <div class="xa-row"> <div class="xa-col-xs-8"><strong> Drop of Time:</strong></div><div class="xa-col-xs-4 right-aligned">'+drop_of_time+'</div></div>  <div class="xa-row"> <div class="xa-col-xs-8"><strong> Drop Off Date:</strong></div><div class="xa-col-xs-4 right-aligned">'+drop_date+'</div></div><div class="xa-row"><div class="xa-col-xs-8"><strong> Delivery Distance:</strong></div><div class="xa-col-xs-4 right-aligned">'+dropoff_notes+' </div></div> <div class="xa-row"><div class="xa-col-xs-8"><strong> Delivery Time:</strong></div> <div class="xa-col-xs-4 right-aligned"> '+drop_of_time+'</div> </div><div class="xa-row"><div class="xa-col-xs-8"><strong> Delivery Cost:</strong></div><div class="xa-col-xs-4 right-aligned"> '+delivery_cost+'</div></div><div class="xa-row"><div class="xa-col-xs-8"><strong> Delivery Fee:</strong></div><div class="xa-col-xs-4 right-aligned">'+delivery_fee+'</div></div><div class="xa-row"><div class="xa-col-xs-8"><strong> Custom delivery cost:</strong></div><div class="xa-col-xs-4 right-aligned">'+custom_delivery_cost+'</div></div><div class="xa-row"><div class="xa-col-xs-8"><strong> Cash to Collect:</strong></div><div class="xa-col-xs-4 right-aligned"> '+cash_collect+'</div></div> <div class="xa-row"> <div class="xa-col-xs-8"> <strong> Sub Total:</strong></div> <div class="xa-col-xs-4 right-aligned">  ----</div> </div><div class="xa-row"><div class="xa-col-xs-8"><strong> Tax:</strong> </div><div class="xa-col-xs-4 right-aligned"> '+tax+'</div> </div><div class="xa-row"><div class="xa-col-xs-8"><strong> Grand Total:</strong></div><div class="xa-col-xs-4 right-aligned"> ----</div> </div></div></div> ');
   			  
			    jQuery('.review_data_div').html(otherElement);
 
				
				
				
 });
 
 
	
    



});