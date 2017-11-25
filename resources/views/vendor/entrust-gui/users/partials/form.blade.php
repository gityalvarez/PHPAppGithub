<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="name" class="form-control" id="name" placeholder="Nombre" name="name" value="{{ (Session::has('errors')) ? old('name', '') : $user->name }}">
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
        <div class="alert alert-info">
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
    <label for="direccion">Direccion</label>
    <input type="name" class="form-control" id="direccion" placeholder="Direccion" name="direccion" value="{{ (Session::has('errors')) ? old('direccion', '') : $user->direccion }}">
</div>
<div class="form-group">
    <label for="latitud">Latitud</label>
    <input type="name" class="form-control" id="latitud" placeholder="Latitud" name="latitud" value="{{ (Session::has('errors')) ? old('latitud', '') : $user->latitud }}">
</div>
<div class="form-group">
    <label for="longitud">Longitud</label>
    <input type="name" class="form-control" id="longitud" placeholder="Longitud" name="longitud" value="{{ (Session::has('errors')) ? old('longitud', '') : $user->longitud }}">
</div>
<div class="form-group">
    <label for="roles">Roles</label>
    <select name="roles[]" id="roles" multiple class="form-control">
        @foreach($roles as $index => $role)
            <option value="{{ $index }}" {{ ((in_array($index, old('roles', []))) || ( ! Session::has('errors') && $user->roles->contains('id', $index))) ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach
    </select>
</div>
