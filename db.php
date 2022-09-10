<?php
    if(!isset($_SESSION)) 
    { 
        session_start();
        $server = 'localhost:3306';
      $username = 'root';
      $password = '';
      $database = 'todo_login'; 
        $conn = mysqli_connect(
          'localhost',
          'root',
          '',
          $database
        ) or die(mysqli_erro($mysqli));
        try {
          $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        } catch (PDOException $error) {
          die('Connection Failed: ' . $error->getMessage());
        }
    } 


?>