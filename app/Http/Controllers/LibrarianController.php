<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LibrarianController extends Controller
{
    use ControllerTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayUsers(Request $request) {
        $searchString = $request->searchUser;

        $users = User::where('name', 'like', '%'.$searchString.'%')
            ->orWhere('email', 'like', '%'.$searchString.'%')
            ->get();


        return view('librarian.display_users', [
            'users' => $users,
        ]);
    }

    public function searchUsers() {
        return view('librarian.search_users');
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

}
