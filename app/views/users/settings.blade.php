<?php 

$s=json_decode($setting_value);

echo $s->msg_opt;
?>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">General</a></li>
      <li><a href="#profile" data-toggle="tab">Payments</a></li>
      <li><a href="#profile" data-toggle="tab">Social networks</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
         <div class="wrapper-form panel-body" >
       {{ Form::open(array('url'=>'users/settings', 'class'=>'form-user-settings','id'=>'tab1')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i> Newsletter</span>
              <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary">
                   <input type="radio" name="newsletter-opt" id="option1" value="1"> On
                  </label>
                  <label class="btn btn-primary active">
                    <input type="radio" name="newsletter-opt" id="option2" value="0" checked> Off
                  </label>
  
              </div>
           </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> Message</span>
              <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary">
                   <input type="radio" name="msg-opt" id="option1" value="1"> On
                  </label>
                  <label class="btn btn-primary active">
                    <input type="radio" name="msg-opt" id="option2" value="0" checked> Off
                  </label>
  
              </div>
          </div>
       
        {{ Form::submit('Submit', array('class'=>'btn btn-primary'))}}
          {{ Form::close() }}
        </div>
      </div>
      <div class="tab-pane fade" id="profile">
    	<form id="tab2">
        	
    	</form>
      </div>
  </div>