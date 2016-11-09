/**
 * This file is to customize the display of Google Maps on the front end of the website.
 * The map makes use of LatLong values stored in the database.
 *
 * @summary  Customize & display Google Maps based on Latlon values.
 *
 * @link     https://github.com/wimagguc/jquery-latitude-longitude-picker-gmaps
 * @requires jquery-gmaps-latlon-picker.js
 */

(function($) {

    // $ Works! You can test it with next line if you like
    // console.log($);

    $(document).ready(function() {

        // Copy the init code from "jquery-gmaps-latlon-picker.js" and extend it here
        $(".gllpLatlonPicker").each(function() {

            $obj = $(document).gMapsLatLonPicker();

            $obj.params.strings.markerText = "Drag this Marker (example edit)";

            $obj.params.displayError = function(message) {
                alert.log("MAPS ERROR: " + message); // instead of alert()
            };

            $obj.init( $(this) );
        });

    });

})( jQuery );