 <!-- For Image uploading -->
      {{ HTML::script('packages/bootstrap/js/upload.js') }}
     
<!-- End Image uploading -->

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
  
<h1>Editprofile</h1>

<p><b>This is for edit your profile</b></p>
{{ Form::open(array('url'=>'users/updateprofile', 'class'=>'form-updateprofile','ng-controller'=>'FileUploadCtrl','enctype'=>'multipart/form-data')) }}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="well well-sm">
            <div class="row">
                
                <div class="col-sm-6 col-md-6">
                                      
                        <p><b><i class="glyphicon glyphicon-user"></i></i> Username:</b> {{Auth::user()->username}}</p>
                        <p><b><i class="glyphicon glyphicon-lock"></i></i> Password:</b>
                         <div class="input-group">
                          {{ Form::password('password',  array('id'=>'password', 'class'=>'form-control', 'placeholder'=>'รหัสผ่าน / Password')) }}
                         </div>
                        </p>
                        <p><b> Firstname:</b>
                            <div class="input-group">
                            {{ Form::text('firstname', $value = Auth::user()->firstname, array('id'=>'firstname','class'=>'form-control')) }}
                            </div>
                        </p>
                        <p><b> Lastname:</b>
                            <div class="input-group">
                            {{ Form::text('lastname', $value = Auth::user()->lastname, array('id'=>'lastname','class'=>'form-control')) }}
                            </div>
                        </p>
                        <p><b><i class="glyphicon glyphicon-envelope"></i></i> Email:</b>
                            <div class="input-group">
                            {{ Form::text('email', $value = Auth::user()->email, array('id'=>'email','class'=>'form-control')) }}
                            </div>
                        </p>
                        <p><b><i class="glyphicon glyphicon-calendar"></i></i> วันเกิด / Birthday:</b>
                          <div class="input-group">
                           {{ Form::text('birthday', Auth::user()->birthdate =='0000-00-00' ? null : Auth::user()->birthdate ,  array('id'=>'dpd1', 'class'=>'datepicker form-control')) }}
                         </div>
                        </p>
                        <p><b><i class="glyphicon glyphicon-earphone"></i></i> Tel:</b>
                            <div class="input-group">
                            {{ Form::text('tel', $value = Auth::user()->tel, array('id'=>'tel','class'=>'form-control')) }}
                            </div>
                        </p>
                        <p><b><i class="glyphicon glyphicon-map-marker"></i></i> Address:</b>
                            <div class="input-group">
                            {{ Form::textarea('address',$value = Auth::user()->address,array(
                            'id'      => 'address'
                            ,'rows'    => 3
                            ,'class'=>'form-control'
                        ))}}
                            </div>
                        </p>
                        <p><b><i class="glyphicon glyphicon-map-marker"></i></i> รหัสไปรษณีย์ / zipcode:</b>
                        <div class="inpu t-group">
                            {{ Form::text('zipcode', $value = Auth::user()->zipcode,  array('id'=>'zipcode', 'class'=>'form-control', 'placeholder'=>'รหัสไปรษณีย์ / zipcode')) }}
                        </div>
                        </p>

                        <p><b><i class="glyphicon glyphicon-map-marker"></i></i> จังหวัด:</b>
                            <div class="input-group">
                            {{ Form::select('province', $province, Auth::user()->province_id ? Auth::user()->province_id: 'เลือกจังหวัด / select province',array('class'=>'form-control')) }}
                            </div>
                        </p>
                <!-- Start Profile Pic -->    
                </div>
                <div class="col-sm-6 col-md-6">
                    <img src="{{{ !empty(Auth::user()->profile_image) ? Auth::user()->profile_image : 'http://placehold.it/380x500'}}}" id="uploadimg" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                    <div class="row">
                        <div class="span3">
                            <div id="validation-errors"></div>
                             {{Form::file('image')}}
                       </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<p>{{ Form::submit('Edit your profile', array('class'=>'btn btn-primary btn-lg'))}}</p><br/>
{{ Form::close() }}



