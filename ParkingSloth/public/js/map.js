let map;

function initMap() {
    let concepcion = { lat: -36.82699, lng: -73.04977 }
    
    map = new google.maps.Map(document.getElementById("map"), {
    center: concepcion,
    zoom: 13,
    });
}

// window.initMap = initMap;