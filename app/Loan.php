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
}
