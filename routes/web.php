<?php

use App\Http\Controllers\Blog\PostsController;

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('blog/posts/{post}', [PostsController::class, 'show'])->name('blog.show');

Auth::routes();



Route::middleware(['auth'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categories', 'CategoriesController');
    Route::resource('posts', 'PostsController');
    Route::resource('tags', 'TagsController');
    Route::get('trashed-post', 'PostsController@trashed')->name('trashed-posts.index');
    Route::put('restore/{post}', 'PostsController@restore')->name('restore-posts');
});

Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});
