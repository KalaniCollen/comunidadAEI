<?php

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

// Route::get('/', function () {
//     $productos = Productos::all();
//     $servicios = Servicios::all();
//     return view('welcome', [
//         'productos' => $productos,
//         'servicios' => $servicios,
//     ]);
// });


Route::get('/', 'IndexController@index')->name('/');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/servicios/{servicio}/contact/', 'ServiciosController@contact')->name('servicios.contact');

// Rutas para el catálogo de cada usuario
Route::group(['middleware' => 'auth'], function() {
    Route::get('catalogo', 'CatalogoController@index')->name('catalogo.index');
    Route::resource('servicios', 'ServiciosController', [ 'except' => ['index','show'] ]);
    Route::resource('productos', 'ProductosController', [ 'except' => ['index','show'] ]);
});

// Rutas publicas para consultar productos y servicios de los socios
Route::get('/servicios/{servicio}', 'ServiciosController@show')->name('servicios.show');
Route::get('/productos/{producto}', 'ProductosController@show')->name('productos.show');

// Api para los productos y servicios
Route::prefix('v1')->group(function () {
    Route::get('/servicios', 'ServiciosController@index')->name('servicios.index');
    Route::get('/productos', 'ProductosController@index')->name('productos.index');
});

// Rutas para correos
Route::post('/afiliate', 'IndexController@sendMail')->name('/afiliate');
Route::post('/orden-servicio', 'ServiciosController@sendMail')->name('servicio.orden-servicio');

Route::get('guidelines', function() {
    return view('guidelines');
});
