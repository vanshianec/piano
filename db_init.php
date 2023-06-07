<?php
$server_name = $_SERVER['RDS_HOSTNAME'];
$user_name = $_SERVER['RDS_USERNAME'];
$password = $_SERVER['RDS_PASSWORD'];
$dbname = $_SERVER['RDS_DB_NAME'];
$dbport = $_SERVER['RDS_PORT'];

$connection = mysqli_connect($server_name, $user_name, $password, $dbname, $dbport);

if (!$connection) {
  die("Failed " . mysqli_connect_error());
}

echo "Connection established successfully." . "\n";

$query = "CREATE TABLE IF NOT EXISTS Users (
  user_id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(120) NOT NULL,
  password VARCHAR(600) NOT NULL,
  PRIMARY KEY (user_id),
  UNIQUE INDEX (email)
)";

if (mysqli_query($connection, $query)) {
  echo "Users table was initialized\n";
} else {
  echo "Error: " . mysqli_error($connection);
}

$query = "CREATE TABLE IF NOT EXISTS Songs (
  song_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  chords VARCHAR(800) NOT NULL,
  PRIMARY KEY (song_id)
)";

if (mysqli_query($connection, $query)) {
  echo "Songs table was initialized\n";
} else {
  echo "Error: " . mysqli_error($connection);
}

$query = "INSERT INTO Songs (name, chords) VALUES
  ('Песен 1', 'etyuri7595uti84y8r3i9i9u9wooiu9848utuoierutoiwpituiujgjiohreojfhiohoirhefoheoihrfrheohfiojdoewijoihogihweoighwe'),
  ('Песен 2', 'jkijfsoiehfwooijgoihousdhtoijoeirjfoiherouoijoifjreiofjoerihyoih987ht8954h9fj98j9f8h89ht895h489j98fhj8945h89fh5894hf'),
  ('Песен 3', 'jifjdsf8ifojsiojfoijioghiotjiorhj98h3589hf8493hf43'),
  ('Песен 4', 'jfd9s80jf0943jfh43t8y09h4385u43098fjsiodjfoihourfoij908h5ijfiojiowjoijqisjofjoewfoiwkefok89043jhf89jsieojfioehosikfoiewjfoiwejfoiwhfoijweoifjewiokdoiewkoidkewoi')
";

if (mysqli_query($connection, $query)) {
  echo "Songs were added\n";

  $selectQuery = "SELECT name, chords FROM Songs";
  $result = mysqli_query($connection, $selectQuery);

  $songs = array();

  while ($row = mysqli_fetch_assoc($result)) {
    $songs[] = $row;
  }

} else {
  echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>
