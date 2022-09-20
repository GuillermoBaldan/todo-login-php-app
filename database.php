<?php

// $server = 'localhost:3306';
// $username = 'root';
// $password = '9597'; //////
// $database = 'php_login_database';

// try {
//   $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
// } catch (PDOException $error) {
//   die('Connection Failed: ' . $error->getMessage());
// }

/* function conexionBD(){

  $server     = 'localhost:3306';
  $username   = 'root';
  $password   = '';
  $database   = 'php_login_database';

  $bd = new mysqli($server, $username, $password, $database);

  if (mysqli_connect_errno() != 0) {
      exit();
  } else {
      return $bd;
  }
}

?> */
$server     = 'localhost:3306';
  $username   = 'root';
  $password   = '';
  $database   = 'todo_login';

  $conn = mysqli_connect($server, $username, $password, $database);

?>
