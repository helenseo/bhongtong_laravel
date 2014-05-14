<!DOCTYPE html>
<html ng-app="app" lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>{{{@($title) ? $title : "บ่องตง Bhongtong.com"}}}</title>

    	{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
      {{ HTML::style('packages/bootstrap/css/styles.css') }}
      {{ HTML::script('//code.jquery.com/jquery-1.10.2.min.js') }}
    	{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}

      
  	</head>

  	<body>

	  	<div class="navbar navbar-inverse">
		  	<div class="navbar-inner">
		    	<div class="container">
		    		<div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                       <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                      </button>
                   </div>
                   <div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">  
						 <li><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
						@if(!Auth::check())
						 <li><a href="{{URL::to('users/login')}}"><i class="glyphicon glyphicon-lock"></i> Login</a></li>
             <li><a href="{{URL::to('users/register')}}"><i class="glyphicon glyphicon-pencil"></i> Register</a></li>
					    @endif 
					</ul>  
					<!--

				    -->
                    @if(Auth::check())
				     <div class="pull-right">
                       <ul class="nav navbar-nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{Auth::user()->username}} <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                            <li><a href="settings"><i class="icon-envelope"></i> User Settings</a></li>
                            <li><a href="#"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="#"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="{{URL::to('users/logout')}}"><i class="icon-off"></i> Logout</a></li>
                           </ul>
                        </li>
                       </ul>
                     </div>
                    @endif
                   </div>

                <!--
                 -->
		    	</div>
		  	</div>
		</div> 	            
       <div class="wrapper">
	    <div class="container">
	    	@if(Session::has('message'))
	    	    <div class="alert alert-{{Session::has('message-type') ? Session::get('message-type') : 'success' }} col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{ Session::get('message') }}</p>
            </div>
			@endif

       @if($errors->has())
            <div class="alert alert-danger col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
            </div>
         @endif
	    </div>
	    <div class="container">
            {{ @$content }}
	    </div>
	  </div>

  	</body>

</html>
