<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;

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

//問い合わせ、確認、Thanksページ
Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);

//管理用ページの表示、認証ミドルウェア
Route::middleware('auth')->group(
    function () {
        Route::get('/admin', [ContactController::class, 'admin']);
    }
);

//検索機能
Route::get('/admin/search', [ContactController::class, 'search']);

//エクスポート機能
Route::get('/admin/export', [ContactController::class, 'export']);

