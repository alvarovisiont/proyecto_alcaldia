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
	// reportes 
		Route::get('/cont_libro_mayor_pdf','Contabilidad\\ReportesController@libro_mayor_pdf');
		Route::get('/cont_balance_comprobacion_pdf','Contabilidad\\ReportesController@balance_comprobacion_pdf');
		Route::get('/cont_balance_general_pdf','Contabilidad\\ReportesController@balance_general_pdf');
		
		

// ** ======================================================================================= ** //

//===============================|| RUTAS DE BIENES ||===========================
	Route::post('/bienes_unidades/getDetalles/{id}','bienes\UnidadesController@getDetalles');
	Route::resource('/bienes_unidades','bienes\UnidadesController');
	Route::resource('/bienes_unidades_detalles','bienes\Unidades_detallesController');

	Route::get('/bienes_nomenclaturas_sub','bienes\NomenclaturasController@createsub')->name('bienes_nomenclaturas.createsub');//Subgrupos
	Route::post('/bienes_nomenclaturas_sub','bienes\NomenclaturasController@storesub')->name('bienes_nomenclaturas.storesub');//sugbrupos
	Route::post('/bienes_getSubgrupos','bienes\NomenclaturasController@getSubgrupos')->name('bienes_nomenclaturas.getSubgrupos');//Buscar sugbrupos
	Route::get('/bienes_nomenclaturas_sub2','bienes\NomenclaturasController@createsub2')->name('bienes_nomenclaturas.storesub2'); //Subsubgrupos
	Route::post('/bienes_nomenclaturas_sub2','bienes\NomenclaturasController@storesub2')->name('bienes_nomenclaturas.createsub2'); //Subsubgrupos
	Route::post('bienes_nomenclaturas/getTipoBienes/{id}','bienes\NomenclaturasController@getTipoBienes')->name('bienes_nomenclaturas.getTipoBienes'); //Bienes Asociados
	Route::post('/bienes_getSubgrupos2','bienes\NomenclaturasController@getSubgrupos2')->name('bienes_nomenclaturas.getSubgrupos2');//Buscar subsugbrupos
	Route::resource('/bienes_nomenclaturas','bienes\NomenclaturasController');

	Route::resource('bienes_tipo_bien','bienes\Tipo_bienController');

	Route::resource('bienes_conceptos','bienes\ConceptosController');

	Route::resource('bienes_bienes','bienes\BienesController');

	Route::get('bienes_bienes/bien/{codigo}','bienes\BienesController@bien');

	Route::resource('bienes_movimientos','bienes\MovimientosController');

	Route::post('bienes_reportes/1','bienes\ReportesController@bm1Pdf')->name('bienes_reportes.bm1');
	Route::post('bienes_reportes/2','bienes\ReportesController@bm2Pdf')->name('bienes_reportes.bm2');
	Route::post('bienes_reportes/4','bienes\ReportesController@bm4Pdf')->name('bienes_reportes.bm4');
	Route::post('bienes_reportes/des_incorporaciones','bienes\ReportesController@des_incorporacionesPdf')->name('bienes_reportes.des_incorporaciones');
	Route::post('bienes_reportes/unidades','bienes\ReportesController@unidadesPdf')->name('bienes_reportes.unidades');

//===============================================================================

if (Schema::hasTable('sub_area')){
	$sub_area = Sub_area::all();

	foreach ($sub_area as $sub) {
		$x = explode('.',$sub->ruta);
		//Metodo viejo
 		//Route::get($sub->nombre,$x[0].'Controller@'.$x[1])->name($sub->ruta);
	 	Route::get($sub->area_id."/".$sub->nombre,$x[0].'Controller@'.$x[1])->name($sub->ruta);
	}
}