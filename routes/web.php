<?php


use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\BlogProductsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
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
Route::get('/lang/{lang}', function ($lang) {
    session(['lang'=>$lang]);
    return back(); 
 })->name('lang'); 

//Site uchun
Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/category/{slug}', [MainController::class, 'categoryProducts'])->name('categoryProducts');
Route::get('/product/{slug?}', [MainController::class, 'shopDetails'])->name('shopDetails'); 
Route::get('/blog', [MainController::class, 'blog'])->name('blog');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');
Route::get('/shop', [MainController::class, 'shop'])->name('shop');
Route::get('/checkOut', [MainController::class, 'checkOut'])->name('checkOut');
Route::get('/blogproduct/{slug?}',[MainController::class,'blogDetails'])->name('blogDetails');
Route::get('/likeProducts', [MainController::class, 'likeProducts'])->name('likeProducts');
Route::post('/send_post',[MainController::class,'send_massage'] )->name('send_message');
Route::get('/customerOrder/{id}', [MainController::class, 'customerOrder'])->name('customerOrder');
Route::get('/shoppingCart', [MainController::class, 'shoppingCart'])->name('shoppingCart');
Route::get('/search', [MainController::class, 'search'])->name('search');
//Admin uchun
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('products', ProductController::class);
    Route::resource('banners', BannersController::class);
    Route::resource('blogProducts', BlogProductsController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
