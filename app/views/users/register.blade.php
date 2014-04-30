<!-- Start Disable Submit -->
<script type="text/javascript">
    $(function() {

       document.getElementById('register-button').disabled = true;
       document.getElementById('agree').checked = false;


    });

    function isAgree(a){
        if(a.checked==true){
          document.getElementById('register-button').disabled = false;
          }else{
          document.getElementById('register-button').disabled = true;  
            }
   }
</script>
<!-- End Disable Submit -->
<!-- Start Date Picker -->
<link href="css/datepicker.css" rel="stylesheet">

      <script type="text/javascript" src="js/google-code-prettify/prettify.js"></script>
      <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

 <script type="text/javascript">
 
    $(function(){
     
      $('#dpd1').datepicker({
        format: 'yyyy-mm-dd'
      });
     
    });
</script>

  
      <!-- End Date Picker -->

<div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
           <div class="panel-title"><B>สมัครสมาชิก / Register</B></div>
        </div>     

        <div class="wrapper-form panel-body" >
           {{ Form::open(array('url'=>'users/register', 'class'=>'form-register', 'name'=>'register', 'id'=>'register')) }}
             <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> ชื่อ / First Name:</span>
           {{ Form::text('firstname', null, array('id'=>'Fname','class'=>'form-control', 'placeholder'=>'ชื่อ / First Name')) }}
           </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i> นามสกุล / Last Name:</span>
          {{ Form::text('lastname', null,  array('id'=>'Lname', 'class'=>'form-control', 'placeholder'=>'นามสกุล / Last Name')) }}
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
             <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> วันเกิด / Birthday:</span>
          {{ Form::text('birthday', null,  array('id'=>'dpd1', 'class'=>'form-control')) }}
          </div>

          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i> ที่อยู่ / Address:</span>
          {{ Form::text('address', null,  array('id'=>'address', 'class'=>'form-control', 'placeholder'=>'ที่อยู่ / Address')) }}
          </div>

          <div class="input-group">
             <span class="input-group-addon"> รหัสไปรษณีย์ / zipcode:</span>
          {{ Form::text('zipcode', null,  array('id'=>'zipcode', 'class'=>'form-control', 'placeholder'=>'รหัสไปรษณีย์ / zipcode')) }}
          </div>

          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i> เบอร์ติดต่อ / Tel:</span>
          {{ Form::text('tel', null,  array('id'=>'tel', 'class'=>'form-control', 'placeholder'=>'เบอร์ติดต่อ / Tel')) }}
          </div>
           <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i> จังหวัด / Province:</span>
          

            {{ Form::select('province', $province, 'เลือกจังหวัด / select province',array('class'=>'form-control')) }}
          </div>
          <div class="input-group">
             <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i> ข้อตกลงในการให้บริการ</span>
          {{ Form::textarea('detail', '
          1. Test Detail
          2. Test Detail
          3. Test Detail
          4. Test Detail
          5. Test Detail
          6. Test Detail
          7. Test Detail
          8. Test Detail
          9. Test Detail
          10. Test Detail
          11. Test Detail
          12. Test Detail
          13. Test Detail
          14. Test Detail
          15. Test Detail
          ',array(
              'id'      => 'description'
              ,'rows'    => 10
              ,'class'=>'form-control'
              ,'disabled'=>'disabled'
          ))}}
          </div>
          <div class="input-group">
            <!--<input type="checkbox" onclick="agree(this)" />-->   
            {{ Form::checkbox('agree', 'value',null,array('onClick'=>'isAgree(this)','id'=>'agree'))}}
            ยอมรับข้อตกลง / I agree
          </div>
          <div class="input-group">
           {{Form::captcha()}}
          </div>
            <!--<input type="submit" id="register" class="btn btn-large btn-primary btn-block" name="register" value="Register" disabled="disabled" />-->
            {{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block','id'=>'register-button'))}}
          {{ Form::close() }}
    </div>
   </div>
 </div>



  