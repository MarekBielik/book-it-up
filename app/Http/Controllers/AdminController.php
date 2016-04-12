<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    use ControllerTrait;

    public function __construct()
    {
        $this->middleware('auth');
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