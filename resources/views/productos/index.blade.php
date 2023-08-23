@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Productos')}}</div>
                <div class="card-body">
                @if(Session('status'))
                    <div class="alert alert-success">
                        {{ Session('status') }}
                    </div>
                @endif
                    <div class="mb-3">
                        <a href="{{ Route('productos.create') }}" class="btn btn-primary">Agregar</a>
                    </div>
                    <table class="table table-rounded">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Categoria</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @if($productos->count() > 0)
                            @foreach($productos as $key)
                            <tr>
                                <td>{{ $key->nombre }}</td>
                                <td>{{ $key->descripcion }}</td>
                                <td>{{ $key->precio_format() }}</td>
                                <td>{{ $key->categoria->nombre }}</td>
                                <td><a href="{{ Route('productos.show', $key) }}" class="btn btn-primary">Ver Producto</a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No se han encontrado registros</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $productos->links() }}
                </div>
            </div>   
        </div>    
    </div>
</div>
@endsection
