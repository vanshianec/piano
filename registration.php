<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	session_start();
	require_once('db.php');
	
	$email = $_POST['email'];
	$password = $_POST['password'];

	$hashed_password = sha1($password);
  
	$query = "INSERT INTO Users (email, password) VALUES (?, ?)";

	$stmt = $connection->prepare($query);

	$stmt->bind_param("ss", $email, $hashed_password);

	
	if ($stmt->execute()) {
    echo "User was registered successfully";
	$_SESSION['user'] = $email;
    header('Location: index.php');
	} else {
    echo "Statement execution failed: " . $stmt->error;
	}

	$stmt->close();
	mysql_close($connection);
	
	
	header("Location: index.php");
}
?>
