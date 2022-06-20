$(document).ready(function () {
    $(document).foundation();
});
  function init() {
    var map;
    var styles =
    [
      {
        stylers: [
          { hue: '#330' },
          { saturation: -20 }
        ]
      },{
        featureType: 'road',
        elementType: 'geometry',
      },{
        featureType: 'road',
        elementType: 'labels',
        stylers: [
          { visibility: 'on' }
        ]
      }
    ];
    map = new google.maps.Map(document.getElementById('map_canvas'), {
      center: new google.maps.LatLng(40.674389,-4.700432),
      zoom: 5
    });
    map.setOptions({styles: styles});
    var input = document.getElementById('searchTextField');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
      map: map
    });
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      infowindow.close();
      marker.setVisible(false);
      input.className = '';
      //place contiene muchos objectos con muchisima información de la localizacion escogida
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // Inform the user that the place was not found and return.
        input.className = 'notfound';
        return;
      }
      // If the place has a geometry, then present it on a map.
      if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
      } else {
        map.setCenter(place.geometry.location);
        map.setZoom(17);  // Why 17? Because it looks good.
      }
      var image = new google.maps.MarkerImage(
          place.icon,
          new google.maps.Size(71, 71),
          new google.maps.Point(0, 0),
          new google.maps.Point(17, 34),
          new google.maps.Size(35, 35));
      marker.setIcon(image);
      marker.setPosition(place.geometry.location);
      //descomenta console.log y ojea la consola, veras toda la información disponible
      //console.log(place)
      //hacemos que en el infowindow aparezca la dirección tipo
      //Carrer Bonaventura Calopa, 08830 Sant Boi de Llobregat, Barcelona, España
      infowindow.setContent('<div><strong>' + place.formatted_address + '</strong></div>');
      infowindow.open(map, marker);
       document.formElem.lat.value=place.geometry.location.ob;
       document.formElem.lng.value=place.geometry.location.pb;
       document.formElem.direccion.value=place.formatted_address;
    });
  }
  google.maps.event.addDomListener(window, 'load', init);