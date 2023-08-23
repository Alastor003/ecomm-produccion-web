@extends('layouts.app')

@section('content')
<main>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                    <img src="{{ asset('storage/inicio/inicio1.jpg') }}" alt="imagen registro" class="bd-placeholder-img inicio-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                </svg>
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Bienvenido a Accestore</h1>
                        <p>Encontra ese Accesorio que buscas para llamar aún más la atención.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{ route('register') }}">Regístrate hoy</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                    <img src="{{ asset('storage/inicio/inicio2.jpg') }}" alt="imagen productos" class="bd-placeholder-img inicio-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                </svg>
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Conocé nuestros productos</h1>
                        <p>Y explorá todas las categorias que tenemos disponibles para vos.</p>
                        <p><a class="btn btn-lg btn-primary" href="{{ route('shop') }}">Nuestros productos</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                    <img src="{{ asset('storage/inicio/inicio3.jpg') }}" alt="imagen contacto" class="bd-placeholder-img inicio-img" width="100%" height="100%" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#777"></rect>
                </svg>
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1>Contactanos</h1>
                        <p>Estamos atentos a cualquier duda consulta.</p>
                        <p><a class="btn btn-lg btn-primary"href="{{ route('contacto') }}">Contacto</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>


    <div class="container marketing mt-5">

        <div class="row">
        <h2 class="text-center">Productos Destacados</h2>
            @foreach($productos as $prod)
            <div class="col-lg-4 mb-5">
                <img src="{{ asset('/storage/' . $prod->imagen) }}" alt="imagen producto" class="imagen-circ">
                <h2>{{ $prod->nombre }}</h2>
                <p>{{ $prod->descripcion }}</p>
                <p class="text-success">{{ $prod->precio_format() }}</p>
                <a class="btn btn-primary" href="{{ route('ver_producto', ['id' => $prod->id]) }}">Ver detalles »</a>
            </div>
            @endforeach
        </div>

        <hr class="featurette-divider">
        <h2 class="text-center mb-5 mt-5">Noticias y más</h2>
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Curso de arreglo de relojes.</h2>
                <p class="lead">Abrimos un curso de arreglo de relojes totalmente gratuito, acercate a nuestro nuevo local en Av. Santa Fe 3564 desde este lunes 31/07/2023 y anotate.</p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="{{ asset('storage/inicio/blog1.jpg') }}">
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">Muestra de relojes en el auditorio.</h2>
                <p class="lead">Ven a pasear a nuestro nuevo auditorio el dia domingo 23/05/2023 para conocer nuestros productos destacados, cosas que se vienen, charlas informativas y mucho más.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="{{ asset('storage/inicio/blog2.jpg') }}">
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">Presentación del nuevo local en Palermo.</h2>
                <p class="lead">Inauguración de nuestro próximo local ubicado en la zona de palermo, Av. Santa Fe 3564, veni a visitarnos y participa de los sorteos.</p>
            </div>
            <div class="col-md-5">
                <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="{{ asset('storage/inicio/blog3.jpg') }}">
            </div>
        </div>
        <hr class="featurette-divider">

    </div>
</main>
@endsection