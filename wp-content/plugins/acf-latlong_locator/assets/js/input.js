(function($){


	function initialize_field( $el ) {

		// $el.doStuff();

		// Javascript variables.
		var gllpLatlonPicker,
			gllpLatitude,
			gllpLongitude,
			gllpZoom,
			geoLocator,
			geoLocatorVal;

		// Find the input elements on the admin page.
		gllpLatlonPicker = ( $el ).find( '.gllpLatlonPicker' );
		gllpLatitude     = ( $el ).find( '.gllpLatitude' );
		gllpLongitude    = ( $el ).find( '.gllpLongitude' );
		gllpZoom         = ( $el ).find( '.gllpZoom' );
		geoLocator       = ( $el ).find( '.geo-locator' );

		// Move the marker if the Latlong value is already present in the DB.
		geoLocatorVal = geoLocator.val();

		if( geoLocatorVal != '' ) {

			// The geoLocatorVal should contain Latlong value separated by '|'
			if( geoLocatorVal.indexOf( "|" ) >= 0 ) {

				// Split and assign the Latlong values to the hidden fields.
				latLong = geoLocatorVal.split('|');
				gllpLatitude.val( latLong[0] );
				gllpLongitude.val( latLong[1] );

				// Set the Zoom value to '11' for easy viewability.
				gllpZoom.val('11');

			}

		}

		// Initialize maps on each fieldset when more than one fieldsets are present.
		gllpLatlonPicker.each(function() {

			//$.gMapsLatLonPickerNoAutoInit = 1;

			$obj = $(document).gMapsLatLonPicker();

			$obj.params.strings.markerText = "Drag this Marker";

			$obj.params.displayError = function(message) {
				alert("MAPS ERROR: " + message);
			};

			$obj.init( $(this) );

		});

		// 'location_changed' event will be fired each time when marker is changed/moved.
		$(document).bind("location_changed", function(event, object) {
			// Store latitude and longitude in the custom field separated by '|'.
			geoLocator.val( gllpLatitude.attr( 'value' ) + '|' + gllpLongitude.attr( 'value' ) );
		});
		
	}
	
	
	if( typeof acf.add_action !== 'undefined' ) {
	
		/*
		*  ready append (ACF5)
		*
		*  These are 2 events which are fired during the page load
		*  ready = on page load similar to $(document).ready()
		*  append = on new DOM elements appended via repeater field
		*
		*  @type	event
		*  @date	20/07/13
		*
		*  @param	$el (jQuery selection) the jQuery element which contains the ACF fields
		*  @return	n/a
		*/
		
		acf.add_action('ready append', function( $el ){
			
			// search $el for fields of type 'latlong_locator'
			acf.get_fields({ type : 'latlong_locator'}, $el).each(function(){
				
				initialize_field( $(this) );
				
			});
			
		});
		
		
	} else {
		
		
		/*
		*  acf/setup_fields (ACF4)
		*
		*  This event is triggered when ACF adds any new elements to the DOM. 
		*
		*  @type	function
		*  @since	1.0.0
		*  @date	01/01/12
		*
		*  @param	event		e: an event object. This can be ignored
		*  @param	Element		postbox: An element which contains the new HTML
		*
		*  @return	n/a
		*/
		
		$(document).on('acf/setup_fields', function(e, postbox){
			
			$(postbox).find('.field[data-field_type="latlong_locator"]').each(function(){
				
				initialize_field( $(this) );
				
			});
		
		});
	
	
	}


})(jQuery);
