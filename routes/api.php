<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource("/category",CategoryController::class);
Route::apiResource("/unit",UnitController::class);
Route::apiResource("/brand",BrandController::class);
Route::apiResource("/tax",TaxController::class);
Route::apiResource("/contact",ContactController::class);
Route::apiResource("/productType",ProductTypeController::class);
Route::apiResource("/product",ProductController::class);
Route::get("/migrate",function(){
    $artisan = Artisan::call("migrate");
    $output = Artisan::output();
    return $output;
});
Route::get("/migrate/refresh",function(){
    $artisan = Artisan::call("migrate:refresh");
    $output = Artisan::output();
    return $output;
});