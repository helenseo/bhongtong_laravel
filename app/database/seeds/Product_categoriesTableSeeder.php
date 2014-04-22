<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class Product_categoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('en_US');

		foreach(range(1, 10) as $index)
		{
			$name = ucwords($faker->word);
			Product_categories::create([
             "cat_name" => $name
			]);
		}
	}

}