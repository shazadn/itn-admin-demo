<?php

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('post.login');

Route::group(['middleware' => 'auth'], function() {

    Route::get('home', 'HomeController@home')->name('view.user');


    Route::get('logout', 'Auth\LoginController@logout')->name('view.logout');

    Route::get('pages', 'PagesController@pages')->name('view.pages');

    Route::get('gallery', 'GalleryController@gallery')->name('view.gallery');
    Route::post('gallery', 'GalleryController@upload')->name('post.gallery');
    
    Route::get('contact', 'ContactController@contact')->name('view.form');
    Route::post('contact', 'ContactController@submitForm')->name('submit.form');
    
    Route::get('products', 'ProductsController@products')->name('view.products');
});
