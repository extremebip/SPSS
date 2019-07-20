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
            'Description' => 'Awal Babak 1', 
            'DateTime' => Carbon::create(2019, 7, 21, 21, 30, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Akhir Babak 1', 
            'DateTime' => Carbon::create(2019, 7, 21, 22, 30, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Pengumuman Babak 2', 
            'DateTime' => Carbon::create(2019, 7, 23, 22, 30, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Awal Babak 2', 
            'DateTime' => Carbon::create(2019, 7, 24, 21, 30, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Akhir Babak 2', 
            'DateTime' => Carbon::create(2019, 7, 26, 21, 30, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Awal Babak 2', 
            'DateTime' => Carbon::create(2019, 7, 24, 21, 30, 00, '+07:00')
        ]);

        Timeline::create([
            'Description' => 'Awal Babak 2', 
            'DateTime' => Carbon::create(2019, 7, 24, 21, 30, 00, '+07:00')
        ]);
    }
}
