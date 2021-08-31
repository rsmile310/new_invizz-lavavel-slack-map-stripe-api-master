<!DOCTYPE html>
<html>
<head>
	<title>INVIZZ - Email Verify</title>
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	 <!-- Favicons -->
	 <link href="{{ asset('css/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
</head>
<style type="text/css">
	
	.m-container{
		position: relative;
		margin: 5% 20% 5% 15%;
	}

	.m-body{
		/*position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%, 0%);*/
	    width: 100%;
	    height: 508px;
	    border-radius: 8px;
	    padding: 50px;
	    box-shadow: 0 0 20px -3px rgb(0 0 0 / 29%);
	}
	.btn-resend{
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -10%);
		color: #16755f;
	    padding: 10px;
	    border-radius: 1px;
	    border: 1px solid #35c5a3;
	    background: white;
	    transition: 0.2s;
	    width: 200px;
	}
	.btn-resend:hover{
		cursor: pointer;
		color: #ffffff;
	    border: 1px solid #35c5a3;
	    background: #35c5a3;
	    color: white;
	}
	.btn-resend:active{
		color: white;
    	background: #1a7761;
	}
</style>
<body>
	<div class="m-container">
		<div class="m-body">
			<h1 style="text-align: center;font-family: Quicksand,sans-serif;font-weight: 100;">Thanks for creating an account with INVIZZ!</h1>
			<br>
			<div style="text-align: center;">
				<img src="{{ asset('assets/img/email.png') }}" style="width:230px;">
			</div>

			<div style="text-align: center;margin-top: 10px;color: #a2a2a2;text-align: center;font-family: ui-serif;">You're almost finished</div>
			<div style="margin-top: 70px;color: #a2a2a2;text-align: center;font-family: ui-serif;">
				We’ve sent an account activation email to you at <span style="color:#16755f;">{{ $email }}</span><br>
				Head over to your inbox and click on the "Activate My Account" button to validate your email address.
			</div>
			<hr/>
			<form method="POST" action="{{ route('email.recend') }}">
			@csrf
			<input type="hidden" name="resend_mail" value="{{ $email }}"/>
			<div style="text-align: center;margin-top: 30px;position: relative;">
				<button type="submit" class="btn-resend">Resend Activation E-Mail</button>
			</div>
			</form>
			<div style="text-align: center;margin-top: 75px;color: #a2a2a2;text-align: center;font-family: ui-serif;">I have already clicked the button, take me to my account</div>
		</div>
	</div>
</body>
</html>