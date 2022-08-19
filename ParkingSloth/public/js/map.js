let map;
let markers=[];

const setListener = ()=> {
    document.querySelectorAll(".nombre_individual_estacionamientos").forEach((estacionamientoNombre, index)=>{
        estacionamientoNombre.addEventListener("click", ()=>{
            google.maps.event.trigger(markers[index], "click")
        })
    })
}

const displayEstacionamientosList = ()=> {
    let estacionamientosHTML = "";
    estacionamientos.forEach(estacionamientos =>{
        estacionamientosHTML += `<h6 class="nombre_individual_estacionamientos">${estacionamientos.name}</h6>`
    })
    document.getElementById("nombre_estacionamientos").innerHTML = estacionamientosHTML;

    
}

const createMarker = (coord,name)=>{
    let html = `<h5>${name}</h5>`
    const marker = new google.maps.Marker({
        position: coord,
        map:map,
        // icon: "./img/logo.png"
    })
    google.maps.event.addListener(marker, "click", ()=>{
        infoWindow.setContent(html);
        infoWindow.open(map, marker)
    })

    markers.push(marker)
}


const createLocationMarkers = ()=>{
    estacionamientos.forEach(estacionamientos=>{
        let coord = new google.maps.LatLng(estacionamientos.lat, estacionamientos.lng);
        let name = estacionamientos.name;
        createMarker(coord, name);
    })
}

function initMap() {
    let concepcion = { lat: -36.82699, lng: -73.04977 }
    
    map = new google.maps.Map(document.getElementById("map"), {
    center: concepcion,
    zoom: 13,
    });

   createLocationMarkers()

   infoWindow = new google.maps.InfoWindow();

   displayEstacionamientosList()
   setListener()
}

// window.initMap = initMap;