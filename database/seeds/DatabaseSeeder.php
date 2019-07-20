<?php

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
        //uncoment when in development mode
        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(TimelineSeeder::class);
    }
}
