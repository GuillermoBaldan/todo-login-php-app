<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
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
<?php include("db.php") ?>

<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" href="#" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php session_unset(); } ?>

            <div class="card card-body">
                <form action="save_task.php" method="POST">
                    <div class = "form-group">
                        <input type="text" name="title" class="form-control mt-2"
                        placeholder="Task Title" autofocus>
                    </div>
                    <div class="formgroup">
                        <textarea name="description" row="2" class="form-control mt-2"
                        placeholder="Task Description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block mt-2" name="save_task" value="Save Task">
                </form>
            </div>
        </div>
    <div class="col-md-8">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
            </thead>
            <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
     </div>

</div>


<?php include("includes/footer.php") ?>


