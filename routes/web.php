<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestemonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ProjectController as LatestWorkView;
// use App\Http\Controllers\ServiceController as HomeService;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactUsController::class, 'send'])->name('contact.send');
// Services Page Route
// Route::get('/services', [HomeService::class, 'index'])->name('services');

// projects Page Route
Route::get('/projects', [LatestWorkView::class, 'index'])->name('projects');

//latest work view page
Route::get('/projects/{id}', [LatestWorkView::class, 'view']); 
        
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
        
        // Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index'); // List services
        // Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create'); // Show create form
        // Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store'); // Store service
        // Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update'); // Update service
        // Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy'); // Delete service

        Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index'); // List latest works
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create'); // Show create form
        Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store'); // Store latest work
        Route::get('/projects/{id}', [ProjectController::class, 'edit'])->name('admin.projects.edit'); // Update latest work
        Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update'); // Update latest work
        Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy'); // Delete latest work

        Route::get('/testemonials', [TestemonialController::class, 'index'])->name('admin.testemonials.index');
        Route::get('/testemonials/create', [TestemonialController::class, 'create'])->name('admin.testemonials.create');
        Route::post('/testemonials', [TestemonialController::class, 'store'])->name('admin.testemonials.store');
        Route::get('/testemonials/{id}', [TestemonialController::class, 'edit'])->name('admin.testemonials.edit');
        Route::put('/testemonials/{id}', [TestemonialController::class, 'update'])->name('admin.testemonials.update');
        Route::delete('/testemonials/{id}', [TestemonialController::class, 'destroy'])->name('admin.testemonials.destroy');
        

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    });
});
