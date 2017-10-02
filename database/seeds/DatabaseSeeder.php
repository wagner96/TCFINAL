<?php

use Illuminate\Database\Seeder;
use app\Models\User;
use app\Models\Entity;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(UserTableSeeder::class);
            //	factory(\TC\Models\User::class, 10)->create();
    	$this->call(EntityTableSeeder::class);



    }
}
