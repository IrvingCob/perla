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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/logout', 'Auth\LoginController@logout');  //Esta ruta nos resuelve el problema de cerrar sesion en laravel 5.3 usando adminLTE

Route::resource('proveedor/proveedor', 'Proveedor\ProveedorController');
Route::resource('bitacora/bitacora', 'Bitacora\BitacoraController');

// Relasion para crear bitacoras personales
Route::get('bitacora/bitacora/{vendor_id}/create', 'Bitacora\BitacoraController@create');
Route::get('bitacora/bitacora/{vendor_id}/{$id}/edit', 'Bitacora\BitacoraController@edit');

Route::get('bitacora/bitacora/{id}/verBitacora', 'bitacora\bitacoraController@verBitacora');


// Relasion para crear proveedor - historial
Route::get('historial/historial/{id}/verHistorial', 'historial\historialController@verHistorial');
Route::get('historial/historial/{vendor_id}/create', 'Historial\HistorialController@create');

// Relasion para crear proveedor - viveres
Route::get('viver/viver/{id}/verViveres', 'viver\viverController@verViveres');
Route::get('viver/viver/{vendor_id}/create', 'Viver\ViverController@create');
Route::get('viver/viver/{vendor_id}/{$id}/edit', 'Viver\ViverController@edit');



// Relaciones en vistas individuales
Route::resource('viver/viver', 'Viver\ViverController');
Route::resource('historial/historial', 'Historial\HistorialController');
Route::resource('status/status', 'Status\StatusController');
Route::resource('bitacoras/bitacoras', 'Bitacoras\BitacorasController');


// PDF
Route::get('/bitacoras-reports/{id}','Bitacoras\BitacorasController@exportpdf')->name('bitacoras.exportpdf');
Route::get('/historiales-reports/{id}','Historiales\HistorialesController@exportpdf')->name('historiales.exportpdf');
Route::get('/viveres-reports/{id}','Viveres\ViveresController@exportpdf')->name('viveres.exportpdf');

// Excel



Route::get('/export-bitacore/{id}', 'Bitacora\BitacoraController@exportxls')->name('bitacoras.exportxls');

Route::get('/export-history/{id}', 'Historial\HistorialController@export')->name('historiales.exportxls');

Route::get('/export-viver/{id}', 'Viver\ViverController@exportxls')->name('viveres.exportxls');








Route::resource('historiales/historiales', 'Historiales\HistorialesController');
Route::resource('producto/producto', 'Producto\ProductoController');
Route::resource('viveres/viveres', 'Viveres\ViveresController');




Route::get('adminlte::home','HomeController@graficaBitacora');

Route:: get ('/ayuda', function ()
{
  return view('/ayuda');
});