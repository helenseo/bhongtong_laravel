
<div id="resetpw" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title">Set the new password</div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/resetpassword', 'class'=>'form-resetpw')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	         {{ Form::password('password',array('id'=>'reset-password','class'=>'form-control', 'placeholder'=>'Password')) }}
           </div>
           <div class="input-group">
  	         <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	        {{ Form::password('password-confirm',array( 'id'=>'reset-password-confirm', 'class'=>'form-control', 'placeholder'=>'Confirm password')) }}
          </div>
          <div>
          <p class="alert alert-success"><b>Note:</b> รูปแบบของ Password ประกอบด้วย ตัวเลข (0-9) และ ตัวอักษร (a-z A-Z) อย่างน้อย 1ตัว สามารถใช้อักขระพิเศษ (!@#$%) ได้</p>
          </div>
          
	      {{ Form::submit('Submit', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>


  
