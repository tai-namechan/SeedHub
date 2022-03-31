<?php

use Illuminate\Database\Seeder;

class TimezoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timezones')->insert([
            ['timezone' => '朝',
            'id' => '1',
            ],    
            [
            'timezone' => '昼',
            'id' => '2',
            ],
            [
            'timezone' => '夜',
            'id' => '3',
            ],
        ]);
    }
}
