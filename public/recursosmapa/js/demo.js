
//al cargarse la pagina

$(document).ready(function (e) {
    jQuery.support.cors = true;
 
    var host;// = "http://localhost:9000/api/1";

    
    // la key de la api graphopper

    //esta busca por 10  mas
//c9b2b65d-be3d-4d96-b19c-48365a066ae3

    var defaultKey = "1430369a-1150-4b60-b05b-9d4a89ae8663";

    //el tipo de ruteo
    var profile = "car";

    // creo el cliente de ruteo, elevation.true es soportado solo para bicileta(bike) o "a pie"(foot)

    var ghRouting = new GraphHopper.Routing({key: defaultKey, host: host, vehicle: profile, elevation: false});

    //creo el cliente de optimizacion
    var ghOptimization = new GraphHopper.Optimization({key: defaultKey, host: host, profile: profile});

    //creo el mapa pasandole como parametro el nombre del div donde se va a dibujar el mapa leaflet

    var vrpMap = createMap('vrp-map');

   
    //se configura la optimizacion del ruteo pasandole las variables creadas

    setupRouteOptimizationAPI(vrpMap, ghOptimization, ghRouting);

});

function setupRouteOptimizationAPI(map, ghOptimization, ghRouting) {
//seteo la posicion y zoom del mapa
    map.setView([-34.866944, -56.166667], 13);
//se definen los iconos numerados
    L.NumberedDivIcon = L.Icon.extend({
        options: {
            iconUrl: 'http://localhost:8000/recursosmapa/img/location_map_pin_bluemod.png',
            number: '',
            shadowUrl: null,
            iconSize: new L.Point(25, 41),
            iconAnchor: new L.Point(14, 41),
            popupAnchor: new L.Point(0, -33),
            className: 'leaflet-div-iconoo'
        },
        createIcon: function () {
            var div = document.createElement('div');
            var img = this._createImg(this.options['iconUrl']);
            var numdiv = document.createElement('div');
            numdiv.setAttribute("class", "numerado");
            numdiv.innerHTML = this.options['number'] || '';
            div.appendChild(img);
            div.appendChild(numdiv);
            this._setIconStyles(div, 'icon');
            return div;
        },
        // you could change this to add a shadow like in the normal marker if you really wanted
        createShadow: function () {
            return null;
        }
    });
    var addPointToMap = function (lat, lng, index, saltito) {
    //agrega puntos al mapa recibiendo el numero para el icono
        index = parseInt(index);
        if (index === 0) {
            new L.Marker([lat, lng], {
                icon: new L.NumberedDivIcon({iconUrl:'http://localhost:8000/recursosmapa/img/g4590.png', number: ''}),
                bounceOnAdd: saltito,
                bounceOnAddOptions: {duration: 800, height: 200}
            }).addTo(routingLayer);
        } else {
            new L.Marker([lat, lng], {
                icon: new L.NumberedDivIcon({number: '' + (index)}),
                bounceOnAdd: saltito,
                bounceOnAddOptions: {duration: 800, height: 200},
            }).addTo(routingLayer);
        }
    };
    //addPointToMap(-34.866944, -56.166667, ghOptimization.points.length);
    /*
    map.on('click', function (e) {

        addPointToMap(e.latlng.lat, e.latlng.lng, ghOptimization.points.length,true);
        ghOptimization.addPoint(new GHInput(e.latlng.lat, e.latlng.lng));
    });*/
/*
    $(window).on('load', function (e) {
    //$(window).ready.then(function(e){
        addPointToMap(-34.866944, -56.166667, 0);
        ghOptimization.addPoint(new GHInput(-34.866944, -56.166667));
        //})
    });
*/
   
    var routingLayer = L.geoJson().addTo(map);
    routingLayer.options.style = function (feature) {
        return feature.properties && feature.properties.style;
    };

    var clearMap = function () {
        ghOptimization.clear();
        routingLayer.clearLayers();
        ghRouting.clearPoints();
        $("#vrp-response").empty();
        $("#vrp-error").empty();
    };


    var getRouteStyle = function (routeIndex) {
        var routeStyle;
        routeStyle = {color: "blue"};
        routeStyle.weight = 5;
        routeStyle.opacity = 1;
        return routeStyle;
    };

    var createGHCallback = function (routeStyle) {
        return function (json) {
            for (var pathIndex = 0; pathIndex < json.paths.length; pathIndex++) {
                var path = json.paths[pathIndex];
                routingLayer.addData({
                    "type": "Feature",
                    "geometry": path.points,
                    "properties": {
                        style: routeStyle
                    }
                });
            }
        };
    };

    var optimizeError = function (err) {
        $("#vrp-response").text(" ");

        if (err.message.indexOf("demasiados puntos") >= 0) {
            $("#vrp-error").empty();
          
        } else {
            $("#vrp-error").text("Ocurrio el siguiente error: " + err.message);
        }
        console.error(err);
    };


//AQUI PASA LA MAGIA
    var optimizeResponse = function (json) {
        var sol = json.solution;
        if (!sol)
            return;

        $("#vrp-response").text("Se encontro la ruta para  " + sol.routes.length + " vehiculo! "
            + "Distancia: " + Math.floor(sol.distance / 1000) + "km "
            + ", Tiempo: " + Math.floor(sol.time / 60) + "min "
            + ", costs: " + sol.costs);

        
        routingLayer.clearLayers();
        for (var routeIndex = 0; routeIndex < sol.routes.length; routeIndex++) {
            var route = sol.routes[routeIndex];

            // fetch real routes from graphhopper
            ghRouting.clearPoints();
            var firstAdd;
            for (var actIndex = 0; actIndex < route.activities.length; actIndex++) {
                var add = route.activities[actIndex].address;
                ghRouting.addPoint(new GHInput(add.lat, add.lon));

                if (!eqAddress(firstAdd, add))
                    addPointToMap(add.lat, add.lon, actIndex,false);

                if (actIndex === 0)
                    firstAdd = add;
            }

            var ghCallback = createGHCallback(getRouteStyle(routeIndex));

            ghRouting.doRequest({instructions: false})
                .then(ghCallback)
                .catch(function (err) {
                    var str = "Ocurrió un error de ruteo: " + err.message;
                    $("#vrp-error").text(str);
                });
        }
    };

    var eqAddress = function (add1, add2) {
        return add1 && add2
            && Math.floor(add1.lat * 1000000) === Math.floor(add2.lat * 1000000)
            && Math.floor(add1.lon * 1000000) === Math.floor(add2.lon * 1000000);
    };

    var optimizeRoute = function () {
        if (ghOptimization.points.length < 3) {
            $("#vrp-response").text("Se requieren almenos 3 puntos para optimizar y envió " + ghOptimization.points.length);
            return;
        }
        $("#vrp-response").text("Calculando ...");
        ghOptimization.doVRPRequest(1)
            .then(optimizeResponse)
            .catch(optimizeError);
    };

    var mapear_ubicaciones = function() {
        //limpio el mapa
        clearMap();
        //pongo el punto de partida
        addPointToMap(-34.866944, -56.166667, 0,true);
        ghOptimization.addPoint(new GHInput(-34.866944, -56.166667));
        console.log(clientess);
        var i="";
        for(i in clientess){
            addPointToMap(clientess[i].lat, clientess[i].long, parseInt(i)+1,true);
            ghOptimization.addPoint(new GHInput(clientess[i].lat, clientess[i].long));
            console.log(i);
        }
       
    }

    $("#vrp_clear_button").click(clearMap);

    $("#optimize_button").click(optimizeRoute);

    $("#mapear_button").click(mapear_ubicaciones);
}


function createMap(divId) {
    var osmAttr = '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

    var omniscale = L.tileLayer.wms('https://maps.omniscale.net/v1/ghexamples-3646a190/tile', {
        layers: 'osm',
        attribution: osmAttr + ', &copy; <a href="http://maps.omniscale.com/">Omniscale</a>'
    });

    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: osmAttr
    });

    var map = L.map(divId, {layers: [osm]});
    L.control.layers({
        "Omniscale": omniscale,
        "OpenStreetMap": osm
    }).addTo(map);
    return map;
}
