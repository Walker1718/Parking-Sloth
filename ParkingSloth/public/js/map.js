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
        estacionamientosHTML += `<p class="nombre_individual_estacionamientos">${estacionamientos.name}</p>`
    })
    document.getElementById("nombre_estacionamientos").innerHTML = estacionamientosHTML;

    
}

const createMarker = (coord,name,horario,valor)=>{
    let html = `
        <div class="window">
            <p>${name}</p>
            <div class="horario">
                <p>${horario}</p>
            </div>
            <div class="valor">
                <p>${valor}</p>
            </div>
            
            <div class="reportar">
                <a id="" href="/reportes/create" onClick="Href()">Reportar error</a>
            </div>

        </div>
    `
    const marker = new google.maps.Marker({
        position: coord,
        map:map,
        icon: "./img/loguito.png"
    })
    google.maps.event.addListener(marker, "click", ()=>{
        infoWindow.setContent(html);
        infoWindow.open(map, marker)
    })

    markers.push(marker)
}


const createLocationMarkers = ()=>{
    let bounds = new google.maps.LatLngBounds();
    estacionamientos.forEach(estacionamientos=>{
        let coord = new google.maps.LatLng(estacionamientos.lat, estacionamientos.lng);
        let name = estacionamientos.name;
        let horario = estacionamientos.horario;
        let valor = estacionamientos.valor;
        bounds.extend(coord);
        createMarker(coord, name, horario, valor);
        map.fitBounds(bounds);
    })
}

function initMap() {
    let concepcion = { lat: -36.82699, lng: -73.04977 }
    
    map = new google.maps.Map(document.getElementById("map"), {
    center: concepcion,
    zoom: 13,
    mapId: "6780ea5549035eec",
    });

   createLocationMarkers()

   infoWindow = new google.maps.InfoWindow();

   displayEstacionamientosList()
   setListener()
}

// window.initMap = initMap;