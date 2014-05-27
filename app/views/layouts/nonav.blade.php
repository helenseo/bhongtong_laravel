<!DOCTYPE html>
<html data-ng-app="app" lang="en">
 	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    	<title>{{{@($title) ? $title : "บ่องตง Bhongtong.com"}}}</title>

    	
      {{ HTML::style('assets/stylesheets/frontend.css') }}
      {{ HTML::script('//code.jquery.com/jquery-1.10.2.min.js') }}
    	{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}

      {{ HTML::style('users/css/datepicker.css') }}

      <!-- Lightbox -->
      {{ HTML::script('packages/lightbox/lib/jquery.mousewheel-3.0.6.pack.js')}}
      {{ HTML::script('packages/lightbox/source/jquery.fancybox.js?v=2.1.5')}}
      {{ HTML::style('packages/lightbox/source/jquery.fancybox.css?v=2.1.5') }}
      {{ HTML::script('packages/lightbox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5')}}
      {{ HTML::style('packages/lightbox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5') }}
      {{ HTML::script('packages/lightbox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7')}}
      {{ HTML::style('packages/lightbox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7') }}
      {{ HTML::script('packages/lightbox/source/helpers/jquery.fancybox-media.js?v=1.0.6')}}
       <!-- Lightbox -->

<script>
  $(document).ready(function() {
  $(".iframe-popup").fancybox({
    maxWidth  : 800,
    maxHeight : 600,
    fitToView : false,
    width   : '70%',
    height    : '70%',
    autoSize  : false,
    closeClick  : false,
    openEffect  : 'none',
    closeEffect : 'none'
  });
});

 </script>
  	</head>

  	<body>
     
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
