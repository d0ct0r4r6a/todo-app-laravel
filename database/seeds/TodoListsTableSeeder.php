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
        DB::table('todo_lists')->truncate();
        $faker = Faker::create();
        $todoLists = [];
        for ($i = 1; $i <= $quantity; $i++){
            $todoLists[] = [
                'title' => "{$faker->catchPhrase}",
                'description' => $faker->realText($maxNbChars = 100),
                'user_id' => rand(1,3)  
            ];
        }

        DB::table('todo_lists')->insert($todoLists);
    }
}
