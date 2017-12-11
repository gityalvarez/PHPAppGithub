$(document).ready(function() { 
	// jQuery is properly loaded at this point
	// so proceed to bind the Cordova's deviceready event
	//app.readPosts();
	console.log('on ready');
	$(document).on('pageinit', app.onDeviceReady); 
});

var app = {
	onDeviceReady: function() {
		console.log('onDeviceReady');
		app.autenticar();
	},

	autenticar : function(){
		console.log('autenticar');
    	var token = sessionStorage.getItem('token');
    	if( token == null ) {
    		console.log('token nulo');
      		app.index();    
    	}
    	else{
    		console.log('token no nulo');
      		app.tokenValido(token);
    	}
  	},

  	tokenValido : function(token){
	    console.log('entre al token valido');
	    $.ajax({
	      url : 'http://localhost:8000/api/v1/articulo',
	      type : 'GET',
	      headers: {'Authorization': 'Bearer ' + token },
	      success : app.success,
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
	        app.success();
	      },
	      error: function (xhr, ajaxOptions, thrownError) {
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

  logout : function(){
    sessionStorage.removeItem('token');
    $.mobile.navigate('#index'); 
  },

  success: function(){ 	

  	$(document).on('click', '#logout', function(e){
        console.log('entre al logout');
        e.preventDefault();
        app.logout();
      });

  	$(document).on('change', '#dropdown',function(e){
        console.log('entre al select');
        console.log('antes de pagina');
        var pagina = $("#dropdown option:selected").text();
        console.log('despues de pagina', pagina);
        $.mobile.navigate('#'+pagina);
    });

  	$(document).on('pageinit','#articulos',function(){
        var token = sessionStorage.getItem('token');
        $(document).on('pagebeforeshow',function(){        
          $.ajax({
            url : 'http://localhost:8000/api/v1/articulo',
            type : 'GET',
            headers: {'Authorization': 'Bearer ' + token },
            'success' : function(data) {
              console.log(token);
              //var items = [];
              var output = '';
              $.each(data, function(key, val){
                output += '<li> <img src="http://localhost:8000/storage/'+val.imagen+'">' + val.nombre +' $'+ val.precio + '</li>';
              });
              $('#articulos2').html(output).listview("refresh");
            }
          }); 
        });
    }),

    $(document).on('pageinit','#comercios',function(){
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
    });      
  },


  index: function(){
  	console.log('en el index');
  	$(document).on('pagebefore','#loginpage',function(){
  		console.log('estoy en el loginpage');
    	$(document).on('click','#login',function(e){
        	e.preventDefault();
        	app.login();
     	});

    });
    $(document).on('pageinit','#registrarpage',function(){
    	$(document).on('click','#registrar2',function(){
        //e.preventDefault();
        app.registrar();
      });
    });
  }
}



