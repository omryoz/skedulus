        var PostCodeid = "#Postcode";
        var longval = "#hidLong";
        var latval = "#hidLat";
        var geocoder;
        var map;
        var marker;

		
		var noPOILabels = [
    { 
      featureType: "poi", 
      elementType: "labels", 
      stylers: [ { visibility: "off" } ] 

    }
  ];
  var noPOIMapType = new google.maps.StyledMapType(noPOILabels,
    {name: "NO POI"});
        function initialize() {
            //MAP
            var initialLat = $(latval).val();
            var initialLong = $(longval).val();
            if (initialLat == '') {
                initialLat = "31.046051";
                initialLong = "34.85161199999993";
            }
            var latlng = new google.maps.LatLng(initialLat, initialLong);
            if($("#draggable").val()=='false'){
				var options = {
                zoom: 16,
				zoomControl: false,
				  scaleControl: false,
				  scrollwheel: false,
				  disableDoubleClickZoom: true,
                  center: latlng,
				  draggable: false,
				  disableDefaultUI: true,
				  mapTypeControlOptions: {
                  mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'no_poi']
                 },
                
                 };
				 //mapTypeId: google.maps.MapTypeId.ROADMAP
				 map = new google.maps.Map(document.getElementById("geomap"), options);
			
			map.mapTypes.set('no_poi', noPOIMapType);
            map.setMapTypeId('no_poi');
            geocoder = new google.maps.Geocoder();
				}else{
				var options = {
                zoom: 16,
                center: latlng,
				disableDefaultUI: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
               };
			    map = new google.maps.Map(document.getElementById("geomap"), options);
			
			
				}
			//Associate the styled map with the MapTypeId and set it to display.
  
        
               
        
            marker = new google.maps.Marker({
                map: map,
                draggable: false,
                position: latlng
            });
        
            google.maps.event.addListener(marker, "dragend", function (event) {
                var point = marker.getPosition();
                map.panTo(point);
            });
            
        };
        
        $(document).ready(function () {
        
            initialize();
        
            $(function () {
                $(PostCodeid).autocomplete({
                    //This bit uses the geocoder to fetch address values
                    source: function (request, response) {
                        geocoder.geocode({ 'address': request.term }, function (results, status) {
                            response($.map(results, function (item) {
                                return {
                                    label: item.formatted_address,
                                    value: item.formatted_address
                                };
                            }));
                        });
                    }
                });
            });
        
            $('#Postcode').blur(function (e) {
                var address = $(PostCodeid).val();
                geocoder.geocode({ 'address': address }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        $(latval).val(marker.getPosition().lat());
                        $(longval).val(marker.getPosition().lng());
                    } 
					// else { 
                        // alert("Geocode was not successful for the following reason: " + status);
                    // }
                });
                e.preventDefault();
            });
        
            //Add listener to marker for reverse geocoding
            google.maps.event.addListener(marker, 'drag', function () {
                geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $(latval).val(marker.getPosition().lat());
                            $(longval).val(marker.getPosition().lng());
                        }
                    }
                });
            });

        
        });

	