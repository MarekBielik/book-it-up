<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function book() {
        return $this->belongsTo('App\Book');
    }

    public function customer() {
        return $this->belongsTo('App\User', 'customer_id');
    }

    public function librarian() {
        return $this->belongsTo('App\User', 'librarian_id');
    }

    //returns true if the book is reserved or on loan
    //returns false if the book has been returned
    public function isTaken() {
        return $this->isActive == true ||
               $this->librarian == null;
    }

    public function isReserved() {
        if ($this->librarian == null)
            return true;
        else
            return false;
    }

    public function isLoaned() {
        return $this->isActive;
    }

    //returns true if the loan has less than three renewals
    //and if today's date is equal or less than 7 days before loan's expiration
    public function isRenewable() {
        return
            $this->renewals < 3 &&
            date("Y/m/d") <= date("Y/m/d") &&
            date("Y/m/d") >= date("Y/m/d", strtotime($this->due_to.' - 7 days'));
    }
}
