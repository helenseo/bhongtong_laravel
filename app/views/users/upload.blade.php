<form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ url('users/upload') }}" autocomplete="off">
					<input type="hidden" name="_token" value="{{ csrf_token() }}" />
					<input type="file" name="image" id="image" /> 

					<input type="submit" />
				</form>