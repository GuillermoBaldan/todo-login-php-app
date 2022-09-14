<?php
//init_set('display_errors',1);
error_reporting(E_ALL);
session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $user_results = $records->fetch(PDO::FETCH_ASSOC);

    $records = $conn->prepare('SELECT title, description FROM tasks WHERE id_user = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    //$task_results = mysqli_fetch_rows($records);
   
    //$task_results = $records->fetch(PDO::FETCH_ASSOC);
    //$task_results2 = $records->fetch(PDO::FETCH_ASSOC);

    //print_r($task_results);
    //print_r($task_results2);

    $user = null;

   

    if (count($user_results) > 0) {
      $user = $user_results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <?php 
          while($f=$records->fetch(PDO::FETCH_ASSOC)){
            echo '<p>'.$f['title'].$f['description'].'</p>';
       };
      ?>
         <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
  </body>
</html>