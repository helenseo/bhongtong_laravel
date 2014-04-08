<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title"><B>สมัครสมาชิก / Register</B></div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/register', 'class'=>'form-register')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อ / First Name:</span>
           {{ Form::text('Fname', null, array('id'=>'Fname','class'=>'form-control', 'placeholder'=>'ชื่อ / First Name')) }}
           </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> นามสกุล / Last Name:</span>
          {{ Form::text('Lname', null,  array('id'=>'Lname', 'class'=>'form-control', 'placeholder'=>'นามสกุล / Last Name')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i> อีเมล / Email:</span>
          {{ Form::text('email', null,  array('id'=>'email', 'class'=>'form-control', 'placeholder'=>'อีเมล / Email')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อผู้ใช้ / User Name:</span>
          {{ Form::text('username', null,  array('id'=>'username', 'class'=>'form-control', 'placeholder'=>'ชื่อผู้ใช้ / User Name')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> รหัสผ่าน / Password:</span>
          {{ Form::password('password',  array('id'=>'password', 'class'=>'form-control', 'placeholder'=>'รหัสผ่าน / Password')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i> ยืนยันรหัส / Re-Pass:</span>
          {{ Form::password('repassword',  array('id'=>'repassword', 'class'=>'form-control', 'placeholder'=>'ยืนยันรหัสผ่าน / Confirm Password')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i> ที่อยู่ / Address:</span>
          {{ Form::text('address', null,  array('id'=>'address', 'class'=>'form-control', 'placeholder'=>'ที่อยู่ / Address')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i> เบอร์ติดต่อ / Tel:</span>
          {{ Form::text('tel', null,  array('id'=>'tel', 'class'=>'form-control', 'placeholder'=>'เบอร์ติดต่อ / Tel')) }}
          </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i> จังหวัด / Province:</span>
          {{ Form::select('province', 
            array('0' => 'เลือกจังหวัด / select province',
              'ภาคเหนือ' => array('เชียงราย' => 'เชียงราย','เชียงใหม่' => 'เชียงใหม่','น่าน' => 'น่าน','พะเยา' => 'พะเยา','แพร่' => 'แพร่','แม่ฮ่องสอน' => 'แม่ฮ่องสอน','ลำปาง' => 'ลำปาง','ลำพูน' => 'ลำพูน','อุตรดิตถ์' => 'อุตรดิตถ์'),
              'ภาคตะวันออกเฉียงเหนือ' => array('spaniel' => 'Spaniel'),
              'ภาคกลาง' => array('leopard' => 'Leopard1','Leopard2','Leopard3'),
              'ภาคตะวันออก' => array('spaniel' => 'Spaniel'),
              'ภาคตะวันตก' => array('leopard' => 'Leopard1','Leopard2','Leopard3'),
              'ภาคใต้' => array('spaniel' => 'Spaniel')),
            'เลือกจังหวัด / select province',
            array('class'=>'form-control'))}}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i> ข้อตกลงในการให้บริการ</span>
          {{ Form::textarea('detail',null,array(
              'id'      => 'description'
              ,'rows'    => 10
              ,'class'=>'form-control'
          ))}}
          </div>
        {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>



  