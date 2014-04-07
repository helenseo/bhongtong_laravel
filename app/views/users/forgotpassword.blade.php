
<div id="forgotpw" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Forgot your password?</div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/forgotpassword', 'class'=>'form-forgotpw')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	         {{ Form::text('username', Input::old('username'), array('id'=>'forgot-username','class'=>'form-control', 'placeholder'=>'Username')) }}
           </div>
            <div class="separator input-group">
             —OR—
           </div>
           <div class="input-group">
  	         <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
	        {{ Form::text('email', Input::old('email'),array( 'id'=>'forgot-email', 'class'=>'form-control', 'placeholder'=>'Email address')) }}
          </div>
          
	      {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>


  