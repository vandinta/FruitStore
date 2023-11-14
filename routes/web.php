<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('cms.dashboard');
// });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::resource('/product', ProductController::class);
Route::get('/dashboard', function () {
    return view('cms.dashboard');
})->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/skill', [SkillController::class, 'index'])->name('skill');
    Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman');
    Route::get('/project', [ProjectController::class, 'index'])->name('project');
    Route::get('/forminterested', [ForminterestedController::class, 'index'])->name('forminterested');
});
