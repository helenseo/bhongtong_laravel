{{ Form::open(array('action'=>'IndexController@index')) }}

<p>Register Form</p>

<ul>
	<li>
	{{ Form::label('firstname','Firstname : ') }}
	{{ Form::text('firstname') }}
	</li>
	<li>
	{{ Form::label('lastname','Lastname : ') }}
	{{ Form::text('lastname') }}
	</li>
	<li>
	{{ Form::label('username','Username : ') }}
	{{ Form::text('username') }}
	</li>
	<li>
	{{ Form::label('password','password : ') }}
	{{ Form::text('password') }}
	</li>
	<li>
	{{ Form::label('confirm','Confirm Password : ') }}
	{{ Form::text('confirm') }}
	</li>
	<li>
	{{ Form::label('email','E-mail : ') }}
	{{ Form::text('email') }}
	</li>
	<li>
	{{ Form::submit('Submit',array('class' => 'btn')) }}	
	</li>

{{ Form::close() }}