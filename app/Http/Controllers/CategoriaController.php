<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;

class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::paginate(5);
        return view('categorias.index', [
            'categorias' => $categorias
        ]);
    }

    public function show(Categoria $categoria)
    {
       return view('categorias.show', [
        'categorias' => $categoria
       ]);
    }

    public function create()
    {
       
        return view('categorias.create', [
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);


        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()
        ->route('categorias.index')
        ->with('status', 'La categoria se creado con éxito.');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', [
            'categoria' => $categoria
        ]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);


        $categoria->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()
        ->route('categorias.index')
        ->with('status', 'La categoria se modifico con éxito.');
    }
    
    public function destroy(Categoria $categoria)
    {
        // Verificar si la categoría está siendo utilizada en algún producto
        $productosAsociados = Producto::where('categoria_id', $categoria->id)->count();

        if ($productosAsociados > 0) {
            return redirect()
                ->route('categorias.index')
                ->with('error', 'No se puede eliminar la categoría porque está siendo utilizada en uno o más productos.');
        }

        // Si no hay productos asociados, proceder con el borrado
        $categoria->delete();
        return redirect()
            ->route('categorias.index')
            ->with('status', 'La categoría se ha eliminado con éxito.');
    }

}
