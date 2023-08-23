@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-7">
            <h4>Productos</h4>
            </div>
        </div>
        <hr>
    <div class="row">
        @foreach($productos as $pro)
            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px; height: auto;">
                <img class="imagen-producto" src="{{ asset('/storage/' . $pro->imagen) }}" alt="imagen producto" class="card-img-top mx-auto" style="height: 150px; width: 150px;display: block;">
                    <div class="card-body">
                        <h4> {{ $pro->nombre }} </h4>
                        <p class="text-success"><strong>{{ $pro->precio_format() }}</strong></p>
                        <p class="btn-holder"><a href="{{ route('add_to_cart', $pro->id) }}" class="btn btn-primary btn-block text-center"><i class="fa fa-shopping-cart"></i> Añadir al carrito</a></p>
                        <form method="GET" action="{{ route('ver_producto', ['id' => $pro->id]) }}">
                            <button class="btn btn-primary btn-block text-center"><i class="fa fa-eye"></i> Ver Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    <hr>
</div>    
@endsection
