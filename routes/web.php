<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CaregoriesController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\AuthorizationController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MakecommentController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;


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


Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/view/{id}', [BookController::class, 'view'])->name('view.book');
Route::get('/shop/{id}', [BookController::class, 'shop'])->name('shop.book');
Route::get('/author/{author:slug}', [AuthorController::class, 'index'])->name('author.book');
Route::get('/genre/{name}', [GenreController::class, 'index'])->name('genre.book');
Route::get('/publisher/{name}', [PublisherController::class, 'index'])->name('publisher.book');
Route::get('/authors', [CaregoriesController::class, 'authors'])->name('all.authors');
Route::get('/genres', [CaregoriesController::class, 'genres'])->name('all.genres');
Route::get('/publishers', [CaregoriesController::class, 'publishers'])->name('all.publishers');
Route::post('/search', [SearchController::class, 'index'])->name('search.books');
Route::post('/', [BookController::class, 'sort'])->name('sort.book');
Route::post('/rating/book/{book}', [BookController::class, 'rating'])->name('rating.book');


Route::group(['middleware'=>'auth'], function() 
{
	Route::get('/logout', [AuthorizationController::class, 'logout'])->name('logout');
	Route::get('/basket', [BasketController::class, 'index'])->name('basket');
	Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
	Route::post('/make_com/{id}', [MakecommentController::class, 'index'])->name('new.comment');
	Route::post('/del_com/{id}', [MakecommentController::class, 'delete'])->name('delete.comment');
	Route::post('/update_user_data/{id}', [SettingsController::class, 'data'])->name('upd.user');
	Route::post('/update_password/{id}', [SettingsController::class, 'new_password'])->name('upd.password');
	Route::get('profile/{client:email}', [ProfileController::class, 'client'])->name('profile.user');
});


Route::group(['middleware'=>'guest'], function() 
{
	Route::get('/login', [AuthorizationController::class, 'login'])->name('login');
	Route::get('/register', [AuthorizationController::class, 'register'])->name('register');
	Route::post('/login', [AuthorizationController::class, 'store_login'])->name('login.user');
	Route::post('/register', [AuthorizationController::class, 'store'])->name('store.user');
});


Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function() 
	{
	Route::get('/', [AdminController::class, 'index'])->name('admin');
	Route::resource('/books', 'App\Http\Controllers\Admin\BookController');
	Route::resource('/authors', 'App\Http\Controllers\Admin\AuthorController');
	Route::resource('/publishers', 'App\Http\Controllers\Admin\PublisherController');
	Route::resource('/genres', 'App\Http\Controllers\Admin\GenreController');
	Route::resource('/languages', 'App\Http\Controllers\Admin\LanguageController');
	}
);