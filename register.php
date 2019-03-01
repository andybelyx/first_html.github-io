<?php require 'header.php'; ?>
<body>

<?php
require('db.php');

if (isset($_POST['username']) && isset($_POST['password'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "INSERT INTO users (username, password, email) VALUES ('$username','$password','$email')";
	$result = mysqli_query($connection, $query);

	if($result) {
		header("Location: game.php");
	}else {
		$fsmsg ="Ошибка";
	}
}
?>

<a href="index.php"><h1>THE GAME OFFICE</h1></a>

<div class="container">
	<form class="form-signin" method="POST">
		<h2>Registration</h2>

		<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"><?php echo $smsg; ?> </div><?php } ?>
		<?php if(isset($fsmsg)){ ?><div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?> </div><?php } ?>


		<input type="text" name="username" class="form-control" placeholder="Username" required>
		<input type="email" name="email" class="form-control" placeholder="Email" required>
		<input type="password" name="password" class="form-control" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Register a game</button>
	</form>
	

</div>











<?php require 'footer.php'; ?>
