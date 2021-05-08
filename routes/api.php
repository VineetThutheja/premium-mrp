<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("/category",CategoryController::class);
Route::apiResource("/unit",UnitController::class);
Route::apiResource("/brand",BrandController::class);

Route::get("/migrate",function(){
    $artisan = Artisan::call("migrate");
    $output = Artisan::output();
    return $output;
});