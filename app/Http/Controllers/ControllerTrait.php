<?php
/**
 * Created by PhpStorm.
 * User: marek
 * Date: 4/6/16
 * Time: 1:19 PM
 */

namespace App\Http\Controllers;

use App\User;
use App\Loan;
use Illuminate\Support\Facades\Auth;

//functions in this trait are used across various controllers which use this trait
trait ControllerTrait {

    //todo: check for eny expired reservations and cancel them
    //todo: check if the user has any overdue loans and block his activity
    public function displayUser(User $user = null) {
        //if no user provided, the user currently logged in will be used
        $user = isset($user) ? $user : Auth::user();
        $loans = $user->customerLoans;
        $reservations = [];
        $activeLoans = [];

        foreach ($loans as $loan) {
            if ( $loan->isReserved())
                $reservations[] = $loan;
            else if ($loan->isLoaned() == true)
                $activeLoans[] = $loan;
        }

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

    public function cancelReservation(Loan $loan)
    {
        $customer = $loan->customer;
        $loan->delete();

        return $this->displayUser($customer);
    }
}