@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Categoria Nueva')}}</div>
                <div class="card-body">
                    <form method="post" action="{{ Route('categorias.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la categoria" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion de la categoria" style="height: 100px">{{old('descripcion')}}</textarea>
                        @error('descripcion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-2">Guardar</button>
                        <a href="{{ Route('categorias.index') }}" class="btn btn-danger m-2">Cancelar</a>
                    </div>
                    </form>
                </div>
            </div>   
        </div>    
    </div>
</div>
@endsection
