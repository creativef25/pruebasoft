<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AccionesController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('password/email', [AuthController::class, 'forgot']);
Route::post('password/reset', [AuthController::class, 'reset']);
Route::group(['middleware' => 'auth:api'], function(){
  Route::apiResource('usuarios', API\TwUsuariosController::class);
  Route::apiResource('empresas-corporativos', API\TwEmpresasCorController::class);
  Route::apiResource('documentos-corporativos', API\TwDocumentosCorController::class);
  Route::apiResource('documentos', API\TwDocumentosController::class);
  Route::apiResource('corporativos', API\TwCorporativosController::class);
  Route::apiResource('contratos-corporativos', API\TwContratosCorpController::class);
  Route::apiResource('contactos-corporativos', API\TwContactosCorpController::class);
  Route::get('info-corporativo/{id}', [AccionesController::class, 'corporativoInfo']);
  Route::get('info-documento/{id}', [AccionesController::class, 'documentoInfo']);
  Route::get('logout', [AuthController::class, 'logout']);
});

/*Route::apiResource('usuarios', API\TwUsuariosController::class)->middleware('auth:api');
Route::apiResource('empresas-corporativos', API\TwEmpresasCorController::class)->middleware('auth:api');
Route::apiResource('documentos-corporativos', API\TwDocumentosCorController::class)->middleware('auth:api');
Route::apiResource('documentos', API\TwDocumentosController::class)->middleware('auth:api');
Route::apiResource('corporativos', API\TwCorporativosController::class)->middleware('auth:api');
Route::apiResource('contratos-corporativos', API\TwContratosCorpController::class)->middleware('auth:api');
Route::apiResource('contactos-corporativos', API\TwContactosCorpController::class)->middleware('auth:api');*/
