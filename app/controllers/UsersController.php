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
    	$this->beforeFilter('csrf', array('on'=>'post'));
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
            ->withErrors($validation);
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
            ->withErrors($validation);
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

	public function postRegister(){
		$input = Input::all();

		$rules = array(
			'firstname' => 'required',
			'username' => 'required|unique:users',
			'email' => 'required|unique:users|email',
			'password' =>'required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/',
            'repassword' =>'required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/|same:password',
            'recaptcha_response_field' => 'required|recaptcha'
			);

		$v = Validator::make($input, $rules);

		if($v->passes()){
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new Users();
			$user->firstname = $input['firstname'];
			$user->lastname = $input['lastname'];
			$user->email = $input['email'];
			$user->username = $input['username'];
			$user->password = $password;
			$user->address = $input['address'];
			$user->tel = $input['tel'];
			$user->province_id = $input['province'];
			$user->save();

			return Redirect::to('users/login');

		}else{

			return Redirect::to('users/register')->withInput()->withErrors($v);

		}
	}

	public function postUpdateprofile(){
		$input = Input::all();

		$rules = array(
			'firstname' => 'required',
			'username' => 'required|unique:users',
			'email' => 'required|unique:users|email',
			'password' => 'required'
			);

		$v = Validator::make($input, $rules);

		if($v->passes()){
			$password = $input['password'];
			$password = Hash::make($password);

			$user = new Users();
			$user->firstname = $input['firstname'];
			$user->lastname = $input['lastname'];
			$user->email = $input['email'];
			$user->username = $input['username'];
			$user->password = $password;
			$user->address = $input['address'];
			$user->tel = $input['tel'];
			$user->province_id = $input['province'];
			$user->save();

			return Redirect::to('users/login');

		}else{

			return Redirect::to('users/register')->withInput()->withErrors($v);

		}
	}

	public function getLogin() {
	  if(!Auth::check()) {
		$this->layout->content = View::make('users.login');
		//$this->layout->title = "User Login";
	   } else {
	   	return Redirect::to('users/dashboard');
	   }
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
		 $isremember=(Input::has('remember')) ? true : false;

		 if (Auth::attempt($inputdata,$isremember)) {
			return Redirect::to('users/dashboard')->with('message', 'You are now logged in!');
			                                      //->with('message-type','warning');
	    	} else {

           
			return Redirect::to('users/login')
				->withErrors(array('Your username or password is incorrect'))
				->withInput(Input::except('password'));
		    }
		  } else {
		  	return Redirect::to('users/login')
            ->withInput()
            ->withErrors($validator);
		  	//return Redirect::to('users/login')->with('error')->withInput(Input::except('password'));
		  }
	}

	public function getDashboard() {
	    $this->layout->content = View::make('users.dashboard');
	    $this->layout->title = "User Dashboard";
	}
	
	public function getEditprofile() {
	    $this->layout->content = View::make('users.editprofile');
	    $this->layout->title = "Editprofile";
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('users/login')->with('message', 'You are now logged out!')
		                                  ->with('message-type','warning');
	}

	public function getForgotpassword(){
		$this->layout->content = View::make('users.forgotpassword');
		$this->layout->title = "Forgot your password?";
	}
    
    public function postForgotpassword(){
    	 //set data from input
       $input_user  =  Input::get('username');
       $input_email =  Input::get('email');

       if(!empty($input_user) || !empty($input_email))
       {
         $inputdata= array(
			'username' => $input_user,
			'email' => $input_email
		);
		// Declare the rules for the form validation.
		$rules = array(
			'email'=>'email'
		);

		// Validate the inputs.
		$validator = Validator::make($inputdata, $rules);

		if($validator->passes()) {
          $user_query = Users::where('email','=',$input_email)
                        ->where('username','=',$input_user,'OR');
          if($user_query->count()) {
          	 $user            = $user_query->first();
          	 $user_id         = $user->user_id;
          	 $forgot_pw_token = str_random(60);

          	if(Forgot_pass_token::create([
                                "user_id"     => $user_id,
                                "token"       => $forgot_pw_token,
                                "added_date"  => date("Y-m-d H:i:s",time())
                                ]) ) {

              /* Now, We cannot send email via local host
              Mail::send('emails.auth.reminder',array('token'=>$forgot_pw_token), function($message) use ($user) 
              { 
              	$message->from('admin@iporz.com','Bht');
              	$message->to($user->email,$user->username)->subject('Reset new password!');
              }
                );
              */

              //return Redirect::to('users/login')->with('message', 'Please check your email to reset your account password!');
             
            return View::make('emails.auth.reminder',array('token'=>$forgot_pw_token,'username'=>$user->username));
          	}
          } else { // invalid username or email
            return Redirect::to('users/forgotpassword')
            ->withErrors(array('Invalid username or email'))
            ->withInput();
           }

		} else {
			return Redirect::to('users/forgotpassword')
            ->withErrors($validator)
            ->withInput();
		}

	   }// if have at lest 1 value from username or email field 
	   else {
	   	return Redirect::to('users/forgotpassword')
               ->withErrors(array('Please fill your username or email'))
               ->withInput();
	   }
	}
	public function getResetpassword($token){
		// $forgot_pass_query = Forgot_pass_token::where('token','=',$token)
		                         // ->where('added_date','>','DATE_SUB(NOW(), INTERVAL 1 HOUR)','AND');

		$forgot_pass_query = Forgot_pass_token::whereraw('added_date >= DATE_SUB(NOW(), INTERVAL 2 HOUR) and token=?',array($token));

		 if($forgot_pass_query->count()) {
		 	Session::put('forgot_pass_token', $token);
		 	$this->layout->content = View::make('users.resetpassword');
		 } else {
		 	return Redirect::to('users/login')
            ->withErrors(array('The token is invalid'));
		 }
       

    }

    public function postResetpassword() {
         $token = Session::get('forgot_pass_token');
         if($token) {
         
         $forgot_pass_query = Forgot_pass_token::where('token','=',$token);

         if(!$forgot_pass_query->count()) {
         	return Redirect::to('users/login')
                    ->withErrors(array('The token is invalid'));
         }
         //if token is valid
         $f_pw_id = $forgot_pass_query->first()->f_pw_id;
         $user_id = $forgot_pass_query->first()->user_id;

         $password          = Input::get('password');
         $password_confirm =  Input::get('password-confirm');

         $inputdata= array(
			'password'         => $password,
			'password_confirm' => $password_confirm
		);

         $rules = array(
			'password' =>'Required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/',
            'password_confirm' =>'Required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/|same:password'
		);

        $validator = Validator::make($inputdata, $rules);

        if($validator->passes()) {
        	$user = Users::find($user_id);
            $user->update(array('password'=>Hash::make($password)));

            Forgot_pass_token::find($f_pw_id)->delete();

            return Redirect::to('users/login')
            ->with('message', 'Your password has been changed!');

        } else {
        	return Redirect::to('users/resetpassword/'.$token)
            ->withErrors($validator)
            ->withInput(Input::except('password'));
        }
    }
    //if have token in session 
   else {
     return Redirect::to('users/login')
                    ->withErrors(array('The token is invalid'));
   }
           
  }

  public function getSettings() {

  }

  public function getRegister() {
    $province = Provinces::makeProvinceRegion();

  	$this->layout->content = View::make('users.register',compact('province'));
  	//print_r($province);
  }
  

}
