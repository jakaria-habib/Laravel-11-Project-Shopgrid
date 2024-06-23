<?php

use Illuminate\Support\Facades\Route;

        // Website Controller

        Route::get('/', [ \App\Http\Controllers\EcommerceController::class,'index'])->name('home');
        Route::get('/category-product/{id}',[ \App\Http\Controllers\EcommerceController::class,'categoryProduct'])->name('category');
        Route::get('/product-detail/{id}', [ \App\Http\Controllers\EcommerceController::class,'productDetail'])->name('detail');


        Route::post('/add-to-cart/{id}', [ \App\Http\Controllers\CartController::class,'addToCart'])->name('add-to-cart');
        Route::get('/show-cart', [ \App\Http\Controllers\CartController::class,'show'])->name('show-cart');
        Route::get('/remove-cart-product/{id}', [ \App\Http\Controllers\CartController::class,'remove'])->name('remove-cart-product');
        Route::post('/update-cart-product/{id}', [ \App\Http\Controllers\CartController::class,'update'])->name('update-cart-product');
        Route::post('/apply-coupon', [ \App\Http\Controllers\CartController::class,'applyCoupon'])->name('apply-coupon');


        Route::get('/checkout', [ \App\Http\Controllers\CheckoutController::class,'index'])->name('checkout');
        Route::post('/new-order', [ \App\Http\Controllers\CheckoutController::class,'newOrder'])->name('new-order');
        Route::get('/complete-order', [ \App\Http\Controllers\CheckoutController::class,'completeOrder'])->name('complete-order');


        Route::get('/customer-login', [ \App\Http\Controllers\CustomerAuthController::class,'index'])->name('customer-login');
        Route::post('/customer-login', [ \App\Http\Controllers\CustomerAuthController::class,'login'])->name('customer-login');
        Route::get('/customer-logout', [ \App\Http\Controllers\CustomerAuthController::class,'logout'])->name('customer-logout');
        Route::get('/customer-register', [ \App\Http\Controllers\CustomerAuthController::class,'register'])->name('customer-register');



