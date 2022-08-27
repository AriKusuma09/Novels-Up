<?php

use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ChapterMangaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MangaController;
use App\Http\Controllers\Admin\NovelController;
use App\Http\Controllers\AllListController;
use App\Http\Controllers\DetailNovelController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReadNovelController;
use App\Http\Controllers\RegisterController;
use App\Models\Novel;

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



// Login And Register
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']); 
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);


// Website Controller
Route::get('/', [HomeController::class, 'index']);

Route::get('/list-novel', [AllListController::class, 'index']);
Route::get('/detail/{slug}', [DetailNovelController::class, 'index']);

Route::get('/read/{nov_slug}/{chap_slug}', [ReadNovelController::class, 'index']);


// Profile Controller
Route::get('/profile', [ProfileController::class, 'index']);
Route::put('update-profile', [ProfileController::class, 'update']);




// Admin Controller
Route::middleware(['auth', 'isAdmin'])->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Novel
        // Novel Controller
        Route::get('/dashboard/novel-controller', [NovelController::class, 'index']);
        Route::get('/dashboard/novel-controller/add', [NovelController::class, 'add']);
        Route::post('insert-novel', [NovelController::class, 'insert']);
        Route::get('edit-novel/{id}', [NovelController::class, 'edit']);
        Route::put('update-novel/{id}', [NovelController::class, 'update']);
        Route::get('delete-novel/{id}', [NovelController::class, 'delete']);


        // Chapter Novel Controller
        Route::get('/dashboard/chapter-controller', [ChapterController::class, 'index']);
        Route::get('/dashboard/chapter-controller/add', [ChapterController::class, 'add']);
        Route::get('/dashboard/chapter-controller/add/checkSlug', [ChapterController::class, 'checkSlug']);
        Route::post('insert-chapter', [ChapterController::class, 'insert']);
        Route::get('edit-chapter/{id}', [ChapterController::class, 'edit']);
        Route::put('update-chapter/{id}', [ChapterController::class, 'update']);
        Route::get('delete-chapter/{id}', [ChapterController::class, 'delete']);


    // Manga    
        // Manga Controller
        Route::get('/dashboard/manga-controller', [MangaController::class, 'index']);


        // Chapter Manga Controller
        Route::get('/dashboard/chapter-manga-controller', [ChapterMangaController::class, 'index']);

    
    // Users Data 
    Route::get('/dashboard/users', [DashboardController::class, 'users']);


    // 

});





