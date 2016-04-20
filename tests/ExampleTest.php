<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $user = User::where('email', '=', 'admin@mail.com')->first();

        $this->actingAs($user)
            ->visit('/')
            ->see('Generate Report')
            ->type('bible', 'searchBook')
            ->press('Search')
            ->see('9780061042577');
    }
}
