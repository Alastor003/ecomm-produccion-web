@extends('layouts.app')

@section('content')
<div class="container">
@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-7">
            <h4>Contacto</h4>
        </div>
    </div>
        <hr>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Formulario de contacto')}}</div>
                <div class="card-body">
                    <form method="post" action="{{ route('mensajes.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Email de contacto</label>
                        <input type="text" class="form-control" name="correo" id="correo" placeholder="Ingrese su email" value="{{old('correo')}}">
                        @error('correo')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Numero de contacto</label>
                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su número" value="{{old('telefono')}}">
                        @error('numero')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea type="text" class="form-control" name="mensaje" id="mensaje" placeholder="Describa su consulta" style="height: 150px">{{  old('mensaje') }}</textarea>
                        @error('mensaje')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-2" style="padding: 10px 35px";>Enviar</button>
                    </div>
                    </form>
                </div>
                <img src="{{ asset('storage/logo.png') }}" class="logo" alt="imagen logo">
            </div>   
        </div>    
    </div>
</div>
<hr>
@endsection
