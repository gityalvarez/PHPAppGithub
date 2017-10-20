<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
    <label for="name">Name</label>
    <input type="name" class="form-control" id="name" placeholder="Name" name="name" value="{{ (Session::has('errors')) ? old('name', '') : $user->name }}">
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ (Session::has('errors')) ? old('email', '') : $user->email }}">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
    @if(Route::currentRouteName() == 'entrust-gui::users.edit')
        <div class="alert alert-info">
          <span class="fa fa-info-circle"></span> Leave the password field blank if you wish to keep it the same.
        </div>
    @endif
</div>
@if(Config::get('entrust-gui.confirmable') === true)
<div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
</div>
@endif
<div class="form-group">
    <label for="direccion">Address</label>
    <input type="name" class="form-control" id="direccion" placeholder="Address" name="direccion" value="{{ (Session::has('errors')) ? old('direccion', '') : $user->direccion }}">
</div>
<div class="form-group">
    <label for="latitud">Latitude</label>
    <input type="name" class="form-control" id="latitud" placeholder="Latitude" name="latitud" value="{{ (Session::has('errors')) ? old('latitud', '') : $user->latitud }}">
</div>
<div class="form-group">
    <label for="longitud">Longitude</label>
    <input type="name" class="form-control" id="longitud" placeholder="Longitude" name="longitud" value="{{ (Session::has('errors')) ? old('longitud', '') : $user->longitud }}">
</div>
<div class="form-group">
    <label for="roles">Roles</label>
    <select name="roles[]" id="roles" multiple class="form-control">
        @foreach($roles as $index => $role)
            <option value="{{ $index }}" {{ ((in_array($index, old('roles', []))) || ( ! Session::has('errors') && $user->roles->contains('id', $index))) ? 'selected' : '' }}>{{ $role }}</option>
        @endforeach
    </select>
</div>
