@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Producto Nuevo')}}</div>
                <div class="card-body">
                    <form method="post" action="{{ Route('productos.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto" value="{{old('nombre')}}">
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio del producto" value="{{old('precio')}} ">
                        @error('precio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del producto" style="height: 100px">{{old('descripcion')}}</textarea>
                        @error('descripcion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" name="imagen" id="imagen">
                    @error('imagen')
                            <div class="text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $cat)
                                <option @if($cat->id == old('categoria_id')) selected @endif value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-2">Guardar</button>
                        <a href="{{ Route('productos.index') }}" class="btn btn-danger m-2">Cancelar</a>
                    </div>
                    </form>
                </div>
            </div>   
        </div>    
    </div>
</div>
@endsection
