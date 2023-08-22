<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticated;
use App\Http\Controllers\signInController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SignOutController;
use App\Http\Controllers\PageController;

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

Route::prefix('sign-in')->group(function () {
    Route::get('/', [ signInController::class, 'index' ])->name('signIn');
    Route::post('/validation', [ SignInController::class, 'validation' ])->name('signIn.validation');
});

Route::get('/', [ NewsletterController::class, 'index' ])->name('newsletter');
Route::get('/confirm', [ NewsletterController::class, 'confirm' ])->name('newsletter.confirm');
Route::post('/store', [ NewsletterController::class, 'store' ])->name('newsletter.store');

Route::middleware([Authenticated::class])->group(function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [ DashboardController::class, 'index' ])->name('dashboard');
        Route::get('/subscribers', [ DashboardController::class, 'subscribers' ])->name('dashboard.subscribers');
        Route::get('/subscribers/change-status/{id}', [ NewsletterController::class, 'changeStatus'])->name('newsletter.changeStatus');
        Route::get('/subscribers/delete/{id}', [ NewsletterController::class, 'delete'])->name('newsletter.delete');

        Route::get('/get-subscribers', [ NewsletterController::class, 'getSubscribers'])->name('newsletter.getSubscribers');

        Route::get('/page', [ PageController::class, 'index' ])->name('page');
        Route::post('/page/save', [ PageController::class, 'save' ])->name('page.save');
    });
});

Route::get('/sign-out', [ SignOutController::class, 'index' ])->name('signOut');