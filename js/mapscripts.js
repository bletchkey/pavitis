	/*map scripts
	
	document.addEventListener("DOMContentLoaded", function (event) {
	var element = document.getElementById('container');
	var height = element.offsetHeight;
	if (height < screen.height) {
		document.getElementById("footer").classList.add('stikybottom');
	}
	}, false);

	function myMap() {
	var mapCanvas = document.getElementById("map");
	var mapOptions = {
	center: new google.maps.LatLng(44.916583, 10.230322),
	zoom:16
	}
	var map = new google.maps.Map(mapCanvas, mapOptions);
	} 
*/

var myCenter = new google.maps.LatLng(44.916583, 10.230322);
    
function initialize() {
    var mapProp = {
    center: myCenter,
    zoom: 16,
    scrollwheel: false,
    draggable: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
    
var map = new google.maps.Map(document.getElementById("map"),mapProp);
    
var marker = new google.maps.Marker({
    position: myCenter,
});
    
marker.setMap(map);
}
    
google.maps.event.addDomListener(window, 'load', initialize);	