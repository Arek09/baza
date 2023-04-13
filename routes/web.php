<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Models\Category;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// $categories = Category::all();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/2', function () {
    return view('login');
});

$categories = "test";
$test;
Route::get('/4',  [ItemController::class, 'create']);

Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::get('/3',  [ItemController::class, 'show'])->name('start');

Route::get('/products/{id}', [ItemController::class, 'delete'])->name('products.destroy');

Route::post('/update/{id}', [ItemController::class, 'update'])->name('items.update');
