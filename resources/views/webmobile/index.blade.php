<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SocialAuth</title>
    <link rel="stylesheet" src="themes/B.css" />
    <link rel="stylesheet" src="themes/jquery.mobile.icons.min.css" />
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('mobile/jscript.js')}}"></script>
    <style media="screen">
      #fb-btn{margin-top:20px;}
      #profile, #fblogout, #feed{display:none}
    </style>
  </head>
  <body>
   <!-- <script type="text/javascript" src="{{ URL::asset('mobile/FBscript.js')}}"></script>-->

    <div data-role="page" id='index' data-theme='b'>
        <div data-role="header">
            <h1>Envios App</h1>
        </div>
        <div role="main" class="ui-content" id='app'>           
          <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="" placeholder="Username" />
            <p></p>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" placeholder="Password" />
            <p></p>
            <a href="#" class="ui-shadow ui-btn ui-corner-all ui-btn-inline" id="login">Login</a>     
        </div>
    </div>

    <div data-role="page" id='selectpage' data-theme='b'>
      <div data-role="header">
        <h1>Envios App Select</h1>
      </div>
      <div role="main" class="ui-content">
        <form>
          <div class="ui-field-contain">
            <label for="dropdown">Ir A:</label>
              <select name="dropdown" id="dropdown">
                <option value="0">Seleccione una Pagina</option>
                <option value="1">articulos</option>
                <option value="2">comercios</option>
                <option value="3">pedidos</option>
                <option value="4">perfil</option>
              </select>
          </div>
        </form>
      </div>
    </div>

    <div data-role="page" id='articulos' data-theme='b'>
      <div data-role="header">
        <h1>Envios App Articulos</h1>
      </div>
      <div role="main" class="ui-content">
        <form>
          <input type="text" data-type="search" id="filterable-input">
        </form>
        <form data-role="controlgroup" data-filter="true" data-input="#filterable-input" id="articulos">      
        </form>
      </div>
    </div>

    <div data-role="page" id='comercios' data-theme='b'>
      <div data-role="header">
        <h1>Envios App Comercios</h1>
      </div>
      <div role="main" class="ui-content">
      </div>
    </div>







</body>
</html>