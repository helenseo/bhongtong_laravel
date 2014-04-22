<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class Orders_have_productsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$orders   = Orders::all();
        $products = Products::all()->toArray();
    
       foreach ($orders as $order)
       {
        $used = [];
        for ($i = 0; $i < rand(1, 5); $i++)
        {
         $product = $faker->randomElement($products);
         if (!in_array($product["product_id"], $used))
         {
          $id       = $product["product_id"];
          
          Orders_have_products::create([
            "order_id"   => $order->order_id,
            "product_id" => $id,
          ]);
          $used[] = $product["product_id"];
        }
       }
     }
	}

}

