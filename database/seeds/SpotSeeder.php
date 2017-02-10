<?php

use App\Spot;
use Illuminate\Database\Seeder;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
        $spot = new Spot(['availability' => 'N']);
        $spot->save();
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
        $spot = new Spot(['availability' => 'N']);
        $spot->save();
        $spot = new Spot(['availability' => 'N']);
        $spot->save();
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
        $spot = new Spot(['availability' => 'N']);
        $spot->save();
        $spot = new Spot(['availability' => 'Y', 'available_path'=>'table_available.png', 'reserved_path'=>'table_reserved.png']);
        $spot->save();
    }
}
