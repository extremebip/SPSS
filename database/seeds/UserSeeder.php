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
            'NamaLengkap' => 'Anthony Gilrandy Theo',
            'email' => 'anthonygt124@gmail.com',
            'password' => bcrypt('12345678'),
            'AsalUniversitas' => 'Binus University'
        ]);

        User::create([
            'NamaLengkap' => 'Test User 1',
            'email' => 'test2@gmail.com',
            'password' => bcrypt('12345678'),
            'AsalUniversitas' => 'Universitas Indonesia'
        ]);
    }
}
