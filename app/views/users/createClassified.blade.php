<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title"><B>สร้างร้านค้าประเภทไม่มีสินค้า / Create Classified</B></div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/paymentcreateshop', 'class'=>'form-register')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ประเภทร้านค้า / shop type:</span>
           {{ Form::text('firstname', null, array('id'=>'Fname','class'=>'form-control', 'placeholder'=>'ประเภทร้านค้า / shop type')) }}
           </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อร้านค้า / shop name:</span>
          {{ Form::text('lastname', null,  array('id'=>'Lname', 'class'=>'form-control', 'placeholder'=>'ชื่อร้านค้า / shop name')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> รายระเอียด / detail:</span>
          {{ Form::text('email', null,  array('id'=>'email', 'class'=>'form-control', 'placeholder'=>'รายระเอียด / detail')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ที่อยู่ / address:</span>
          {{ Form::text('username', null,  array('id'=>'username', 'class'=>'form-control', 'placeholder'=>'ที่อยู่ / address')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> จังหวัด / province:</span>
          {{ Form::password('password',  array('id'=>'password', 'class'=>'form-control', 'placeholder'=>'จังหวัด / province')) }}
          </div>
                    
          <div class="input-group">
           {{Form::captcha()}}
          </div>
        {{ Form::submit('Create Classified Shop', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>



  