<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('backend.categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('personas*') ? 'active' : '' }}">
    <a href="{!! route('backend.personas.index') !!}"><i class="fa fa-edit"></i><span>Personas</span></a>
</li>

<li class="{{ Request::is('comercios*') ? 'active' : '' }}">
    <a href="{!! route('backend.comercios.index') !!}"><i class="fa fa-edit"></i><span>Comercios</span></a>
</li>

