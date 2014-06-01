<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
       
		$this->call('UsersTableSeeder');
		$this->call('Product_categoriesTableSeeder');
		$this->call('ShopsTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('OrdersTableSeeder');
		$this->call('Orders_have_productsTableSeeder');
		$this->call('User_typesTableSeeder');
	}

}