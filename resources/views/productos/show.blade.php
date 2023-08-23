@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $producto->nombre }}</div>
                <div class="card-body">
                    <img class="imagen-producto" src="{{ asset('/storage/' . $producto->imagen) }}" alt="imagen producto">
                    {{ $producto->descripcion }}
                    {{ $producto->precio_format() }}
                    <hr>
                    <a href="{{ Route('productos.index') }}" class="btn btn-primary">Volver a productos</a>
                    <a href="{{ Route('productos.edit', $producto) }}" class="btn btn-success">Editar producto</a>
                    <form id="form-delete" class="d-inline" method="post" action="{{ Route('productos.destroy', $producto) }}">
                        @csrf
                        @method('DELETE')
                        <button id="form-submit" type="submit" class="btn btn-danger">Eliminar producto</button>
                    </form>
                </div>
            </div>   
        </div>    
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/productos/show.js'])

@endsection
