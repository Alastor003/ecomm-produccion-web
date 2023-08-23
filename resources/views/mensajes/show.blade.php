@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $mensaje->nombre }}</div>
                <div class="card-body">
                    <p><strong>Correo:</strong> {{ $mensaje->correo }}</p>
                    <p><strong>Teléfono:</strong> {{ $mensaje->telefono }}</p>
                    <p><strong>Mensaje:</strong> {{ $mensaje->mensaje }}</p>
                    <hr>
                    <div class="d-flex">
                        <form method="POST" action="{{ route('mensajes.marcarLeido', ['id' => $mensaje->id]) }}">
                            @csrf
                            <button class="btn btn-primary mr-3" type="submit" style="margin-right:6px">Marcar como leído y resuelto</button>
                        </form>
                        <a href="{{ route('mensajes.index') }}" class="btn btn-primary">Volver a mensajes</a>
                    </div>
                </div>
            </div>   
        </div>    
    </div>
</div>
@endsection

