<?php

$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'todo_login';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $error) {
  die('Connection Failed: ' . $error->getMessage());
}

?>