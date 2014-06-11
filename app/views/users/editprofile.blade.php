 <!-- For Image uploading -->
      {{ HTML::script('packages/bootstrap/js/upload.js') }}
     
<!-- End Image uploading -->

<!-- Start Date Picker -->

      <script type="text/javascript" src="js/google-code-prettify/prettify.js"></script>
      <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

 <script type="text/javascript">
  
    $(function(){

      $('#dpd1').datepicker({
        format: 'yyyy-mm-dd'
      });

      if($('#enterprise_register').is(':checked')) {
         $('#company_name_wrap').show();
        } else {
        $('#company_name_wrap').hide();
        }

      $('#enterprise_register').click(function() {
        if($('#enterprise_register').is(':checked')) {
         $('#company_name_wrap').show();
        } else {
        $('#company_name_wrap').hide();
        }
        
      });
      
    });

    
</script>

      <!-- End Date Picker -->
  
<h1>Editprofile</h1>

<p><b>This is for edit your profile</b></p>
<div class="row">
  {{ Form::open(array('url'=>'users/updateprofile', 'class'=>'form-updateprofile','enctype'=>'multipart/form-data')) }}
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
                
                <div class="col-sm-6 col-md-6">
                                      
                        <p><b><i class="glyphicon glyphicon-user"></i> Username:</b> {{Auth::user()->username}}</p>
                        
                        
                         <div class="input-group">
                          <p><b><i class="glyphicon glyphicon-lock"></i> New Password:</b></p>
                          {{ Form::password('password',  array('id'=>'password', 'class'=>'form-control', 'placeholder'=>'กรอกรหัสผ่านใหม่ที่ต้องการเปลี่ยน / New Password')) }}
                         </div>
                        
                         <div class="input-group">
                          <p><b><i class="glyphicon glyphicon-lock"></i> Current Password:</b></p>
                          {{ Form::password('current-password',  array('id'=>'current-password', 'class'=>'form-control', 'placeholder'=>'กรอกรหัสผ่านปัจจุบัน/ Current Password')) }}
                         </div>
                        <div class="input-group">
                          <p><b> Firstname:</b></p>
                            {{ Form::text('firstname', $value = Auth::user()->firstname, array('id'=>'firstname','class'=>'form-control')) }}
                        </div>
                        <div class="input-group">
                             <p><b> Lastname:</b></p>
                            {{ Form::text('lastname', $value = Auth::user()->lastname, array('id'=>'lastname','class'=>'form-control')) }}
                        </div>
                        <div class="input-group">                         
                           <p><b><i class="glyphicon glyphicon-envelope"></i> Email:</b></p>
                            {{ Form::text('email', $value = Auth::user()->email, array('id'=>'email','class'=>'form-control')) }}
                        </div>
                        <div class="input-group">
                          <p><b><i class="glyphicon glyphicon-calendar"></i> วันเกิด / Birthday:</b></p>
                           {{ Form::text('birthday', Auth::user()->birthdate =='0000-00-00' ? null : Auth::user()->birthdate ,  array('id'=>'dpd1', 'class'=>'datepicker form-control')) }}
                         </div>
                        <div class="input-group">
                           <p><b><i class="glyphicon glyphicon-earphone"></i> Tel:</b></p>
                            {{ Form::text('tel', $value = Auth::user()->tel, array('id'=>'tel','class'=>'form-control')) }}
                        </div>
                        <div class="input-group">
                          <p><b><i class="glyphicon glyphicon-map-marker"></i> Address:</b></p>
                            {{ Form::textarea('address',$value = Auth::user()->address,array(
                            'id'      => 'address'
                            ,'rows'    => 3
                            ,'class'=>'form-control'
                        ))}}
                        </div>
                        <div class="input-group">
                          <p><b><i class="glyphicon glyphicon-map-marker"></i> รหัสไปรษณีย์ / zipcode:</b></p>
                            {{ Form::text('zipcode', $value = Auth::user()->zipcode,  array('id'=>'zipcode', 'class'=>'form-control', 'placeholder'=>'รหัสไปรษณีย์ / zipcode')) }}
                        </div>
                         <div class="input-group">
                          <p><b><i class="glyphicon glyphicon-map-marker"></i> จังหวัด:</b></p>
                            {{ Form::select('province', $province, Auth::user()->province_id ? Auth::user()->province_id: 'เลือกจังหวัด / select province',array('class'=>'form-control')) }}
                         </div>
                         @if(!Auth::user()->is_enterprise) 
                         <div class="input-group">
                          {{ Form::checkbox('enterprise_register', 1 ,null,array('id'=>'enterprise_register'))}}
                          สมัคร Enterprise ?
                         </div>
                         <div id="company_name_wrap" class="input-group">
                         @else
                         <div class="input-group">
                         @endif
                          <p><b> Company name:</b></p>
                            {{ Form::text('company_name', Auth::user()->company_name, array('id'=>'company_name','class'=>'form-control')) }}
                        </div>
                       <!-- Start Profile Pic -->    
                </div>
                <div class="col-sm-6 col-md-6">
                    <img src="{{{ !empty(Auth::user()->profile_image) ? Auth::user()->profile_image : 'http://placehold.it/380x500'}}}" id="uploadimg" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                
                        <div class="span3">
                            <div id="validation-errors"></div>
                             {{Form::file('image')}}
                       </div>
                    
                </div>
            </div>
           <div class="input-group">{{ Form::submit('Edit your profile', array('class'=>'btn btn-primary btn-lg'))}}
           </div>

    </div>

</div>
  
{{ Form::close() }}
</div>



