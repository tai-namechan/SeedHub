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
                'id' => '1',
                'timezone_id' => '1',
            ],
            [
                'name' => 'もくもく',
                'id' => '2',
                'timezone_id' => '1',
            ],
        ]);
    }
}
