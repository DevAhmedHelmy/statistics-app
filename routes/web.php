<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\CommentApiController;

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

Route::view('app','layouts.app');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/yearly', [HomeController::class, 'getDataYearly'])->name('chart.yearly');
    Route::get('/monthly', [HomeController::class, 'getDataMonthly'])->name('chart.monthly');
    Route::get('/quarterly', [HomeController::class, 'getDataQuarterly'])->name('chart.quarterly');
    Route::get('/topics/category', [HomeController::class, 'getTopicsData'])->name('charts.topics.category');
    Route::get('comments', [HomeController::class, 'getComments'])->name('comments.table');
    // routes when clicking on a charts
    Route::get('comments/types', [HomeController::class, 'getCommentsTypes'])->name('comments.types');
    Route::get('comments/chunks', [HomeController::class, 'getCommentsChunks'])->name('comments.chunks');
    Route::get('comments/trend', [HomeController::class, 'getCommentsTrend'])->name('comments.trend');
    Route::get('comments/category', [HomeController::class, 'getCommentsCategory'])->name('comments.category');
    Route::get('comments/topic', [HomeController::class, 'getCommentsTopic'])->name('comments.topic');
    Route::get('comments/heatmap', [HomeController::class, 'getHeatMapComments'])->name('comments.heatmap');

    Route::post('comments/updateFlag', [CommentApiController::class, 'updateFlag'])->name('comments.updateFlag');
    Route::post('comments/updateBookmark', [CommentApiController::class, 'updateBookmark'])->name('comments.updateBookmark');

    Route::get('upload', [UploadController::class, 'index'])->name('upload.index');
    Route::post('upload', [UploadController::class, 'store'])->name('upload.store');


    Route::resource('users', UserController::class);




});

