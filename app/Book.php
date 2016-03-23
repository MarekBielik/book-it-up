<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'genre', 'author', 'copies'];

    public function loans() {
        return $this->hasMany('App\Loan');
    }

    public function onLoanCopies() {
        return $this->loans->count();
    }

    public function inStockCopies() {
        return $this->copies - $this->onLoanCopies();
    }
}
