<?php

use Illuminate\Support\Facades\Auth;
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

Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('dashboard.home')->with('status', session('status'));
    }

    return redirect()->route('dashboard.home');
});

Auth::routes();

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], static function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
})->namespace('Admin');

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], static function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::patch('password', [ChangePasswordController::class, 'update'])->name('password.update');
        Route::patch('profile', [ChangePasswordController::class, 'updateProfile'])->name('password.updateProfile');
        Route::delete('profile/destroy', [ChangePasswordController::class, 'destroy'])->name('password.destroyProfile');
    }
})->namespace('Auth');

//Translations Assets
Route::get('js/translations.js', [TranslationController::class, 'index'])->name('translations');