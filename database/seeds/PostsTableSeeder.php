<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'It is rainy Today.',
            'body' => 'This is a body.',
            'weather_id' => 1,
            'category_id' => 1,
        ]);
        DB::table('posts')->insert([
            'title' => 'It is sunny Today.',
            'body' => 'This is a body',
            'weather_id' => 2,
            'category_id' => 1,
        ]);
    }
}
