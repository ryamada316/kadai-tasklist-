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
            'user_id' => '1',
            'content' => 'testtask1',
            'status' => '未完了'
        ]);
        DB::table('tasks')->insert([
            'user_id' => '1',
            'content' => 'testtask2',
            'status' => '対応中'
        ]);
        DB::table('tasks')->insert([
            'user_id' => '1',
            'content' => 'testtask3',
            'status' => '完了'
        ]);
        DB::table('tasks')->insert([
            'user_id' => '2',
            'content' => 'testtask4',
            'status' => '未完了'
        ]);
        DB::table('tasks')->insert([
            'user_id' => '2',
            'content' => 'testtask5',
            'status' => '対応中'
        ]);
        DB::table('tasks')->insert([
            'user_id' => '2',
            'content' => 'testtask6',
            'status' => '完了'
        ]);

    }
}
