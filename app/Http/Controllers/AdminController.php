<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function manageUser(Request $request) {
        if(Input::get('makeLibrarian'))
            $this->makeLibrarian(User::where('id', '=', $request->input('makeLibrarian'))->first());
        else if (Input::get('makeCustomer'))
            $this->makeCustomer(User::where('id', '=', Input::get('makeCustomer'))->first());
        else if (Input::get('deleteUser'))
            $this->deleteUser(User::where('id', '=', Input::get('deleteUser'))->first());

        return Redirect::back();
    }

    public function makeCustomer(User $user) {
        $userRole = Role::where('name', '=', 'customer')->first();

        $user->detachRoles($user->roles);
        $user->attachRole($userRole);
    }

    public function makeLibrarian(User $user) {
        $librarianRole = Role::where('name', '=', 'librarian')->first();

        $user->detachRoles($user->roles);
        $user->attachRole($librarianRole);
    }

    public function deleteUser(User $user) {
        $user->delete();
    }

    
    public function generateReport() {
        $loans = Loan::all();
        $popBook = $this->findMostPopular();
        return view('admin.generate_report', [
            'loans' => $loans,
            'popBook' => $popBook,
        ]);
    }

    public function findMostPopular() {
        $results = DB::select('select *, count(book_id) as occurence
                              from loans group by book_id order by occurence desc
                              limit 1');

        return $results[0];
    }
}

