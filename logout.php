<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /todo-login-php-app');
?>