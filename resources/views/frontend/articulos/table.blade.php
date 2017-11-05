<table class="table table-responsive" id="articulos-table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Categoria</th>
            <th>Comercio</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articulos as $articulo)
        <tr>
            <td>{!! $articulo->producto->codigo !!}</td>
            <td>{!! $articulo->producto->nombre !!}</td>
            <td>{!! $articulo->stock !!}</td>
            <td>{!! $articulo->precio !!}</td>
            <td>{!! $articulo->producto->categoria->nombre !!}</td>
            <td>{!! $articulo->comercio->nombre !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('frontend.articulos.show', [$articulo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>                    
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>