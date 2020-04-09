<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'PageController@profile')->name('profile');
Route::get('/profile/{user_id}', 'PageController@find')->name('findUser');
Route::get('/memory', 'StoryController@album')->name('album');
Route::get('/story', 'StoryController@story')->name('story');
Route::get('/tip', 'StoryController@tip')->name('tip');
Route::get('/chat', 'ChatController@chat')->name('chat');

Route::get('/chatuser', 'ChatController@findUser')->name('findChat');
Route::post('/chatuser/send', 'ChatController@saveChat')->name('send');

Route::get('/story/create', 'StoryController@create')->name('createStory');
Route::post('/story/create/save', 'StoryController@save')->name('saveStory');
Route::get('/story/{story_id}', 'StoryController@detail')->name('detailStory');
Route::get('/story/edit/{story_id}', 'StoryController@edit')->name('editStory');
Route::patch('/story/update/{story_id}', 'StoryController@update')->name('updateStory');

Route::post('/story/edit/{story_id}/imageUpload', 'ImageController@storeImage')->name('imageUpload');
Route::post('/story/edit/{story_id}/audioUpload', 'ImageController@storeAudio')->name('audioUpload');
Route::post('/story/edit/{story_id}/videoUpload', 'ImageController@storeVideo')->name('videoUpload');
