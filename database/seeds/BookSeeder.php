<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'id' => 1,
            'name' => 'Rat i mir',
            'author_id' => 1
        ]);

        Book::create([
            'id' => 2,
            'name' => 'Na Drini cuprija',
            'author_id' => 1
        ]);

        Book::create([
            'id' => 3,
            'name' => 'Poezija',
            'author_id' => 2
        ]);
        Book::create([
            'id' => 4,
            'name' => 'Bleja na brdu',
            'author_id' => 2
        ]);

        Book::create([
            'id' => 5,
            'name' => 'Put do kuce',
            'author_id' => 2
        ]);
    }
}
