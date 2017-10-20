<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('backend.categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('comercios*') ? 'active' : '' }}">
    <a href="{!! route('backend.comercios.index') !!}"><i class="fa fa-edit"></i><span>Comercios</span></a>
</li>

<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('backend.productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('articulos*') ? 'active' : '' }}">
    <a href="{!! route('backend.articulos.index') !!}"><i class="fa fa-edit"></i><span>Articulos</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{!! route('backend.pedidos.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>
