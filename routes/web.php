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
Route::get('/privacy', 'PageController@privacy')->name('privacy');

Route::post('/memory/filter', 'StoryController@filter')->name('filter');
Route::post('/story/filterstory', 'StoryController@filterstory')->name('filterstory');
Route::post('/story/filtertype', 'StoryController@filtertype')->name('filtertype');
Route::post('/story/filtertypetip', 'StoryController@filtertypetip')->name('filtertypetip');

Route::post('/profile/{user_id}/imageUpload', 'UserController@storeImage')->name('profileImage');
Route::post('/home/contact', 'HomeController@contact')->name('contact');

Route::get('/chatuser', 'ChatController@findUser')->name('findChat');
Route::post('/chatuser/send', 'ChatController@saveChat')->name('send');

Route::get('/story/create/{type}', 'StoryController@create')->name('createStory');
Route::post('/story/create/save', 'StoryController@save')->name('saveStory');
Route::get('/story/{id}', 'StoryController@detail')->name('detail');
Route::get('/story/edit/{story_id}', 'StoryController@edit')->name('editStory');
Route::patch('/story/update/{story_id}', 'StoryController@update')->name('updateStory');
Route::get('/story/delete/{story_id}', 'StoryController@delete')->name('deleteStory');

Route::post('/story/edit/{story_id}/imageUpload', 'ImageController@storeImage')->name('imageUpload');
Route::post('/story/edit/{story_id}/audioUpload', 'ImageController@storeAudio')->name('audioUpload');
Route::post('/story/edit/{story_id}/videoUpload', 'ImageController@storeVideo')->name('videoUpload');
Route::get('/story/edit/{story_id}/imageDelete', 'ImageController@delete')->name('delete');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('users')->name('users/')->group(static function() {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('moods')->name('moods/')->group(static function() {
            Route::get('/',                                             'MoodController@index')->name('index');
            Route::get('/create',                                       'MoodController@create')->name('create');
            Route::post('/',                                            'MoodController@store')->name('store');
            Route::get('/{mood}/edit',                                  'MoodController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MoodController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{mood}',                                      'MoodController@update')->name('update');
            Route::delete('/{mood}',                                    'MoodController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoryController@index')->name('index');
            Route::get('/create',                                       'CategoryController@create')->name('create');
            Route::post('/',                                            'CategoryController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoryController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoryController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoryController@update')->name('update');
            Route::delete('/{category}',                                'CategoryController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('messages')->name('messages/')->group(static function() {
            Route::get('/',                                             'MessageController@index')->name('index');
            Route::get('/create',                                       'MessageController@create')->name('create');
            Route::post('/',                                            'MessageController@store')->name('store');
            Route::get('/{message}/edit',                               'MessageController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MessageController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{message}',                                   'MessageController@update')->name('update');
            Route::delete('/{message}',                                 'MessageController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('contacts')->name('contacts/')->group(static function() {
            Route::get('/',                                             'ContactController@index')->name('index');
            Route::get('/create',                                       'ContactController@create')->name('create');
            Route::post('/',                                            'ContactController@store')->name('store');
            Route::get('/{contact}/edit',                               'ContactController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContactController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contact}',                                   'ContactController@update')->name('update');
            Route::delete('/{contact}',                                 'ContactController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('images')->name('images/')->group(static function() {
            Route::get('/',                                             'ImageController@index')->name('index');
            Route::get('/create',                                       'ImageController@create')->name('create');
            Route::post('/',                                            'ImageController@store')->name('store');
            Route::get('/{image}/edit',                                 'ImageController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ImageController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{image}',                                     'ImageController@update')->name('update');
            Route::delete('/{image}',                                   'ImageController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('stories')->name('stories/')->group(static function() {
            Route::get('/',                                             'StoryController@index')->name('index');
            Route::get('/create',                                       'StoryController@create')->name('create');
            Route::post('/',                                            'StoryController@store')->name('store');
            Route::get('/{story}/edit',                                 'StoryController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'StoryController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{story}',                                     'StoryController@update')->name('update');
            Route::delete('/{story}',                                   'StoryController@destroy')->name('destroy');
        });
    });
});