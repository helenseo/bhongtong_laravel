
<div id="forgotpw" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Forgot your password?</div>
        </div>     

        <div style="padding-top:30px" class="panel-body" >
           <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
           {{ Form::open(array('url'=>'users/forgotpassword', 'class'=>'form-forgotpw')) }}
             <div style="margin-bottom: 25px" class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	         {{ Form::text('username', Input::old('username'), array('id'=>'forgot-username','class'=>'form-control', 'placeholder'=>'Username')) }}
           </div>
            <div class="separator">
             —OR—
           </div>
           <div style="margin-top:25px;margin-bottom: 25px" class="input-group">
  	         <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	        {{ Form::text('email', Input::old('email'),array( 'id'=>'forgot-email', 'class'=>'form-control', 'placeholder'=>'Email address')) }}
          </div>
          
	      {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>


  