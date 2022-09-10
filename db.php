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
?>