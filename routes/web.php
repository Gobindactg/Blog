<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\AdminController;

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
//     return view('welcome');
// });

Route::get('/', [pageController::class, 'index'])->name('index');


// admin route

Route::get('/dashboard', [AdminController::class, 'admin'])->name('admin');

Route::get('/add-slider', [AdminController::class, 'addSlider'])->name('addSlider');
Route::get('/manage-slider', [AdminController::class, 'manageSlider'])->name('manageSlider');

Route::get('/sliderDelete/{id}', [AdminController::class, 'sliderDelete'])->name('sliderDelete');

Route::post('/sliderStore', [AdminController::class, 'sliderStore'])->name('sliderStore');

Route::get('/addHeroImage', [AdminController::class, 'addHeroImage'])->name('addHeroImage');
Route::post('/heroImageStore', [AdminController::class, 'heroImageStore'])->name('heroImageStore');

Route::get('/blog', [AdminController::class, 'blog'])->name('blog');
Route::post('/blogStore', [AdminController::class, 'blogStore'])->name('blogStore');
Route::get('/manageBlog', [AdminController::class, 'manageBlog'])->name('manageBlog');
Route::get('/update-blog/{id}', [AdminController::class, 'blogUpdate'])->name('blogUpdate');
Route::get('/deleteBlog/{id}', [AdminController::class, 'deleteBlog'])->name('deleteBlog');
Route::get('/deletePublished/{id}', [AdminController::class, 'blogPublished'])->name('blogPublished');
Route::get('/deleteUnpublished/{id}', [AdminController::class, 'blogUnpublished'])->name('blogUnpublished');



Route::get('/category', [AdminController::class, 'category'])->name('category');
Route::get('/manageCategory', [AdminController::class, 'manageCategory'])->name('manageCategory');
Route::post('/categoryStore', [AdminController::class, 'categoryStore'])->name('categoryStore');
Route::get('/categoryDelete/{id}', [AdminController::class, 'categoryDelete'])->name('categoryDelete');

Route::get('/logo', [AdminController::class, 'logo'])->name('logo');
Route::get('/manageLogo', [AdminController::class, 'manageLogo'])->name('manageLogo');
Route::post('/logoStore', [AdminController::class, 'logoStore'])->name('logoStore');
Route::get('/logoDelete/{id}', [AdminController::class, 'logoDelete'])->name('logoDelete');