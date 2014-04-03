<!DOCTYPE html>
<html lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>{{@$title}}</title>

    	{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    	  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
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
						 <li><a href="login"><i class="glyphicon glyphicon-lock"></i> Login</a></li>
					    @endif 
					</ul>  
					<!--

				    -->
                    @if(Auth::check())
				     <div class="pull-right">
                       <ul class="nav navbar-nav pull-right">
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, {{Auth::user()->username}} <b class="caret"></b></a>
                           <ul class="dropdown-menu">
                            <li><a href="#"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="#"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="logout"><i class="icon-off"></i> Logout</a></li>
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
	    	    <div class="alert alert-danger col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <p>{{ Session::get('message') }}</p>
                    @if($errors->has())
                    @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                    @endforeach
                    @endif
                </div>
			@endif
	    </div>
	    <div class="container">
            {{ @$content }}
	    </div>
	  </div>

  	</body>

</html>