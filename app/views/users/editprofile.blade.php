 <!-- For Image uploading -->
      {{ HTML::style('packages/jupload/css/uploadfile.css') }}
      {{ HTML::script('packages/jupload/js/jquery.uploadfile.js') }}
      <script type="text/javascript">
       $().ready(function()
       {
         $("#profile_image_upload").uploadFile({
         url:"{{ URL::to('upload', array('profile')) }}",
         allowedTypes:"png,gif,jpg,jpeg",
         fileName:"uploaded_img",
         multiple:false,
         maxfilesize: 204800,
         showprogress:false,
         showStatusAfterSuccess:false,
         onSuccess:function(files,data,xhr)
         {
          data= $.parseJSON(data); // yse parseJSON here
          if(data.error){
          alert(data.error);
          } else {
         //there is no error
         fileName = data['fileName'];
         $('#profile_image').val(fileName);
         $("#uploadimg").attr('src',fileName);
           }
        }
       });
      });
    </script>
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
                             <div id="profile_image_upload">Upload</div>
                             <input type="hidden" name="profile_image" id="profile_image"/>
                            <!--
                            <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ url('upload/image') }}" autocomplete="off">
                               
                           <input name="image" type="file"  />

                           <input class="btn btn-primary btn-sm" role="button" id="upload" type="button" value="Update Profile Picture" /> 
                           <!--\
                            </form>
                           -->
                            <br/>
                    

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



