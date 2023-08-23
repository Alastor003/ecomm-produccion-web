<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Mostrar una lista de usuarios
    public function index()
    {
        $users = User::paginate(5);
        return view('usuarios.index', compact('users'));
    }

    // Método para asignar el rol de administrador a un usuario
    public function giveAdminRole($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = 1;
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Se ha dado el rol de administrador al usuario correctamente.');
    }

    // Método para quitar el rol de administrador a un usuario
    public function revokeAdminRole($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = 0;
        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Se ha quitado el rol de administrador al usuario correctamente.');
    }
}
