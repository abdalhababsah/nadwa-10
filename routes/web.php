<?php

use App\Http\Controllers\Admin\TestemonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LatestWorkController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\LatestWorkController as LatestWorkView;
use App\Http\Controllers\ServiceController as HomeService;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactUsController::class, 'send'])->name('contact.send');
// Services Page Route
Route::get('/services', [HomeService::class, 'index'])->name('services');

//latest work view page
Route::get('/latest-works/{id}', [LatestWorkView::class, 'view']); 
        
// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    // Show login form
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');

    // Handle login submission
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');

    // Handle logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Protected Routes (e.g., Dashboard)
    Route::middleware(['auth'])->group(function () {
        Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index'); // List services
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create'); // Show create form
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store'); // Store service
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update'); // Update service
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy'); // Delete service

        Route::get('/latest-works', [LatestWorkController::class, 'index'])->name('admin.latest-works.index'); // List latest works
        Route::get('/latest-works/create', [LatestWorkController::class, 'create'])->name('admin.latest-works.create'); // Show create form
        Route::post('/latest-works', [LatestWorkController::class, 'store'])->name('admin.latest-works.store'); // Store latest work
        Route::get('/latest-works/{id}', [LatestWorkController::class, 'edit'])->name('admin.latest-works.edit'); // Update latest work
        Route::put('/latest-works/{id}', [LatestWorkController::class, 'update'])->name('admin.latest-works.update'); // Update latest work
        Route::delete('/latest-works/{id}', [LatestWorkController::class, 'destroy'])->name('admin.latest-works.destroy'); // Delete latest work

        Route::get('/testemonials', [TestemonialController::class, 'index'])->name('admin.testemonials.index');
        Route::get('/testemonials/create', [TestemonialController::class, 'create'])->name('admin.testemonials.create');
        Route::post('/testemonials', [TestemonialController::class, 'store'])->name('admin.testemonials.store');
        Route::get('/testemonials/{id}', [TestemonialController::class, 'edit'])->name('admin.testemonials.edit');
        Route::put('/testemonials/{id}', [TestemonialController::class, 'update'])->name('admin.testemonials.update');
        Route::delete('/testemonials/{id}', [TestemonialController::class, 'destroy'])->name('admin.testemonials.destroy');
        

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    });
});
