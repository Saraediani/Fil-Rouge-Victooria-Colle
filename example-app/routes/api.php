<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
Route::prefix('/product')->group(function () {
    Route::get('/',[App\Http\Controllers\productController::class,'index']);
    Route::get('/{product:id}',[App\Http\Controllers\productController::class,'show']);
    Route::get('/edit/{product:id}',[App\Http\Controllers\productController::class,'edit']);
    Route::post('/update/{product:id}',[App\Http\Controllers\productController::class,'update']);
    Route::post('/add',[App\Http\Controllers\productController::class,'store']);
    Route::delete('/{product:id}',[App\Http\Controllers\productController::class,'destroy']);
    Route::get('/search/{product:name}',[App\Http\Controllers\productController::class,'search']);
});

Route::prefix('/admin')->group(function () {
    Route::get('/',[App\Http\Controllers\adminController::class,'index'])->middleware('apiAuth');
    Route::get('/{admin:id}',[App\Http\Controllers\adminController::class,'show']);
    Route::get('/edit/{admin:id}',[App\Http\Controllers\adminController::class,'edit']);
    Route::post('/update/{admin:id}',[App\Http\Controllers\adminController::class,'store']);
    Route::post('/add',[App\Http\Controllers\adminController::class,'store']);
    Route::delete('/{admin:id}',[App\Http\Controllers\adminController::class,'destroy']);
});
Route::prefix('/category')->group(function () {
    Route::get('/p',[App\Http\Controllers\categoryController::class,'indexWithProducts'])->middleware('apiAuth');
    Route::get('/',[App\Http\Controllers\categoryController::class,'index'])->middleware('apiAuth');
    Route::get('/{category:id}',[App\Http\Controllers\categoryController::class,'show']);
    Route::get('/edit/{category:id}',[App\Http\Controllers\categoryController::class,'edit']);
    Route::post('/update/{category:id}',[App\Http\Controllers\categoryController::class,'store']);
    Route::post('/add',[App\Http\Controllers\categoryController::class,'store']);
    Route::delete('/{category:id}',[App\Http\Controllers\categoryController::class,'destroy']);
    Route::get('/search/{category:name}',[App\Http\Controllers\categoryController::class,'search']);
});
Route::prefix('/comment')->group(function () {
    Route::get('/',[App\Http\Controllers\commentController::class,'index'])->middleware('apiAuth');
    Route::get('/{comment:id}',[App\Http\Controllers\commentController::class,'show']);
    Route::get('/edit/{comment:id}',[App\Http\Controllers\commentController::class,'edit']);
    Route::post('/update/{comment:id}',[App\Http\Controllers\commentController::class,'store']);
    Route::post('/add',[App\Http\Controllers\commentController::class,'store']);
    Route::delete('/{comment:id}',[App\Http\Controllers\commentController::class,'destroy']);
    Route::get('/search/{comment:name}',[App\Http\Controllers\commentController::class,'search']);
});
Route::prefix('/emploie')->group(function () {
    Route::get('/',[App\Http\Controllers\emploieController::class,'index'])->middleware('apiAuth');
    Route::get('/{emploie:id}',[App\Http\Controllers\emploieController::class,'show']);
    Route::get('/edit/{emploie:id}',[App\Http\Controllers\emploieController::class,'edit']);
    Route::post('/update/{emploie:id}',[App\Http\Controllers\emploieController::class,'store']);
    Route::post('/add',[App\Http\Controllers\emploieController::class,'store']);
    Route::delete('/{emploie:id}',[App\Http\Controllers\emploieController::class,'destroy']);
    Route::get('/search/{emploie:name}',[App\Http\Controllers\emploieController::class,'search']);
});
Route::prefix('/orderProduct')->group(function () {
    Route::get('/',[App\Http\Controllers\orderProductController::class,'index'])->middleware('apiAuth');
    Route::get('/',[App\Http\Controllers\orderProductController::class,'show']);
    Route::get('/edit/{orderProduct:id}',[App\Http\Controllers\orderProductController::class,'edit']);
    Route::post('/update/{orderProduct:id}',[App\Http\Controllers\orderProductController::class,'store']);
    Route::post('/add',[App\Http\Controllers\orderProductController::class,'store']);
    Route::delete('/{orderProduct:id}',[App\Http\Controllers\orderProductController::class,'destroy']);
    Route::get('/search/{orderProduct:name}',[App\Http\Controllers\orderProductController::class,'search']);
});
Route::prefix('/order')->group(function () {
    Route::get('/',[App\Http\Controllers\orderController::class,'index'])->middleware('apiAuth');
    Route::get('/',[App\Http\Controllers\orderController::class,'show']);
    Route::get('/edit/{order:id}',[App\Http\Controllers\orderController::class,'edit']);
    Route::post('/update/{order:id}',[App\Http\Controllers\orderController::class,'store']);
    Route::post('/add',[App\Http\Controllers\orderController::class,'store']);
    Route::delete('/{order:id}',[App\Http\Controllers\orderController::class,'destroy']);
    Route::get('/search/{order:name}',[App\Http\Controllers\orderController::class,'search']);
});
Route::prefix('/regiont')->group(function () {
    Route::get('/',[App\Http\Controllers\regiontController::class,'index']);
    // Route::get('/',[App\Http\Controllers\regiontController::class,'show']);
    Route::get('/edit/{regiont:id}',[App\Http\Controllers\regiontController::class,'edit']);
    Route::post('/update/{regiont:id}',[App\Http\Controllers\regiontController::class,'store']);
    Route::post('/add',[App\Http\Controllers\regiontController::class,'store']);
    Route::delete('/{regiont:id}',[App\Http\Controllers\regiontController::class,'destroy']);
    Route::get('/search/{regiont:name}',[App\Http\Controllers\regiontController::class,'search']);
});
Route::post('/register',[App\Http\Controllers\AuthController::class,'register']);
Route::post('/logout',[App\Http\Controllers\AuthController::class,'logout']);
Route::post('/login',[App\Http\Controllers\AuthController::class,'login']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/contact', [App\Http\Controllers\MailsController::class,'contact']);
Route::post('/makeOrder', [App\Http\Controllers\MailsController::class,'order']);

Route::post('/newsletter', [App\Http\Controllers\newsletterController::class,'join']);