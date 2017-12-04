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
    <script>
      /*
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '497791170577350',
          cookie     : true,
          xfbml      : true,
          version    : 'v2.8'
        });
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
       function statusChangeCallback(response){
         if(response.status === 'connected'){
           console.log('Logged in and authenticated');
           setElements(true);
           testAPI();
         } else {
           console.log('Not authenticated');
           setElements(false);
         }
       }
      function checkLoginState() {
        FB.getLoginStatus(function(response) {
          statusChangeCallback(response);
        });
      }
      function testAPI(){
        FB.api('/me?fields=name,email,birthday,location', function(response){
          if(response && !response.error){
            //console.log(response);
            buildProfile(response);
          }
          FB.api('/me/feed', function(response){
            if(response && !response.error){
              buildFeed(response);
            }
          });
        })
      }
      function buildProfile(user){
        let profile = `
          <h3>${user.name}</h3>
          <ul class="list-group">
            <li class="list-group-item">User ID: ${user.id}</li>
            <li class="list-group-item">Email: ${user.email}</li>
            <li class="list-group-item">Birthday: ${user.birthday}</li>
            <li class="list-group-item">User ID: ${user.location.name}</li>
          </ul>
        `;
        document.getElementById('profile').innerHTML = profile;
      }
      function buildFeed(feed){
        let output = '<h3>Latest Posts</h3>';
        for(let i in feed.data){
          if(feed.data[i].message){
            output += `
              <div class="well">
                ${feed.data[i].message} <span>${feed.data[i].created_time}</span>
              </div>
            `;
          }
        }
        document.getElementById('feed').innerHTML = output;
      }
      function setElements(isLoggedIn){
        if(isLoggedIn){
          document.getElementById('logout').style.display = 'block';
          document.getElementById('profile').style.display = 'block';
          document.getElementById('feed').style.display = 'block';
          document.getElementById('fb-btn').style.display = 'none';
          document.getElementById('heading').style.display = 'none';
        } else {
          document.getElementById('logout').style.display = 'none';
          document.getElementById('profile').style.display = 'none';
          document.getElementById('feed').style.display = 'none';
          document.getElementById('fb-btn').style.display = 'block';
          document.getElementById('heading').style.display = 'block';
        }
      }
      function logout(){
        FB.logout(function(response){
          setElements(false);
        });
      }
      */
    </script>


<script>  
/*
$(document).ready(function() {

    // process the form
    $('loginform').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'name'              : $('input[name=name]').val(),
            'email'             : $('input[name=email]').val(),
            'superheroAlias'    : $('input[name=superheroAlias]').val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : route('api/v1/oauth/access_token'), // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
                        encode          : true
        })
            // using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                console.log(data); 

                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });

});

*/  /*
      $('#loginform').submit(function(){
        var url = $(this).attr("action");
     // jQuery.support.cors = true; 
      $.ajax({ 
        url: url, 
        //crossDomain: true,
        type: 'post',
        //dataType: 'JSONP',
        ContentType:'application/x-www-form-urlencoded',
        data: $("#loginform").serialize(), 
        
        success: function(data){
          if(data.status == 'success'){
              
              console.log('entre con el access token');
             
          }else if(data.status == 'error'){
             alert("Authentication Invalid. Please try again!");
             return false;        
          }
        }
      }); 
    });
    */

   /* $(function(){
      $('#login').click(function(event){
        $.ajax({
          type:'POST',
          url:'http://localhost:8000/api/v1/oauth/access_token',
          contentType: 'application/x-www-form-urlencoded',
          dataType: 'jsonp',
          jsonp: 'callback',
          jsonpCallback: 'jsonpCallback',
          data: {username: $('#username').val(),
                 password: $('#password').val(),
                 grant_type: 'password',
                 client_id: 'f3d259ddd3ed8ff3843839b',
                 client_secret: '4c7f6f8fa93d59c45502c0ae8c4a95b' },
          success: function(datos){
            localStorage.setItem('token',token);
            console.log(datos);
           // $.simpleStorage.set('nombre',datos.firstname);
            $.mobile.changePage('articulos',{transition: 'slideup'});
            
          }
        });
      });

      function jsonpCallback(data){
        alert("entre al jsonpCallback");
      }
    })

*/
/*
$(function(){
    $('#login').click(function(event){
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
            var nextlink = 'articulos';
            $("body").pagecontainer("change", nextlink, {transition : 'slide'}); 
        },
      });
    });
})
*/


  </script> 

  

    <div data-role="page" id='index' data-theme='b'>
        <div data-role="header">
            <h1>Envios App</h1>
        </div>
        <div role="main" class="ui-content" id='app'>
           <!-- 
            <form id='loginform' action='http://localhost:8000/api/v1/oauth/access_token' method='post' enctype='application/x-www-form-urlencoded'>-->
              <!--<form id='loginform' action='http://localhost:8000/api/v1/oauth/access_token' method='post'>
              <div data-role="fieldcontain" class="ui-hide-label">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="" placeholder="Username" />
              </div>

              <div data-role="fieldcontain" class="ui-hide-label">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="" placeholder="Password" />
              </div>
              <div data-role="fieldcontain" class="ui-hide-label">
                <input  id="grant_type" name="grant_type" value="password"  />
              </div>
              <div data-role="fieldcontain" class="ui-hide-label">
                <input  id="client_id" name="client_id" value="f3d259ddd3ed8ff3843839b"  />
              </div>
              <div data-role="fieldcontain" class="ui-hide-label">
                <input  id="client_secret" name="client_secret" value="4c7f6f8fa93d59c45502c0ae8c4a95b"  />
              </div>
              <input type="submit" value="Login">
             </form> 
            


            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="" placeholder="Username" />

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="" placeholder="Password" />
            <a href='#' class='ui-shadow ui-btn ui-corner-all ui-btn-inline' id='login'>Login</a>

            <h2><b>No tienes cuenta?</b></h2>
            <a href='#' class='ui-shadow ui-btn ui-corner-all ui-btn-inline' id='registro'>Registrar</a>
            <p></p>
            <a href='#' class='ui-shadow ui-btn ui-corner-all ui-btn-inline' id='registro'>Logout</a>
            
            <h2><b>Ingresar con Facebook</b></h2>
            <fb:login-button 
            id="fb-btn" scope="public_profile,email,user_birthday,user_location,user_posts" onlogin="checkLoginState();">
            </fb:login-button>
            -->
            <p></p>
        </div>
    </div>
</body>
</html>
















<!--
<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SocialAuth</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a id="logout" href="#" onclick="logout()">Logout</a></li>
            <fb:login-button
              id="fb-btn"
              scope="public_profile,email,user_birthday,user_location,user_posts"
              onlogin="checkLoginState();">
            </fb:login-button>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <h3 id="heading">Log in to view your profile</h3>
      <div id="profile"></div>
      <div id="feed"></div>
    </div>


  </body>
</html>

-->








