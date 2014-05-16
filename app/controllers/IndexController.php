<?php

	class IndexController extends BaseController {

		public function index() {
			/*
			$view = View::make('firstname',$data['fisrtname']);
			$view = View::make('lastname',$data['lastname']);
			$view = View::make('username',$data['username']);
			$view = View::make('password',$data['password']);
			$view = View::make('confirm',$data['confirm']);
			$view = View::make('email',$data['email']);
			*/

			$input = Input::all();
			/*
			$name->firstname = $input['firstname'];
			$name->lastname = $input['lastname'];
			$name->username = $input['username'];
			$name->password = $input['password'];
			$name->confirm = $input['confirm'];
			$name->email = $input['email'];
			*/
			
			$firstname = $input['firstname'];
			$lastname = $input['lastname'];
			$username = $input['username'];
			$password = $input['password'];
			$confirm = $input['confirm'];
			$email = $input['email'];
			
			/*
			echo "<p>".$firstname."<p>";
			echo "<p>".$lastname."<p>";
			echo "<p>".$username."<p>";
			echo "<p>".$password."<p>";
			echo "<p>".$confirm."<p>";
			echo "<p>".$email."<p>";
			*/

			$data['firstname'] = $firstname;
			$data['lastname'] = $lastname;
			$data['username'] = $username;
			$data['password'] = $password;
			$data['confirm'] = $confirm;
			$data['email'] = $email;

			$users = new Users();

			$users->a = "aa";

			$tie = "bb";

			return View::make('users.post')->with('por',$users)
			                               ->with('tie',$tie)
			                               ->with('mo',array('1','22'));

			//return View::make('users.post',$por);
		}
	}