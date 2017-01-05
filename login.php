<?php

/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/


session_start();

if (isset($_SESSION['authed']))
{
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>小小日記本 - 登入</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="assets/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="assets/validation.min.js"></script>
<link href="login.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="login.js"></script>

</head>

<body>

<div class="signin-form">

	<div class="container">


       <form class="form-signin" method="post" id="login-form">

        <h2 class="form-signin-heading">只有小主人才能看喔</h2><hr />

        <div id="error">
        <!-- error will be shown here ! -->
        </div>

        <div class="form-group">
        <input type="password" class="form-control" placeholder="密碼" name="password" id="password" />
        </div>

     	<hr />

        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; 登入
			</button>
        </div>

      </form>

    </div>

</div>

<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
