console.log("Bonjour");
document.getElementById('form_destination').focus();		
var defaultBounds = new google.maps.LatLngBounds(
	new google.maps.LatLng(49.615582,-1.769906), new google.maps.LatLng(43.269854,5.942125)
);
var options = { bounds: defaultBounds };
function activatePlacesSearch(){
	var input = document.getElementById('form_destination');
	var autocomplete = new google.maps.places.Autocomplete(input,options);
}