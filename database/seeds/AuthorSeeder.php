<?php

use Illuminate\Database\Seeder;
use App\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'id' => 1,
            'first_name' => 'Petar',
            'last_name' => 'Petrovic'
        ]);

        Author::create([
            'id' => 2,
            'first_name' => 'Pera',
            'last_name' => 'Peric'
        ]);

        Author::create([
            'id' => 3,
            'first_name' => 'Bogdan',
            'last_name' => 'Ciric'
        ]);
    }
}
