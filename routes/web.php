<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    if (Auth::check()) {

        if (Auth::user()->role === 'admin') {

            return redirect()->route('admin.dashboard');

        }

        return redirect()->route('user.dashboard');
    }

    return view('welcome');

})->name('home');

Route::get('/index', function () {

    return view('pages.index');

})->name('index');


/*
|--------------------------------------------------------------------------
| Guest Routes (Belum Login)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // Login
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('post.login');

    // Register
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('post.register');

});


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        // Users Management
        Route::resource('users', UsersController::class);

});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::prefix('user')
    ->middleware(['auth', 'user'])
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {

            return view('pages.user.dashboard');

        })->name('user.dashboard');

});