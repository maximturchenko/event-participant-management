<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'name' => "Laravel STL",
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', '2020-07-29 12:00:00'),            
            'city' => "Saint Louis",            
        ]);

        DB::table('events')->insert([
            'name' => "Laravel Nairobi",
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->addWeeks(3)),            
            'city' => "Nairobi",            
        ]);


        DB::table('events')->insert([
            'name' => "Laravel MeetUp",
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->addWeeks(4)),            
            'city' => "Харьков",            
        ]);
        
        DB::table('events')->insert([
            'name' => "Php и бизнес",
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->addWeeks(5)),            
            'city' => "Ростов-на-дону",            
        ]);

        
        DB::table('events')->insert([
            'name' => "Laravel MeetUp, Moscow",
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->addWeeks(6)),            
            'city' => "Москва",            
        ]);

        
        DB::table('events')->insert([
            'name' => "Php нововведения",
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now()->addWeeks(10)),            
            'city' => "Екатеринубрг",            
        ]);

    }
}


