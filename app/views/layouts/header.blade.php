
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