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

    	factory(App\Cinemas::class, 30)->create();
       
    }
}
