<li class="{{ Request::is('articulos*') ? 'active' : '' }}">
    <a href="{!! route('frontend.articulos.index') !!}"><i class="fa fa-shopping-cart"></i><span>Lista de Articulos</span></a>
</li>

<li class="{{ Request::is('comercios*') ? 'active' : '' }}">
    <a href="{!! route('frontend.comercios.index') !!}"><i class="fa fa-truck"></i><span>Lista de Comercios</span></a>
</li>

<li class="{{ Request::is('mapacomercios*') ? 'active' : '' }}">
    <a href="{!! route('frontend.comercios.mapeo') !!}"><i class="fa fa-map"></i><span>Mapa de Comercios</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{!! route('frontend.pedidos.index') !!}"><i class="fa fa-search"></i><span>Buscador de Pedidos</span></a>
</li>


