<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MensajeController;
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    ProductoController::class, 'index_inicio'
])->name('home');

Route::get('nosotros', function () {
    return view('nosotros');
});

// Ruta para mostrar el formulario de contacto
Route::get('contacto', function () {
    return view('contacto');
})->name('contacto');

// Ruta para guardar los mensajes enviados a través del formulario de contacto
Route::post('mensajes', [MensajeController::class, 'create'])->name('mensajes.create');
Route::get('ver_producto/{id}', [ProductoController::class, 'verProducto'])->name('ver_producto');

// autenticacion normal
Route::group([ 'middleware' => ['auth']], function(){
    Route::get('add-to-cart/{id}', [ProductoController::class, 'addToCart'])->name('add_to_cart');
    Route::get('cart', [ProductoController::class, 'cart'])->name('cart');
    Route::patch('update-cart', [ProductoController::class, 'actualizar'])->name('update_cart');
    Route::delete('remove-from-cart', [ProductoController::class, 'remove'])->name('remove_from_cart');
    Route::get('/checkout', [ProductoController::class, 'showCheckout'])->name('checkout');
});

// autenticacion personalizada para que acceda admin
Route::group(['middleware' => ['id_admin']], function(){
    Route::resource('productos', ProductoController::class); //Forma simplificada de usar todos los metodos
    Route::resource('categorias', CategoriaController::class);
    Route::get('administracion', function () {
        return view('administracion');
    });
    Route::get('usuarios', [
        UserController::class, 'index'
    ])->name('usuarios.index');
    Route::put('/usuarios/{id}/dar-admin', [UserController::class, 'giveAdminRole'])->name('usuarios.giveAdminRole');
    Route::put('/usuarios/{id}/quitar-admin', [UserController::class, 'revokeAdminRole'])->name('usuarios.revokeAdminRole');
    Route::get('/mensajes', [MensajeController::class, 'index'])->name('mensajes.index');
    Route::get('/mensajes/{id}', [MensajeController::class, 'show'])->name('mensajes.show');
    Route::post('/mensajes/{id}/marcar-leido', [MensajeController::class, 'marcarComoLeido'])->name('mensajes.marcarLeido');
} );

Route::get('shop', [ProductoController::class, 'shop'])->name('shop');


Auth::routes();

