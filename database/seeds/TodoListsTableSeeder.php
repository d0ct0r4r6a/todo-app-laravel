<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TodoListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($quantity = null)
    {
        var_dump($quantity);

        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('tasks')->truncate();

        DB::table('todo_lists')->truncate();


        $faker = Faker::create();

        $todoLists = [];
        $tasks = [];


        for ($i = 1; $i <= $quantity; $i++){

            $date = date('Y-m-d H:i:s', strtotime("2016-05-01 08:00:00 + {$i} days"));

            $todoLists[] = [
                'title' => "{$i} {$faker->catchPhrase}",
                'description' => $faker->realText($maxNbChars = 100),
                'user_id' => rand(1,3),
                'created_at'=> $date,
                'updated_at'=> $date
            ];

            for ($j = 1; $j <= rand(1,4); $j++){
                $tasks[] = [
                    'todo_list_id' => $i,
                    'title' => "The task {$j} of todo list {$i}",
                    'created_at' => $date,
                    'updated_at' => $date,
                    'completed_at' => rand(0,1) == 0 ? NULL : $date
                ];
            }

        }

        DB::table('todo_lists')->insert($todoLists);
        DB::table('tasks')->insert($tasks);
    }
}
