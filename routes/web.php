<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TestemonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProjectController as LatestWorkView;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactUsController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('/contact/send', [ContactUsController::class, 'send'])->name('contact.send');

// projects Page Route
Route::get('/projects', [LatestWorkView::class, 'index'])->name('projects');

//latest work view page
Route::get('/projects/{id}', [LatestWorkView::class, 'view']); 
Route::get('/storage/resized-projects/{filename}', [LatestWorkView::class, 'showResizedCover']);
        
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
        
        Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index'); // List latest works
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create'); // Show create form
        Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::put('/projects/order', [ProjectController::class, 'updateOrder'])->name('admin.projects.updateOrder');
        Route::get('/projects/{id}', [ProjectController::class, 'edit'])->name('admin.projects.edit'); 
        Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update'); 
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
