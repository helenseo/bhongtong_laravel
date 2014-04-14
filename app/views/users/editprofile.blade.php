<h1>Editprofile</h1>

<p><b>This is for edit your profile</b></p>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="well well-sm">
            <div class="row">
                
                <div class="col-sm-6 col-md-8">
                                      
                        <p><b><i class="glyphicon glyphicon-user"></i></i> Username:</b> {{Auth::user()->username}}</p>
						<p><b> Firstname:</b>
                        	<div class="input-group">
                        	{{ Form::text('firstname', $value = Auth::user()->firstname, array('id'=>'firstname','class'=>'form-control')) }}
           					</div>
            			</p>
            			<p><b> Firstname:</b>
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
                <div class="col-sm-6 col-md-4">
                    <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive"><br/>
                    <!-- Post Footer -->
			        <div class="row">
			            <div class="span3">
			                <div id="validation-errors"></div>
			                <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ url('upload/image') }}" autocomplete="off">
			                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
			                    <input type="file" name="image" id="image" /> 
			                </form><br/>
					 
                    <p><b></b><a class="btn btn-primary btn-sm" role="button">Update Profile Picture</a></p><br/>

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

<p><b></b><a class="btn btn-primary btn-lg" role="button">Edit your profile</a></p><br/>

