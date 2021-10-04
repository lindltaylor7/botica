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
use Illuminate\Support\Facades\Route;




Route::get('/', [InicioController::class, 'index'])->middleware('auth')->name('inicio.index');
Route::post('all', [InicioController::class, 'all'])->name('inicio.all');

Route::get('medicamentos', [MedicineController::class, 'index'])->name('medicamentos.index');
Route::get('medicamentos/create', [MedicineController::class, 'create'])->name('medicamentos.create');
Route::post('medicamentos/all', [MedicineController::class, 'all'])->name('medicamentos.all');
Route::post('medicamentos/infoedit', [MedicineController::class, 'infoedit']);
Route::post('medicamentos/delmedic', [MedicineController::class, 'delmedic']);
Route::put('medicamentos/{id}/update', [MedicineController::class, 'update'])->name('medicamentos.update');
Route::post('medicamentos/store', [MedicineController::class, 'store'])->name('medicamentos.store');
Route::post('medicamentos/medPrice', [MedicineController::class, 'medPrice'])->name('medicamentos.medPrice');
Route::post('medicamentos/artPrice', [MedicineController::class, 'artPrice'])->name('medicamentos.artPrice');
Route::post('medicamentos/precios', [MedicineController::class, 'precios'])->name('medicamentos.precios');
Route::post('medicamentos/updprecios', [MedicineController::class, 'preciosUpd'])->name('medicamentos.prec_upd');


Route::get('articulos',[ArticleController::class, 'index'])->name('articles.index');
Route::get('articulos/create',[ArticleController::class, 'create'])->name('articles.create');
Route::post('articulos/store',[ArticleController::class, 'store'])->name('articles.store');
Route::put('articulos/{id}/update', [ArticleController::class, 'update'])->name('articles.update');



Route::post('clientes/store', [CustomerController::class, 'store'])->name('clientes.store');

Route::post('detail/store',[DetailController::class,'store'])->name('detail.store');
Route::post('detail/update',[DetailController::class,'update'])->name('detail.update');
Route::delete('detail/destroy/{id}', [DetailController::class, 'destroy'])->name('detail.destroy');
Route::post('detail/infoedit', [DetailController::class, 'infoedit']);

Route::get('ventas', [SaleController::class, 'index'])->name('ventas.index');
Route::post('ventas/create', [SaleController::class, 'create'])->name('ventas.create');
Route::get('ventas/invoice/{id}', [SaleController::class, 'invoice'])->name('ventas.invoice');
Route::get('ventas/{id}', [SaleController::class, 'show'])->name('ventas.show');
Route::post('ventas/update/{id}', [SaleController::class, 'update'])->name('ventas.update');
Route::get('ventas/reporte/{id}', [SaleController::class, 'vista'])->name('vistapdf.vista');
Route::get('ventas/reporte/pdf/{id}', [SaleController::class, 'generarPdf'])->name('generarpdf.reporte');
Route::post('ventas/store', [SaleController::class, 'store'])->name('ventas.store');;
Route::get('ventas/ticket/{id}', [SaleController::class, 'ticket'])->name('vistaticket.ventas');
Route::get('ventas/ticket/pdf/{id}', [SaleController::class, 'generar_ticeketPdf'])->name('generar_pdfticket.ventas');
Route::get('ventas/fechas', [SaleController::class, 'getFechas']);



Route::get('ventas/anular/{id}', [SaleController::class, 'anular'])->name('ventas.anular');

Route::get('reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::get('reportes/top', [ReporteController::class, 'top'])->name('reportes.top');
Route::get('reportes/bot', [ReporteController::class, 'bot'])->name('reportes.bot');
Route::get('reportes/ven', [ReporteController::class, 'ven'])->name('reportes.ven');
Route::post('reportes/top/day', [ReporteController::class, 'topDay']);
Route::post('reportes/bot/day', [ReporteController::class, 'botDay']);
Route::post('reportes/top/fecha', [ReporteController::class, 'topFecha']);
Route::post('reportes/top/sellday', [ReporteController::class, 'sellsDay']);

Route::get('exportfile',[ReporteController::class, 'export'])->name('export');

Route::get('stock', [StockController::class, 'index'])->name('stock.index');
Route::get('stock/create', [StockController::class, 'create'])->name('stock.create');
Route::post('stock/store', [StockController::class, 'store'])->name('stock.store');
Route::post('stock/all', [StockController::class, 'all'])->name('stock.all');
Route::post('stock/delstock', [StockController::class, 'delstock'])->name('stock.delete');
Route::post('stock/update', [StockController::class, 'update'])->name('stock.update');
Route::post('stock/infoedit', [StockController::class, 'infoedit']);
Route::get('stock/export',[StockController::class, 'export'])->name('stock.export');

Route::get('principal', [PrincipalController::class, 'index'])->name('principal.index');
Route::post('principal/store', [PrincipalController::class, 'store'])->name('principal.store');
Route::get('principal/{id}/edit', [PrincipalController::class, 'edit'])->name('principal.edit');
//Route::put('principal/update/{}',[PrincipalController::class, 'update'])->name('principal.update');
Route::get('principal/editar_1', [PrincipalController::class, 'editar_1'])->name('principal.editar_1');
Route::get('principal/editar_2', [PrincipalController::class, 'editar_2'])->name('principal.editar_2');





