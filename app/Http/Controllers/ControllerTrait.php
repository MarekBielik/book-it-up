<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 4/6/16
 * Time: 1:19 PM
 */

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\User;
use App\Loan;
use Illuminate\Support\Facades\Auth;

//functions in this trait are used across various controllers which use this trait
trait ControllerTrait {

    public function displayUser(User $user = null) {
        //if no user provided, the user currently logged in will be used
        $user = isset($user) ? $user : Auth::user();
        $isUserActive = true;
        $loans = $user->customerLoans;
        $reservations = [];
        $activeLoans = [];

        foreach ($loans as $loan) {
            //check if the the loan is just a reservation
            if ( $loan->isReserved()) {
                //check if the reservation is expired
                if ($loan->isExpired())
                    $loan->delete();
                else
                    $reservations[] = $loan;
            }
            else if ($loan->isLoaned()) {
                //check if the user has any expired loans
                if ($loan->isExpired()) {
                    $isUserActive = false;
                }
                $activeLoans[] = $loan;
            }
        }

        $user->active = $isUserActive;
        $user->save();

        //decide whether the customer's or librarian's layout should be displayed
        if (Auth::user()->hasRole(['admin', 'librarian']))
            $view = 'librarian.display_user';
        else
            $view = 'customer.books';

        return view($view, [
            'reservations' => $reservations,
            'loans' => $activeLoans,
            'user' => $user,
        ]);
    }
}