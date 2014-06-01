<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$categories = Product_categories::all();

    foreach ($categories as $category)
    {
      for ($i = 0; $i < rand(-1, 10); $i++)
      {
        $name  = ucwords($faker->word);
        $stock = $faker->randomNumber(0, 100);
        $price = $faker->randomFloat(2, 5, 100);
        $shop_id = $faker->randomNumber(1,10);
        $product_seed = Products::create([
          "product_name"    => $name,
          "product_total"     => $stock,
          "price"     => $price,
          "shop_id" => $shop_id,
          "is_approved" => 1,
          "added_date"=>$faker->dateTimeThisYear($max = 'now')
        ]);

        $product_has_cat = Products_have_categories::create([
            "product_id" => $product_seed->product_id,
            "cat_id" => $category->cat_id
        	]);
      }
     }
   }

}


