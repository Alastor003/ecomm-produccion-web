@extends('administracion')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Casilla de mensajes')}}</div>
                <div class="card-body">
                @if(Session('status'))
                    <div class="alert alert-success">
                        {{ Session('status') }}
                    </div>
                @endif
                    <table class="table table-rounded">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Mensaje</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @if($mensajes->count() > 0)
                            @foreach($mensajes as $key)
                            <tr>
                                <td>{{ $key->nombre }}</td>
                                <td>{{ $key->correo }}</td>
                                <td>{{ $key->telefono }}</td>
                                <td>{{ $key->mensaje }}</td>
                                <td><a href="{{ Route('mensajes.show', $key) }}" class="btn btn-primary">Ver Mensaje</a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No se han encontrado registros</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                     {{ $mensajes->links() }}
                </div>
            </div>   
        </div>    
    </div>
</div>
@endsection
