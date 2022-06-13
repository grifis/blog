<?php

use Illuminate\Database\Seeder;

class KnonwledgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knowledge')->insert([
            [
            'id' => '1',
            'sentence' => 'Im singing in the rain, just singing in the rain. What a glorious feeling, Im happy again. ',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '2',
            'sentence' => 'A drop of water cant stop a fire alone. But a drop of water, plus another one, plus another one, then you have the rain, and the rain can stop the fire.',
            'created_at' => now(),
            'updated_at' => now(),
                ],
                [
            'id' => '3',
            'sentence' => 'The drops of rain make a hole in the stone, not by violence, but by oft falling.',
            'created_at' => now(),
            'updated_at' => now(),
                ]
            ]);
    }
}
