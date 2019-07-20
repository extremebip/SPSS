<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'NamaLengkap' => 'Anthony Gilrandy Theo',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('AAAaaa123'),
            'NomorHP' => '085771455959',
            'IDLine' => 'extremebip',
            'Roles' => 'Admin'
        ]);
    }
}
