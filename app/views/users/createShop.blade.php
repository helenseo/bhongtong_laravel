<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title"><B>สร้างร้านค้า / Create Shop</B></div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/paymentcreateshop', 'class'=>'form-register')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ประเภทร้านค้า / shop type:</span>
          {{ Form::select('shop_type_id', $shop_type_id, 'เลือกประเภทร้านค้า',array('class'=>'form-control')) }}
           </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อร้านค้า / shop name:</span>
          {{ Form::text('shop_name', null,  array('id'=>'Lname', 'class'=>'form-control', 'placeholder'=>'ชื่อร้านค้า / shop name')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> รายละเอียด / detail:</span>
          {{ Form::textarea('shop_detail', null,  array('id'=>'email', 'class'=>'form-control', 'placeholder'=>'รายละเอียด / detail')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ที่อยู่ / address:</span>
          {{ Form::textarea('shop_address', null,  array('id'=>'username', 'class'=>'form-control', 'placeholder'=>'ที่อยู่ / address')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> จังหวัด / province:</span>
               {{ Form::select('province', $province, 'เลือกจังหวัด / select province',array('class'=>'form-control')) }}
          </div>
                    
          <div class="input-group">
           {{Form::captcha()}}
          </div>
         {{ Form::submit('Create Shop', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>



  