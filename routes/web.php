<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\AdminSendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPrisonerController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;

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
    return redirect('/back-login');
});

//cek role as
Route::get('/back-dashboard', [HomeController::class, 'index'])->name('back-dashboard');

//user
Route::get('/back-user/back-dashboard', [UserDashboardController::class, 'index']);

//pengiriman barang
Route::get('/back-user/riwayat-pengiriman-barang', [SendController::class, 'index']);
Route::post('/back-user/riwayat-pengiriman-barang/show/{send}', [SendController::class, 'show']);
Route::get('/back-user/pengiriman-barang', [SendController::class, 'create']);
Route::post('/back-user/pengiriman-barang/store', [SendController::class, 'store']);

Route::group(['middleware' => ['role:admin']], function () {
    //admin
    Route::get('/back-admin/back-dashboard', [AdminDashboardController::class, 'index']);

    Route::get('/back-admin/admin', [AdminController::class, 'index']);
    Route::get('/back-admin/admin/create', [AdminController::class, 'create']);
    Route::post('/back-admin/admin/store', [AdminController::class, 'store']);
    Route::post('/back-admin/admin/edit/{admin}', [AdminController::class, 'edit']);
    Route::put('/back-admin/admin/update/{admin}', [AdminController::class, 'update']);
    Route::delete('/back-admin/admin/destroy/{admin}', [AdminController::class, 'destroy']);


    //tahanan
    Route::get('/back-admin/prisoner', [AdminPrisonerController::class, 'index']);
    Route::get('/back-admin/prisoner/create', [AdminPrisonerController::class, 'create']);
    //import tahanan from file
    Route::post('/back-admin/prisoner/store', [AdminPrisonerController::class, 'store']);
    Route::post('/back-admin/prisoner/import', [AdminPrisonerController::class, 'importFile']);
    Route::post('/back-admin/prisoner/edit/{prisoner}', [AdminPrisonerController::class, 'edit']);
    Route::put('/back-admin/prisoner/update/{prisoner}', [AdminPrisonerController::class, 'update']);
    Route::delete('/back-admin/prisoner/destroy/{prisoner}', [AdminPrisonerController::class, 'destroy']);

    //send
    Route::get('/back-admin/pengiriman/data', [AdminSendController::class, 'data']);
    Route::get('/back-admin/pengiriman/riwayat', [AdminSendController::class, 'riwayat']);
    Route::post('/back-admin/pengiriman/riwayat/show/{send}', [AdminSendController::class, 'show']);
    Route::post('/back-admin/pengiriman/edit/{send}', [AdminSendController::class, 'edit']);
    Route::put('/back-admin/pengiriman/update/{send}', [AdminSendController::class, 'update']);
    //export pengiriman to file (with to and from parameter)
    Route::get('/back-admin/pengiriman/eksport', [AdminSendController::class, 'eksport']);
    Route::get('/back-admin/pengiriman/download', [AdminSendController::class, 'eksportToExcel']);
});


require __DIR__ . '/auth.php';
