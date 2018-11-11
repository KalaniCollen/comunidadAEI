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

Route::get('/', 'IndexController@index')->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/busq',function(){
  return view('busqueda');
});

Route::get('/busqe',function(){
  return view('bus');
});

Route::get('/search','BuscadorController@search');

Route::get('/respuesta',function(){
  return view('response');
});

Route::get('activacion/{code}','UserController@activate');
Route::put('complete/{id}','UserController@complete');

Route::get('/imagen', function () {
    return view('multimedia.p');
});

Route::get('/Perfil','PerfilUsuarioController@store');
Route::get('perfilUsuario/{id}','PerfilUsuarioController@show');
Route::put('/PerfilEditar/{id}','PerfilUsuarioController@mostrar');

Route::get('/MisLogros/{id}','MisLogrosController@MostrarMisLogros');
Route::get('/MisLogros','MisLogrosController@store');
Route::put('/MisLogrosEditar/{id}','MisLogrosController@edit');

// Rutas empresa
Route::get('/PerfilEmpresa/{slug_empresa}','PerfilEmpresaController@Index')->name('MiEmpresa');
Route::put('/PerfilEmpresaUpdate','PerfilEmpresaController@update')->name('Actualizar');
Route::put('/PerfilEEditar/{id}','PerfilEmpresaController@edit');
Route::get('/PerfilEmpresa/{slug_empresa}','PerfilEmpresaController@store')->name("VerEmpresa");
Route::get('/PerfilShow/{slug_empresa}','PerfilEmpresaController@show');


// Ruta a los albums
Route::get('/Albums/{id}','AlbumController@index');
Route::post('/CreateAlbum','AlbumController@create');

Route::get('/Album/{slug}','AlbumController@Show');
Route::post('/Imagenes/{album}','AlbumController@Agregar');
Route::delete('/DeleteImagen','ImagenesController@Delete');

// Ruta a multimedia videos
Route::resource('videos', 'VideosController');

// Route::get('/Videos/{id}','VideosController@show');
// Route::post('/CreateVideo','VideosController@create');
// Route::delete('/DeleteVideo','VideosController@Delete');

// Formulario de Servicio
Route::get('/servicios/{servicio}/contact/', 'ServiciosController@contact')->name('servicios.contact');

// Rutas para el catálogo de cada usuario
Route::group(['middleware' => 'auth'], function() {
    Route::get('catalogo', 'CatalogoController@index')->name('catalogo.index');
    Route::resource('servicios', 'ServiciosController', [ 'except' => ['index','show'] ]);
    Route::resource('productos', 'ProductosController', [ 'except' => ['index','show'] ]);
});

// Rutas públicas para consultar productos y servicios de los socios
Route::get('/servicios/{servicio}', 'ServiciosController@show')->name('servicios.show');
Route::get('/productos/{producto}', 'ProductosController@show')->name('productos.show');

// Api para los productos y servicios
Route::prefix('v1')->group(function () {
    Route::get('/servicios', 'ServiciosController@index')->name('servicios.index');
    Route::get('/productos', 'ProductosController@index')->name('productos.index');
});

// Rutas para correos
Route::post('/afiliate', 'IndexController@sendMail')->name('afiliate');
Route::post('/orden-servicio', 'ServiciosController@sendMail')->name('servicio.orden-servicio');

// Ruta para la guía de estilos del sitio web aei
Route::get('guidelines', function() {
    return view('guidelines');
});
