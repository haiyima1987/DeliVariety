<?php

use App\TimeSpan;
use Illuminate\Database\Seeder;

class TimeSpanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $span = new TimeSpan(['id' => 12, 'span' => '12:00 -- 14:00']);
        $span->save();
        $span = new TimeSpan(['id' => 14, 'span' => '14:00 -- 16:00']);
        $span->save();
        $span = new TimeSpan(['id' => 16, 'span' => '16:00 -- 18:00']);
        $span->save();
        $span = new TimeSpan(['id' => 18, 'span' => '18:00 -- 20:00']);
        $span->save();
        $span = new TimeSpan(['id' => 20, 'span' => '20:00 -- 22:00']);
        $span->save();
    }
}
