<?php

use Illuminate\Database\Seeder;
use App\Book;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = ['buddhists texts', 'christian literature', 'hindu literature', 'islamic literature', 'jewish literature', 'occult'];

        $faker = Faker::create();

        //one static book, God bless it
        Book::create(['isbn' => '9780061042577', 'title' => 'The Holy Bible', 'genre' => 'sci-fi / comedy', 'author' => "God O'Father", 'copies' => 10]);


        //generate random books

        foreach (range(1, 200) as $index) {

            DB::table('books')->insert([
                'isbn' => $faker->isbn13,
                'title' => $faker->text(30),
                'genre' => $genres[rand(0, count($genres) - 1)],
                'author' => $faker->name,
                'copies' => rand(0, 10),
            ]);
        }
    }
}
