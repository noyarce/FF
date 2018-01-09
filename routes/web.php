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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'Admin'], function (){
    Route::get('ver_solicitud/{id}','MantencionController@solicitud');
    Route::get('solicitudes_mantencion','MantencionController@solicitud_mantencion');
    Route::get('/juegos_disponibles','JuegoController@juegosdisponibles')->name('juegos_disponibles');
    Route::resource('juegos', 'JuegoController');
    Route::resource('mantencion', 'MantencionController'); 
 });

Route::group(['middleware' => 'Sec'], function (){ /* sec y admin*/
    Route::resource('contacto', 'ContactoController'); 
    Route::resource('cotizacion', 'CotizacionController');
    Route::resource('fotos', 'ThumbnailController');
    Route::resource('arriendo', 'ArriendoController');
    Route::resource('usuarios', 'UsuarioController');   
       
           
    Route::get('user_show','UsuarioController@user_show');


    Route::get('rol/{id}', 'UsuarioController@update')->name('rol_update');
    Route::get('rol/{id}', 'UsuarioController@rol')->name('rol');
   
    Route::get('/juegos_administrar','MantencionController@index');
    Route::get('/juegos_mantencion','MantencionController@index_basico');
    
    Route::put('/status_store/{id}','ArriendoController@store_status')->name('arriendo_estado');
    Route::get('/arriendo_status/{id}','ArriendoController@status');

    Route::get('/arriendo_pendientes','ArriendoController@pendientes')->name('pendientes');
    Route::get('/arriendo_fecha','ArriendoController@fecha')->name('fecha');
    Route::get('/verfecha','ArriendoController@date')->name('seedate');
});


/* Todos menos cliente */

Route::group(['Middleware' =>'Chomon'], function (){ 
    Route::get('solicitar_mantencion/{id}','MantencionController@create');
    Route::post('solicitar_mantencion','MantencionController@store')->name('sol_mantencion');

    Route::get('/arriendo_hoy','ArriendoController@hoy')->name('hoy');
    Route::get('/print_hoy','PdfController@ImprimirArriendosHoy')->name('hoy');
    Route::get('/arriendo/detalle/{id_arriendo}/','ArriendoController@detalle')->name('detalles');
    Route::get('/verdetalle','ArriendoController@detalles')->name('detalless');
});
/* Rutas Logeados */
Route::group(['Middleware' => 'auth'], function (){
    
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('usuarios/{id}','UsuarioController@edit');
    Route::put('usuarios_store/{id}','UsuarioController@update')->name('perfil');
    
    Route::get('/juegos_mantencion','MantencionController@index_basico');
    Route::get('cambiarclave/{id}','UsuarioController@change')->name('cambiopass');
    Route::put('NewPass/{id}','UsuarioController@NewPass')->name('NewPass');
   
    Route::get('cotizar','CotizacionController@create');
    Route::post('cotizar','CotizacionController@store')->name('cotizacion_store');
    Route::get('cotizacion/{id}','CotizacionController@show');
    Route::post('addcotizacion', 'CotizacionController@add')->name('addcotizacion');
    Route::post('removecotizacion', 'CotizacionController@remove')->name('removecotizacion');
    Route::get('cotizacion/{id_cotizacion}/imprimir','PdfController@imprimirCotizacion');
    
    
    Route::get('arrendar','ArriendoController@create');
    Route::post('arrendar','ArriendoController@store')->name('arriendo_store'); 
    
    Route::get('show_arriendo/{id}','ArriendoController@show')->name('show_arriendo');
    Route::get('show_cotizacion/{id}','CotizacionController@show')->name('show_cotizacion');

    Route::get('mis_arriendos','ArriendoController@mis')->name('mis');
    Route::get('Cancel/{id}','ArriendoController@destroy')->name('cancelar');
    Route::post('addarriendo', 'ArriendoController@add')->name('addarriendo');
    Route::post('removearriendo', 'ArriendoController@remove')->name('removearriendo');
    Route::get('arriendo/{id_arriendo}/imprimir','PdfController@imprimirArriendo');

    
});

/* RUTAS PUBLICAS */

Route::get('nuestros_juegos','JuegoController@index');
Route::get('juego_show','JuegoController@show');
Route::get('contactar','ContactoController@create');
Route::post('pst_contactar','ContactoController@store')->name('post_contactar');
Route::get('/disponibles','JuegoController@disponibles')->name('disponibles');

/*
Route::get('indamobil','MobileController@ind_a_mobile');
Route::get('showamob/{id}','MobileController@show_a_mobile');
Route::get('indcomob','MobileController@index_c_mobile');
Route::get('homobile','MobileController@hoy_mobile');

Route::post('mansmob','MobileController@mnt_s_mobile');

Route::post('elimamob/{id}','MobileController@elim_a_mobile');
Route::post('apramob/{id}','MobileController@apr_a_mobile');


Route::get('index_contacto','ContactoController@index_mobile');

Route::get('index_contacto','ContactoController@index_mobile');
Route::get('show_contacto/{id}','ContactoController@show_mobile');



Route::get('show_arriendos/{id}','ArriendoController@show_mobile');
Route::post('confirmar_arriendo', 'ArriendoController@aprobar_mobile');

Route::get('index_mantencion','MantencionController@index_mobile');
Route::post('confirmar_arriendo', 'MantencionController@store_mobile');
*/