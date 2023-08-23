@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-7">
            <h4>Nosotros</h4>
            </div>
        </div>
        <hr>
    <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">20 Años ofreciendo los mejores productos.</h2>
                    <p class="lead">Bienvenidos a nuestra página web, donde nos especializamos en la venta de accesorios de calidad que satisfacen las necesidades de nuestros clientes. Nos enorgullece haber estado en el negocio por más de 20 años, lo que nos ha permitido perfeccionar nuestro conocimiento y experiencia en el sector.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="700" height="700" src="{{ asset('storage/nosotros2.jpg') }}">
                </div>
            </div>
            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Calidad Asegurada.</h2>
                    <p class="lead">Nos apasiona ofrecer a nuestros clientes los productos más novedosos y útiles en el mercado, y trabajamos arduamente para asegurarnos de que nuestra selección de productos esté siempre actualizada y en línea con las últimas tendencias. Todos nuestros productos han sido cuidadosamente seleccionados por nuestro equipo para garantizar su calidad y durabilidad.</p>
                </div>
                <div class="col-md-5">
                    <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="700" height="700" src="{{ asset('storage/nosotros1.jpg') }}">
                </div>
        </div>
        <hr class="featurette-divider">
 </div>
 @endsection