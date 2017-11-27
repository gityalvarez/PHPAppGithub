
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
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <style media="screen">
      #fb-btn{margin-top:20px;}
      #profile, #logout, #feed{display:none}
    </style>
  </head>
  <body>
    <script>
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
    </script>
    <script>

      $("#loginForm").submit(function(e) {

        var url = "http://localhost:8000/api/v1/oauth/access_token"; // the script where you handle the form input.

        $.ajax({
           type: "POST",
           url: url,
           data: $("#loginForm").serialize(), // serializes the form's elements.
           success: function(data)
            {
                alert(data); // show response from the php script.
            }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });



/*




      $('#loginForm').submit(function(){
      e.preventDefault();
      jQuery.support.cors = true; 
      $.ajax({ 
        url: 'http://localhost:8000/api/v1/oauth/access_token.php',
        crossDomain: true,
        type: 'post',
        contentType: "application/x-www-form-urlencoded",
        data: $("#loginForm").serialize(), 
        success: function(data){
          if(data.status == 'success'){
              alert("Uruguay nomaaaaaa");
             //window.location.href = 'http://www.test.com/mobile/main.html'; 
          }else if(data.status == 'error'){
             alert("Authentication Invalid. Please try again!");
             return false;        
          }

        }
      }); 

    });
    */ 
  </script>


    <div data-role="page" data-theme='b'>
        <div data-role="header">
            <h1>Envios App</h1>
        </div>

        <div role="main" class="ui-content">
            <h1 >Bienvenido!</h1>
            <h2><b>Usuario Registrado</b></h2>
            <form id='loginform'>
              <div data-role="fieldcontain" class="ui-hide-label">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="" placeholder="Username" />
              </div>

              <div data-role="fieldcontain" class="ui-hide-label">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" value="" placeholder="Password" />
              </div>
              <div data-role="fieldcontain" class="ui-hide-label">
                <input  id="grant_type" value="password"  />
              </div>
              <div data-role="fieldcontain" class="ui-hide-label hidden">
                <input  id="client_id" value="f3d259ddd3ed8ff3843839b"  />
              </div>
              <div data-role="fieldcontain" class="ui-hide-label hidden">
                <input  id="client_secret" value="4c7f6f8fa93d59c45502c0ae8c4a95b"  />
              </div>


              <input type="submit" value="Login" id="submitButton">
             </form> 
            <h2><b>No tienes cuenta?</b></h2>
            <button data-theme="b" class="ui-btn-hidden" id='registrar' data-disabled="false">Registrarse</button>
            <h2><b>Ingresar con Facebook</b></h2>
            <fb:login-button 
            id="fb-btn" scope="public_profile,email,user_birthday,user_location,user_posts" onlogin="checkLoginState();">
            </fb:login-button>
            <a id="logout" href="#" onclick="logout()">Logout</a>
            <p></p>
        </div>
    </div>
</body>
















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








