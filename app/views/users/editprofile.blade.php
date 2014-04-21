 <!-- For Image uploading -->
      {{ HTML::script('packages/bootstrap/js/upload.js') }}
     
<!-- End Image uploading -->
  
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
                        
                <!-- Start Profile Pic -->    
                </div>
                <div class="col-sm-6 col-md-6">
                    <img src="{{{ !empty(Auth::user()->profile_image) ? Auth::user()->profile_image : 'http://placehold.it/380x500'}}}" id="uploadimg" alt="" class="profile-pic img-rounded img-responsive" ><br/>
                    <!-- Post Footer -->
                    <div class="row">
                        <div class="span3">
                            <div id="validation-errors"></div>
                             <input name="image" type="file"  />
                </div>
                <div class="row">
                <div class="span8">
                    
                     
                        </div>
                        <div class="span5">
                            <div id="output" style="display:none">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

<p>{{ Form::submit('Edit your profile', array('class'=>'btn btn-primary btn-lg'))}}</p><br/>
{{ Form::close() }}



