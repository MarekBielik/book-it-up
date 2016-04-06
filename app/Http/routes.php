<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@home');
    Route::get('/search_book', 'HomeController@searchBook')->name('search_book');
    Route::get('/book/{book}', 'HomeController@displayBook')->name('display_book');

    Route::group(['prefix' => 'customer'], function() {
        Route::get('reserve/{book}', 'CustomerController@reserveBook')->name('reserve_book');
        Route::get('books', 'CustomerController@displayBooks')->name('customer_books');
        Route::get('cancel/{loan}', 'CustomerController@cancelReservation')->name('cancel_reservation');
    });

    Route::group(['prefix' => 'librarian'], function() {
        Route::get('display_users', 'LibrarianController@displayUsers')->name('display_users');
        Route::get('display_user/{user}', 'LibrarianController@displayUser')->name('display_user');
        Route::get('search_users', 'LibrarianController@searchUsers')->name('search_users');
        Route::get('create_loan/{loan}/', 'LibrarianController@createLoan')->name('create_loan');
        Route::get('return/{loan}', 'LibrarianController@returnBook')->name('return_book');
    });
});


