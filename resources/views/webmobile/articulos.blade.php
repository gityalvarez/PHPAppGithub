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
	<title></title>
</head>
<body>
	<script>
	$(document).ready(function(){
  		$.ajax({
    		'url' : 'http://localhost:8000/api/v1/articulo',
    		'type' : 'GET',
    		'success' : function(data) {
    			var items = [];
				$.each(data, function(key, val){
					var tblRow = "<label for="+val.id+"> id: " + val.id +" stock "+val.stock+" precio  "+val.precio+" <input type='checkbox'   id=" + val.id +">" + "</label>"
          			$(tblRow).appendTo("#articulos");
     			});
			}				
    	});
  	});
	</script>	
<div data-role="page" data-theme='b'>
	<div data-role="header">
        <h1>Envios App</h1>
    </div>

    <div role="main" class="ui-content">
        <form>
		  	<input type="text" data-type="search" id="filterable-input">
		</form>

		<form data-role="controlgroup" data-filter="true" data-input="#filterable-input" id="articulos">			
		</form>
	</div>
</div>   
</body>
</html>