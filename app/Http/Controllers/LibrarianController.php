<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Book;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class LibrarianController extends Controller
{
    use ControllerTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchUser(Request $request) {
        $searchString = $request->searchUser;

        if(Input::get('search_user_button')) {
            $users = User::where('name', 'like', '%' . $searchString . '%')
                ->orWhere('email', 'like', '%' . $searchString . '%')
                ->paginate(20);

            return view('librarian.display_users', [
                'users' => $users,
            ]);
        }
        else if(Input::get('search_librarian_button')) {
            // select id, name, email from users, role_user where users.id = role_user.user_id and role_id = 2;
            
            return view('librarian.display_users', [
                'users' => $users,
            ]);
        }
    }
    public function renewLoan(Loan $loan) {
        $loan->renewals++;
        $loan->due_to = date("Y/m/d", strtotime($loan->due_to.' + 30 days'));
        $loan->save();

        return redirect()->route('display_user', ['user' => $loan->customer->id]);
    }

    public function createLoan(Loan $loan) {
        $loan->isActive = TRUE;
        $loan->from = date("Y/m/d");
        $loan->due_to = date("Y/m/d", strtotime('+ 30 days'));
        $loan->librarian()->associate(Auth::user());
        $loan->save();

        return redirect()->route('display_user', ['user' => $loan->customer->id]);
    }

    public function returnBook(Loan $loan) {
        $loan->isActive = FALSE;
        $loan->due_to = date("Y/m/d");
        $loan->save();

        return redirect()->route('display_user', ['user' => $loan->customer->id]);
    }

    public function editBook(Book $book = null, Request $request) {
        //validate input
        $this->validate($request, [
            'bookTitle' => 'required|max:50|string',
            'bookISBN' => 'required|isbn|unique:books,isbn,'.$book->id,
            'bookAuthor' => 'required|max:50|string',
            'bookGenre' => 'required|max:50|string',
            'copies' => 'required|digits_between:1,3'
        ]);

        //decide whether we are going to edit an existing book or create a new one
        if ($book->id == null) {
            $book = new Book();
            $url = route('home');
            Flash::success('Book successfully added, thank you very much.');
        } else {
            $url = route('display_book', ['book' => $book->id]);
            Flash::success('You actually changed the details, we are proud of you.');
        }

        //save it
        $book->title = $request->bookTitle;
        $book->isbn = $request->bookISBN;
        $book->author = $request->bookAuthor;
        $book->genre = $request->bookGenre;
        $book->copies = $request->copies;
        $book->save();

        return redirect($url);
    }

    public function deleteBook(Book $book) {
        Flash::success('Well done, you got rid of the '.$book->title." and all the related loans, everything's gone.");
        $book->delete();
        return redirect()->route('home');
    }

    public function cancelReservation(Loan $loan) {
        $customer = $loan->customer;
        $loan->delete();

        return redirect()->route('display_user', ['user' => $customer->id]);
    }
}
