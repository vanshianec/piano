<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	require_once('db.php');
	
	$song = $_POST['song'];
	$chords = $_POST['chords'];

	$query = "UPDATE songs SET chords = ? WHERE name = ?";
	 
	$stmt = mysqli_prepare($connection, $query);

	mysqli_stmt_bind_param($stmt, "ss", $chords, $song);

	mysqli_stmt_execute($stmt);

	mysqli_stmt_close($stmt);
	mysqli_close($connection);
}
?>