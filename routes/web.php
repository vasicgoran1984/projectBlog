<?php

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
Auth::routes();

Route::get('/', [\App\Http\Controllers\PagesController::class, 'getIndex']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('blog/{slug}', [\App\Http\Controllers\BlogController::class, 'getSingle'])->name('blog.single')
            ->where('slug', '[\w\d\-\_]+');
    Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'getIndex'])->name('blog.index');
//    Route::get('/', [\App\Http\Controllers\PagesController::class, 'getIndex']);
    Route::get('/contact', [\App\Http\Controllers\PagesController::class, 'getContact']);
    Route::post('/contact', [\App\Http\Controllers\PagesController::class, 'postContact']);
    Route::get('/about', [\App\Http\Controllers\PagesController::class, 'getAbout']);
    Route::resource('posts', \App\Http\Controllers\PostController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('tags', \App\Http\Controllers\TagController::class);

    // Comments
    Route::post('comments/{post_id}', [\App\Http\Controllers\CommentsController::class, 'store'])->name('comments.store');

    // Country
    Route::resource('country', \App\Http\Controllers\CountryController::class);

    // State
    Route::resource('state', \App\Http\Controllers\StateController::class);

    // City
    Route::resource('city', \App\Http\Controllers\CityController::class);

});
