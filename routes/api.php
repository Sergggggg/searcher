<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ImportController;
use App\Http\Controllers\Api\ExportController;
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

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {

	Route::middleware('role:webmaster')->group(function() {

    	Route::get('getSites', [ExportController::class, 'getSites']);

    	Route::get('getRentPlaces', [ExportController::class, 'getRentPlaces']);

    	Route::get('getRentPlaceBySite', [ExportController::class, 'getRentPlaceBySite']);

    	Route::post('setHideSite/{id}', [ImportController::class, 'setHideSite']);

    	Route::post('setUpdateSite/{id}', [ImportController::class, 'setUpdateSite']);

    	Route::post('setAdvertisePosition/{site_id}', [ImportController::class, 'setAdvertisePosition']);

    	Route::post('setSites', [ImportController::class, 'setSites']);
    });

	Route::middleware('role:advertiser')->group(function() {

		Route::get('getSearchSite/{search}', [ExportController::class, 'getSearchSite']);

		Route::get('getSearchSite/min/{min}/max/{max}', [ExportController::class, 'getSearchSite']);

		Route::post('setRentPlace/{site_id}', [ImportController::class, 'setRentPlace']);

    });		
});


