<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Loan;
use App\User;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reserveBook(Book $book) {

        $loan = new Loan();
        $loan->renewals = 3;
        $loan->from = date("Y/m/d");
        $loan->due_to = date("Y/m/d", strtotime('+30 days'));
        $loan->isActive = FALSE;
        $loan->book()->associate($book);
        $loan->customer()->associate(Auth::user());
        $loan->save();

        return redirect()->route('customer_books');
    }

    public function displayBooks() {

        $books = Auth::user()->customerLoans;
        $reservations = [];
        $loans = [];

        foreach ($books as $book) {
            if ( $book->librarian == null)
                $reservations[] = $book;
            else
                $loans[] = $book;
        }

        return view('customer.books', [
            'reservations' => $reservations,
            'loans' => $loans,
        ]);
    }

    public function cancelReservation(Loan $loan) {
        $loan->delete();

        return view('customer.books', [
            'loans' => Auth::user()->customerLoans,
        ]);
    }
}
