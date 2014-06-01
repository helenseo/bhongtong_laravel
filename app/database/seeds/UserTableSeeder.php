<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create('en_US'); 

     $i=0;     
     while($i<10) {

		 $username=$faker->username;
         $password = Hash::make("password");
		 $firstname=$faker->firstname;
		 $lastname=$faker->lastname;
		 $email=$faker->email;
		 $address=$faker->address;
		 $tel=$faker->phoneNumber;

          
        User::create([
        
        "username"=>$username,
        "password" => $password,
        "firstname" => $firstname,
        "lastname" =>$lastname,
        "email"    => $email,
        "address"=>$address,
        "tel"=>$tel

      ]);
        $i++;
     } //end while 
	}

}