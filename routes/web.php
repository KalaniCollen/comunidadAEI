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

Route::post('/search','BuscadorController@search')->name('search.search');

Route::get('/respuesta',function(){
  return view('response');
});
Route::get('activacion/{code}','UserController@activate');
Route::put('complete/{id}','UserController@complete');

Route::get('/imagen', function () {
    return view('multimedia.p');
});

Route::get('listado_usuarios/{page?}', 'AdminController@lista_usuarios');
Route::get('listado_usuarios_asociados/{page?}', 'AdminController@lista_usuariosaso');
Route::get('listado_usuarios_no_asociados/{page?}', 'AdminController@lista_usuariosnoa');
Route::get('listado_empresas/{page?}', 'AdminController@lista_empresas');
Route::get('borrarusu/{id}', 'AdminController@deleteUser');
Route::get('/Admin','AdminController@index');
Route::get('form_editar_usuario/{id}', 'AdminController@form_editar_usuario');
Route::post('actualizar_usuario', 'AdminController@actualizar_usuario');
Route::post('cambiar_password', 'AdminController@cambiar_password');
Route::get('PerfilUsuario/{id}', 'AdminController@form_perfil_usuario');
Route::get('form_nuevo_usuario', 'AdminController@form_nuevo_usuario');
Route::post('agregar_nuevo_usuario', 'AdminController@agregar_nuevo_usuario');
Route::get('nuevo_evento', 'AdminController@nuevo_evento');
Route::post('crear_evento', 'AdminController@crear_evento')->name('crear_evento');
Route::get('lista_evento', 'AdminController@lista_evento')->name('lista_evento');
Route::get('eliminar_evento/{id}', 'AdminController@eliminar_evento')->name('eliminar_evento');
Route::get('verificar_evento/{id}', 'AdminController@verificar_evento')->name('verificar_evento');







Route::get('/solicitarevento','EventoController@index');
Route::post('/AgregarEvento','EventoController@create')->name('agregarevento');
Route::get('/calendario','EventoController@store');
Route::get('cargaEventos{id?}','EventoController@select');
Route::get('evento/{slug}','EventoController@show');
Route::get('/evento/registro/{id}','RegistroEventoController@create');
Route::get('/evento/cancelar/registro/{id}','RegistroEventoController@destroy');
Route::get('/evento/registro/invitado/{id}',function ($id) {
    return view('eventos.invitado')->with('id_evento', $id);
});
Route::post('/evento/registrar/invitado/{id}','RegistroEventoController@invitar')->name("registrar.invitado");

// Logros
Route::get('/MisLogros/{slug_empresa}','MisLogrosController@Index');
Route::put('/MisLogrosEdit','MisLogrosController@update')->name('ActualizarLogro');
Route::get('/MisLogros/{slug_empresa}/Edit','MisLogrosController@edit');

// Rutas perfil id_usuario
// Route::get('/Cuenta/{slug_usuario}','PerfilUsuarioController@Index');
// Route::get('/Cuenta/{slug_usuario}/Edit','PerfilUsuarioController@show');
// Route::get('/cambiarcorreo',function () {
//     if(Auth::check()){
//         return view('perfiles.Perfil.Correo');
//     }
//     return redirect('/');
// });
// Route::get('/cambiarpassword',function () {
//     if(Auth::check()){
//         return view('perfiles.Perfil.password');
//     }
//     return redirect('/');
// });
// Route::put('/Cuenta/Correo/Edit','PerfilUsuarioController@correo')->name('cambiarcorreo');
// Route::put('/Cuenta/password/Edit','PerfilUsuarioController@password')->name('cambiarpassword');
// Route::get('/Perfil','PerfilUsuarioController@store');
// Route::put('/PerfilEditar/{id}','PerfilUsuarioController@mostrar');
// Route::put('/PerfilEdit','PerfilUsuarioController@update')->name('ActualizarPerfil');
// Route::get('perfilUsuario/{id}','PerfilUsuarioController@show');

// Rutas empresa
// Route::get('/PerfilEmpresa/{slug_empresa}','PerfilEmpresaController@Index')->name('MiEmpresa');
// Route::put('/PerfilEmpresaUpdate','PerfilEmpresaController@update')->name('Actualizar');
// Route::put('/PerfilEEditar','PerfilEmpresaController@edit');
// Route::get('/PerfilEmpresa/{slug_empresa}/Edit','PerfilEmpresaController@show');
// Route::get('/Empresa/{slug_empresa}','PerfilEmpresaController@store')->name("VerEmpresa");


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


// Rutas cada usuario
Route::group(['middleware' => 'auth'], function() {
    Route::resource('perfil-empresa','PerfilEmpresaController');
    Route::resource('servicios', 'ServiciosController', [ 'except' => ['index','show'] ]);
    Route::resource('productos', 'ProductosController', [ 'except' => ['index','show'] ]);
    Route::resource('perfil-usuario', 'PerfilUsuarioController');
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
    Route::get('servicios', 'ServiciosController@index')->name('servicios.index');
    Route::get('productos', 'ProductosController@index')->name('productos.index');
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
