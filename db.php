<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'todo_php_crud'
) or die(mysqli_erro($mysqli));

?>