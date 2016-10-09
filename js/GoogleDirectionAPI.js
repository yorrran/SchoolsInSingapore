function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13
    });
    var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

    var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Invalid address format! Please use the autocomplete when specificing the address. ");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
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

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
				
        //call the calculateAndDisplayRoute method	
		document.getElementById("DRIVING_TAB").addEventListener("click", function(){
			calculateAndDisplayRoute(directionsService, directionsDisplay, latlng, place.geometry.location, 'DRIVING');
			directionsDisplay.setMap(map);

		});
		
		document.getElementById("TRANSIT_TAB").addEventListener("click", function(){
			calculateAndDisplayRoute(directionsService, directionsDisplay, latlng, place.geometry.location, 'TRANSIT');
			directionsDisplay.setMap(map);

		});
		
		document.getElementById("WALKING_TAB").addEventListener("click", function(){
			calculateAndDisplayRoute(directionsService, directionsDisplay, latlng, place.geometry.location, 'WALKING');
			directionsDisplay.setMap(map);

		});
		
		calculateAndDisplayRoute(directionsService, directionsDisplay, latlng, place.geometry.location, 'DRIVING');
		directionsDisplay.setMap(map);

    });

    //setting the destination marker
    var startMarker = new google.maps.Marker({
        map: map
    });
    var latlng = new google.maps.LatLng(1.3483, 103.6831);
    startMarker.setPosition(latlng);
	
    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    function setupClickListener(id, types) {
        var radioButton = document.getElementById(id);
        radioButton.addEventListener('click', function () {
            autocomplete.setTypes(types);
        });
    }
	/*
	var pyrmont = {lat: 1.3483, lng: 103.6831};
	
	var service = new google.maps.places.PlacesService(map);
    service.nearbySearch({
          location: place.geometry.location,
          radius: 500,
          type: ['library']
        }, callback);
		
	      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
    }

  function createMarker(place) {
	var placeLoc = place.geometry.location;
	var marker = new google.maps.Marker({
	  map: map,
	  position: place.geometry.location
	});

	google.maps.event.addListener(marker, 'click', function() {
	  infowindow.setContent(place.name);
	  infowindow.open(map, this);
	});
  }	
  */
      

    setupClickListener('changetype-all', []);
    setupClickListener('changetype-address', ['address']);
    setupClickListener('changetype-establishment', ['establishment']);
    setupClickListener('changetype-geocode', ['geocode']);

}

//calculate and display the route
function calculateAndDisplayRoute(directionsService, directionsDisplay, start, end, type) {

    directionsService.route({
        origin: start,
        destination: end,
        travelMode: type
    }, function (response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
            //alert("testing");
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
	var e = type+'_INSTR';
	directionsDisplay.setPanel(document.getElementById(e));

}


