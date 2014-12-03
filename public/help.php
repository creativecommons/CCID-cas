<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
  <link href="https://creativecommons.org/wp-content/themes/creativecommons.org/favicon.ico" title="Icon" type="image/x-icon" rel="icon" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://creativecommons.org/wp-content/themes/creativecommons.org/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://creativecommons.org/wp-content/themes/creativecommons.org/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="https://creativecommons.org/wp-content/themes/creativecommons.org/apple-touch-icon-precomposed.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link rel="icon" type="image/png" href="/themes/ccid/favicon.png" />

  <style type="text/css">

    body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #eee;
    }

    .form-signin {
	max-width: 330px;
	padding: 15px;
	margin: 0 auto;
    }

    .form-signin .form-signin-heading,
    .form-signin .checkbox {
	margin-bottom: 10px;
    }

    .form-signin .checkbox {
	font-weight: normal;
    }

    .form-signin .form-control {
	position: relative;
	height: auto;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	padding: 10px;
	font-size: 16px;
    }

    .form-signin .form-control:focus {
	z-index: 2;
    }

    .form-signin input[type="email"] {
	margin-bottom: -1px;
	border-bottom-right-radius: 0;
	border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
	margin-bottom: 10px;
	border-top-left-radius: 0;
	border-top-right-radius: 0;
    }

    #logo {margin-bottom: 3em;}

    #logo img {max-width: 477px; width: 90%;}

    #message {margin-bottom: 1.5em;}

    #message span {padding: 1.5em;}

    #logout {margin-top: 1em;}

  </style>


  <title>Creative Commons</title>
  </head>
  
  <body onload="if (document.getElementById('username')) document.getElementById('username').focus()">
    <div class="container">

    <div id="logo" class="text-center"><a href="/"><img src="/themes/ccid/logo.png" alt="Creative Commons" /></a></div>

  


<form method="post" action="login" id="login-form"
      onsubmit="submitbutton = document.getElementById('login-submit'); submitbutton.value='Please wait...'; submitbutton.disabled=true; return true;" class="form-signin" role="form">

    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required autocomplete="off">
    <input type="hidden" id="lt" name="lt" value="LT-1412996583rl7HqCSn9htjgof9juN" />
    <input type="hidden" id="service" name="service" value="" />
    <input type="submit" class="btn btn-lg btn-primary btn-block" accesskey="l" value="Sign in with your CCID"
           tabindex="4" id="login-submit" />

  

 

  </form>





</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  </body>
</html>
