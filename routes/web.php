<?php
use Illuminate\Support\Facades\Auth;
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

// Route::get('/busq',function(){
//   return view('busqueda');
// });
//
// Route::get('/busqe',function(){
//   return view('bus');
// });

Route::post('/search','BuscadorController@search')->name('search.search');

Route::get('/respuesta',function(){
  return view('response');
});

Route::get('activacion/{code}','UserController@activate');
Route::put('complete/{id}','UserController@complete');

// Route::get('/imagen', function () {
//     return view('multimedia.p');
// });
//
// Route::get('/Admin','AdminController@index');
//
// Route::get('/eventos','EventoController@index');
// Route::post('/AgregarEvento','EventoController@create')->name('agregareveto');
//
// // Logros
// Route::get('/MisLogros/{slug_empresa}','MisLogrosController@Index');
// Route::put('/MisLogrosEdit','MisLogrosController@update')->name('ActualizarLogro');
// Route::get('/MisLogros/{slug_empresa}/Edit','MisLogrosController@edit');
//
//
// Route::get('/Album/{slug}','AlbumController@Show');
// Route::get('/album/{id}/edit','AlbumController@Edit');
// Route::put('/AlbumUpdate','AlbumController@update');
// Route::get('/Albums/{id}','AlbumController@index');
// Route::delete('/DeleteAlbum/{id}','AlbumController@delete');
// Route::post('/CreateAlbum','AlbumController@create');
// Route::post('/Imagenes/{album}','AlbumController@Agregar');
// Route::delete('/DeleteImagen','ImagenesController@Delete');
//
// // Ruta a multimedia videos
// Route::resource('videos', 'VideosController');
// Route::get('/Videos','VideosController@index');
// Route::get('/Videos/{id}','VideosController@show');
// Route::get('/VideosSubidos/{id}','VideosController@mostrar');
// Route::post('/SubirVideo','VideosController@subir');
// Route::post('/CreateVideo','VideosController@create');
// Route::delete('/DeleteVideo','VideosController@Delete');
// // Route::get('/Videos/{id}','VideosController@show');
// // Route::post('/CreateVideo','VideosController@create');
// // Route::delete('/DeleteVideo','VideosController@Delete');

// Formulario de Servicio
Route::get('/servicios/{servicio}/contact/', 'ServiciosController@contact')->name('servicios.contact');


// Rutas cada usuario
Route::group(['middleware' => 'auth'], function() {
    Route::resource('perfil-empresa','PerfilEmpresaController');
    Route::resource('perfil-usuario', 'PerfilUsuarioController');
    Route::resource('album', 'AlbumController');
    Route::resource('videos', 'VideosController');
    Route::resource('servicios', 'ServiciosController', [ 'except' => ['index','show'] ]);
    Route::resource('productos', 'ProductosController', [ 'except' => ['index','show'] ]);
    Route::get('catalogo', 'CatalogoController@index')->name('catalogo.index');
    Route::get('perfil-usuario/update-email', 'PerfilUsuarioController@updateEmail')->name('perfil-usuario.update-email');
});

#########################################################
#                      RUTAS PÚBLICAS
#########################################################

Route::resource('noticias', 'NoticiasController');
Route::resource('bolsa-trabajo', 'BolsaDeTrabajoController');

// Rutas públicas para consultar productos y servicios de los socios
Route::get('/servicios/{servicio}', 'ServiciosController@show')->name('servicios.show');
Route::get('/productos/{producto}', 'ProductosController@show')->name('productos.show');


#########################################################
#              RUTAS A API'S PÚBLICAS
#########################################################
Route::prefix('v1')->group(function () {
    Route::get('servicios', 'ServiciosController@api')->name('servicios.api');
    Route::get('productos', 'ProductosController@api')->name('productos.api');
    Route::get('noticias', 'NoticiasController@api')->name('noticias.api');
    Route::get('bolsa-trabajo', 'BolsaDeTrabajoController@api')->name('bolsa-trabajo.api');
});

// Rutas para enviar correos
Route::post('/afiliate', 'IndexController@sendMail')->name('afiliate');
Route::post('/orden-servicio', 'ServiciosController@sendMail')->name('servicio.orden-servicio');


Route::get('api', function() {
    return view('api');
})->name('api.index');

Route::get('developers', function() {
    return view('developers');
})->name('developers.index');

// Ruta para la guía de estilos del sitio web aei
Route::get('guidelines', function() {
    return view('guidelines');
});
