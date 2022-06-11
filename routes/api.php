<?php

use App\Http\Controllers\ReporteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */


Route::post('generate-report',[ReporteController::class,'generarReporte']);

Route::get('get-report/{report_id}',[ReporteController::class,'obtenerReporteXId']);

Route::get('list-reports',[ReporteController::class,'listarReportes']);
