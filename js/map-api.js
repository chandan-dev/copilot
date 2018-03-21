function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: {lat: 20.344034, lng: 85.80682200000001}
    });
    directionsDisplay.setMap(map);

    var onChangeHandler = function() {
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    };
    document.getElementById('start').addEventListener('change', onChangeHandler);
    document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    if (('' !== document.getElementById('start').value) &&
        ('' !== document.getElementById('end').value)) {
        directionsService.route({
            origin: document.getElementById('start').value,
            destination: document.getElementById('end').value,
            travelMode: 'DRIVING'
        }, function (response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                //window.alert('Directions request failed due to ' + status);
            }
        });
    }
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
        });
    }
}

function initAutocomplete(fieldId) {
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById(fieldId)),
        {types: ['geocode']});
}

function searchVehicle() {
    $.post("get-vehicle.php",
        {
            'start': document.getElementById('start').value,
            'end': document.getElementById('end').value
        },
        function(data, status){
            alert(data[0]);
            $.each(data, function (key, val) {
                alert(key + ' -- ' + val)
            })
        }
    );
}