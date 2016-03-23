<?php

use Illuminate\Database\Seeder;
use App\Loan;
use App\Book;
use App\User;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //one static loan
        $book = Book::where('isbn', '=', '9780061042577')->first();
        $user = User::where('email', '=', 'librarian@mail.com')->first();

        $loan = new Loan();
        $loan->renewals = 3;
        $loan->from = date("Y/m/d");
        $loan->book()->associate($book);
        $loan->user()->associate($user);
        $book->loans()->save($loan);
        $user->loans()->save($loan);

        $loan->save();


        //todo:random loans

    }
}
