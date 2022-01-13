<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> UPDATE FEES DETAILS ! </h6>
</div>
<div class="card-body">
<?php

    if(isset($_POST['Fee_update_btn']))
    {
        $sid = $_POST['s_view_id'];
        
        $query = "SELECT * FROM fees WHERE sid='$sid'";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>

        <form action="code.php" method="POST">
        <div class="form-group">
                <label>Student ID</label>
                <input type="text" name="update_id" value="<?php echo $row['sid'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Student Name</label>
                <input type="text" name="update_name" value="<?php echo $row['name'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Standard</label>
                <input type="text" name="update_std" value="<?php echo $row['std'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Panding Fee</label>
                <input type="number" name="update_remain" value="<?php echo $row['remain_fee'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Paid Fee</label>
                <input type="number" name="update_paid" class="form-control" placeholder="Enter Amount">
            </div>
            <a href="paidFees.php" class="btn btn-danger"> CANCEL </a>
            <button type="submit" name="update_fee" class="btn btn-primary"> Update </button>

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