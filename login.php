<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	session_start();
	require_once('db.php');
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$hashed_password = sha1($password);
  
	$query = "SELECT password FROM Users WHERE email = ?";
	 
	$stmt = mysqli_prepare($connection, $query);

	mysqli_stmt_bind_param($stmt, "s", $email);

	mysqli_stmt_execute($stmt);

	mysqli_stmt_bind_result($stmt, $db_password);


	if (mysqli_stmt_fetch($stmt)) {
		if ($db_password === $hashed_password) {
			$_SESSION['user'] = $email;
			header('Location: index.php');
		} else {
			 echo "<div class='form'>
                 <h3>Incorrect Username/password.</h3><br/>
                 <p class='link'>Click here to <a href='login.html'>Login</a> again.</p>
                 </div>";
		}
	} else {
		 echo "<div class='form'>
                 <h3>Incorrect Username/password.</h3><br/>
                 <p class='link'>Click here to <a href='login.html'>Login</a> again.</p>
                 </div>";
	}

	
	
	mysqli_stmt_close($stmt);
	mysqli_close($connection);


}
?>
