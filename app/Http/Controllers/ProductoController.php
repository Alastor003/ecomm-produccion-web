<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::where('is_active', true)
            ->orderByDesc('categoria_id')
            ->paginate(5);
        return view('productos.index', [
            'productos' => $productos
        ]);
    }

    public function shop()
    {
        $productos = Producto::where('is_active', true)->get();
        return view('shop', [
            'productos' => $productos
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = $this->getRules();

        $messages = $this->getMessages();

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('productos.create')
                ->withErrors($validator)
                ->withInput();
        }
        // se guarda el nombre del archivo
        $imagen_nombre = time() . $request->file('imagen')->getClientOriginalName();
        // metodo para subir el archivo a una carpeta del proyecto, creando la carpeta productos y mandandole el nombre
        $imagen = $request->file('imagen')->storeAs('productos', $imagen_nombre, 'public');

        // proceso de guardado del producto
        Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagen,
        ]);
        return redirect()
        ->route('productos.index')
        ->with('status', 'El producto se ha creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', [
            'producto' => $producto
        ]);
    }

    public function verProducto($id)
    {
        $producto = Producto::findOrFail($id);
        return view('ver_producto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', [
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $rules = $this->getRules();

        $messages = $this->getMessages();

        if (!$request->hasFile('imagen')) {
            unset($rules['imagen']);
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('productos.edit', $producto)
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('imagen')) {
            // New image is being uploaded, update the image
            $imagen_nombre = time() . $request->file('imagen')->getClientOriginalName();
            $imagen = $request->file('imagen')->storeAs('productos', $imagen_nombre, 'public');
        } else {
            // No new image uploaded, keep the existing image
            $imagen = $producto->imagen;
        }
 

       $producto->update([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagen,
        ]);
        return redirect()
        ->route('productos.index')
        ->with('status', 'El producto se ha modificado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {

        $producto->update([
            'is_active' => false,
        ]);
        return redirect()
        ->route('productos.index')
        ->with('status', 'El producto se ha eliminado con éxito.');
    }

    public function index_inicio()
    {
        $productos = Producto::where('is_active', true)->take(6)->get();
        return view('home', [
            'productos' => $productos
        ]);

    }

    public function addToCart($id)
    {
        $producto  = Producto::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'imagen' => $producto->imagen,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto añadido al carrito');
    }

    public function actualizar(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Carro actualizado con éxito');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Producto removido');
        }
    }

    public function cart()
    {
        return view('cart');
    }

    public function showCheckout()
    {
        return view('checkout');
    }

    private function getRules()
    {
        return [
            'nombre' => 'required|max:255',
            'precio' => 'numeric|max:9999999',
            'descripcion' => 'required|max:255',
            'categoria_id' => 'required',
            'imagen' => 'required|mimes:jpg,bmp,png',
        ];
    }

    private function getMessages()
    {
       return [
            'nombre.required' => 'Usted debe ingresar el nombre del producto.',
            'precio.numeric' => 'Usted debe ingresar un valor númerico.',
            'descripcion.required' => 'Usted debe ingresar la descripcion del producto.',
            'categoria_id.required' => 'Usted debe seleccionar una categoria para el producto.',
            'imagen.required' => 'Usted debe cargar la imagen para el correspondiente producto',
        ];
    }
}
