<?php

use Illuminate\Database\Seeder;

class WeathersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('weathers')->insert([
            'name' => 'rainy',
        ]);
        DB::table('weathers')->insert([
            'name' => 'sunny',
        ]);
    }
}
