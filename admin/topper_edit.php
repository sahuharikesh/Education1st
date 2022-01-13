<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT TOPPER</h6>
</div>
<div class="card-body">
<?php

    if(isset($_POST['edit_btn']))
    {
        $id = $_POST['edit_id'];
        
        $query = "SELECT * FROM topper WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>

        <form action="code.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="edit_t_name" value="<?php echo $row['s_name'] ?>" class="form-control"
                    placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Board/University</label>
                <input type="text" name="edit_board" value="<?php echo $row['board'] ?>" class="form-control"
                    placeholder="Enter Board/University">
            </div>
            <div class="form-group">
                <label>Percentage</label>
                <input type="text" name="edit_percent" value="<?php echo $row['percent'] ?>"
                    class="form-control" placeholder="Enter Percentage">
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="edit_topper_image" id="topper_images" class="form-control">
            </div>

            <a href="topper.php" class="btn btn-danger"> CANCEL </a>
            <button type="submit" name="topper_updatebtn" class="btn btn-primary"> Update </button>

        </form>
        <?php
        }
    }
?>
</div>
</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>