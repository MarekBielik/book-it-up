<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class LibrarianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchUsersForm(Request $request) {
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

}
