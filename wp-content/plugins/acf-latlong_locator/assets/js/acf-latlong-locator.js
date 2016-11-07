/**
 * Created by daniel on 11/7/16.
 */

$(document).ready(function() {
    // Copy the init code from "jquery-gmaps-latlon-picker.js" and extend it here
    $(".gllpLatlonPicker").each(function() {
        $obj = $(document).gMapsLatLonPicker();

        $obj.params.strings.markerText = "Drag this Marker (example edit)";

        $obj.params.displayError = function(message) {
            console.log("MAPS ERROR: " + message); // instead of alert()
        };

        $obj.init( $(this) );
    });
});