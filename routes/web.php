<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
/*
Route::get('/admin', [App\Http\Controllers\Backend\DefaultController::class, 'index'])->name('admin');
*/

Route::namespace('Frontend')->group(function () {
    Route::get('/', 'DefaultController@index')->name('home.index');

    //For login/Sign In
    //Route::get('/sign_in', 'DefaultController@sign_in')->name('sign_in.form');

    //For Blog
    Route::get('/blog', 'BlogController@index')->name('f_blog.index');
    Route::get('/blog/detail/{slug}', 'BlogController@detail')->name('f_blog.detail');

    //For Page
    Route::get('/page/detail/{slug}', 'PageController@detail')->name('f_page.detail');

    //For Contact Us
    Route::get('/contact_us', 'DefaultController@contact_us')->name('contact_us.form');
    Route::post('/contact_us', 'DefaultController@saveMessage');
});



Route::namespace('Backend')->group(function () {
    //For Default
    Route::prefix('admin')->group(function () {
        Route::get('/', 'DefaultController@index')->name('admin')->middleware("admin");
        Route::get('login', 'DefaultController@login')->name('admin.login');
        Route::get('register', 'DefaultController@register')->name('admin.register');
        Route::post('saveRegistration', 'DefaultController@saveRegistration')->name('admin.saveRegistration');
        Route::get('logout', 'DefaultController@logout')->name('admin.logout');
        /*
        Route::get('messages', 'DefaultController@showMessages')->name('admin.messages');
        */
        Route::get('message/{id}', 'DefaultController@messageReaded');
        Route::get('messageList/{option}', 'DefaultController@messageListOption');
        Route::post('login', 'DefaultController@authentication')->name('admin.authentication');
    });

    Route::middleware(['admin'])->group(function () {
        //For Admin
        Route::prefix('admin/settings')->group(function () {
            Route::get('/', 'SettingsController@index')->name('settings.index');
            Route::post('sortable', 'SettingsController@sortable')->name('settings.sortable');
            Route::get('delete/{id}', 'SettingsController@destroy')->name('settings.destroy');
            Route::get('edit/{id}', 'SettingsController@edit')->name('settings.edit');
            Route::post('update/{id}', 'SettingsController@update')->name('settings.update');
        });

        Route::prefix('admin')->group(function () {
            //For Blog
            Route::post('blog/sortable', 'BlogController@sortable')->name('blogs.sortable');
            Route::resource('blog', 'BlogController');

            //For Page
            Route::post('page/sortable', 'PageController@sortable')->name('page.sortable');
            Route::resource('page', 'PageController');

            //For Slider
            Route::post('slider/sortable', 'SliderController@sortable')->name('sliders.sortable');
            Route::resource('slider', 'SliderController');

            //For User
            Route::post('user/sortable', 'UserController@sortable')->name('users.sortable');
            Route::resource('user', 'UserController');
        });
    });
    /*
    Route::get('user/home_page', 'DefaultController@home_page')->name('user.home_page');
    */
});


/*
Some Notes About This Project
*/

//For Laravel Auth Settings
/*
>>>composer require laravel/ui --dev
>>>php artisan ui vue --auth
//Then
>>>npm install && npm run dev
*/

/*
    Route::get('/admin/settings', [App\Http\Controllers\Backend\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/admin/sortable', [App\Http\Controllers\Backend\SettingsController::class, 'sortable'])->name('settings.sortable');
    Route::get('/admin/settings/delete/{id}', [App\Http\Controllers\Backend\SettingsController::class, 'destroy'])->name('settings.destroy');
    Route::get('/admin/settings/edit/{id}', [App\Http\Controllers\Backend\SettingsController::class, 'edit'])->name('settings.edit');
    Route::post('/admin/update/{id}', [App\Http\Controllers\Backend\SettingsController::class, 'update'])->name('settings.update');
    */


//Actions Handled By Resource Controller
/*
        GET	        /photos	index	photos.index
        GET	        /photos/create	create	photos.create
        POST	    /photos	store	photos.store
        GET	        /photos/{photo}	show	photos.show
        GET	        /photos/{photo}/edit	edit	photos.edit
        PUT/PATCH	/photos/{photo}	update	photos.update
        DELETE	    /photos/{photo}	destroy	photos.destroy
    */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
