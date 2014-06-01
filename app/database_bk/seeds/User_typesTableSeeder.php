<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class User_typesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $User_type = array('member','entreprise');

		foreach(range(0, 1) as $index)
		{
			User_types::create([
            "User_type" => $User_type[$index]
			]);
		}
	}

}