var access_token;
var App = {
  init : function(){
      $(document).ready(function(){
        console.log('estoy en el init');
        User.autenticar();
      });
  },

  dirigir : function(to){
      $("body").pagecontainer("change", to, {transition : 'slide'});
  },

  home: function() {  
  },



};

var User = {
  init : function(){
    $(document).ready(function(){
      $(document).on('click','#login',function(e){
        e.preventDefault();
        User.login();
      });

      $(document).on('click','#registrar',function(e){
        e.preventDefault();
        User.registrar();
      });

      $(document).on('click', '#logout', function(e){
        console.log('entre al logout');
        e.preventDefault();
        User.logout();
      });

      $(document).on('change', '#dropdown',function(e){
        console.log('entre al select');
        //e.preventDefault();
        //if(!selected || selected.length === 0){
          console.log('antes de pagina');
          var pagina = $("#dropdown option:selected").text();
        //var pagina = document.getElementById('dropdown').value.text;
          console.log('despues de pagina', pagina);
          $.mobile.navigate('#'+pagina);
          //App.dirigir('#'+pagina);

        //}
      });

      $('#articulos').on('pageinit',function(){
        var token = sessionStorage.getItem('token');
        $(document).on('pagebeforeshow',function(){        
          $.ajax({
            url : 'http://localhost:8000/api/v1/articulo',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            'success' : function(data) {
              console.log(token);
              var items = [];
              $.each(data, function(key, val){
                var tblRow = "<label for="+val.id+"> id: " + val.id +" stock "+val.stock+" precio  "+val.precio+" <input type='checkbox'   id=" + val.id +">" + "</label>"
                $(tblRow).appendTo("#articulos");
              });
            }
          }); 
        });
      })
      
      $('#comercios').on('pageinit',function(){
        var token = sessionStorage.getItem('token');
        $(document).on('pagebeforeshow',function(){        
          $.ajax({
            url : 'http://localhost:8000/api/v1/comercio',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {
              console.log(token);
              var tblRowTitles = "<label align='center'> Id  Nombre  Dirección   Logo </label>";              
              $('#contenedor').append(tblRowTitles);
              $.each(data, function(key, val){
                var tblRow = "<label align='center' for=" + val.id + ">" + val.id + " " + val.nombre + " " + val.direccion + " <img src='../storage/" + val.logo + "' width='30' height=30'/></label>"
                $('#contenedor').append(tblRow);
              });
            }
          }); 
        });
      })
      
    });
  },

  autenticar : function(){
    var token = sessionStorage.getItem('token');
    if( token == null ) {
      $.mobile.navigate('#index');      
    }
    else{
      User.tokenValido(token);
    }
  },

  tokenValido : function(token){
    console.log('entre al token valido');
    $.ajax({
      url : 'http://localhost:8000/api/v1/articulo',
      type : 'GET',
      headers: {'Authorization': 'Bearer ' + token },
      success : function(data) {
        console.log(data);
        if (data.error){
          alert(data.error);
        }
        else{
          console.log('todo bien');
          $.mobile.navigate('#selectpage');
        }
      },
      error: function(a,b,c) {
                console.log('error');
                console.log(a,b,c);
      },
    });
  },

  login : function(){
    $.ajax({
      type: 'POST',
      url:'http://localhost:8000/api/v1/oauth/access_token',
      data: {username: $('#username').val(),
      password: $('#password').val(),
      grant_type: 'password',
      client_id: 'f3d259ddd3ed8ff3843839b',
      client_secret: '4c7f6f8fa93d59c45502c0ae8c4a95b' },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        sessionStorage.setItem('token', data.access_token);
        var token = sessionStorage.getItem('token');
        console.log(token); 
        $.mobile.navigate('#selectpage');
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
      }
    });
  },

  registrar : function(){

  },

  logout : function(){
    sessionStorage.removeItem('token');
    $.mobile.navigate('#index'); 
  },

  seleccionar : function(){

  },


};

var obj = Object.create(App);
obj.init();
var user = Object.create(User);
user.init();
