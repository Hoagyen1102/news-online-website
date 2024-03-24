<?php

use Illuminate\Support\Facades\Route;
use App\Models\News;
use MongoDB\BSON\ObjectId;



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

Route::get('/', 'App\Http\Controllers\NewsController@index');
Route::get('/index', 'App\Http\Controllers\NewsController@index');

Route::get('/introduce', 'App\Http\Controllers\NewsController@introduce');

Route::get('/login', 'App\Http\Controllers\AccountController@index');
Route::post('/checklogin', 'App\Http\Controllers\AccountController@checklogin');

Route::get('/signup', 'App\Http\Controllers\AccountController@signup');
Route::post('/checksignup', 'App\Http\Controllers\AccountController@checksignup');

Route::get('/logout', 'App\Http\Controllers\AccountController@logout');

Route::get('/profile/{id}', 'App\Http\Controllers\AccountController@profile');
Route::get('/editprofile', 'App\Http\Controllers\AccountController@editprofile');
Route::post('/checkeditprofile', 'App\Http\Controllers\AccountController@checkeditprofile');

Route::get('/category/{id}', 'App\Http\Controllers\NewsController@category');

Route::post('/search', 'App\Http\Controllers\NewsController@search');

Route::get('/content/{id}', 'App\Http\Controllers\NewsController@content');

Route::post('/comment', 'App\Http\Controllers\CommentController@add');
Route::get('/deletecomment/{id}', 'App\Http\Controllers\CommentController@delete');
Route::get('/editcomment/{id}', 'App\Http\Controllers\CommentController@editcomment');
Route::post('/checkeditcomment', 'App\Http\Controllers\CommentController@checkeditcomment');

Route::get('/createnews', 'App\Http\Controllers\NewsController@create');
Route::post('/checkcreatenews', 'App\Http\Controllers\NewsController@checkcreate');

Route::get('/editnews/{id}', 'App\Http\Controllers\NewsController@edit');
Route::post('/checkeditnews', 'App\Http\Controllers\NewsController@checkedit');

Route::get('/pushnews/{id}', 'App\Http\Controllers\NewsController@pushnews');
Route::post('/checkrejected', 'App\Http\Controllers\NewsController@checkrejected');


//danh sách news
Route::get('/listnews/{id}', 'App\Http\Controllers\NewsController@list');
//content chờ duyệt
Route::get('/detailsstatus/{id}', 'App\Http\Controllers\NewsController@detailsstatus');
//danh sách news theo jour admin và jour
Route::get('/newsofjournalist/{id}', 'App\Http\Controllers\NewsController@newsofjournalist');

Route::get('/listjournalist', 'App\Http\Controllers\AccountController@listjournalist');
Route::get('/listuser', 'App\Http\Controllers\AccountController@listuser');
Route::get('/upuser/{id}', 'App\Http\Controllers\AccountController@upuser');
Route::get('/deleteuser/{id}', 'App\Http\Controllers\AccountController@deleteuser');
Route::get('/deletejournalist/{id}', 'App\Http\Controllers\AccountController@deletejournalist');


Route::get('/deletenews/{id}', 'App\Http\Controllers\NewsController@deletenews');


