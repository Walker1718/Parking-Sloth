let map;

function initMap(){
    let concepcion = {lat: -36.8269900, lng:-73.0497700}
    map = new google.maps.Map(document.getElementById("map"), {
        center: concepcion,
        zoom: 15
    })
}