var token;
var App = {
  init : function(){
      $(document).ready(function(){
        console.log('estoy en el init');
        token = sessionStorage.getItem('token');
        User.autenticar(token);
      });
  },


};

var User = {
  init : function(){
    $(document).ready(function(){
      
      $(document).on('click','#registrar2',function(){
        //e.preventDefault();
        User.registrar();
      });
      
      $(document).on('click','#registrarpedido',function(){
        //e.preventDefault();
        User.registrarpedido();
      });
      
      $(document).on('click','.verarticulos',function(){
        var pedidoid = $(this).attr("value");
        User.verarticulos(pedidoid);
      });

      $(document).on('click', '#logout', function(e){
        console.log('entre al logout');
        e.preventDefault();
        User.logout();
      });

      $('#loginpage').on('pageinit',function(){
          $("#loginform").validate({
            rules: {
              username: {
                required: true,
                email: true
              },
              password: {
                required: true,
                minlength: 5
              }
            },
            // Specify validation error messages
            messages: {
              password: {
                required: "El password no puede ser vacío",
                minlength: "El password debe ser mayor a 5 caracteres"
              },
              username: {
                required: "El username no puede ser vacío",
                email: "Digite un email válido por favor"
              },
            },
            submitHandler: function(form) {
              User.login();
            }
          });
      });

      $('#registrarpage').on('pageinit',function(){
          $("#registrarform").validate({
            rules: {
              email: {
                required: true,
                email: true
              },
              password2: {
                required: true,
                minlength: 5
              },
              nombre: {
                required: true
              },
              calle: {
                required: true
              },
              nopuerta: {
                required: true
              },
            },
            // Specify validation error messages
            messages: {
              password2: {
                required: "El password no puede ser vacío",
                minlength: "El password debe ser mayor a 5 caracteres"
              },
              email: {
                required: "El email no puede ser vacío",
                email: "Digite un email válido por favor"
              },
              nombre: "El nombre no puede ser vacío",
              calle: "La calle no puede ser vacía",
              nopuerta: "El número de puerta no puede ser vacío",

            },
            submitHandler: function(form) {
              User.registrar();
            }
          });
      });


      $('#articulos').on('pageinit',function(){
               
          token = sessionStorage.getItem('token');
          $.ajax({
            url : 'http://localhost:8000/api/v1/articulo',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {
              console.log('token' + token);
              console.log('data length  '+ data.length);
              var output = '';
              $.each(data, function(key, val){
                output += '<li class="articulo" id='+ val.id +'>'
                + '<a href="#">' + '<img src="../storage/' + val.imagen + '">'
                + '<div style="width:36px; margin-right:10px; float:left;" class="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">'
                + '<input type="number" name="cantidades[]" pattern="[0-9]*" class="cantidades" id="cant'+val.id+'" min="0" value="0"></div>'
                + '<span style="vertical-align:-webkit-baseline-middle"><b>' + val.nombre + '</b>'
                + ' <br><small style="font-weight:lighter;">$' + val.precio + ' Stock: ' + val.stock + '</small>' + '</span></a>'
                + '<a href="#" class="vaciar"></a>'
                + '<input type="hidden" name="articulos[]" value=' + val.id +'>'
                + '<input type="hidden" name="precios[]" value=' + val.precio +'>'
                + '<input type="hidden" name="stocks[]" value=' + val.stock + '>'
                + '</li>';
                //output += '<li id='+val.id+'><img src="../storage/' + val.imagen + '">' + val.nombre + '<input type="hidden" id="precio" class="precio" value=' + val.precio +'>' + ' $' + val.precio + '<input type="hidden" id="stock" class="stock" value=' + val.stock + '><p class="spin">cantidad: <span> 0</span></p>' +'</li>';
              });
              $('#articulos2').html(output).listview("refresh");

              $('.articulo').on('click', function(evento){
                if (!evento.target.className.includes("cantidades")) {
                  var $this = $(this);
                  var $input = $this.find('.cantidades');
                  var value = parseInt($input.val());
                  if (!evento.target.className.includes("vaciar")) {$input.val(++value);}
                  else {$input.val(0);}
                }
              });
              //se crea una tabla cantidad y un json, despues vemos qué se ajusta más
              /*var cantidad = new Array(data.length);
              cantidad.fill(0);
              //var json = {};
              var count = 0;
              var id;
              $( ".spin" ).each(function() {    //al hacer click en cantidad se activa la funcion
                var spin = $( this );
                var count = 0;
                spin.click(function() {
                  id = $( this ).closest('li').attr('id');    //se toma el id del articulo
                  stock = $(this).prev().attr('value');       //se toma el stock del articulo
                  precio = $(this).prev().prev().attr('value');   //se toma el precio del articul
                  count++;
                  //se muestra la cantidad en pantalla (falta perfeccionar el spin, boton de más y de menos por ejemplo)
                  //así como la funcion de restar, que va a ser similar 

                  spin.find( "span" ).text(count ); 
                  cantidad[id-1]=count;       //se agrega la cantidad al arreglo cantidad
                  //json[id]={};              //se rellena el json con todos los datos
                  //json[id].id = id;
                  //json[id].cantidad = count;
                  //json[id].stock = stock;
                  //json[id].precio = precio;
                  
                });
              });*/
            }
          });         
      });
      
      $('#comercios').on('pageinit',function(){
                      
        token = sessionStorage.getItem('token');
        $.ajax({
          url : 'http://localhost:8000/api/v1/comercio',
          type : 'GET',
          headers: {'Authorization': 'Bearer ' + token },
          success : function(data) {
            console.log(token);
            console.log("Datos de comercios");
            console.log(data);
            var output = '';
            $.each(data, function(key, val){
              output += '<li data-icon="location"><a style="display:flex;align-items:center;" href="#" class ="listacomercios" id="comercio'+key+'" data-latitud='+val.latitud+' data-longitud='+val.longitud+'><img style="top:auto;" src="../storage/' + val.logo + '">'+'    ' + val.nombre +'</a></li>';
               });
            $('#comercios2').html(output).listview("refresh");
            var mymap = L.map('mapid').setView([-34.866944, -56.166667], 11);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png',
               {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
             }).addTo(mymap);

            $.each(data, function(key, val){
               var marker = L.marker([val.latitud,val.longitud]).addTo(mymap).bindPopup("<p>"+val.nombre+"</p><br />"+val.direccion);  
              });//end del each marker

            
            $('.listacomercios').on('click',  function(evento){
               console.log(evento.target.dataset.latitud);
                mymap.setView([evento.target.dataset.latitud, evento.target.dataset.longitud], 16);
            });
             $('.listacomercios').on('dblclick',  function(evento){
               console.log(evento.target.dataset.latitud);
                mymap.setView([-34.866944, -56.166667], 11);
            });           
           
          }
        }); 
        
      });

      $('#pedidos').on('pageinit',function(){
        //var email = sessionStorage.getItem('email');  
        token = sessionStorage.getItem('token');
               
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
                output += '<li data-icon="eye" class="verarticulos" value='+ val.id + '><a href="#">' + val.id + ' $' + val.total + ' ' + val.created_at + ' ' + val.estado + '</li>';
              });
              $('#listapedidos').html(output).listview("refresh");
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.responseText);
            }
          }); 
        
      });
      
      $('#articulospedido').on('pageinit',function(){
          token = sessionStorage.getItem('token');
          var pedidoid = sessionStorage.getItem('idpedido');
          $.ajax({
            url : 'http://localhost:8000/api/v1/pedido/articulos/'+pedidoid,
            type : 'GET',
            dataType: 'json',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {   
              sessionStorage.removeItem('idpedido');  
              var output = '';
              console.log(data);
              $.each(data, function(key, val){
                 output += '<li style="display:flex;align-items:center;">' /*<img style="top:auto;" src="../storage/' + val.imagen + '">' + val.nombre*/ + ' $' + val.precio + ' #' + val.stock + '</li>';
              });
              $('#listarticulospedido').html(output).listview("refresh"); 
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.responseText);
            }
          });                  
      });       
     
      $('#perfil').on('pageinit',function(){          
          token = sessionStorage.getItem('token');
          $.ajax({
            url : 'http://localhost:8000/api/v1/user/perfil',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            success : function(data) {
              console.log(token);
              console.log(data);
              var output = '';
              output += '<li data-role="list-divider">Nombre</li> <li>'+
                        data.name +'</li>'+
                        '<li data-role="list-divider">Email</li> <li>'+
                        data.email +'</li>'+
                        '<li data-role="list-divider">Dirección</li> <li>'+
                        data.direccion +'</li>';
              $('#listaperfil').html(output).listview("refresh");              
            }
          }); 
        
      });      
    });
  },

  autenticar : function(token){
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
                sessionStorage.removeItem('token');
                //sessionStorage.removeItem('email');
                sessionStorage.clear();
                token = null;
                //var email = null;
                $.mobile.navigate('#index'); 
                location.reload();
      },
    });
  },

  login : function(){
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
        token = sessionStorage.getItem('token');
        //var email = sessionStorage.getItem('email');
        console.log(token);
        //console.log(email);
        $.mobile.navigate('#articulos');
      },
      error: function (xhr, ajaxOptions, thrownError) {
        var jsonResponse = JSON.parse(xhr.responseText);
        $('#errorlogin').html(jsonResponse['error']+'</br>'+jsonResponse['error_description']);
        
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
        "direccion": $('#calle').attr("data-direccion"),
        "latitud": $('#calle').attr("data-latitud"),
        "longitud": $('#calle').attr("data-longitud"), },
      dataType: 'json',
      success: function (xhr, ajaxOptions, thrownError) {
        //alert(thrownError.statusText);
        //console.log('success '+thrownError.statusText);
        //console.log('success '+thrownError.responseText);
        if (thrownError.statusText=='Accepted'){
            //var jsonResponse = JSON.parse(thrownError.responseText);
            $('#errorregistrar').html(thrownError.responseText);
            
        }else{
          $.mobile.navigate('#loginpage');           
        }
      },
      error: function (xhr, ajaxOptions, thrownError) {
        //sessionStorage.removeItem('email');  
        //alert('error '+xhr.responseText);
        //console.log('error '+xhr);
        //var jsonResponse = JSON.parse(xhr);
        console.log(jsonResponse);
        $('#errorregistrar').html(thrownError.responseText);
      }
    });
  },
  
  registrarpedido: function(){
    token = sessionStorage.getItem('token');         
    console.log('Entro a registrarpedido');
    var stocks = [];
    var precios = [];
    var articulos = [];
    var cantidades = [];
    $("input[name='cantidades[]']").each(function() {
        cantidades.push(this.value);
    });
    $("input[name='articulos[]']").each(function() {
        articulos.push(this.value);
    });
    $("input[name='precios[]']").each(function() {
        precios.push(this.value);
    });  
    $("input[name='stocks[]']").each(function() {
        stocks.push(this.value);
    }); 
    var articulos_json = JSON.stringify(articulos);
    var cantidades_json = JSON.stringify(cantidades);
    var precios_json = JSON.stringify(precios);
    var stocks_json = JSON.stringify(stocks);
    console.log(articulos_json);
    console.log(cantidades_json);
    console.log(precios_json);
    $.ajax({
      url : 'http://localhost:8000/api/v1/pedido/registrar',
      type : 'POST',
      headers: {'Authorization': 'Bearer ' + token },
      data: {
           articulos : articulos_json,
           cantidades : cantidades_json,
           stocks : stocks_json,
           precios : precios_json
      },
      dataType: 'json', 
      success : function(data) {
        console.log(data.cantidades);
        alert(data);
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(xhr.responseText);
      }
    });
  },
  
  verarticulos : function(pedidoid){
    console.log('entre ver articulos pedido');
    console.log('idpedido: ' + pedidoid);
    sessionStorage.setItem('idpedido', pedidoid);
    $.mobile.navigate('#articulospedido');     
  },

  logout : function(){
    sessionStorage.removeItem('token');
    //sessionStorage.removeItem('email');
    sessionStorage.clear();
    token = null;
    //var email = null;
    $.mobile.navigate('#index'); 
    location.reload();
  },

};

var obj = Object.create(App);
obj.init();
var user = Object.create(User);
user.init();
