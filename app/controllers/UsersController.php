<?php
use Faker\Factory as Faker;

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
   protected $layout = "layouts.main";

   public $error_messages= array(
    'password.regex' => 'Password ต้องขึ้นต้นด้วย A-Z หรือ a-z หรือ 0-9 และต้องประกอบด้วย A-Z หรือ a-z หรือ 0-9 หรืออักขระพิเศษ !@#$%-_[ ] โดยมีความยาวขั้นต่ำ 6 ตัวอักษร แต่ไม่เกิน 12 ตัวอักษร ',
    'repassword.regex' => 'Password ต้องขึ้นต้นด้วย A-Z หรือ a-z หรือ 0-9 และต้องประกอบด้วย A-Z หรือ a-z หรือ 0-9 หรืออักขระพิเศษ !@#$%-_[ ] โดยมีความยาวขั้นต่ำ 6 ตัวอักษร แต่ไม่เกิน 12 ตัวอักษร '
    );


    public function __construct() {

      Input::merge(array_map('trim', Input::all()));

    	$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getDashboard','getLogout','getEditprofile','postUpdateprofile','getSettings','postSettings')));
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

    //Input::merge(array_map('trim', Input::all()));
		$input = Input::all();

		$rules = array(
			'firstname' => 'required',
			'username' => 'required|regex:/^[A-Za-z][A-Za-z0-9.-_]{3,20}$/|unique:users',
			'email' => 'required|unique:users|email',
			'password' =>'required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%-_[]]{6,12}$/',
      'repassword' =>'required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%-_[]]{6,12}$/|same:password',
      'recaptcha_response_field' => 'required|recaptcha',
      'tel' => 'regex:/^0[0-9]{8,9}$/i'
			);

    

		$v = Validator::make($input, $rules, $this->error_messages);

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
      $user->user_type_id = 1;
			$user->save();

			return Redirect::to('users/login');

		}else{

			return Redirect::to('users/register')->withInput()->withErrors($v);

		}
	}

	public function postUpdateprofile(){
		$input = Input::all();

		$password = $input['password'];

		$rules['firstname'] = 'required';
		$rules['address'] = 'required';
    $rules['province'] ='required';
    $rules['tel'] = 'regex:/^0[0-9]{8,9}$/i';

        
        if($input['email']!=Auth::user()->email) {
        	$rules['email'] = 'unique:users|email';
        }
        
        if($password !="" || !empty($password)) {
         $rules['password'] = 'regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%-_[]]{6,12}$/';
        }
        
       // echo Input::file('image');

        //die();

        $v = Validator::make($input, $rules, $this->error_messages);

		if($v->passes()){
			$user = Users::find(Auth::user()->user_id);

			$user->firstname = $input['firstname'];
			$user->lastname = $input['lastname'];
			$user->email = $input['email'];
			$user->tel = $input['tel'];
			$user->address = $input['address'];
      $user->province_id = $input['province'];
			//$user->profile_image = $input['profile_image'];
			$file_uploaded = Input::file('image');
			if($password !="" || !empty($password)) {
			$password = Hash::make($password);
			$user->password = $password;
		    } 
       /*If have uploaded image */
       if($file_uploaded) {
		    $upload_img = UploadController::upload($file_uploaded,'profile',null,null,'/uploads/profiles/');
		    $upload_img = json_decode($upload_img);

       

		    if($upload_img->filename && !empty($upload_img->filename)) {
		      $user->profile_image = $upload_img->filename;
              
		    } else {
              return Redirect::to('users/editprofile')->withInput()->withErrors($upload_img->status);
		    }
      }   /* End have uploaded image */
   
          /* Update profile */
              $user->update();
              return Redirect::to('users/dashboard');
          /* End update profile */

		}else{

			return Redirect::to('users/editprofile')->withInput()->withErrors($v);

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
      $province = Provinces::makeProvinceRegion();

	    $this->layout->content = View::make('users.editprofile',compact('province'));
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
			'password' =>'Required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%-_[]]{6,12}$/',
            'password_confirm' =>'Required|regex:/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%-_[]]{6,12}$/|same:password'
		);

       Validator::make($input, $rules, $this->error_messages);

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

  public function getRegister() {

    if(!Auth::check()) {
    $province = Provinces::makeProvinceRegion();

  	$this->layout->content = View::make('users.register',compact('province'));
    } else {
     return Redirect::to('users/dashboard');
    }
  }

    public function getSettings() {
   $user_id = Auth::user()->user_id;
   $user =  Users::where('user_id', '=', $user_id);

   if($user->count()) {
   $settings = User_settings::where('user_id','=',$user_id);


   if($settings->count()) {
   $settings = $settings->get(array('users_setting_key','users_setting_value'));
 
   $setting_value = new stdClass();
   foreach($settings as $setting) {
    $k = $setting->users_setting_key;
    $v = $setting->users_setting_value;

    if (is_object(json_decode($v))) 
    { 
      $setting_value->$k = json_decode($v);  
    } else {
      $setting_value->$k = $v;
    }
   // $setting_value->$k = json_decode($v);
      
   }

 //  print_r($setting_value);
  

  $this->layout->content = View::make('users.settings',compact('setting_value'));

       } else {
     $this->layout->content = View::make('users.settings',array('setting_value'=>'empty'));
     }
   
  

  } else {
  	echo "No user";
  } 

   //$this->layout->content = View::make('users.settings');
   //$this->layout->title   = "User Settings";
  }

   public function postSettings() {

  	$inputs = Input::all();
  
    $user_id = Auth::user()->user_id;

  	$user =  Users::where('user_id', '=', $user_id);

    if($user->count()) {
      $is_saved = true;
      foreach($inputs as $key =>$value) {
        if(is_array($inputs[$key])) {
          //print_r($inputs[$key]);
          $sub_a = $inputs[$key];
          
          $added_value = json_encode($sub_a);

          $added_value = str_replace('\"','',$added_value);

        } else {
          $added_value = $value;
        }

        //
         
          if($key!='_token') {

          $q = User_settings::where('users_setting_key','=',$key)
                               ->where('user_id','=',$user_id,'AND');

          if($q->count()) {
            $set_id = $q->first()->users_setting_id;
            $user_settings = User_settings::find($set_id);
            $user_settings->users_setting_value = $added_value;
            
          } //
          else {
            $user_settings = New User_settings();
            $user_settings->users_setting_key = $key;
            $user_settings->users_setting_value = $added_value;
            $user_settings->user_id = $user_id;
          }

          if(!$user_settings->save()) {
            return Redirect::to('users/settings')
            ->withErrors('Error!');

            die();
          } 
        }
       
      }
       return Redirect::to('users/settings')
            ->with('message', 'Your settings have been saved!');
  
   } else {
   	echo "No user";
   }
  }

 public function getSelectshop() {
      $this->layout->content = View::make('users.selectshop');
      $this->layout->title = "Selectshop";
  }

  public function getCreateshop() {
      $this->layout->content = View::make('users.createShop');
      $this->layout->title = "Create Shop";
  }  

  public function getCreateclassified() {
      $this->layout->content = View::make('users.createclassified');
      $this->layout->title = "Create classified Shop";
  }  

  public function postPaymentcreateshop() {
      $this->layout->content = View::make('users.paymentcreateshop');
      $this->layout->title = "Payment Create Shop";
  } 

  public function getShoptype() {
      $this->layout->content = View::make('users.shoptype');
      $this->layout->title = "Shoptype";
  }  

  public function getShop() {
      $this->layout->content = View::make('users.shop');
      $this->layout->title = "Shop Name";
  }

  public function getClassified() {
      $this->layout->content = View::make('users.classified');
      $this->layout->title = "Classified Name";
  } 

  public function getProducts() {
      $this->layout->content = View::make('users.products');
      $this->layout->title = "products Name";
  } 

  public function getServices() {
      $this->layout->content = View::make('users.services');
      $this->layout->title = "services Name";
  }
  

}
