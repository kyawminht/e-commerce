<?php

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

Auth::routes();

//frontend
Route::controller(\App\Http\Controllers\Frontend\FrontendController::class)->group(function (){
   Route::get('/','index');
    Route::get('/collection','categories');
    Route::get('/collection/{category_slug}','products');
    Route::get('/collection/{category_slug}/{product_slug}','productsView');
    Route::get('/new-arrivals','newArrival');
    Route::get('search','searchProduct');

});

//wishlist
Route::middleware('auth')->group(function (){
    Route::controller(\App\Http\Controllers\Frontend\WishlistController::class)->group(function (){
        Route::get('/wishlist','index');
    });
});


Route::middleware('auth')->group(function (){
    Route::get('/ show-carts',[\App\Http\Controllers\Frontend\SeeCartController::class,'index']);
    Route::get('/checkout',[\App\Http\Controllers\Frontend\CheckoutController::class,'index']);
    //orders
    Route::get('/orders',[\App\Http\Controllers\Frontend\OrderController::class,'index']);
    Route::get('/orders/{orderId}',[\App\Http\Controllers\Frontend\OrderController::class,'show']);
});

//thank-you

Route::get('/thank-you',[\App\Http\Controllers\Frontend\FrontendController::class,'thankyou']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function (){
    Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //setting
    Route::get('/setting',[\App\Http\Controllers\SettingController::class,'setting']);
    Route::post('/setting',[\App\Http\Controllers\SettingController::class,'store']);

    //users
    Route::controller(\App\Http\Controllers\Admin\UsersController::class)->group(function (){
        Route::get('/users','index');
        Route::get('/user/create','create');
        Route::post('/user/store','store');
        Route::get('/user/{userId}','edit');
        Route::put('/user/{userId}/update','update');
        Route::get('/user/{userId}/delete','destroy');

    });
    //Category
    Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function (){
        Route::get('category','index');
        Route::get('category/create','create');
        Route::post('category/store','store')->name('category.store');
        Route::get('category/{category}/edit','edit');
        Route::put('category/{category}','update');
        Route::get('category/{category}/delete','destroy');

    });

    Route::get('/brands',\App\Livewire\Admin\Brand\Index::class);
    //product
    Route::controller(\App\Http\Controllers\Admin\ProductController::class)->group(function (){
        Route::get('/product','index');
        Route::get('/product/create','create');
        Route::post('/product/store','store');
        Route::get('/product/{product_id}/edit','edit');
        Route::put('/product/{product_id}','update');
        Route::get('/product/{product_id}/delete','destroy');
    });

    //color
    Route::controller(\App\Http\Controllers\Admin\ColorController::class)->group(function (){
        Route::get('/color','index');
        Route::get('/color/create','create');
        Route::post('/color/store','store');
        Route::get('/color/{color_id}/edit','edit');
        Route::put('/color/{color_id}','update');
        Route::get('/color/{color_id}/delete','destroy');
    });

    //slider
    Route::controller(\App\Http\Controllers\Admin\SliderController::class)->group(function (){
        Route::get('/slider','index');
        Route::get('/slider/create','create');
        Route::post('/slider/store','store');
        Route::get('/slider/{slider}/edit','edit');
        Route::put('/slider/{slider}','update');
        Route::get('/slider/{slider}/delete','destroy');
    });

    //orders
    Route::controller(\App\Http\Controllers\Admin\OrderController::class)->group(function (){
        Route::get('/orders','index');
        Route::get('/orders/{orderId}','show');
        Route::get('order/{orderId}','downloadInvoice');
        Route::get('order/{orderId}/invoice','viewInvoice');


    });
});



