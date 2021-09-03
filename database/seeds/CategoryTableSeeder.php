<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'ワイワイ',
                'timezone_id' => '1',
            ],
            [
                'name' => 'もくもく',
                'timezone_id' => '1',
            ],
        ]);
    }
}
