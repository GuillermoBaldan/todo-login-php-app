<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /login-and-register-PHP');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    
    // $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    // $records->bindParam(':email', $_POST['email']);
    // $records->execute();
    // $results = $records->fetch(PDO::FETCH_ASSOC);

    // $message = '';

    // if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    //   $_SESSION['user_id'] = $results['id'];
    //   header("Location: /login-and-register-PHP");
    // } else {
    //   $message = 'Sorry, those credentials do not match';
    // }

    /************************************ */
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT id, password FROM users WHERE email = '$email';";
    $bd = conexionBD();
    
    $result = $bd->query($sql);
    $bd->close();

    if ( $result->num_rows <= 0) {
      $message = 'Sorry, those credentials do not match';
    }
    else
    {
      $r = $result->fetch_array(MYSQLI_ASSOC);
      
      if (!password_verify($password, $r['password'])) {
        $message = 'Sorry, those credentials do not match';
      }
      else
      {
        $_SESSION['user_id'] = $r['id'];
        $_SESSION['email'] = $email;

        
        
        header("Location: /todo-login-php-app");

       
        
      }

    }

  

    /************************************** */

  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php require 'partials/header.php' ?>
    <h1>Login</h1>
    <span> or <a href="signup.php">Signup</a></span>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

<form action="login.php" method="POST">
      <input name="email" type="text" placeholder="Enter your email">
      <input name="password" type="password" placeholder="Enter your Password">
      <input type="submit" value="Submit">
    </form>
    
</body>
</html>