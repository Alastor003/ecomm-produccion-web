@extends('layouts.app')

@section('content')
<div class="container" style="height:70vh;">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-7">
                <h4>Detalles del Producto</h4>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <img class="imagen-producto" src="{{ asset('/storage/' . $producto->imagen) }}" alt="imagen producto" class="card-img-top mx-auto" style="height: 250px; width: 250px;display: block;">
            </div>
            <div class="col-lg-6">
                <h4>{{ $producto->nombre }}</h4>
                <p class="text-success"><strong>{{ $producto->precio_format() }}</strong></p>
                <p>{{ $producto->descripcion }}</p>
                <p class="btn-holder">
                    <a href="{{ route('add_to_cart', $producto->id) }}" class="btn btn-primary btn-block text-center">
                        <i class="fa fa-shopping-cart"></i> Añadir al carrito
                    </a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('shop') }}" class="btn btn-primary btn-block text-center">Ir a la tienda</a>
            </div>
        </div>
    </div>
</div>
<hr>
@endsection
