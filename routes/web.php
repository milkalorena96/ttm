<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/set_language/{lang}', [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

Route::get('/set_language/{lang}', [
    App\Http\Controllers\Controller::class,
    'set_language',
])->name('set_language');

Route::get('/home', [
    App\Http\Controllers\HomeController::class,
    'index',
])->name('home');

// ruta de administracion
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/main', function () {
        return view('admin.desktop');
    });

    Route::get(
        '/consultarruc',
        'App\Http\Controllers\Admin\ConsultasunatController@buscarRuc'
    )->name('buscarsunat');
    Route::resource(
        '/configuracion',
        App\Http\Controllers\Admin\ConfiguracionController::class
    );
    Route::resource(
        '/categoria',
        App\Http\Controllers\Admin\CategoriaController::class
    );
    Route::resource('/user', App\Http\Controllers\Admin\UserController::class);
    Route::resource(
        '/carrusel',
        App\Http\Controllers\Admin\CarruselController::class
    );
    Route::resource('/post', App\Http\Controllers\Admin\PostController::class);

    /***Ruta lugares turisticos***/
    Route::resource(
        '/lugares',
        App\Http\Controllers\Admin\LugarturisticoController::class
    );
    Route::post(
        '/lugares/fotos',
        'App\Http\Controllers\Admin\LugarturisticoController@agregarFotos'
    )->name('AgregarFotosLugar');
    Route::delete(
        '/eliminar/foto/lugar/{id}',
        'App\Http\Controllers\Admin\LugarturisticoController@eliminar'
    )->name('eliminarFotoLugar');

    /***Ruta de hoteles***/
    Route::resource(
        '/hotel',
        App\Http\Controllers\Admin\HotelController::class
    );
    Route::post('/hoteles/fotos','App\Http\Controllers\Admin\HotelController@agregarFotos')->name('AgregarFotosHotel');
    Route::delete('/eliminar/foto/hotel/{id}','App\Http\Controllers\Admin\HotelController@eliminar')->name('eliminarFotoHotel');

    /***Ruta de restaurantes***/
    Route::resource(
        '/restaurante',
        App\Http\Controllers\Admin\RestauranteController::class
    );
    Route::post(
        '/restaurante/fotos',
        'App\Http\Controllers\Admin\RestauranteController@agregarFotos'
    )->name('AgregarFotosRest');
    Route::delete(
        '/eliminar/foto/restaurante/{id}',
        'App\Http\Controllers\Admin\RestauranteController@eliminar'
    )->name('eliminarFotoRest');

    //Rutas para el correo
    Route::resource(
        '/correo',
        App\Http\Controllers\Admin\CorreoController::class
    );
});

//rutas publias
Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/verlugar/{id}', [
    App\Http\Controllers\FrontController::class,
    'show',
])->name('verlugar');
Route::get('/lugaresturisticos', [
    App\Http\Controllers\FrontController::class,
    'turismos',
]);
Route::get('/lugaresturisticos/{categoria}', [
    App\Http\Controllers\FrontController::class,
    'categoria',
]);
Route::get('/lugaresturisticos/{categoria}/{lugar}', [
    App\Http\Controllers\FrontController::class,
    'lugarturistico',
]);
Route::get('/blog', [App\Http\Controllers\FrontController::class, 'blog']);
Route::get('/blog/{post}', [
    App\Http\Controllers\FrontController::class,
    'post',
]);
Route::get('/contacto', [
    App\Http\Controllers\FrontController::class,
    'contacto',
]);
Route::post('/contacto', [App\Http\Controllers\FrontController::class, 'send']);

Route::post('/coment', [App\Http\Controllers\FrontController::class, 'ComentRegis']);
