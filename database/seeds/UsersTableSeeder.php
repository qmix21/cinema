<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::truncate();

        $faker =\Faker\Factory::create();

        for($i = 0; $i<25; $i++)
        {
        	User::create([
        		'Name' => $faker->name,
        		'email' => $faker->email,
        		'password' => $faker->password,

        	]);
        }
    }
}
