<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [\App\Http\Controllers\RequestController::class, 'all']);
Route::get('/request/create', [\App\Http\Controllers\RequestController::class, 'getCreate']);
Route::post('/request/create', [\App\Http\Controllers\RequestController::class, 'postCreate']);
Route::get('/request/{request}', [\App\Http\Controllers\RequestController::class, 'show']);
Route::get('/request/{request}/send', [\App\Http\Controllers\RequestController::class, 'sendRequest']);
Route::get('/request/{request}/delete', [\App\Http\Controllers\RequestController::class, 'deleteRequest']);
Route::get('/request/{request}/find-hidden-comments', [\App\Http\Controllers\RequestController::class, 'findComments']);

Route::get('/collection/all', [\App\Http\Controllers\CollectionController::class, 'all']);
Route::get('/collection/create', [\App\Http\Controllers\CollectionController::class, 'getCreate']);
Route::post('/collection/create', [\App\Http\Controllers\CollectionController::class, 'postCreate']);
Route::get('/collection/{collection}', [\App\Http\Controllers\CollectionController::class, 'show']);
Route::get('/collection/{collection}/delete', [\App\Http\Controllers\CollectionController::class, 'delete']);
Route::get('/collection/{collection}/request/{request}/remove', [\App\Http\Controllers\CollectionController::class, 'removeRequestFromCollection']);
Route::post('/collection/{collection}/request/add', [\App\Http\Controllers\CollectionController::class, 'addRequestToCollection']);


