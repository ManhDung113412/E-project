<?php

// Admin Controllers

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\aboutusController;
use App\Http\Controllers\client\homepageController;
use App\Http\Controllers\client\clientLoginController;
use App\Http\Controllers\client\mainproductController;
use App\Http\Controllers\client\reviewController;
use App\Http\Controllers\client\shoppingcartController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\client\clientProductController;
use App\Models\OrderDetail;


Route::prefix('admin')->group(function () {
    Route::get('register', [AuthController::class, 'register'])
        ->name('admin.auth.register');

    Route::post('register', [AuthController::class, 'checkRegister'])
        ->name('admin.auth.check-register');

    Route::get('login', [AuthController::class, 'login'])
        ->name('admin.auth.login');

    Route::post('login', [AuthController::class, 'checkLogin'])
        ->name('admin.auth.check-login');
});

Route::prefix('admin')->middleware('admin.login')->group(function () {

    Route::get('logout', [AuthController::class, 'logout'])
        ->name('admin.auth.logout');

    // Brand Routes
    Route::prefix('brand')->group(function () {
        Route::get('', [BrandController::class, 'index'])
            ->name('admin.brand.index');
        Route::get('create', [BrandController::class, 'create'])
            ->name('admin.brand.create');
        Route::post('store', [BrandController::class, 'store'])
            ->name('admin.brand.store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])
            ->name('admin.brand.edit');
        Route::put('update/{id}', [BrandController::class, 'update'])
            ->name('admin.brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])
            ->name('admin.brand.delete');
    });

    // Category Routes
    Route::prefix('category')->group(function () {
        Route::get('', [CategoryController::class, 'index'])
            ->name('admin.category.index');
        Route::get('create', [CategoryController::class, 'create'])
            ->name('admin.category.create');
        Route::post('store', [CategoryController::class, 'store'])
            ->name('admin.category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])
            ->name('admin.category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])
            ->name('admin.category.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])
            ->name('admin.category.delete');
    });

    // User Routes
    Route::prefix('order')->group(function () {
        Route::get('', [OrderDetailController::class, 'index'])
            ->name('admin.order-detail.index');
        Route::get('edit/{id}', [OrderDetailController::class, 'edit'])
            ->name('admin.order-detail.edit');
        Route::put('update/{id}', [OrderDetailController::class, 'update'])
            ->name('admin.order-detail.update');
        Route::get('detail/{id}', [OrderDetailController::class, 'detail'])
            ->name('admin.order-detail.detail');
    });

    // Product Routes
    Route::prefix('product')->group(function () {
        Route::get('', [ProductController::class, 'index'])
            ->name('admin.product.index');
        Route::post('search', [ProductController::class, 'search'])
            ->name('admin.product.search');
        Route::get('create', [ProductController::class, 'create'])
            ->name('admin.product.create');
        Route::post('store', [ProductController::class, 'store'])
            ->name('admin.product.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])
            ->name('admin.product.edit');
        Route::put('update/{id}', [ProductController::class, 'update'])
            ->name('admin.product.update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])
            ->name('admin.product.delete');
    });

    // ProductDetail Routes
    Route::prefix('product-detail')->group(function () {
        Route::get('', [ProductDetailController::class, 'index'])
            ->name('admin.product-detail.index');
        Route::post('search', [ProductController::class, 'search'])
            ->name('admin.product-detail.search');
        Route::get('create/{id}', [ProductDetailController::class, 'create'])
            ->name('admin.product-detail.create');
        Route::post('store', [ProductDetailController::class, 'store'])
            ->name('admin.product-detail.store');
        Route::get('edit/{id}', [ProductDetailController::class, 'edit'])
            ->name('admin.product-detail.edit');
        Route::put('update/{id}', [ProductDetailController::class, 'update'])
            ->name('admin.product-detail.update');
        Route::get('delete/{id}', [ProductDetailController::class, 'delete'])
            ->name('admin.product-detail.delete');
    });

    // User Routes
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])
            ->name('admin.user.index');
        Route::get('detail/{id}', [UserController::class, 'detail'])
            ->name('admin.user.detail');
    });
});

Route::prefix('client')->group(function () {
    // Route::get('login-register', [clientLoginController::class, 'getLogin']);
    // Route::post('login-register', [clientLoginController::class, 'postLogin']);


    Route::get('home', [homepageController::class, 'getHomePage'])->name('homepage');
    Route::get('aboutUs', [aboutusController::class, 'getAboutUs']);


    Route::get('login', [clientLoginController::class, 'getLogin'])->name('client-login');
    Route::post('login', [clientLoginController::class, 'postLogin']);

    Route::post('register', [clientLoginController::class, 'postRegister']);


    Route::get('review', [reviewController::class, 'getReview']);
    Route::get('productPage', [clientController::class, 'getProductPages']);
    Route::get('Favorite', [shoppingcartController::class, 'getWishList']);
    Route::get('Product', [mainproductController::class, 'getMainProduct']);
});


Route::prefix('client/products')->group(function () {
    Route::get('long-wallet', [clientProductController::class, 'getLongWallet']);
    Route::get('small-wallet', [clientProductController::class, 'getSmallWallet']);
    Route::get('cards-holder', [clientProductController::class, 'getCardsHolder']);
    Route::get('chain-and-strap', [clientProductController::class, 'getchainandStrap']);
    Route::get('new-arrival', [clientProductController::class, 'getNewArrival']);
    Route::get('discount', [clientProductController::class, 'getDiscount']);
    Route::get('trending', [clientProductController::class, 'getTrending']);
    Route::get('gucci', [clientProductController::class, 'getGucci']);
    Route::get('louis-vuiton', [clientProductController::class, 'getLouisVuiton']);
    Route::get('channel', [clientProductController::class, 'getChannel']);
    Route::get('dior', [clientProductController::class, 'getDior']);


    Route::get('specificProduct/{Slug}', [clientProductController::class, 'getSpecificProduct']);
});

Route::prefix('client/products')->middleware('client-signIn')->group(function () {
    Route::post('specificProduct/{Slug}', [clientProductController::class, 'addToCart']);
});


Route::prefix('client')->middleware('client-signIn')->group(function () {
    Route::get('myshoppingcart', [shoppingcartController::class, 'getShoppingCart']);
    Route::get('Cart', [shoppingcartController::class, 'getShoppingCart']);


    Route::get('mywishlist', [shoppingcartController::class, 'getWishList']);


    // Route::get('quantity{Slug}', [shoppingcartController::class, 'setProductQuantity']);
});
