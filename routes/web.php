<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\SuperAdminController;

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

Route::get('/model/scene.gltf', [ModelController::class, 'index']);
Route::get('/model/scene.bin', [ModelController::class, 'bin']);
Route::get('/model/textures/{tex}', [ModelController::class, 'txt']);
Route::get('/modelDress/scene.gltf', [ModelController::class, 'indexDress']);
Route::get('/modelDress/scene.bin', [ModelController::class, 'binDress']);
Route::get('/modelDress/textures/{tex}', [ModelController::class, 'txtDress']);
Route::get('/vestido_anos_50/scene.gltf', [ModelController::class, 'indexWomen']);
Route::get('/vestido_anos_50/scene.bin', [ModelController::class, 'binWomen']);
Route::get('/vestido_anos_50/textures/{tex}', [ModelController::class, 'txtWomen']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login-process', [AuthController::class, 'login_process'])->name('login-process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/store/{uuid}', [HomeController::class, 'store'])->name('store');
Route::get('/camera/{uuid}', [HomeController::class, 'camera'])->name('user.camera');

Route::get('/about', function () {
    return view('user.about');
})->name('user.about');


Route::middleware('checking')->group(function () {
    //Route SuperADMIN
    Route::get('/superadmin', [SuperAdminController::class, 'index'])->name('superadmin.index');
    // ControlUSER
    Route::get('/superadmin/controlUser', [SuperAdminController::class, 'controlUser'])->name('superadmin.controlUser');
    Route::get('/superadmin/search', [SuperAdminController::class, 'search'])->name('superadmin.search');
    Route::get('/superadmin/create', [SuperAdminController::class, 'create'])->name('superadmin.create');
    Route::post('/superadmin/store', [SuperAdminController::class, 'store'])->name('store');
    Route::get('superadmin/edit/{uuid}', [SuperAdminController::class, 'edit'])->name('user.edit');
    Route::put('superadmin/update/{uuid}', [SuperAdminController::class, 'update'])->name('user.update');
    Route::delete('superadmin/delete/{uuid}', [SuperAdminController::class, 'delete'])->name('user.delete');
    // ControlCATEGORY
    Route::get('/superadmin/category', [SuperAdminController::class, 'category'])->name('superadmin.category');
    Route::get('/superadmin/createCategory', [SuperAdminController::class, 'createCategory'])->name('superadmin.createCategory');
    Route::post('/superadmin/storeCategory', [SuperAdminController::class, 'storeCategory'])->name('storeCategory');
    Route::get('/superadmin/editCategory/{uuid}', [SuperAdminController::class, 'editCategory'])->name('category.edit');
    Route::put('/superadmin/updateCategory/{uuid}', [SuperAdminController::class, 'updateCategory'])->name('category.update');
    Route::delete('superadmin/deleteCategory/{uuid}', [SuperAdminController::class, 'deleteCategory'])->name('category.delete');
    Route::get('/superadmin/searchCategory', [SuperAdminController::class, 'searchCategory'])->name('superadmin.searchCategory');
});
Route::middleware('loginAuth')->group(function () {
    //Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //Control Batik
    Route::get('/dashboard/edit/{uuid}', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/update/{uuid}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/delete/{uuid}', [DashboardController::class, 'delete'])->name('batik.delete');
    Route::get('/dashboard/add', [DashboardController::class, 'add'])->name('dashboard.add');
    Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('dashboard.store');
    //Control Profile
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::get('/dashboard/profileDetail', [DashboardController::class, 'profileDetail'])->name('dashboard.profileDetail');
    Route::put('/dashboard/profileUpdate/{uuid}', [DashboardController::class, 'profileUpdate'])->name('dashboard.profileUpdate');
});

