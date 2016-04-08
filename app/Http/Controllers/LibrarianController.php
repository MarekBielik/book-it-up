<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Book;

class LibrarianController extends Controller
{
    use ControllerTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchUser(Request $request) {
        $searchString = $request->searchUser;

        $users = User::where('name', 'like', '%'.$searchString.'%')
            ->orWhere('email', 'like', '%'.$searchString.'%')
            ->get();


        return view('librarian.display_users', [
            'users' => $users,
        ]);
    }

    public function createLoan(Loan $loan) {
        $loan->isActive = TRUE;
        $loan->from = date("Y/m/d");
        $loan->due_to = date("Y/m/d", strtotime('+30 days'));
        $loan->librarian()->associate(Auth::user());
        $loan->save();

        return $this->displayUser($loan->customer);
    }

    public function returnBook(Loan $loan) {
        $loan->isActive = FALSE;
        $loan->due_to = date("Y/m/d");
        $loan->save();

        return $this->displayUser($loan->customer);
    }

    public function editBook(Book $book = null, Request $request) {
        //decide whether we are going to edit an existing book or create a new one
        if ($book->id == null) {
            $book = new Book();
            $url = route('home');
        } else {
            $url = route('display_book', ['book' => $book->id]);
        }

        $this->validate($request, [
            'bookTitle' => 'required|max:50|string',
            'bookISBN' => 'required|isbn|unique:books,isbn,'.$book->id,
            'bookAuthor' => 'required|max:50|string',
            'bookGenre' => 'required|max:50|string',
            'copies' => 'required|digits_between:1,3'
        ]);

        $book->title = $request->bookTitle;
        $book->isbn = $request->bookISBN;
        $book->author = $request->bookAuthor;
        $book->genre = $request->bookGenre;
        $book->copies = $request->copies;
        $book->save();

        return redirect($url);
    }
}
