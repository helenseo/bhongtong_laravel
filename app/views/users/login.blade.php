
<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Log In</div>
           <div class="forgot-password-div"><a href="{{URL::to('users/forgotpassword')}}">Forgot password?</a></div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	         {{ Form::text('username', null, array('id'=>'login-username','class'=>'form-control', 'placeholder'=>'Username')) }}
           </div>
           <div class="input-group">
  	         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	        {{ Form::password('password', array( 'id'=>'login-password', 'class'=>'form-control', 'placeholder'=>'Password')) }}
          </div>
          <div class="input-group">
            <div class="checkbox">
                <label>
                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                </label>
            </div>
         </div>
	      {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>


  