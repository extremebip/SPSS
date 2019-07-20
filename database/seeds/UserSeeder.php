<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'test1@gmail.com',
            'password' => bcrypt('12345678'),
            'AsalUniversitas' => 'Binus University'
        ]);

        User::create([
            'email' => 'test2@gmail.com',
            'password' => bcrypt('12345678'),
            'AsalUniversitas' => 'Universitas Indonesia'
        ]);
    }
}
