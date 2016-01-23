<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert(
        	['name' => 'Lietotājs', 'permissions' => 0, 'created_by' => 1],
        	['name' => 'Admins', 'permissions' => 1, 'created_by' => 1],
        	['name' => 'Moderators', 'permissions' => 1, 'created_by' => 1]
        );
    }
}
