<?php

use Illuminate\Database\Seeder;
use App\Cinemas;
class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cinemas::truncate();

        $faker =\Faker\Factory::create();

        for($i = 0; $i<25; $i++)
        {
        	Cinemas::create([
        		'Name' => $faker->name,
        		'Address' => $faker->address,
        		'long' => $faker->longitude(),
        		'lat' => $faker->latitude()
        	]);
        }
    }
}
