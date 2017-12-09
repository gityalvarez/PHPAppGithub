<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1"/>
    <title>SocialAuth</title>
    <link rel="stylesheet" src="themes/B.css" />
    <link rel="stylesheet" src="themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
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
          <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
          <h1>Envios App Login</h1>            
        </div>
        <div role="main" class="ui-content" id='app'>           
          <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="" placeholder="Username" />
            <p></p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" placeholder="Password" />
            <p></p>
            <a href="#" class="ui-shadow ui-btn ui-corner-all ui-btn-inline" id="login">Login</a> 
            <!--a href="login/facebook" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Facebook</a-->
            <!--a href="login/google" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Google</a-->
        </div>
    </div>

    <div data-role="page" id='registrarpage' data-theme='a'>
        <div data-role="header" data-theme='b' data-position='fixed'>
          <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
          <h1>Envios App Login</h1>            
        </div>
        <div role="main" class="ui-content">           
          <label for="Nombre">Nombre:</label>
          <input type="text" name="Nombre" id="Nombre" value="" placeholder="Nombre" />
          <label for="Email">Email:</label>
          <input type="text" name="Email" id="Email" value="" placeholder="Email" />
          <p></p>
          <label for="Calle">Calle o Avenida:</label>
          <input type="text" name="Calle" id="Calle" value="" placeholder="Calle o Avenida" />
          <p></p>
          <label for="Numero">Numero de Puerta:</label>
          <input type="text" name="Numero" id="Numero" value="" placeholder="Numero de Puerta" />
          <p></p>
          <a href="#" class="ui-shadow ui-btn ui-corner-all ui-btn-inline" id="registrar">Resgistrar</a> 
            <!--a href="login/facebook" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Facebook</a-->
            <!--a href="login/google" class="ui-shadow ui-btn ui-corner-all ui-btn-inline">Login con Google</a-->
        </div>
    </div>

    <div data-role="page" id='selectpage' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>              
        <h1>Envios App Select</h1>
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

    <div data-role="page" id='articulos' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>Envios App Articulos</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div role="main" class="ui-content">
        <form>
          <input type="text" data-type="search" id="filterable-input">
        </form>
        <form data-role="controlgroup" data-filter="true" data-input="#filterable-input" id="articulos">      
        </form>
      </div>
    </div>

    <div data-role="page" id='comercios' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>Envios App Comercios</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div role="main" class="ui-content">
        <form>
          <input type="text" data-type="search" id="filterable-input">
        </form>
      </div>
    </div>

    <div data-role="page" id='pedidos' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>Envios App Pedidos</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div role="main" class="ui-content"></div>
    </div>


    <div data-role="page" id='perfil' data-theme='a'>
      <div data-role="header" data-theme='b' data-position='fixed'>
        <a id="backButton" href="#" data-rel="back" data-transition='slide' data-direction='reverse'>Atras</a>
        <h1>Envios App Perfil</h1>
        <a id="logout" href="#" data-transition='slide'>Logout</a>
      </div>
      <div role="main" class="ui-content"></div>
    </div>

</body>
</html>