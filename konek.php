<?php
    $mysqli = new mysqli("localhost", "ppid", "ppid1234", "ppidv2");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<?php
    $result = $mysqli->query("SHOW TABLES;");
?>
