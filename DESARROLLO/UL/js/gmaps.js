//inicializamos foundation
$(document).ready(function () {
    $(document).foundation();
});
//<![CDATA[
var map;
var markers = [];
var infoWindow;
var sidebarData;
//cargamos el mapa, lo colocamos en españa e inicializamos el infowindows
function load()
{
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
  map = new google.maps.Map(document.getElementById('map'), {
    center: new google.maps.LatLng(40.674389,-4.700432),
    zoom: 6
  });
   map.setOptions({styles: styles});
  infoWindow = new google.maps.InfoWindow();
  //creamos el evento para que al pulsar el sidebar se abra el
  //infowindow con la información de la tienda
  $(document).on('click', '#sidebar div p', function()
  {
    var markerNum = $(this).attr('value');
    if (markerNum != 'none')
    {
      google.maps.event.trigger(markers[markerNum], 'click');
    }
  })
}
//al pulsar en buscar lo esta es la función que debe lanzar googlemaps
function buscaLocalizacion()
{
 var ubicacion = document.getElementById('Iubicacion').value;
 var geocoder = new google.maps.Geocoder();
 geocoder.geocode({ubicacion: ubicacion}, function(results, status)
 {
   if (status == google.maps.GeocoderStatus.OK)
   {
     localizador(results[0].geometry.location);
   } else {
     alert('Su búsqueda no ha podido ser procesada.');
   }
 });
}
//función para eliminar los infowindows y los markers antes de limpiarlos
function eliminarLocalizacion()
{
 infoWindow.close();
 for (var i = 0; i < markers.length; i++)
 {
   markers[i].setMap(null);
 }
 markers.length = 0;
 $('#sidebar div').html('');
}
function localizador(center)
{
 //limpiamos los markers anteriores para pintarlos de nuevo
 eliminarLocalizacion();
 //asignamos a radius el valor del select seleccionaRadio
 var radius = document.getElementById('seleccionaRadio').value;
 var tipo_comercio = document.getElementById('tipo_comercio').value;

 //hay que mejorarlo, si piden tipo_comercio vamos a un método, si no a otro
 if(tipo_comercio.length > 2){
    var searchUrl = 'dataGmaps.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius + '&tipo_comercio=' + tipo_comercio;
 }else{
    var searchUrl = 'dataGmaps.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
 }

 downloadUrl(searchUrl, function(data)
 {
   var xml = parseXml(data);
   var markerNodes = xml.documentElement.getElementsByTagName('marker');
   var bounds = new google.maps.LatLngBounds();
   //si no se ha encontrado ningún resultado mostramos un alert con un error y salimos de la función
   if(markerNodes.length == 0)
   {
      popup_error();
      return;
   }else{
       var sidebar = '';
       for (var i = 0; i < markerNodes.length; i++)
       {
         var name = markerNodes[i].getAttribute('name');
         var address = markerNodes[i].getAttribute('address');
         var localidad = markerNodes[i].getAttribute('localidad');
         var distance = parseFloat(markerNodes[i].getAttribute('distance'));
         var descripcion = markerNodes[i].getAttribute('descripcion');
         var latlng = new google.maps.LatLng
         (
            parseFloat(markerNodes[i].getAttribute('lat')),
            parseFloat(markerNodes[i].getAttribute('lng'))
         );
         //llamamos a la función createOption
         sidebar += '<p class= "lista" value='+i+'>' + name + '</p>';
         //pintamos el marker y el infowindow de cada lugar
         createMarker(latlng, name, address, localidad, descripcion);
         bounds.extend(latlng);
       }
       $('#sidebar div').html(sidebar)
    }
   map.fitBounds(bounds);
  });

}

//función que crea el marker en el mapa, por cada uno que encuentre en la base de datos
//hará una iteracion a este función
function createMarker(latlng, name, address,localidad,descripcion)
{
  //html contiene los datos que queremos mostrar en
  //el infowindow al pulsar sobre el marker
  var html = '<div id="content">';
  html += '<h1 class="subheader">' + name + '</h1>';
  html += '<div class="body_content">';
  html += '<p><b>' + address + '</b></p><br />';
  html += '<p><b>' + name + '</b></p>';
  html += '<p><b>' + descripcion != '' ? descripcion : '' + '</b></p>';
  html += '</div>';
  //modificamos un poco el aspecto del marker
  var marker = new google.maps.Marker({
    icon: {
      path: google.maps.SymbolPath.CIRCLE,
      strokeColor: 'yellow',
      scale: 8
    },
    title: name,
    map: map,
    position: latlng
  });
  //al pulsar en el marker, llenamos el infowindow con los datos
  //de la variable html y lo abrimos a continuación
  google.maps.event.addListener(marker, 'click', function()
  {
    var infowindowopts = {
        maxWidth: 350,
        minHeight: 300,
        content: html
    };
    //añadimos el marker e infowindow al mapa
    infoWindow.setOptions(infowindowopts);
    infoWindow.open(map, marker);
  });
  markers.push(marker);
}
//función para hacer la petición ajax con javascript
function downloadUrl(url, callback)
{
  var request = window.ActiveXObject ?
      new ActiveXObject('Microsoft.XMLHTTP') :
      new XMLHttpRequest;
  request.onreadystatechange = function()
  {
    if (request.readyState == 4)
    {
      request.onreadystatechange = doNothing;
      callback(request.responseText, request.status);
    }
  };
  request.open('GET', url, true);
  //añadimos la cabecera para que php entienda que es una petición ajax, seguridad
  request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  request.send(null);
}
//función para parsear los datos
function parseXml(str)
{
  if (window.ActiveXObject)
  {
    var doc = new ActiveXObject('Microsoft.XMLDOM');
    doc.loadXML(str);
    return doc;
  } else if (window.DOMParser) {
    return (new DOMParser).parseFromString(str, 'text/xml');
  }
}
//mostramos un error si no hay resultados
function popup_error()
{
     alert('No se han encontrado resultados. Por favor, intente aumentar el radio o pruebe otra ubicación.');
}
function doNothing() {}
//]]>