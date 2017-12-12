<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1 user-scalable=no"/>
    <title>PediloYa Mobile</title>
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
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('mobile/jscript.js')}}"></script>
    
  </head>
  <body>
   <!-- <script type="text/javascript" src="{{ URL::asset('mobile/FBscript.js')}}"></script>-->

    <div data-role="page" id='index' data-theme='a'>
      <div role="main" class="ui-content">
        <h2 class="mc-text-center">BIENVENIDO</h2>
        <p class="mc-top-margin-1-5"><b>Usuarios</b></p>
        <a href="#loginpage" class="ui-btn ui-btn-b ui-corner-all">Loguearse</a>
        <p class="mc-top-margin-1-5"><b>No tienes Cuenta?</b></p>
        <a href="#registrarpage" class="ui-btn ui-btn-b ui-corner-all">Registrarse</a>
        <p></p>
      </div>
    </div>




    <div data-role="page" id='loginpage' data-theme='a'>
        <div data-role="header" data-theme='b' data-position='fixed'>
          <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
          <h1>PediloYa Mobile Login</h1>            
        </div>
        <div role="main" class="ui-content" id='app'>           
          <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="" placeholder="Username" />
            <p></p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" placeholder="Password" />
            <p></p>
            <a href="#" class="ui-btn ui-btn-b ui-corner-all" id="login">Login</a> 
            <!--a href="login/facebook" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Facebook</a-->
            <!--a href="login/google" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Google</a-->
        </div>
    </div>

    <div data-role="page" id='registrarpage' data-theme='a'>
        <div data-role="header" data-theme='b' data-position='fixed'>
          <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
          <h1>PediloYa Mobile Registro</h1>            
        </div>
        <div role="main" class="ui-content">           
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" id="nombre" value="" placeholder="Nombre" />
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" value="" placeholder="Email" />
          <p></p>
          <label for="password2">Password:</label>
          <input type="password" name="password2" id="password2" value="" placeholder="Password" />
          <p></p>
          <label for="calle">Calle o Avenida:</label>
          <input type="text" name="calle" id="calle" value="" placeholder="Calle o Avenida" />
          <p></p>
          <label for="numero">Numero de Puerta:</label>
          <input type="text" name="numero" id="numero" value="" placeholder="Numero de Puerta" />
          <p></p>
          <a href="#" class="ui-btn ui-btn-b ui-corner-all" id="registrar2" data-theme='b'>Registrar</a> 
            <!--a href="login/facebook" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Facebook</a-->
            <!--a href="login/google" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Google</a-->
        </div>
    </div>


    <!--
    <div data-role="page" id='selectpage' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>              
        <h1>PediloYa Mobile Select</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div role="main" class="ui-content">
        <form>
          <div class="ui-field-contain">
            <label for="dropdown">Ir A:</label>
              <select name="dropdown" id="dropdown">
                <option value="0">Seleccione una Página</option>
                <option value="1">articulos</option>
                <option value="2">comercios</option>
                <option value="3">pedidos</option>
                <option value="4">perfil</option>
              </select>
          </div>
        </form>
      </div>
    </div>
  -->
    <div data-role="page" id='articulos' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
        <h1>PediloYa Mobile Artículos</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div data-role="content" id='contenedorarticulos' class="ui-content" >
          <form id="form" name="form">
          <a id="registrarpedido" data-role="button" data-theme="b" href="#" data-transition="slide">Confirmar Pedido</a>
          <ul data-role="listview" data-inset="true" id="articulos2"></ul>
          </form>
       </div>      
      <div data-role='footer' data-position='fixed' data-theme='b'>
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

    <div data-role="page" id='comercios' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>PediloYa Mobile Comercios</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div data-role="content" id='contenedor' class="ui-content">
        <form>
          <input type="text" data-type="search" id="filterable-input">
        </form>
      </div>
      <div data-role='footer' data-position='fixed' data-theme='b'>
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

    <div data-role="page" id='pedidos' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atrás</a>
        <h1>PediloYa Mobile Pedidos</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div data-role="content" class="ui-content" id="contenedorpedidos">
        <ul data-role="listview" data-inset="true" id="listapedidos"></ul>
      </div>
      <div data-role='footer' data-position='fixed' data-theme='b'>
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


    <div data-role="page" id='perfil' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>PediloYa Mobile Perfil</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div role="main" class="ui-content">
        <div data-role="content">
          <ul data-role="listview" data-inset="true" id="listaperfil"></ul>
        </div>
      </div>
      <div data-role='footer' data-position='fixed' data-theme='b'>
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

</body>
</html>