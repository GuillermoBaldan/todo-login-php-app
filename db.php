<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        $conn = mysqli_connect(
          'localhost',
          'root',
          '',
          'todo_login'
        ) or die(mysqli_erro($mysqli));
    } 

    try {
      $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
    } catch (PDOException $error) {
      die('Connection Failed: ' . $error->getMessage());
    }
?>