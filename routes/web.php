<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;




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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/fish-list', function () {
    return view('admin.fishes.fish-list');
});


// Route::get('/', function () {
//     return view('index');
// });

// Auth::routes();

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::get('/dashboard', [ContentController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/pickup_guide', [ContentController::class, 'pickup_guide'])->middleware(['auth'])->name('pickup_guide');
Route::get('/start_guide', [ContentController::class, 'start_guide'])->middleware(['auth'])->name('start_guide');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/input', [ContentController::class, 'input'])->middleware(['auth'])->name('input');
Route::post('/save', [ContentController::class, 'save'])->middleware(['auth'])->name('save');
Route::get('/output', [ContentController::class, 'output'])->middleware(['auth'])->name('output');
Route::get('/detail/{content_id}', [ContentController::class, 'detail'])->middleware(['auth'])->name('detail');
Route::get('/edit/{content_id}', [ContentController::class, 'edit'])->middleware(['auth'])->name('edit');
Route::post('/update', [ContentController::class, 'update'])->middleware(['auth'])->name('update');
Route::get('/delete/{content_id}', [ContentController::class, 'delete'])->middleware(['auth'])->name('delete');
Route::get('/pickup_request/{content_id}', [ContentController::class, 'pickup_request'])->middleware(['auth'])->name('pickup_request');
Route::post('/pickup_request_save', [ContentController::class, 'pickup_request_save'])->middleware(['auth'])->name('pickup_request_save');
Route::post('/pickup_request_comfirm', [ContentController::class, 'pickup_request_comfirm'])->middleware(['auth'])->name('pickup_request_comfirm');
Route::get('/pickup_request_list', [ContentController::class, 'pickup_request_list'])->middleware(['auth'])->name('pickup_request_list');
Route::get('/pickup_request_detail', [ContentController::class, 'pickup_request_detail'])->middleware(['auth'])->name('pickup_request_detail');

Route::get('/mypage/{user_id}', [UserController::class, 'mypage'])->middleware(['auth'])->name('mypage');
Route::get('/myprofile/{user_id}', [UserController::class, 'myprofile'])->middleware(['auth'])->name('myprofile');
Route::get('/myprofile_edit/{user_id}', [UserController::class, 'myprofile_edit'])->middleware(['auth'])->name('myprofile_edit');
Route::get('/info/{user_id}', [UserController::class, 'info'])->middleware(['auth'])->name('info');

require __DIR__ . '/auth.php';
