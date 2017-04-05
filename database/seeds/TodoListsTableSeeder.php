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
    public function run()
    {
        DB::table('todo_lists')->truncate();
        $faker = Faker::create();
        $todoLists = [];
        for ($i = 0; $i < 10; $i++){
            $todoLists[] = [
                'title' => "{$i} · {$faker->sentence($nbWords = 4, $variableNbWords = true)}",
                'description' => $faker->text($maxNbChars = 200),
                'user_id' => rand(1,3)  
            ];
        }

        DB::table('todo_lists')->insert($todoLists);
    }
}
