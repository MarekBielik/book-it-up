<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Book;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Search for books.
     *
     * @param  Request  $request
     * @return Response
     */
    public function searchBook(Request $request) {
        $searchString = $request->searchBook;

        $books = Book::where('title', 'like', '%'.$searchString.'%')
            ->orWhere('author', 'like', '%'.$searchString.'%')
            ->paginate(20);

        return view('books.displayBooks', [
            'books' => $books,
        ]);
    }

    public function displayBook(Book $book) {
        return view('books.displayBook', [
            'book' => $book,
        ]);
}
}
