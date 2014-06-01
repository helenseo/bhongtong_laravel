<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$order_status = array("not paid","paid","shipped");

		foreach(range(1, 10) as $index)
		{
			$order_s = $order_status[array_rand($order_status)];
			$amount = $faker->randomNumber(1, 10);
			$user_id = $faker->randomNumber(4,10);
			Orders::create([
              "order_status"=>$order_s,
              "order_added_date"=>$faker->dateTimeThisYear($max = 'now'),
              "amount" =>$amount,
              "user_id" => $user_id
			]);
		}
	}

}