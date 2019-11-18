# Xameel WordPress Plugin
## How to install?
Download a copy of the repo and uploading using FTP or server control panel to your WordPress folder {PATH-TO-WP}/wp-content/plugins/ then login to your WP control panel and go to plugins to activate the plugin.

## PLugin settings
Login to your control panel and from the side menu you can find Xameel tab. Click on the tab to fill in all the required authorization information needed.

## Using the plugin:
### Using the short codes
[XameelForm]
This short-code helps get an estimation of the delivery request. The estimation includes the cost, distance, and time. We can put this code anywhere in wordpress like page, post or template etc.

#### For direct request
To get direct response from the plugin you can enter the request parametars in the short code as follow:

[xameelestimate olat="26.7200000" olng="26.7200000" dlat="26.7200000" dlng="26.7200000"]

[XameelAddRequest]
This short-code helps submit a Delivery Request. Create a new delivery request to Xameel. Once the request is submitted it will be sent to dispatch for processing. After submitting the request you can use Get Delivery Request to track the request status.

[XameelGetRequest]
This short-code helps retrieving a single delivery request details using delivery request identification string.

### In-code option
You can use the following functions to preform requests inside your WP files.
$response = xameel_plugin_get_estimate($param1, $param2, ...etc); // No params provided 