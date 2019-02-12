<?php

Route::get('st', 'TestController@sessionTest');

Route::get('reading-circles/books', 'Books\IndexController@index');
Route::get('reading-circles/', 'IndexController@index');

Route::middleware('auth.rcmember')->group(function() {
    Route::get('reading-circles/books/registration/form', 'Books\RegistrationController@form');
    Route::match(['get', 'post'], 'reading-circles/books/registration/action', 'Books\RegistrationController@action');
});

Route::middleware('auth.not_rcmember')->group(function(){
    Route::get('reading-circles/login', 'LoginController@login');
    Route::post('reading-circles/auth', 'LoginController@auth');
});
