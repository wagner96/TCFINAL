<?php

use app\Models\Entity;
use Illuminate\Database\Seeder;

class EntityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'name' => str_random(10),
    		'email' => str_random(10).'@gmail.com',
    		'breed' => str_random(5),
    		'password' => bcrypt('secret'),
    		'phone' => rand(11111111, 99999999),
    		'state' => str_random(2),
    		'cep' => rand(11111111, 99999999),
    		'city' => str_random(10),
    		'district' => str_random(10),
    		'complement' => str_random(10),
    		'number' => str_random(10),
    	//	'lat' => rand(11111111, 99999999),
    	//	'lng' => rand(11111111, 99999999),
    		'social_network' => 'www.facebook/'.str_random(10),
    		'birth_date' => date("F j, Y, g:i a") ,
    		'hierarchical_level'=> 'user',
    		'active_user' => rand(0, 1),
    		'description_actions' =>  str_random(10),
    		'date_profile_creation' => date("F j, Y, g:i a") ,
    		'date_profile_modification' => date("F j, Y, g:i a"),
    		]);
    	}
    }