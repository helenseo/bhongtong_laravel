{{--*/ 

 $province_name = Provinces::provinceName(Auth::user()->province_id);
 $user_type_name = User_types::userTypeName(Auth::user()->user_type_id);
  
 /*--}}
<h1>Dashboard</h1>

<p><b>This is your dashboard</b></p>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="well well-sm">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <img src="{{{ !empty(Auth::user()->profile_image) ? Auth::user()->profile_image : 'http://placehold.it/380x500'}}}" alt="" class="profile-pic img-rounded img-responsive">
                </div>
                <div class="col-sm-6 col-md-8">
                    <h4>
                        {{Auth::user()->firstname}}</h4>
                    
                        <p><b><i class="glyphicon glyphicon-user"></i></i> Username:</b> {{@Auth::user()->username}}</p>
						<p><b><i class="glyphicon glyphicon-bookmark"></i> User Type:</b> {{@$user_type_name ? $user_type_name : 'Member'}}</p>
						<p><b>Firstname:</b> {{Auth::user()->firstname}}</p>
						<p><b>Lastname:</b> {{Auth::user()->lastname}}</p>
						<p><b><i class="glyphicon glyphicon-envelope"></i> Email:</b> {{@Auth::user()->email}}</p>
						<p><b><i class="glyphicon glyphicon-earphone"></i> Tel:</b> {{@Auth::user()->tel}}</p>
						<p><b><cite title="{{Auth::user()->address}}"><i class="glyphicon glyphicon-map-marker"></i>Address:</b> {{Auth::user()->address}}</p>
                        <p><b><i class="glyphicon glyphicon-map-marker"></i>Zipcode:</b> {{@Auth::user()->zipcode ? Auth::user()->zipcode : '-'  }}</p>
						<p><b><i class="glyphicon glyphicon-home"></i> Province:</b> {{@$province_name ? $province_name : '-'}}</p>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<p><b></b><a href="{{URL::to('users/editprofile')}}" class="btn btn-primary btn-lg" role="button">Edit your profile</a></p><br/>


<!-- Update profile pic
 {{ Form::open(array('url'=>'users/updateprofile', 'class'=>'form-register')) }}
<div>
     <label>Image</label>
     <div>
         {{ Form::file('image') }}
     </div><br/>
</div>
 {{ Form::submit('Update', array('class'=>'btn btn-large btn-primary btn-block'))}}
 {{ Form::close() }}
 -->
