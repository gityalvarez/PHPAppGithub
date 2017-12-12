@role('admin')
<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('backend.categorias.index') !!}"><i class="fa fa-tags"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('comercios*') ? 'active' : '' }}">
    <a href="{!! route('backend.comercios.index') !!}"><i class="fa fa-truck"></i><span>Comercios</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('backend.productos.index') !!}"><i class="fa fa-shopping-cart"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('entrust-gui::users.index') !!}"><i class="fa fa-user-circle"></i><span>Usuarios</span></a>
</li>
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('entrust-gui::roles.index') !!}"><i class="fa fa-id-card"></i><span>Roles</span></a>
</li>
<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('entrust-gui::permissions.index') !!}"><i class="fa fa-lock"></i><span>Permisos</span></a>
</li>


@endrole
@role('gerente')
<li class="{{ Request::is('articulos*') ? 'active' : '' }}">
    <a href="{!! route('backend.articulos.index') !!}"><i class="fa fa-edit"></i><span>Articulos</span></a>
</li>
@endrole

@role(['gerente','despachador'])
<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{!! route('backend.pedidos.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>
@endrole
