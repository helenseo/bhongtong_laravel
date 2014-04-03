<?php
use Faker\Factory as Faker;

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
   protected $layout = "layouts.main";

    public function __construct() {
		$this->beforeFilter('auth', array('only'=>array('getDashboard','getLogout')));
	}
	public function index()
	{
		
		$users = Users::paginate(10);
        return View::make('users.index', compact('users'));

       }
     public function fake()
     {
     	$faker = Faker::create('en_US');
        $i=0;

        while($i<10) {
        $users[$i]['username'] = $faker->username;
        $users[$i]['password'] = Hash::make("password");
        $users[$i]['email'] = $faker->email;
        $users[$i]['phone']=$faker->phoneNumber;
        $users[$i]['name']=$faker->name;  
        $users[$i]['bio']=$faker->text(50); 
         $i++;
        }

        $users = json_decode(json_encode($users), FALSE);
/*
        foreach ($users as $user) {
        	echo $user->username."<br />";
        	echo $user->email."<br />";
        }
        */

      return View::make('users.faker', compact('users'));
     }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$input = Input::all();
        $validation = Validator::make($input, Users::$rules);

        if ($validation->passes())
        {

          /*
        	$input_db = array(
            'username' => 'Jason',
           
            );
           */
           Users::create($input);

        	//DB::table('users')->insert($input['username']);

        	//print_r($input_db);
        	

            return Redirect::route('users.index');
        }

        return Redirect::route('users.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$user = Users::find($id);
        if (is_null($user))
        {
            return Redirect::route('users.index');
        }
        return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$input = Input::all();
        $validation = Validator::make($input, Users::$rules);
        if ($validation->passes())
        {
            $user = Users::find($id);
            $user->update($input);
            return Redirect::route('users.show', $id);
        }
        return Redirect::route('users.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		Users::find($id)->delete();
        return Redirect::route('users.index');
	}

	

	public function getLogin() {
		$this->layout->content = View::make('users.login');
		//return View::make('users.login');
		//return View::make('users.create');
	}

	public function postSignin() {
       //set data from input
       $inputdata= array(
			'username' => Input::get('username'),
			'password' => Input::get('password')
		);
	
	// Declare the rules for the form validation.
		$rules = array(
			'username'  => 'Required',
			'password'	=> 'Required'
		);

		// Validate the inputs.
		$validator = Validator::make($inputdata, $rules);

        if ($validator->passes())
		{
		 if (Auth::attempt($inputdata,true)) {
			return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
	    	} else {

           
			return Redirect::to('users/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput(Input::except('password'));
		    }
		  } else {
		  	return Redirect::to('users/login')
            ->withInput()
            ->withErrors($validator)
            ->with('message', 'There were validation errors.');
		  	//return Redirect::to('users/login')->with('error')->withInput(Input::except('password'));
		  }
	}

	public function getDashboard() {
	    $this->layout->content = View::make('users.dashboard');
		//return View::make('users.create');
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
        


}