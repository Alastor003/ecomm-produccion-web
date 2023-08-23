<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajes = Mensaje::where('leido', false)->paginate(5);
    
        return view('mensajes.index', compact('mensajes'));
    }

    public function marcarComoLeido($id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update(['leido' => true]); // Cambiar de 0 a 1 (false a true)
    
        return redirect()->route('mensajes.index')->with('success', 'El mensaje se marco como leido y con respuesta.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Validar los datos enviados por el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => 'required|string|max:22',
            'mensaje' => 'required|string',
        ]);

        // Crear el mensaje en la base de datos
        Mensaje::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'mensaje' => $request->mensaje,
        ]);

        // Redireccionar a una página de éxito o mostrar un mensaje de confirmación
        return redirect()->back()->with('success', 'Mensaje enviado con éxito.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Buscar el mensaje por su identificador en la base de datos
        $mensaje = Mensaje::findOrFail($id);
    
        // Pasar el mensaje a la vista para mostrarlo
        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
