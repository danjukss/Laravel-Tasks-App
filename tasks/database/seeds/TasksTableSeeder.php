<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
        	['name' => str_random(10), 'description' => str_random(100), 'user_id' => 1],
        	['name' => str_random(10), 'description' => str_random(100), 'user_id' => 1],
        	['name' => str_random(10), 'description' => str_random(100), 'user_id' => 1]
        ]);
    }
}
