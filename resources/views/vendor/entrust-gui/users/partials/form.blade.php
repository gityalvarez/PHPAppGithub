

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" value="{{ (Session::has('errors')) ? old('name', '') : $user->name }}">
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ (Session::has('errors')) ? old('email', '') : $user->email }}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
    @if(Route::currentRouteName() == 'entrust-gui::users.edit')
        <div class="alert alert-info" id="aviso">
          <span class="fa fa-info-circle"></span> Deja la contraseña en blanco si quieres conservar la misma.
        </div>
    @endif
</div>
@if(Config::get('entrust-gui.confirmable') === true)
<div class="form-group">
    <label for="password">Confirmar Contraseña</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
</div>
@endif
<div class="form-group">
    <label for="calle">Calle o Avenida</label>
    <input type="text" class="form-control" id="calle" placeholder="nombre de la calle" name="calle" value="" onchange="geolocalizar()">
</div>

<div class="form-group">
    <label for="puerta">Número de Puerta</label>
    <input type="text" class="form-control" id="nopuerta" placeholder="puerta" name="puerta" value="" onchange="geolocalizar()" >
</div>
<div class="form-group hidden">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" placeholder="Direccion" name="direccion" value="{{ (Session::has('errors')) ? old('direccion', '') : $user->direccion }}" >
</div>
<div class="form-group hidden">
    <label for="latitud">Latitud</label>
    <input type="text" class="form-control" id="latitud" placeholder="Latitud" name="latitud" value="{{ (Session::has('errors')) ? old('latitud', '') : $user->latitud }}">
</div>
<div class="form-group hidden">
    <label for="longitud">Longitud</label>
    <input type="text" class="form-control" id="longitud" placeholder="Longitud" name="longitud" value="{{ (Session::has('errors')) ? old('longitud', '') : $user->longitud }}" >
</div>


<div class="form-group">
    <label for="roles">Roles</label>
    <select name="roles[]" id="roles" class="form-control">
        @foreach($roles as $index => $role)
            <option value="{{ $index }}" {{ ((in_array($index, old('roles', []))) || ( ! Session::has('errors') && $user->roles->contains('id', $index))) ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach
    </select>
</div>

<script type="text/javascript">
 @if(Route::currentRouteName() == 'entrust-gui::users.edit')
    document.getElementById("aviso").onload = recuperadir();
@endif
    function recuperadir(){
        var dir ="{{ (Session::has('errors')) ? old('direccion', '') : $user->direccion }}"
      console.log(dir);
    var arr = dir.split(",");
    document.getElementById("nopuerta").value =arr[0];
    document.getElementById("calle").value=arr[1];
    }
    
    function geolocalizar() {

    console.log( document.getElementById("direccion").value);
    var dircomp = document.getElementById("nopuerta").value + ", "+ document.getElementById("calle").value + ", montevideo, uruguay";
    inp =encodeURI(dircomp);
    console.log(inp);
    $.getJSON('http://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + inp, function(data) {
        var items = {lati:'',long:''};

        $.each(data, function(key, val) {
            items['lati'] = val.lat;
            items['long']= val.lon;
        });
     document.getElementById("direccion").value = dircomp;
     document.getElementById("latitud").value = items['lati'];
     document.getElementById("longitud").value = items['long'];

     });

}

</script>