<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //loans of particular customers
    public function customerLoans() {
        return $this->hasMany('App\Loan', 'customer_id');
    }

    //loans which were created by librarians for particular customers
    public function librarianLoans() {
        return $this->hasMany('App\Loan', 'librarian_id');
    }

    //todo: user's account can be active or blocked
}
