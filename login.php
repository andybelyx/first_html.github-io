<?php require 'header.php'; ?>
<body>



<a href="index.php"><h1>THE GAME OFFICE</h1></a>

<div class="container">
	<form class="form-signin" method="POST">
		<h2>Login</h2>

		<?php if(isset($fmsg)){ ?><div class="alert alert-success" role="alert"><?php echo $fmsg; ?> </div><?php } ?>
	


		<input type="text" name="username" class="form-control" placeholder="Username" required>
		<input type="password" name="password" class="form-control" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
		<a href="register.php" class="btn btn-lg btn-primary btn-block">Registration</a>
	</form>
	

</div>

<?php
session_start();
require('db.php');

if (isset($_POST['username']) and isset($_POST['password'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);

	if ($count == 1) {
		$_SESSION['username'] = $username;
	}else {
		$fmsg = "Ошибка";
	}

if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	header("Location: game.php");
}else $fmsg = "Ошибка";
}


?>









<?php require 'footer.php'; ?>
