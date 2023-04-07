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
$categories = Category::all();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/2', function () {
    return view('login');
});
Route::get('/3', function () {
    return view('home');
});


Route::get('/4', function () {
    return view('add_item', ['categories' => $categories]);
});

Route::post('/items', [ItemController::class, 'store'])->name('items.store');
