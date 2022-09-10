<?php include("db.php") ?>

<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="">
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


