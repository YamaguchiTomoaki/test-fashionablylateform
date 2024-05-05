<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Contact;
use Database\Factories\ContactFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CategoriesTableSeeder::class);
        Contact::factory(7)->create();
    }
}
