<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CatogeryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


    Route::get('/admin', [AdminController::class, 'login'])->name('admin_login');
    Route::post('/admin/dologin', [AdminController::class, 'dologin'])->name('admin_dologin');

Route::middleware(['adminAuth'])->group(function(){
    
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin_logout');

    Route::get('/customers', [CustomerController::class, 'grid'])->name('customers');

    Route::get('/users', [UserController::class, 'grid'])->name('users');
    Route::get('/add_users', [UserController::class, 'add'])->name('add_users');
    Route::post('/store_users', [UserController::class, 'store'])->name('store_users');
    Route::get('/edit_users/{id}', [UserController::class, 'edit'])->name('edit_users');
    Route::post('/update_user/{id}', [UserController::class, 'update'])->name('update_users');
    Route::get('/delete_user/{id}', [UserController::class, 'delete'])->name('user_delete');       

    Route::get('/catogeries', [CatogeryController::class, 'grid'])->name('catogeries');
    Route::get('/add_catogery', [CatogeryController::class, 'add'])->name('add_catogery');
    Route::post('/store_catogery', [CatogeryController::class, 'store'])->name('store_catogery');
    Route::get('/edit_catogery/{id}', [CatogeryController::class, 'edit'])->name('edit_catogery');
    Route::post('/update_catogery/{id}', [CatogeryController::class, 'update'])->name('update_catogerys');
    Route::get('/delete_catogery/{id}', [CatogeryController::class, 'delete'])->name('catogery_delete');       
    Route::get('/view_catogery/{id}', [CatogeryController::class, 'View'])->name('view_catogery');
    
    Route::get('/products', [ProductController::class, 'grid'])->name('products');
    Route::get('/add_product', [ProductController::class, 'add'])->name('add_product');
    Route::post('/store_product', [ProductController::class, 'store'])->name('store_product');

});




require __DIR__.'/auth.php';
