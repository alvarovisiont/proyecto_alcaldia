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

// =========================== METODOS AJAX REUTILIZABLES =======================================
	 // ==== Comprass
		Route::get('com_traer_detalles','AjaxController@traer_detalles_ordenes');
	 // ==== Contabilidad
		Route::get('cont_traer_auxiliares','AjaxController@traer_auxliares_cuentas');

// *************************************************************************************************

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
	Route::resource('com_insumos','Compras\\InsumosController');
	Route::resource('com_req_detalle','Compras\\RequisicionDetalleController');
	Route::resource('com_ordenes', 'Compras\\OrdenesController');
	Route::resource('com_ordenes_detalle', 'Compras\\OrdenesDetalleController');


	// ====================== Reportes de compras ====================================

	Route::get('/rep_insumos','Compras\\ReportesController@pdf_insumos')->name('pdf.insumos');
	Route::get('/re_requisicion','Compras\\ReportesController@requision')->name('vista.requisicion');
	Route::post('/bus_req','Compras\\ReportesController@busqueda_requisicion')->name('busqueda.requisicion');
	Route::get('/re_departamentos','Compras\\ReportesController@pdf_departamentos')->name('pdf.departamentos');
	Route::get('/re_proveedor','Compras\\ReportesController@pdf_proveedor')->name('pdf.proveedor');
	Route::get('/re_unidades','Compras\\ReportesController@pdf_unidades')->name('pdf.unidades');
	Route::get('/vista_ordenes_pdf', 'Compras\\ReportesController@vista_ordenes_pdf')->name('vista_pdf.ordenes');
	Route::post('/imprimir_ordenes_pdf', 'Compras\\ReportesController@generar_ordenes_pdf')->name('pdf.ordenes');

	//****

//*********************************************************************

// ** ================================ CONTABILIDAD ========================================= ** //

	Route::resource('cont_configuracion', 'Contabilidad\\ConfigController');
	Route::resource('cont_maestroCuentas', 'Contabilidad\\MaestroCuentasController');
	Route::resource('cont_auxiliares', 'Contabilidad\\AuxiliaresController');
	Route::resource('cont_asientos', 'Contabilidad\\AsientosController');
	Route::post('cont_asiento_detalles', 'Contabilidad\\AsientoDetallesController@store');
	Route::delete('cont_asiento_detalles/{id}', 'Contabilidad\\AsientoDetallesController@delete');
	Route::get('/cont_libro_mayor_pdf','Contabilidad\\ReportesController@libro_mayor_pdf');

// ** ======================================================================================= ** //



$sub_area = Sub_area::all();

foreach ($sub_area as $sub) {
	$x = explode('.',$sub->ruta);
 	Route::get($sub->nombre,$x[0].'Controller@'.$x[1])->name($sub->ruta);
}