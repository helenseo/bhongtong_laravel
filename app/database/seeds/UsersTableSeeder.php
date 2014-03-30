<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		//DB::table('users')->delete();
		 

     $i=0;     
     while($i<10) {
     	$email    = $faker->email;
		 $fname=$faker->firstname;
		 $lname=$faker->lastname;
		 $address=$faker->address;
		 $username=$faker->userName;
		 $tel=$faker->phoneNumber;
		 $regist=$faker->dateTime;
          $password = Hash::make("password");
          
        Users::create([
        "email"    => $email,
        "password" => $password,
        "firstname" => $fname,
        "lastname" =>$lname,
        "address"=>$address,
        "username"=>$username,
        "tel"=>$tel,
        "registed_date"=>$regist
      ]);
        $i++;
     } //end while 
	}

}