Route::middleware(['customer'])->group(function () {

        Route::get('/customer-dashboard', [ \App\Http\Controllers\CustomerDashboardController::class,'index'])->name('customer-dashboard');
        Route::get('/my-profile', [ \App\Http\Controllers\CustomerDashboardController::class,'profile'])->name('customer-profile');
        Route::post('/update-my-profile', [ \App\Http\Controllers\CustomerDashboardController::class,'updateProfile'])->name('update-customer-profile');
        Route::get('/my-order', [ \App\Http\Controllers\CustomerDashboardController::class,'order'])->name('customer-order');

});





Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

        // Admin controller
        Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');


        Route::get('/category/add',[\App\Http\Controllers\CategoryController::class, 'index'])->name('category.add');
        Route::get('/category/manage',[\App\Http\Controllers\CategoryController::class, 'manage'])->name('category.manage');
        Route::post('/category/create',[\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
        Route::get('/category/edit/{id}',[\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/category/update/{id}',[\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
        Route::get('/category/delete/{id}',[\App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');


        Route::get('/sub-category/add',[\App\Http\Controllers\SubCategoryController::class, 'index'])->name('sub-category.add');
        Route::get('/sub-category/manage',[\App\Http\Controllers\SubCategoryController::class, 'manage'])->name('sub-category.manage');
        Route::post('/sub-category/create',[\App\Http\Controllers\SubCategoryController::class, 'create'])->name('sub-category.create');
        Route::get('/sub-category/edit/{id}',[\App\Http\Controllers\SubCategoryController::class, 'edit'])->name('sub-category.edit');
        Route::post('/sub-category/update/{id}',[\App\Http\Controllers\SubCategoryController::class, 'update'])->name('sub-category.update');
        Route::get('/sub-category/delete/{id}',[\App\Http\Controllers\SubCategoryController::class, 'delete'])->name('sub-category.delete');


        Route::get('/brand/add',[\App\Http\Controllers\BrandController::class, 'index'])->name('brand.add');
        Route::post('/brand/create',[\App\Http\Controllers\BrandController::class, 'create'])->name('brand.create');
        Route::get('/brand/manage',[\App\Http\Controllers\BrandController::class, 'manage'])->name('brand.manage');
        Route::get('/brand/edit/{id}',[\App\Http\Controllers\BrandController::class, 'edit'])->name('brand.edit');
        Route::post('/brand/update/{id}',[\App\Http\Controllers\BrandController::class, 'update'])->name('brand.update');
        Route::get('/brand/delete/{id}',[\App\Http\Controllers\BrandController::class, 'delete'])->name('brand.delete');


        Route::get('/unit/add',[\App\Http\Controllers\UnitController::class, 'index'])->name('unit.add');
        Route::post('/unit/create',[\App\Http\Controllers\UnitController::class, 'create'])->name('unit.create');
        Route::get('/unit/manage',[\App\Http\Controllers\UnitController::class, 'manage'])->name('unit.manage');
        Route::get('/unit/edit/{id}',[\App\Http\Controllers\UnitController::class, 'edit'])->name('unit.edit');
        Route::post('/unit/update/{id}',[\App\Http\Controllers\UnitController::class, 'update'])->name('unit.update');
        Route::get('/unit/delete/{id}',[\App\Http\Controllers\UnitController::class, 'delete'])->name('unit.delete');


        Route::get('/product/add',[\App\Http\Controllers\ProductController::class, 'index'])->name('product.add');
        Route::post('/product/create',[\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
        Route::get('/product/manage',[\App\Http\Controllers\ProductController::class, 'manage'])->name('product.manage');
        Route::get('/product/detail/{id}',[\App\Http\Controllers\ProductController::class, 'detail'])->name('product.detail');
        Route::get('/product/edit/{id}',[\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
        Route::post('/product/update/{id}',[\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
        Route::post('/product/delete/{id}',[\App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete');


        Route::get('/coupon/add',[\App\Http\Controllers\CouponController::class, 'index'])->name('coupon.add');
        Route::post('/coupon/create',[\App\Http\Controllers\CouponController::class, 'create'])->name('coupon.create');
        Route::get('/coupon/manage',[\App\Http\Controllers\CouponController::class, 'manage'])->name('coupon.manage');
        Route::get('/coupon/edit/{id}',[\App\Http\Controllers\CouponController::class, 'edit'])->name('coupon.edit');
        Route::post('/coupon/update/{id}',[\App\Http\Controllers\CouponController::class, 'update'])->name('coupon.update');
        Route::post('/coupon/delete/{id}',[\App\Http\Controllers\CouponController::class, 'delete'])->name('coupon.delete');


        Route::get('/admin/manage-order',[\App\Http\Controllers\AdminOrderController::class, 'index'])->name('admin.manage-order');
        Route::get('/admin/order-detail/{id}',[\App\Http\Controllers\AdminOrderController::class, 'detail'])->name('admin.order-detail');
        Route::get('/admin/order-edit/{id}',[\App\Http\Controllers\AdminOrderController::class, 'edit'])->name('admin.order-edit');
        Route::post('/admin/order-update',[\App\Http\Controllers\AdminOrderController::class, 'update'])->name('admin.order-update');
        Route::get('/admin/order-invoice/{id}',[\App\Http\Controllers\AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
        Route::get('/admin/download-order-invoice/{id}',[\App\Http\Controllers\AdminOrderController::class, 'downloadInvoice'])->name('admin.download-order-invoice');
        Route::get('/admin/order-delete/{id}',[\App\Http\Controllers\AdminOrderController::class, 'delete'])->name('admin.order-delete');



});



        // SSLCOMMERZ Start
        Route::get('/example1', [\App\Http\Controllers\SslCommerzPaymentController::class, 'exampleEasyCheckout']);
        Route::get('/example2', [\App\Http\Controllers\SslCommerzPaymentController::class, 'exampleHostedCheckout']);

        Route::post('/pay', [\App\Http\Controllers\SslCommerzPaymentController::class, 'index']);
        Route::post('/pay-via-ajax', [\App\Http\Controllers\SslCommerzPaymentController::class, 'payViaAjax']);

        Route::post('/success', [\App\Http\Controllers\SslCommerzPaymentController::class, 'success']);
        Route::post('/fail', [\App\Http\Controllers\SslCommerzPaymentController::class, 'fail']);
        Route::post('/cancel', [\App\Http\Controllers\SslCommerzPaymentController::class, 'cancel']);

        Route::post('/ipn', [\App\Http\Controllers\SslCommerzPaymentController::class, 'ipn']);
        //SSLCOMMERZ END

