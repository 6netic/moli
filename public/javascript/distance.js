function initMap() {
                var origine = "17 Rue nationale, 60540 Belle-Église, France";
                var destination = document.getElementById("form_destination").value ;
		console.log('destination');
		// var destinationA = '17 Rue nationale, 60540 Belle-Église, France';
                // $location
                var service = new google.maps.DistanceMatrixService;
                service.getDistanceMatrix({
                    origins: [origine],
                    destinations: [destination],
                    travelMode: 'DRIVING',
                    unitSystem: google.maps.UnitSystem.METRIC,
                    avoidHighways: false,
                    avoidTolls: false
                    }, function(response, status) {
                        if (status !== 'OK') {
                            alert('Error was: ' + status);
                        } else {
                            var originList = response.originAddresses;
                            var destinationList = response.destinationAddresses;
                            var laDistance = document.getElementById("distance");
                            // outputDiv.innerHTML = '';
                            var resultat = response.rows[0].elements;
					laDistance.innerHTML = resultat[0].distance.text + " pour une durée de trajet estimée à : " + resultat[0].duration.text ;
					//document.getElementById("varDistance").value = 60;
					document.getElementById("varDistance").value = resultat[0].distance.value;
					document.getElementById("varDuree").value = resultat[0].duration.value;
					console.log(resultat[0].distance.value);
					// console.log(resultat[0].duration.value);
					console.log(document.getElementById("varDistance").value);
                        }
                });
}	
