<?php

include("database.php");

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $query = "INSERT INTO tasks(id_user,title, description) VALUES ('{$_SESSION['user_id']}','$title', '$description');";    
    $result = mysqli_query($conn, $query );
    if (!$result){
        die("Query Failed");
    }

    $_SESSION['message'] = 'Task Saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: index.php");
}

?>