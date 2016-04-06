<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'genre', 'author', 'copies'];

    public function loans() {
        return $this->hasMany('App\Loan');
    }

    //returns active loans and reservations of the current book
    public function activeLoans() {
        $loans = $this->loans;
        $activeLoans = array();

        foreach ($loans as $loan)
            if ($loan->isTaken())
                $activeLoans[] = $loan;

        return $activeLoans;
    }

    //returns number of actively loaned or reserved books
    public function onLoanCopies() {
        return count($this->activeLoans());
    }

    //returns number of copies free for reservation
    public function inStockCopies() {
        return $this->copies - $this->onLoanCopies();
    }
}
