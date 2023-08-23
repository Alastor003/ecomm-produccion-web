@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Categorias')}}</div>
                <div class="card-body">
                @if(Session('status'))
                    <div class="alert alert-success">
                        {{ Session('status') }}
                    </div>
                @endif
                @if(Session('error'))
                        <div class="alert alert-danger">
                            {{ Session('error') }}
                        </div>
                @endif
                    <div class="mb-3">
                        <a href="{{ Route('categorias.create') }}" class="btn btn-primary">Crear Categoria</a>
                    </div>
                    <table class="table table-rounded">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @if($categorias->count() > 0)
                            @foreach($categorias as $key)
                            <tr>
                                <td>{{ $key->nombre }}</td>
                                <td>{{ $key->descripcion }}</td>
                                <td><a href="{{ Route('categorias.show', $key) }}" class="btn btn-primary">Ver Categoria</a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No se han encontrado registros</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $categorias->links() }}
                </div>
            </div>   
        </div>    
    </div>
</div>
@endsection
