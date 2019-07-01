<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'NamaLengkap' => 'Anthony Gilrandy Theo',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('AAAaaa123'),
            'NomorHP' => '085771455959',
            'IDLine' => 'extremebip',
            'Roles' => 'Admin'
        ]);
    }
}
