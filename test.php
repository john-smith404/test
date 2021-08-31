<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Google Map Api Practice</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<style type="text/css">
		h1{
			background-color: lightblue;
			color: white;
			box-shadow: 2px 2px 5px black;
		}
		#show_map{
			width: 95%;
			height: 650px;
			box-shadow: 2px 2px 5px black;
		}
	</style>
</head>
<body>
	<center>
		<div>
			<h1> Google Map Api  </h1>
		</div>
		<div>
			<input class="form-control" type="text" id="search_place" value="test">
			<button onclick="show_address_location()" id="search_button" class="btn btn-primary">Search(geocoder)</button>
		</div>	
		<div id="show_map">
			
		</div>
	</center>
	
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=Your_Key&callback=load_map&libraries=places"></script>

	<script type="text/javascript">
		var google_map = null;
		var geocoder = null;

		function load_map() {
			var map_setting = {
				center: {lat:25.354304778526455, lng:68.40272973131445},
				zoom: 12,
				// mapTypeID: google.maps.MapTypeId.TERRAIN
				// mapTypeID: google.maps.MapTypeId.ROADMAP
				// mapTypeID: google.maps.MapTypeId.ROADMAP
				// mapTypeID: google.maps.MapTypeId.HYBRID
			}

			google_map = new google.maps.Map(document.getElementById("show_map"), map_setting);

			/*google.maps.event.addListener(google_map, "click", function(event) {
				// console.log(event.latLng.lat());
				new google.maps.Marker({
					position: {lat:event.latLng.lat(), lng:event.latLng.lng()},
					map:google_map
				})
			})*/

			//**************** Add Marker & Info Window & Animation ******************

			google.maps.event.addListener(google_map, "click", function(event){
				// alert(event.latLng.lat());

				marker = new google.maps.Marker({
					position: {lat:event.latLng.lat(), lng:event.latLng.lng()},
					map: google_map,
					icon:{url:"https://cdn.vox-cdn.com/thumbor/pOMbzDvdEWS8NIeUuhxp23wi_cU=/1400x1400/filters:format(png)/cdn.vox-cdn.com/uploads/chorus_asset/file/19700731/googlemaps.png",scaledSize:{height:50, width:50},
					 	},
					 title: "marker Title",
					 draggable:true,
					 animation: google.maps.Animation.BOUNCE,


				})

				// marker.setAnimation(google.maps.Animation.DROP);
				// marker.setAnimation(google.maps.Animation.BOUNCE);
				
				/*info_window = new google.maps.InfoWindow({
					content: "<h1> hi from info window </h1>"
				})
				marker.addListener("click", function(){
					info_window.open(google_map, marker);
				})*/


			})

			//***************** Direction Api *****************
			/*var directions_service = new google.maps.DirectionsService();
			var directions_renderer = new google.maps.DirectionsRenderer();

			directions_renderer.setMap(google_map);
			// directions_renderer.setPanel(document.getElementById('show_description'));

			$start_point = new google.maps.LatLng(25.408391835776104,  68.26054573059082);
			$end_point = new google.maps.LatLng(25.4297915404349,  68.28090720693521);

			var route_setting = {
				origin: $start_point,
				destination: $end_point,
				travelMode: google.maps.TravelMode.DRIVING,
				provideRouteAlternatives:true
			}

			directions_service.route(route_setting, function(response, status) {
				if(status == "OK"){
					directions_renderer.setDirections(response);
				}
			})*/

			//****************** Places API ********************

			var search_input = document.getElementById("search_place");

			/*var searched_place = new google.maps.places.Autocomplete(search_input);
			google.maps.event.addListener(searched_place, "place_changed", function(){
				var place = searched_place.getPlace();
				console.log(place.name);
				console.log(place.icon);
				console.log(place.formatted_address);
				console.log(place.formatted_phone_number);
				console.log(place.geometry.location.lat());
				console.log(place.geometry.location.lng());
				console.log(place.types);

				new google.maps.Marker({
					position:{lat:place.geometry.location.lat(), lng:place.geometry.location.lng()},
					map:google_map,
					icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
					draggable:true,
					animation: google.maps.Animation.BOUNCE
				})

				Array.prototype.forEach.call(place.types, function(data){
					console.log(data);
				})
			})*/

			//************** Distance Matrix Api **************

			 var bombay_bakery = new google.maps.LatLng(25.3886567748371, 68.3624424716888);
	         var mc_donald = new google.maps.LatLng(25.3776, 68.3347);
	         var kaka_bakery = new google.maps.LatLng(25.3912823, 68.364537);
	         var shabir_biryani = new google.maps.LatLng(25.3918, 68.3659);
			
			/*var distance_service = new google.maps.DistanceMatrixService();

			var distance_settings = {
				origins:[bombay_bakery],
				destinations: [kaka_bakery],
				
				origins: [bombay_bakery, kaka_bakery, shabir_biryani],
            	destinations: [mc_donald, shabir_biryani, bombay_bakery],
				travelMode: google.maps.TravelMode.DRIVING,
				unitSystem: google.maps.UnitSystem.METRIC
			}

			distance_service.getDistanceMatrix(distance_settings, function(response, status) {
				alert(status);
				if(status == 'OK'){
					console.log(response.rows);
					console.log(response.rows[0].elements[0].distance.text);
					console.log(response.rows[0].elements[0].duration.text);

					console.log(response.rows[1].elements[1].distance.text);
					console.log(response.rows[1].elements[1].duration.text);
				}
			})*/

			//************** Places api (near by) *********************

			/*var places_setting = {
				location: kaka_bakery,
				radius: 800,
				types: ['hospital', 'doctor'],
				openNow: true,
			}

			var places_service = new google.maps.places.PlacesService(google_map);
			places_service.nearbySearch(places_setting, function(response, status){
				alert(status);
				// console.log(response[0].geometry.location);

				Array.prototype.forEach.call(response, function(data){
					console.log(data.geometry)
				})
			})*/

			//************** Street View ****************
/*
			var street_view_setting = {
				position: {lat: 34.8762, lng: 73.6934},
			}

			var map_display = document.getElementById("show_map");
			var street_view = new google.maps.StreetViewPanorama(map_display, street_view_setting);

			// google_map.setStreetView(street_view);*/

			//****************** Shape *********************

			/*var circle = new google.maps.Circle({
				// strokeColor: "green",
				strokeopacity: 0.8,
				strokeWeight: 2,
				// fillColor: "blue",
				fillOpacity:0.5,
				map: google_map,
				center:{lat:25.3912823, lng:68.364537},
				radius: 500,
			});*/


			//********* Geocoder  ****************

			geocoder = new google.maps.Geocoder()
		}

		function show_address_location() {
			var place_address = document.getElementById('search_place').value;

			var geocoder_setting = {
				address: place_address,
			}

			geocoder.geocode(geocoder_setting, function(response, status){
				// alert(status);
				console.log(response[0].geometry.location);
			})

		}
	</script>

</body>
</html>
