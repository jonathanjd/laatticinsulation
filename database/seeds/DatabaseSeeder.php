<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        //factory(App\Category::class, 20)->create();
        //factory(App\Article::class, 20)->create();
    }
}
