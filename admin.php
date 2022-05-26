<!DOCTYPE html>

<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	
	<form action="login.php" method="post">
		<h2>Login</h2>
		
		<?php if(isset($_GET['error'])) {?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php }?>
		<label>UserName</label>
		<input type="text" name="uname" placeholder="User Name"><br><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br><br>
		<button type="submit">Login</button>
	</form>
</body>
</html>