function init_map() {
<<<<<<< HEAD
var var_location = new google.maps.LatLng(51.9224121,4.4688025);

  var var_mapoptions = {
    center: var_location,
    zoom: 14
  };

var var_marker = new google.maps.Marker({
position: var_location,
      map: var_map,
title:"Venice"});

  var var_map = new google.maps.Map(document.getElementById("map"),
      var_mapoptions);

var_marker.setMap(var_map);

}

google.maps.event.addDomListener(window, 'load', init_map);
=======
    var var_location = new google.maps.LatLng(51.9224121,4.4688025);

    var var_mapoptions = {
        center: var_location,
        zoom: 14
    };

    var var_map = new google.maps.Map( document.getElementById("map"), var_mapoptions );
    var var_marker = new google.maps.Marker({
        position: var_location,
        map: var_map,
        title:"Rotterdam"
    });
    var_marker.setMap(var_map);
}

google.maps.event.addDomListener(window, 'load', init_map);
>>>>>>> 0f591fcadfcc882a90cb68d713c9716a67f38edf
