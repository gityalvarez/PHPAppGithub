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

      $(document).on('click','#registrar2',function(){
        //e.preventDefault();
        User.registrar();
      });
      
      $(document).on('click','#registrarpedido',function(){
        //e.preventDefault();
        User.registrarpedido();
      });

      $(document).on('click', '#logout', function(e){
        console.log('entre al logout');
        e.preventDefault();
        User.logout();
      });




      /*
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
      */

      $('#articulos').on('pageinit',function(){
        $(document).on('pagebeforeshow',function(){        
          var token = sessionStorage.getItem('token');
          $.ajax({
            url : 'http://localhost:8000/api/v1/articulo',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {
              console.log(token);
              var output = '';              
              $.each(data, function(key, val){
                //var tblRow = "<label for="+val.id+"> id: " + val.id +" nombre "+val.nombre+"stock "+val.stock+" precio  "+val.precio+"<input type='checkbox'   id=" + val.id +">" + "</label>"
                //$(tblRow).appendTo("#articulos");
                output += '<li><img src="../storage/' + val.imagen + '">' + val.nombre + '<input type="hidden" name="precios[]" class="precios" value=' + val.precio +'>' + ' $' + val.precio + '<input type="hidden" name="stocks[]" class="stocks" value=' + val.stock + '>' + '<input type="checkbox" name="articulos[]" class="articulos" value=' + val.id + '>' + '<input type="text" name="cantidades[]" class="cantidades" min="1">' +'</li>';
              });
              $('#articulos2').html(output).listview("refresh");
            }
          }); 
        });
      });
      
      $('#comercios').on('pageinit',function(){
        $(document).on('pagebeforeshow',function(){        
          var token = sessionStorage.getItem('token');
          $.ajax({
            url : 'http://localhost:8000/api/v1/comercio',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {
              console.log(token);
              var divmapa ="<div id='mapid' style='height: 300px;'></div>";
              $('#contenedor').append(divmapa);//fin y comienzo de la tabla
              var tblRowTitles = "<label align='center'> Id  Nombre  Dirección   Logo </label>";              
              $('#contenedor').append(tblRowTitles);
              $.each(data, function(key, val){
                var tblRow = "<label align='center' for=" + val.id + ">" + val.id + " " + val.nombre + " " + val.direccion + " <img src='../storage/" + val.logo + "' width='30' height=30'/></label>"
                $('#contenedor').append(tblRow);
              });

              var mymap = L.map('mapid').locate({setView: true, maxZoom: 16});
              L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',
                 {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
               }).addTo(mymap);

              $.each(data, function(key, val){
                 var marker = L.marker([val.latitud,val.longitud]).addTo(mymap).bindPopup("<p>"+val.nombre+"</p><br />"+val.direccion);  
 
                 
               });//end del each marker

            }
          }); 
        });
      });

      $('#pedidos').on('pageinit',function(){
        //var email = sessionStorage.getItem('email');  
        var token = sessionStorage.getItem('token');
        $(document).on('pagebeforeshow',function(){        
          $.ajax({
            //url : 'http://localhost:8000/api/v1/pedido?email='+email,
            url : 'http://localhost:8000/api/v1/pedido',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {
              console.log(token);
              console.log(data);               
              var output = '';
              $.each(data, function(key, val){
                output += '<li>' + val.id + ' $' + val.total + ' ' + val.created_at + ' ' + val.estado + '<input type="button" value="Ver"/>' + '</li>';
              });
              $('#listapedidos').html(output).listview("refresh");
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.responseText);
            }
          }); 
        });
      });
      
      $('#perfil').on('pageinit',function(){
        $(document).on('pagebeforeshow',function(){        
          var token = sessionStorage.getItem('token');
          $.ajax({
            url : 'http://localhost:8000/api/v1/user/perfil',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {
              console.log(token);
              console.log(data);
              var output = '';
              output += '<li> Nombre: ' + data.name +'</li>'+'<li>Email:  ' + data.email +'</li>'+'<li>Direccion:  ' + data.direccion +'</li>';
              $('#listaperfil').html(output).listview("refresh");              
            }
          }); 
        });
      });      
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
          $.mobile.navigate('#articulos');
        }
      },
      error: function(a,b,c) {
                console.log('error');
                console.log(a,b,c);
      },
    });
  },

  login : function(){
    //sessionStorage.setItem('email', $('#username').val()); 
    $.ajax({
      type: 'POST',
      url:'http://localhost:8000/api/v1/oauth/access_token',
      data: {
          username: $('#username').val(),
          password: $('#password').val(),
          grant_type: 'password',
          client_id: 'f3d259ddd3ed8ff3843839b',
          client_secret: '4c7f6f8fa93d59c45502c0ae8c4a95b'
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        sessionStorage.setItem('token', data.access_token);
        var token = sessionStorage.getItem('token');
        //var email = sessionStorage.getItem('email');
        console.log(token);
        console.log(email);
        $.mobile.navigate('#articulos');
      },
      error: function (xhr, ajaxOptions, thrownError) {
        //sessionStorage.removeItem('email');  
        alert(xhr.responseText);
      }
    });
  },

  registrar : function(){
    $.ajax({
      type: 'POST',
      url:'http://localhost:8000/api/v1/registrar',
      data: {
        "nombre": $('#nombre').val(),
        "email": $('#email').val(),
        "password": $('#password2').val(),
        "direccion": $('#calle').val(),
        "latitud": -356987,
        "longitud": -56897 },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        $.mobile.navigate('#index'); 
      },
      error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
      }
    });
  },
  
  registrarpedido: function(){
    var token = sessionStorage.getItem('token');         
    console.log('Entro a registrarpedido');
    var i=0;
    var form = $('#form').find( "input[name='articulos[]']" ).val();
    console.log('Articulos: ' + form);
    //console.log('Articulos: ' + $('input:hidden.articulos')[i]);
    console.log('Stocks: ' + $('input:hidden.stocks'));
    var articulos = $('input:hidden.articulos').serialize();
    var stocks = $('input:hidden.stocks').serialize();
    var precios = $('input:hidden.precios').serialize();
    var cantidades = $('input:text.cantidades').serialize();
    $.ajax({
      url : 'http://localhost:8000/api/v1/pedido/registrar',
      type : 'POST',
      headers: {'Authorization': 'Bearer ' + token },
      data: {
        articulos: articulos,
        stocks: stocks,
        precios: precios,
        cantidades: cantidades                
      },
      dataType: 'json',         
      success : function(data) {
        console.log(data);
        alert("Pedido realizado con exito!!");
      },
      error: function(xhr, ajaxOptions, thrownError, data) {
        console.log("Datos: " + data);
        alert(xhr.responseText);
      }
    });
  },

  logout : function(){
    sessionStorage.removeItem('token');
    //sessionStorage.removeItem('email');
    sessionStorage.clear();
    var token = null;
    //var email = null;
    $.mobile.navigate('#index'); 
  },

};

var obj = Object.create(App);
obj.init();
var user = Object.create(User);
user.init();
