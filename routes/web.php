<?php

use App\Http\Livewire\Admin\ActionPostEdit;
use Illuminate\Support\Facades\Route;

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
//     return view('index');
// })->name('dashboard');

Route::get('/', 'PostController@index')->name('index');
Route::get('/post/{slug}', 'PostController@show')->name('show-post');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', config('jetstream.auth_session'), 'admin', 'verified']], function() {
    Route::get('/', function () { return view('admin.index'); })->name('dashboard');

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', function () { return view('admin.user.show'); })->name('admin.user.show');
    });
    Route::group(['prefix' => 'tags'], function() {
        Route::get('/', function () { return view('admin.tag.show'); })->name('admin.tag.show');
    });
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', function () { return view('admin.category.show'); })->name('admin.category.show');
    });
    Route::group(['prefix' => 'posts'], function() {
        Route::get('/', function () { return view('admin.post.show'); })->name('admin.post.show');
        // Route::get('/{slug}', [App\Http\Livewire\Admin\ActionPostEdit::class])->name('admin.post.edit');
        Route::get('/create', function () { return view('admin.post.create'); })->name('admin.post.create');
    });
});
