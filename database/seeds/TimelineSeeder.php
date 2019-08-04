<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Timeline;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timeline::create([
            'Description' => 'Akhir Registrasi',
            'DateTime' => Carbon::create(2019, 9, 20, 23, 59, 59, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Awal Babak 1', 
            'DateTime' => Carbon::create(2019, 9, 22, 13, 00, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Akhir Babak 1', 
            'DateTime' => Carbon::create(2019, 9, 22, 16, 00, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Pengumuman Babak 1', 
            'DateTime' => Carbon::create(2019, 9, 27, 12, 00, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Awal Babak 2', 
            'DateTime' => Carbon::create(2019, 10, 7, 12, 00, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Akhir Babak 2', 
            'DateTime' => Carbon::create(2019, 10, 14, 23, 59, 59, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Pengumuman Babak 2', 
            'DateTime' => Carbon::create(2019, 10, 28, 12, 00, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Grand Final', 
            'DateTime' => Carbon::create(2019, 11, 29, 00, 00, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Talkshow',
            'DateTime' => Carbon::create(2019, 11, 29, 11, 00, 00, '+07:00')
        ]);
    }
}
