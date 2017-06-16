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
use App\Sub_area;

//============================ RUTAS AUTENTIFICACIÓN Y LOGOUT ========================================

Route::get('/', 'LoginController@login')->name('login_entrar');

Route::get('/escritorio', 'EscritorioController@index')->name('escritorio');

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::post('/login', 'LoginController@auth')->name('login_autenticar');

//****************************************************************************************************

// ========================== USUARIOS ========================================
Route::get('perfil','UsuariosController@perfil')->name('perfil');
Route::patch('users/update_perfil','UsuariosController@update_perfil')->name('update_perfil');
Route::resource('usuario', 'UsuariosController');
Route::resource('usuarios_simples', 'UsuariosSimplesController');
//

//*****************************************************************************

//================ Sub-Areas ===================================
Route::resource('sub_area', 'SubAreaController');
 //*****************************************************************

//========================= ROLES ===================================
	Route::get('roles','RolesController@index')->name('roles.index');
	Route::get('roles/create' , 'RolesController@create');
	Route::post('roles','RolesController@registrar')->name('roles.store');
	Route::put('roles/{id}' ,'RolesController@editar');
	Route::get('roles/{id}/edit','RolesController@update')->name('roles.update');
	Route::get('roles/{id}' , 'RolesController@show');
	Route::delete('roles/{id}','RolesController@destroy');
 //*****************************************************************

//========================== DEVELOOPERS ===============================
	Route::resource('/departamentos','DepartamentosController');
	Route::resource('/areas','AreasController');

//**********************************************************************

// ====================== COMPRAS ====================================

	Route::resource('com_configuracion', 'Compras\\ConfigurarController');
	Route::resource('com_proveedores', 'Compras\\ProveedoresController');
	Route::resource('com_unidades', 'Compras\\UnidadesMedidaController');
	Route::resource('com_departamentos', 'Compras\\DepartamentosController');
	Route::resource('com_requisicion', 'Compras\\RequisicionesController');

//*********************************************************************

// ====================== INSUMOS ====================================

	Route::resource('/insumos','Compras\\InsumosController');

//*********************************************************************

// ====================== Requisicion Detalles ====================================

	Route::resource('/req_detalle','Compras\\RequisicionDetalleController');

//****



$sub_area = Sub_area::all();

foreach ($sub_area as $sub) {
	$x = explode('.',$sub->ruta);
 	Route::get($sub->nombre,$x[0].'Controller@'.$x[1])->name($sub->ruta);
}