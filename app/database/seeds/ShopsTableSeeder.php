<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ShopsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Shops::create([
             'shop_type_id'=>1,
             'shop_name'=>ucwords($faker->word),
             'shop_address'=>$faker->address,
             'province_id'=>1,
             'started_date'=>$faker->dateTimeThisYear($max = 'now') ,
             'ent_id'=>2
			]);
		}
	}

}
