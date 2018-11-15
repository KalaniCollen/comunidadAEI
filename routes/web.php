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

Route::get('/Admin','AdminController@index');

Route::get('/eventos','EventoController@index');
Route::post('/AgregarEvento','EventoController@create')->name('agregareveto');

// Logros
Route::get('/MisLogros/{slug_empresa}','MisLogrosController@Index');
Route::put('/MisLogrosEdit','MisLogrosController@update')->name('ActualizarLogro');
Route::get('/MisLogros/{slug_empresa}/Edit','MisLogrosController@edit');

// Rutas perfil id_usuario
Route::get('/Cuenta/{slug_usuario}','PerfilUsuarioController@Index');
Route::get('/Cuenta/{slug_usuario}/Edit','PerfilUsuarioController@show');
Route::get('/cambiarcorreo',function () {
    if(Auth::check()){
    return view('perfiles.Perfil.Correo');
    }
    return redirect('/');
});
Route::get('/cambiarpassword',function () {
    if(Auth::check()){
    return view('perfiles.Perfil.password');
    }
    return redirect('/');
});
Route::put('/Cuenta/Correo/Edit','PerfilUsuarioController@correo')->name('cambiarcorreo');
Route::put('/Cuenta/password/Edit','PerfilUsuarioController@password')->name('cambiarpassword');
Route::get('/Perfil','PerfilUsuarioController@store');
Route::put('/PerfilEdit','PerfilUsuarioController@update')->name('ActualizarPerfil');
Route::put('/PerfilEditar/{id}','PerfilUsuarioController@mostrar');
Route::get('perfilUsuario/{id}','PerfilUsuarioController@show');

// Rutas empresa
// Route::get('/PerfilEmpresa/{slug_empresa}','PerfilEmpresaController@Index')->name('MiEmpresa');
Route::put('/PerfilEmpresaUpdate','PerfilEmpresaController@update')->name('Actualizar');
Route::put('/PerfilEEditar','PerfilEmpresaController@edit');
Route::get('/PerfilEmpresa/{slug_empresa}/Edit','PerfilEmpresaController@show');
Route::get('/Empresa/{slug_empresa}','PerfilEmpresaController@store')->name("VerEmpresa");


// Ruta a los albums

Route::get('/Album/{slug}','AlbumController@Show');
Route::get('/album/{id}/edit','AlbumController@Edit');
Route::put('/AlbumUpdate','AlbumController@update');
Route::get('/Albums/{id}','AlbumController@index');
Route::delete('/DeleteAlbum/{id}','AlbumController@delete');
Route::post('/CreateAlbum','AlbumController@create');
Route::post('/Imagenes/{album}','AlbumController@Agregar');
Route::delete('/DeleteImagen','ImagenesController@Delete');

// Ruta a multimedia videos
Route::resource('videos', 'VideosController');
Route::get('/Videos','VideosController@index');
Route::get('/Videos/{id}','VideosController@show');
Route::get('/VideosSubidos/{id}','VideosController@mostrar');
Route::post('/SubirVideo','VideosController@subir');
Route::post('/CreateVideo','VideosController@create');
Route::delete('/DeleteVideo','VideosController@Delete');
// Route::get('/Videos/{id}','VideosController@show');
// Route::post('/CreateVideo','VideosController@create');
// Route::delete('/DeleteVideo','VideosController@Delete');

// Formulario de Servicio
Route::get('/servicios/{servicio}/contact/', 'ServiciosController@contact')->name('servicios.contact');


// Rutas para el catálogo de cada usuario
Route::group(['middleware' => 'auth'], function() {
    Route::get('catalogo', 'CatalogoController@index')->name('catalogo.index');
    Route::get('perfil-empresa','PerfilEmpresaController@index')->name('perfil-empresa.index');
    Route::resource('servicios', 'ServiciosController', [ 'except' => ['index','show'] ]);
    Route::resource('productos', 'ProductosController', [ 'except' => ['index','show'] ]);
});

#########################################################
#                      RUTAS PÚBLICAS
#########################################################

Route::resource('noticias', 'NoticiasController');
Route::resource('bolsa-trabajo', 'BolsaDeTrabajoController');

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
