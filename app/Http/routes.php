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

use App\Book;

Route::group(['middleware' => ['web']], function () {
    Route::auth();


    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    //Route::get('/home', 'HomeController@home');
    Route::get('/search_book', 'HomeController@searchBook')->name('search_book');
    Route::get('/book/{book}', 'HomeController@displayBook')->name('display_book');

    Route::group(['prefix' => 'customer'], function() {
        Route::get('reserve/{book}', 'CustomerController@reserveBook')->name('reserve_book');
        Route::get('books', 'CustomerController@displayBooks')->name('customer_books');
        Route::get('cancel/{loan}', 'CustomerController@cancelReservation')->name('customer_cancel_reservation');
        Route::get('renew/{loan}', 'CustomerController@renewLoan')->name('customer_renew_loan');
    });

    Route::group(['prefix' => 'librarian'], function() {
        Route::get('display_user/{user}', 'LibrarianController@displayUser')->name('display_user');

        Route::get('search_user', function () {
            return view ('librarian.search_users');
        })->name('search_user');

        Route::get('search_user/submit', 'LibrarianController@searchUser')->name('search_user_submit');
        Route::get('create_loan/{loan}/', 'LibrarianController@createLoan')->name('create_loan');
        Route::get('return/{loan}', 'LibrarianController@returnBook')->name('return_book');
        Route::get('cancel/{loan}', 'LibrarianController@cancelReservation')->name('librarian_cancel_reservation');
        Route::get('renew/{loan}', 'LibrarianController@renewLoan')->name('librarian_renew_loan');

        Route::get('edit_book/{book?}', function (Book $book = null) {
            return view ('librarian.edit_book', ['book' => $book]);
        })->name('edit_book');

        Route::post('edit_book/submit/{book?}', 'LibrarianController@editBook')->name('edit_book_submit');
        Route::get('delete_book/{book}', 'LibrarianController@deleteBook')->name('delete_book');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::post('manage_user', 'AdminController@manageUser')->name('admin_manage_user');
        Route::get('generate_report', 'AdminController@generateReport')->name('generate_report');
        Route::get('findMostPopular', 'AdminController@findMostPopular')->name('findMostPopular');

    });
});


