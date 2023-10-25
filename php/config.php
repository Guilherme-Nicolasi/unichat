<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "unichat";
  $connection = mysqli_connect($hostname, $username, $password, $database);
  if(!$connection) {
    echo("Database connection error".mysqli_connect_error());
  }
?>
