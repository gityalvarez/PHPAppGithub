<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1 user-scalable=no"/>
    <title>PediloYa MOBILE</title>
    <link rel="stylesheet" src="themes/B.css" />
    <link rel="stylesheet" src="themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
             integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
             crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"
             integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log=="
             crossorigin="">
    </script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('mobile/jscript.js')}}"></script>
    
    <style>
      .leaflet-top, .leaftet-bottom {
        z-index: auto;
      }
    </style>
    
  </head>
  <body>
   <!-- <script type="text/javascript" src="{{ URL::asset('mobile/FBscript.js')}}"></script>-->

    <!--INDEX-->
    <div data-role="page" id='index' data-theme='a'>
      <div role="main" class="ui-content">
        <h2 class="mc-text-center">Bienvenido a</h2>
        <img style="width:80%; margin:auto; display:block" src="{{ URL::asset('imagenes\PediloYA-LogoNaranja.svg')}}">
        <p class="mc-top-margin-1-5"><b>Usuarios</b></p>
        <a href="#loginpage" class="ui-btn ui-btn-b ui-corner-all">Loguearse</a>
        <p class="mc-top-margin-1-5"><b>No tienes Cuenta?</b></p>
        <a href="#registrarpage" class="ui-btn ui-btn-b ui-corner-all">Registrarse</a>
        <p></p>
      </div>
    </div>

    <!--LOGIN-->
    <div data-role="page" id='loginpage' data-theme='a'>
        <div data-role="header" data-theme='b' data-position='fixed' data-tap-toggle="false" >
          <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
          <h1>PediloYa Mobile Login</h1>            
        </div>

        <div role="main" class="ui-content" id='app'>  
        <form id="loginform" >    
          <div>
              <label for="username">Email:</label>
              <input type="email" name="username" id="username" value="" placeholder="Username">
          </div>     
              <p></p>
          <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" placeholder="Password"> 
          </div>    
            <p id='errorlogin'></p>
            <button type="submit" class="ui-btn ui-btn-b ui-corner-all" id="login">Login</button> 
            <!--a href="login/facebook" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Facebook</a-->
            <!--a href="login/google" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Google</a-->
        </form>  
        </div>
    </div>
    <!--REGISTRO-->
    <div data-role="page" id='registrarpage' data-theme='a'>
        <div data-role="header" data-theme='b' data-position='fixed' data-tap-toggle="false">
          <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
          <h1>PediloYa MOBILE</h1>            
        </div>
        <div role="main" class="ui-content">   
          <form id="registrarform"> 
            <div>  
              <label for="nombre">Nombre:</label>
              <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre" />
            </div>
            <div>
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" value="" placeholder="Email" />
            </div>
            <p></p>
            <div>
              <label for="password2">Password:</label>
              <input type="password" name="password2" id="password2" value="" placeholder="Password" />
            </div>
            <p></p>
            <div>
              <label for="calle">Calle o Avenida:</label>
              <input type="text" name="calle" id="calle" value="" placeholder="Calle o Avenida" data-direccion="" data-latitud="" data-longitud=""oninput="geolocalizar()"/>
            </div>
            <p></p>
          <label for="nopuerta">Numero de Puerta:</label>
          <input type="text" name="nopuerta" id="nopuerta" value="" placeholder="Numero de Puerta" oninput="geolocalizar()" />
          
          <p id="errorregistrar"></p>
          <button type="submit" class="ui-btn ui-btn-b ui-corner-all" id="registrar2" data-theme='b'>Registrar</button> 
            <!--a href="login/facebook" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Facebook</a-->
            <!--a href="login/google" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Google</a-->
          </div>
    </div>

    <!--ARTICULOS-->
    <div data-role="page" id='articulos' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed' data-tap-toggle="false">
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
        <h1>PediloYa MOBILE</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div data-role="content" id='contenedorarticulos' class="ui-content" >
          <form id="form" name="form">
          <a id="registrarpedido" data-role="button" data-theme="b" href="#" data-transition="slide">Confirmar Pedido</a>
          <ul data-role="listview" data-filter="true" data-filter-placeholder="Filtrar productos..."  data-inset="true" id="articulos2"></ul>
          </form>
       </div>      
      <div data-role='footer' data-position='fixed' data-theme='b' data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="#articulos" class="ui-btn-active ui-state-persist" data-icon="bullets">Artículos</a></li>
            <li><a href="#comercios" data-icon="location">Comercios</a></li>
            <li><a href="#pedidos" data-icon="shop">Pedidos</a></li>
            <li><a href="#perfil" data-icon="user">Perfil</a></li>
          </ul>
        </div>
      </div>
    </div> 

    <!--COMERCIOS-->
    <div data-role="page" id='comercios' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed' data-tap-toggle="false">
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>PediloYa MOBILE</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div data-role="content" id='contenedor' class="ui-content">
        <div id='mapid' style='height: 300px;'></div>
        <form>
          <input type="text" data-type="search" id="filterable-input">
           <ul data-role="listview" data-inset="true" id="comercios2"></ul>
        </form>
      </div>
      <div data-role='footer' data-position='fixed' data-theme='b' data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="#articulos"  data-icon="bullets">Articulos</a></li>
            <li><a href="#comercios" class="ui-btn-active ui-state-persist" data-icon="location">Comercios</a></li>
            <li><a href="#pedidos" data-icon="shop">Pedidos</a></li>
            <li><a href="#perfil" data-icon="user">Perfil</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!--PEDIDOS-->
    <div data-role="page" id='pedidos' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed' data-tap-toggle="false">
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
        <h1>PediloYa MOBILE</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div data-role="content" class="ui-content" id="contenedorpedidos">
        <ul data-role="listview" data-inset="true" id="listapedidos"></ul>
      </div>
      <div data-role='footer' data-position='fixed' data-theme='b' data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="#articulos"  data-icon="bullets">Artículos</a></li>
            <li><a href="#comercios"  data-icon="location">Comercios</a></li>
            <li><a href="#pedidos" class="ui-btn-active ui-state-persist" data-icon="shop">Pedidos</a></li>
            <li><a href="#perfil" data-icon="user">Perfil</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!--PERFIL-->
    <div data-role="page" id='perfil' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed' data-tap-toggle="false">
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>PediloYa MOBILE</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div role="main" class="ui-content">
        <div data-role="content">
          <ul data-role="listview" data-inset="true" id="listaperfil"></ul>
        </div>
      </div>
      <div data-role='footer' data-position='fixed' data-theme='b' data-tap-toggle="false">
        <div data-role="navbar">
          <ul>
            <li><a href="#articulos"  data-icon="bullets">Articulos</a></li>
            <li><a href="#comercios"  data-icon="location">Comercios</a></li>
            <li><a href="#pedidos"  data-icon="shop">Pedidos</a></li>
            <li><a href="#perfil" class="ui-btn-active ui-state-persist" data-icon="user">Perfil</a></li>
          </ul>
        </div>
      </div>
    </div>
      
    <script>
      function geolocalizar() {

       // console.log( document.getElementById("direccion").value);
        var dircomp = document.getElementById("nopuerta").value + ", "+ document.getElementById("calle").value + ", montevideo, uruguay";
        inp =encodeURI(dircomp);
        console.log(inp);
        $.getJSON('http://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + inp, function(data) {
            var items = {lati:'',long:''};

            $.each(data, function(key, val) {
                items['lati'] = val.lat;
                items['long']= val.lon;
            });
         document.getElementById("calle").dataset.direccion = dircomp;
         document.getElementById("calle").dataset.latitud = items['lati'];
         document.getElementById("calle").dataset.longitud = items['long'];

       });

      }
    </script>
  </body>
</html>