@extends('administracion')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $producto->nombre }}</div>
                <div class="card-body">
                    <form method="post" action="{{ Route('productos.update', $producto) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del producto" value="{{ $producto->nombre }}">
                        @error('nombre')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio del producto" value="{{ $producto->precio }}">
                        @error('precio')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del producto" style="height: 100px">{{ $producto->descripcion }}</textarea>
                        @error('descripcion')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label"></label>
                        @if (file_exists(public_path('/storage/' . $producto->imagen)))
                            <img src="{{ asset('/storage/' . $producto->imagen) }}" alt="Imagen del producto" width="150">
                        @else
                            <p>No hay imagen asociada</p>
                        @endif
                        <input type="file" class="form-control" name="imagen" id="imagen">
                        <p class="text-muted">Seleccione una nueva imagen para reemplazar la actual (opcional).</p>
                        @error('imagen')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">Seleccione una categoría</option>
                            @foreach($categorias as $cat)
                                <option @if($cat->id == $producto->categoria_id) selected @endif value="{{ $cat->id }}">{{ $cat->nombre }}</option>
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
