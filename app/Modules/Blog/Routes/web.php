<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'blog/service'], function () {
    Route::get('/', 'ServiceController@index')->name("service");
    Route::get('/create', 'ServiceController@create')->name("service_create");
    Route::post('/store', 'ServiceController@store')->name("service_store");
    Route::get('/edit/{id}', 'ServiceController@edit')->name("service_edit");
    Route::post('/update/{id}', 'ServiceController@update')->name("service_update");
    Route::get('/delete/{id}', 'ServiceController@destroy')->name("service_destroy");
});

Route::group(['prefix' => 'blog/package'], function () {

    Route::get('/', 'PackageController@index')->name("package");
    Route::get('/create', 'PackageController@create')->name("package_create");
    Route::post('/store', 'PackageController@store')->name("package_store");
    Route::get('/edit/{id}', 'PackageController@edit')->name("package_edit");
    Route::post('/update/{id}', 'PackageController@update')->name("package_update");
    Route::get('/delete/{id}', 'PackageController@destroy')->name("package_destroy");

});

Route::group(['prefix' => 'blog'], function () {

    Route::get('/', 'Blog\PostController@index')->name("blog");
    Route::get('/create', 'Blog\PostController@create')->name("blog_create");
    Route::post('/store', 'Blog\PostController@store')->name("blog_store");
    Route::get('/edit/{id}', 'Blog\PostController@edit')->name("blog_edit");
    Route::post('/update/{id}', 'Blog\PostController@update')->name("blog_update");
    Route::get('/delete/{id}', 'Blog\PostController@destroy')->name("blog_destroy");

});

Route::group(['prefix' => 'blog/category'], function () {

    Route::get('/', 'Blog\CategoryController@index')->name("blog_category");
    Route::get('/create', 'Blog\CategoryController@create')->name("blog_category_create");
    Route::post('/store', 'Blog\CategoryController@store')->name("blog_category_store");
    Route::get('/edit/{id}', 'Blog\CategoryController@edit')->name("blog_category_edit");
    Route::post('/update/{id}', 'Blog\CategoryController@update')->name("blog_category_update");
    Route::get('/delete/{id}', 'Blog\CategoryController@destroy')->name("blog_category_destroy");

});

Route::group(['prefix' => 'order'], function () {

    Route::get('/', 'Order\WebController@index')->name("order");
    Route::get('/create', 'Order\WebController@create')->name("order_create");
    Route::post('/store', 'Order\WebController@store')->name("order_store");
    Route::get('/edit/{id}', 'Order\WebController@edit')->name("order_edit");
    Route::post('/update/{id}', 'Order\WebController@update')->name("order_update");
    Route::get('/delete/{id}', 'Order\WebController@destroy')->name("order_destroy");

});

Route::group(['prefix' => 'gallery'], function () {

    Route::get('/', 'Gallery\WebController@index')->name("gallery");
    Route::get('/create', 'Gallery\WebController@create')->name("gallery_create");
    Route::post('/store', 'Gallery\WebController@store')->name("gallery_store");
    Route::get('/edit/{id}', 'Gallery\WebController@edit')->name("gallery_edit");
    Route::post('/update/{id}', 'Gallery\WebController@update')->name("gallery_update");
    Route::get('/delete/{id}', 'Gallery\WebController@destroy')->name("gallery_destroy");

});
Route::group(['prefix' => 'gallery/type'], function () {

    Route::get('/', 'Gallery\TypeController@index')->name("gallery_type");
    Route::get('/create', 'Gallery\TypeController@create')->name("gallery_type_create");
    Route::post('/store', 'Gallery\TypeController@store')->name("gallery_type_store");
    Route::get('/edit/{id}', 'Gallery\TypeController@edit')->name("gallery_type_edit");
    Route::post('/update/{id}', 'Gallery\TypeController@update')->name("gallery_type_update");
    Route::get('/delete/{id}', 'Gallery\TypeController@destroy')->name("gallery_type_destroy");

});

Route::group(['prefix' => 'message'], function () {

    Route::get('/', 'Message\WebController@index')->name("message");
    Route::get('/create', 'Message\WebController@create')->name("message_create");
    Route::post('/store', 'Message\WebController@store')->name("message_store");
    Route::get('/edit/{id}', 'Message\WebController@edit')->name("message_edit");
    Route::post('/update/{id}', 'Message\WebController@update')->name("message_update");
    Route::get('/delete/{id}', 'Message\WebController@destroy')->name("message_destroy");

});

Route::group(['prefix' => 'document/type'], function () {

    Route::get('/', 'Document\TypeController@index')->name("document_type");
    Route::get('/create', 'Document\TypeController@create')->name("document_type_create");
    Route::post('/store', 'Document\TypeController@store')->name("document_type_store");
    Route::get('/edit/{id}', 'Document\TypeController@edit')->name("document_type_edit");
    Route::post('/update/{id}', 'Document\TypeController@update')->name("document_type_update");
    Route::get('/delete/{id}', 'Document\TypeController@destroy')->name("document_type_destroy");

});

Route::group(['prefix' => 'document'], function () {

    Route::get('/', 'Document\WebController@index')->name("document");
    Route::get('/create', 'Document\WebController@create')->name("document_create");
    Route::post('/store', 'Document\WebController@store')->name("document_store");
    Route::get('/edit/{id}', 'Document\WebController@edit')->name("document_edit");
    Route::post('/update/{id}', 'Document\WebController@update')->name("document_update");
    Route::get('/delete/{id}', 'Document\WebController@destroy')->name("document_destroy");

});


Route::group(['prefix' => 'aboutus'], function () {

    Route::get('/', 'About\WebController@index')->name("aboutus");
    Route::get('/create', 'About\WebController@create')->name("aboutus_create");
    Route::post('/store', 'About\WebController@store')->name("aboutus_store");
    Route::get('/edit/{id}', 'About\WebController@edit')->name("aboutus_edit");
    Route::post('/update/{id}', 'About\WebController@update')->name("aboutus_update");
    Route::get('/delete/{id}', 'About\WebController@destroy')->name("aboutus_destroy");

});