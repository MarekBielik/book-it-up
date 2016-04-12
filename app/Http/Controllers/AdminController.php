<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

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
}
