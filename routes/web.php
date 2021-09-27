<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;




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
Route::put('/result_save', [ContentController::class, 'result_save'])->middleware(['auth'])->name('result_save');
Route::get('/each_request/{pickup_id}', [ContentController::class, 'each_request'])->middleware(['auth'])->name('each_request');



Route::get('/mypage', [UserController::class, 'mypage'])->middleware(['auth'])->name('mypage');
Route::get('/profile/{id}', [UserController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::get('/myprofile_edit', [UserController::class, 'myprofile_edit'])->middleware(['auth'])->name('myprofile_edit');
Route::post('/myprofile_update', [UserController::class, 'myprofile_update'])->middleware(['auth'])->name('myprofile_update');
Route::get('/info', [UserController::class, 'info'])->middleware(['auth'])->name('info');
Route::get('/now_on_deal', [UserController::class, 'now_on_deal'])->middleware(['auth'])->name('now_on_deal');
Route::get('/history_and_evaluation', [UserController::class, 'history_and_evaluation'])->middleware(['auth'])->name('history_and_evaluation');
Route::get('/setting', [UserController::class, 'setting'])->middleware(['auth'])->name('setting');
Route::get('/terms_of_service', [UserController::class, 'terms_of_service'])->middleware(['auth'])->name('terms_of_service');
Route::get('/help', [UserController::class, 'help'])->middleware(['auth'])->name('help');
Route::get('/like_list', [UserController::class, 'like_list'])->middleware(['auth'])->name('like_list');




Route::post('/message_save', [MessageController::class, 'message_save'])->middleware(['auth'])->name('message_save');

require __DIR__ . '/auth.php';
