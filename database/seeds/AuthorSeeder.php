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
            'name' => 'Petar Petrovic'
        ]);

        Author::create([
            'id' => 2,
            'name' => 'Pera Peric'
        ]);

        Author::create([
            'id' => 3,
            'name' => 'Bogdan Ciric'
        ]);
    }
}
