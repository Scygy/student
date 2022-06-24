<?php 
require 'process/login.php'
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sample</title>
	<link rel="stylesheet" type="text/css" href="node_modules/materialize-css/dist/css/materialize.min.css">

</head>
<body>
	 <div class="container">

<center><img src="img/login.png" alt="Avatar" class="responsive-img z-depth-1" style="width: 10%;
  border-radius: 70%;">
  </center>
<fieldset style="border:3px solid yellow;">
	<legend><h1 style="font-family: serif;">Loginamoka</h1></legend>
	<form class="" method="POST">
		<div class="row">
			<div class="col 12">
				<div class="input-field col 4">
					<span>Username:</span>
					<input type="text" name="username" id="username" placeholder="" autocomplete="OFF">
				</div>

				<div class="input-field col 4">
					<span>Password:</span>
					<input type="password" name="password" id="password" placeholder="" autocomplete="OFF">
				</div>
				<div class="input-field col 4">
				<input type="submit" name="login" class="btn" value="Login" style="border-radius:50px;">
				</div>
			</div>
		</div>
		</div>

</fieldset>

	</form>

</body>
</html>