<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<title>บ่องตง Bhongtong.com</title>
		{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
	</head>
	<body>
		<h2>Password Reset</h2>
		<div>
         <h3>Hi! {{$username}}</h3>
	    </div>

		<div>
			To reset your password, complete this form by clicking: <a href="{{ URL::to('users/resetpassword', array($token)) }}">this link</a>.
		</div>

		<div>
          <b>This link is valid within 2 hours</b>
	    </div>
	</body>
</html>
