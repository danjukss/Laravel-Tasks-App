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
        	['name' => 'Test', 'description' => 'asd', 'user_id' => 1], 
        ]);
    }
}
