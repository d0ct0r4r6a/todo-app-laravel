<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'John',
                'email' => 'john@mail.com',
                'password' => bcrypt('john')
            ],
            [
                'name' => 'Jane',
                'email' => 'jane@mail.com',
                'password' => bcrypt('jane')
            ],
        ]);
    }
}
