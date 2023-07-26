<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
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
    return view('index');
})->name('index');


Route::get('categoryProducts/{slug}', [MainController::class, 'categoryProducts'])->name('categoryProducts');
Route::get('shopGrid', [MainController::class, 'shopGrid'])->name('shopGrid');
Route::get('blog', [MainController::class, 'blog'])->name('blog');
Route::get('contact', [MainController::class, 'contact'])->name('contact');
Route::get('shoppingCart', [MainController::class, 'shoppingCart'])->name('shoppingCart');
Route::get('checkOut', [MainController::class, 'checkOut'])->name('checkOut');
Route::get('shopDetails', [MainController::class, 'shopDetails'])->name('shopDetails');
Route::get('blogDetails', [MainController::class, 'blogDetails'])->name('blogDetails');
Route::post('send_post',[MainController::class,'send_massage'] )->name('send_message');



Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
