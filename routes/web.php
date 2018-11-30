<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

Route::get('/politicas',function(){
    return view('politicas');
});
Route::get('/home', 'HomeController@index')->name('home');

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






Route::get('calendario', 'EventoController@showCalendar')->name('calendario');

Route::get('/solicitarevento','EventoController@index');
// Route::post('/AgregarEvento','EventoController@create')->name('agregarevento');
// Route::get('/calendario','EventoController@store');
// Route::get('cargaEventos{id?}','EventoController@select');
// Route::get('evento/{slug}','EventoController@show');
// Route::get('/evento/registro/{id}','RegistroEventoController@create');
// Route::get('/evento/cancelar/registro/{id}','RegistroEventoController@destroy');
// Route::get('/evento/registro/invitado/{id}',function ($id) {
//     return view('eventos.invitado')->with('id_evento', $id);
// });
// Route::post('/evento/registrar/invitado/{id}','RegistroEventoController@invitar')->name("registrar.invitado");

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
//
// Route::get('/Admin','AdminController@index');


// Formulario de Servicio
Route::get('/servicios/{servicio}/contact/', 'ServiciosController@contact')->name('servicios.contact');

// Rutas cada usuario autorizado
Route::group(['middleware' => 'auth'], function() {
    Route::put('perfil-usuario/{perfil_usuario}/save-image', 'PerfilUsuarioController@saveImage')->name('perfil-usuario.save-image');
    Route::put('perfil-empresa/{perfil_empresa}/save-image', 'PerfilEmpresaController@saveImage')->name('perfil-empresa.save-image');
    Route::resource('perfil-empresa','PerfilEmpresaController');
    Route::resource('perfil-usuario', 'PerfilUsuarioController');
    Route::get('albums/view', 'AlbumController@view')->name('albums.view');
    Route::resource('albums', 'AlbumController');
    Route::resource('videos', 'VideosController');

    Route::resource('imagenes', 'ImagenesController', [ 'except' => ['update', 'edit', 'create'] ]);
    Route::resource('servicios', 'ServiciosController', [ 'except' => ['index','show'] ]);
    Route::resource('productos', 'ProductosController', [ 'except' => ['index','show'] ]);
    Route::resource('evento', 'EventoController', [ 'except' => ['index', 'show'] ]);
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
Route::get('evento/{evento}', 'EventoController@show')->name('evento.show');
Route::get('evento', 'EventoController@index')->name('evento.index');

# API'S
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



Route::post('fake', function(Request $request) {
    dd($request->all());
    // return redirect('guidelines')->withErrors(['numero', 'El numero']);
})->name('fake');
