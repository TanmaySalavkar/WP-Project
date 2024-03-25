document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("locationForm").addEventListener("submit", function(event) {
        event.preventDefault();
        findLocation();
    });

    document.getElementById("currentLocationBtn").addEventListener("click", function() {
        getLocation();
    });
});

function findLocation() {
    const latitude = parseFloat(document.getElementById("latitude").value);
    const longitude = parseFloat(document.getElementById("longitude").value);

    if (isNaN(latitude) || isNaN(longitude)) {
        alert("Please enter valid latitude and longitude values.");
        return;
    }

    const mapOptions = {
        center: { lat: latitude, lng: longitude },
        zoom: 12
    };
    const map = new google.maps.Map(document.getElementById("map"), mapOptions);

    const userMarker = new google.maps.Marker({
        position: { lat: latitude, lng: longitude },
        map: map,
        title: "Your Location"
    });
}

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showMap, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function showMap(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    const mapOptions = {
        center: { lat: latitude, lng: longitude },
        zoom: 12
    };
    const map = new google.maps.Map(document.getElementById("map"), mapOptions);

    const userMarker = new google.maps.Marker({
        position: { lat: latitude, lng: longitude },
        map: map,
        title: "Your Location"
    });
}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            alert("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            alert("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            alert("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            alert("An unknown error occurred.");
            break;
    }
}