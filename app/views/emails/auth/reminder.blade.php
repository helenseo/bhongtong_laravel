<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
	</head>
	<body>
		<h2>Password Reset</h2>

		<div>
			To reset your password, complete this form by clicking: <a href="{{ URL::to('users/resetpassword', array($token)) }}">this link</a>.
		</div>

		<div>
          <b>This link is valid within 2 hours</b>
	    </div>
	</body>
</html>