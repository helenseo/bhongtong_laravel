
<div id="resetpw" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Set the new password</div>
        </div>     

        <div style="padding-top:30px" class="panel-body" >
           <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
           {{ Form::open(array('url'=>'users/resetpassword', 'class'=>'form-resetpw')) }}
             <div style="margin-bottom: 25px" class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	         {{ Form::password('password',array('id'=>'reset-password','class'=>'form-control', 'placeholder'=>'Password')) }}
           </div>
           <div style="margin-bottom: 25px" class="input-group">
  	         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	        {{ Form::password('password-confirm',array( 'id'=>'reset-password-confirm', 'class'=>'form-control', 'placeholder'=>'Confirm password')) }}
          </div>
          
	      {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>


  