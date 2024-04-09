<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // CategoriesTableにダミーデータを生成
        $this->call(CategoriesTableSeeder::class);

        // ContactsTableにダミーデータを生成
        Contact::factory(35)->create();
    }
}
