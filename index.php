<?php include("db.php") ?>

<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

        <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
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

</div>


<?php include("includes/footer.php") ?>


