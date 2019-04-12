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

<form method="post" action="save.php" id="login-form" class="form-signin" role="form">

    <h2 class="form-signin-heading">Register for a CCID</h2>

    <p>Welcome to the registration process for a new CCID, a universal login for all things Creative Commons.</p>

<p class="help-block">To get started, we need your email address and a given name.</p>

    <input type="email" id="email" name="email" class="form-control" placeholder="mattl@example.com" required>

    <input type="text" id="nickname" name="nickname" class="form-control" placeholder="Matt Lee" required>

    <p>&nbsp;</p>

    <p class="help-block">Finally, a password, which is stored encrypted in our database.</p>

    <input type="password" name="password" class="form-control" placeholder="" required autocomplete="off">



    <p><input type="checkbox" required name="tic-toc" value="i-agree-to-the-terms" /> I agree with the <a target="_blank" href="https://creativecommons.org/policies">terms and conditions</a> and <a href="http://creativecommons.org/privacy" target="_blank">privacy policy</a>.</p>

    <input type="submit" class="btn btn-lg btn-success btn-block" accesskey="l" value="Register"
           tabindex="4" id="login-submit" />

  </form>

</div>

  </body>
</html>
