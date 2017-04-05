<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quantity = 10;
        $this->call(UsersTableSeeder::class);
        $this->call(TodoListsTableSeeder::class, $quantity);
    }

    // Override call() to accept an extra aragument
    public function call($class, $extra = null) {
        $this->resolve($class)->run($extra);

        if (isset($this->command)) {
            $this->command->getOutput()->writeln("<info>Seeded:</info> $class");
        }
    }
}
