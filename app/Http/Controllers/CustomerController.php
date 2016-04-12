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
    use ControllerTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reserveBook(Book $book)
    {
        $loan = new Loan();
        $loan->renewals = 0;
        $loan->from = date("Y/m/d");
        $loan->due_to = date("Y/m/d", strtotime('+30 days'));
        $loan->isActive = false;
        $loan->book()->associate($book);
        $loan->customer()->associate(Auth::user());
        $loan->save();

        return redirect()->route('customer_books');
    }

    public function displayBooks()
    {
        return $this->displayUser();
    }

    public function renewLoan(Loan $loan) {
        $loan->renewals++;
        $loan->due_to = date("Y/m/d", strtotime($loan->due_to.' + 30 days'));
        $loan->save();

        return $this->displayUser();
    }

    public function cancelReservation(Request $request, Loan $loan) {
        $customer = $loan->customer;
        $loan->delete();

        return redirect()->route('customer_books');
    }
}