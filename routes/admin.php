<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\BatchController;
use Illuminate\Support\Facades\Route;




Route::get('/', [InicioController::class, 'index'])->middleware('auth')->name('inicio.index');
Route::post('all', [InicioController::class, 'all'])->middleware('auth')->name('inicio.all');

Route::get('medicamentos', [MedicineController::class, 'index'])->middleware('auth')->name('medicamentos.index');
Route::get('medicamentos/create', [MedicineController::class, 'create'])->middleware('auth')->name('medicamentos.create');
Route::post('medicamentos/all', [MedicineController::class, 'all'])->middleware('auth')->name('medicamentos.all');
Route::post('medicamentos/infoedit', [MedicineController::class, 'infoedit'])->middleware('auth');
Route::post('medicamentos/delmedic', [MedicineController::class, 'delmedic'])->middleware('auth');
Route::put('medicamentos/{id}/update', [MedicineController::class, 'update'])->middleware('auth')->name('medicamentos.update');
Route::post('medicamentos/store', [MedicineController::class, 'store'])->middleware('auth')->name('medicamentos.store');
Route::post('medicamentos/medPrice', [MedicineController::class, 'medPrice'])->middleware('auth')->name('medicamentos.medPrice');
Route::post('medicamentos/medBatch', [MedicineController::class, 'medBatch'])->middleware('auth')->name('medicamentos.medBatch');
Route::post('medicamentos/artPrice', [MedicineController::class, 'artPrice'])->middleware('auth')->name('medicamentos.artPrice');
Route::post('medicamentos/precios', [MedicineController::class, 'precios'])->middleware('auth')->name('medicamentos.precios');
Route::post('medicamentos/updprecios', [MedicineController::class, 'preciosUpd'])->middleware('auth')->name('medicamentos.prec_upd');


Route::get('articulos',[ArticleController::class, 'index'])->middleware('auth')->name('articles.index');
Route::get('articulos/create',[ArticleController::class, 'create'])->middleware('auth')->name('articles.create');
Route::post('articulos/store',[ArticleController::class, 'store'])->middleware('auth')->name('articles.store');
Route::put('articulos/{id}/update', [ArticleController::class, 'update'])->middleware('auth')->name('articles.update');



Route::post('clientes/store', [CustomerController::class, 'store'])->middleware('auth')->name('clientes.store');

Route::post('detail/store',[DetailController::class,'store'])->middleware('auth')->name('detail.store');
Route::post('detail/update',[DetailController::class,'update'])->middleware('auth')->name('detail.update');
Route::delete('detail/destroy/{id}', [DetailController::class, 'destroy'])->middleware('auth')->name('detail.destroy');
Route::post('detail/infoedit', [DetailController::class, 'infoedit'])->middleware('auth');

Route::get('ventas', [SaleController::class, 'index'])->middleware('auth')->name('ventas.index');
Route::post('ventas/create', [SaleController::class, 'create'])->middleware('auth')->name('ventas.create');
Route::get('ventas/invoice/{id}', [SaleController::class, 'invoice'])->middleware('auth')->name('ventas.invoice');
Route::get('ventas/{id}', [SaleController::class, 'show'])->middleware('auth')->name('ventas.show');
Route::get('ventas/edit/{id}', [SaleController::class, 'edit'])->middleware('auth')->name('ventas.edit');
Route::post('ventas/update/{id}', [SaleController::class, 'update'])->middleware('auth')->name('ventas.update');
Route::get('ventas/reporte/{id}', [SaleController::class, 'vista'])->middleware('auth')->name('vistapdf.vista');
Route::get('ventas/reporte/pdf/{id}', [SaleController::class, 'generarPdf'])->middleware('auth')->name('generarpdf.reporte');
Route::post('ventas/store', [SaleController::class, 'store'])->middleware('auth')->name('ventas.store');;
Route::get('ventas/ticket/{id}', [SaleController::class, 'ticket'])->middleware('auth')->name('vistaticket.ventas');
Route::get('ventas/ticket/pdf/{id}', [SaleController::class, 'generar_ticeketPdf'])->middleware('auth')->name('generar_pdfticket.ventas');
Route::get('ventas/fechas', [SaleController::class, 'getFechas'])->middleware('auth');



Route::get('ventas/anular/{id}', [SaleController::class, 'anular'])->middleware('auth')->name('ventas.anular');

Route::get('reportes', [ReporteController::class, 'index'])->middleware('auth')->name('reportes.index');
Route::get('reportes/top', [ReporteController::class, 'top'])->middleware('auth')->name('reportes.top');
Route::get('reportes/bot', [ReporteController::class, 'bot'])->middleware('auth')->name('reportes.bot');
Route::get('reportes/ven', [ReporteController::class, 'ven'])->middleware('auth')->name('reportes.ven');
Route::get('reportes/economico', [ReporteController::class, 'economic'])->middleware('auth')->name('reportes.eco');
Route::get('reportes/diaily', [ReporteController::class, 'diaily'])->middleware('auth')->name('reportes.diaily');
Route::post('reportes/economico/year', [ReporteController::class, 'economicYear'])->middleware('auth');
Route::post('reportes/economico/month', [ReporteController::class, 'economicMonth'])->middleware('auth');
Route::post('reportes/economico/day', [ReporteController::class, 'economicDay'])->middleware('auth');
Route::post('reportes/top/day', [ReporteController::class, 'topDay'])->middleware('auth');
Route::post('reportes/bot/day', [ReporteController::class, 'botDay'])->middleware('auth');
Route::post('reportes/top/fecha', [ReporteController::class, 'topFecha'])->middleware('auth');
Route::post('reportes/top/sellday', [ReporteController::class, 'sellsDay'])->middleware('auth');

Route::get('exportfile',[ReporteController::class, 'export'])->middleware('auth')->name('export');

Route::get('stock', [StockController::class, 'index'])->middleware('auth')->name('stock.index');
Route::get('stock/create', [StockController::class, 'create'])->middleware('auth')->name('stock.create');
Route::post('stock/store', [StockController::class, 'store'])->middleware('auth')->name('stock.store');
Route::post('stock/all', [StockController::class, 'all'])->middleware('auth')->name('stock.all');
Route::post('stock/delstock', [StockController::class, 'delstock'])->middleware('auth')->name('stock.delete');
Route::post('stock/update', [StockController::class, 'update'])->middleware('auth')->name('stock.update');
Route::post('stock/infoedit', [StockController::class, 'infoedit'])->middleware('auth');
Route::get('stock/export',[StockController::class, 'export'])->middleware('auth')->name('stock.export');
Route::get('stock/buscar',[StockController::class, 'buscar'])->middleware('auth')->name('stock.buscar');

Route::get('principal', [PrincipalController::class, 'index'])->middleware('auth')->name('principal.index');
Route::post('principal/store', [PrincipalController::class, 'store'])->middleware('auth')->name('principal.store');
Route::get('principal/{id}/edit', [PrincipalController::class, 'edit'])->middleware('auth')->name('principal.edit');
//Route::put('principal/update/{}',[PrincipalController::class, 'update'])->name('principal.update');
Route::get('principal/editar_1', [PrincipalController::class, 'editar_1'])->middleware('auth')->name('principal.editar_1');
Route::get('principal/editar_2', [PrincipalController::class, 'editar_2'])->middleware('auth')->name('principal.editar_2');


Route::put('batch/{id}/update', [BatchController::class, 'update'])->middleware('auth')->name('batch.update');
Route::delete('batch/{id}/delete', [BatchController::class, 'destroy'])->name('batch.delete');



