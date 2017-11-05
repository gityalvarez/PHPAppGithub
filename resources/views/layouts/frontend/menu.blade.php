<li class="{{ Request::is('articulos*') ? 'active' : '' }}">
    <a href="{!! route('frontend.articulos.index') !!}"><i class="fa fa-eye"></i><span>Ver Lista Articulos</span></a>
</li>

<li class="{{ Request::is('articulos*') ? 'active' : '' }}">
    <a href=""><i class="fa fa-search"></i><span>Buscar Articulos</span></a>
</li>

<li class="{{ Request::is('comercios*') ? 'active' : '' }}">
    <a href="{!! route('frontend.comercios.index') !!}"><i class="fa fa-eye"></i><span>Ver Lista Comercios</span></a>
</li>

<li class="{{ Request::is('comercios*') ? 'active' : '' }}">
    <a href=""><i class="fa fa-eye"></i><span>Ver Mapa Comercios</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href=""><i class="fa fa-search"></i><span>Buscar Pedido</span></a>
</li>


