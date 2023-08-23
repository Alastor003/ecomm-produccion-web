@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $categorias->nombre }}</div>
                <div class="card-body">
                    {{ $categorias->descripcion }}
                    <hr>
                    <a href="{{ Route('categorias.index') }}" class="btn btn-primary">Volver a categorias</a>
                    <a href="{{ route('categorias.edit', ['categoria' => $categorias->id]) }}" class="btn btn-success">Editar categoria</a>
                    <form id="form-delete" class="d-inline" method="post" action="{{ Route('categorias.destroy', $categorias) }}">
                        @csrf
                        @method('DELETE')
                        <button id="form-submit" type="submit" class="btn btn-danger">Eliminar Categoria</button>
                    </form>
                </div>
            </div>   
        </div>    
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@vite(['resources/js/productos/categoria.js'])

@endsection