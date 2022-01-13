<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
</div>
<div class="card-body">
<?php

    if(isset($_POST['add_fee']))
    {
        $sid = $_POST['s_id'];
        $sname = $_POST['Stu_name'];
        $std = $_POST['Std'];
        $medium = $_POST['medium'];
        $stream = $_POST['stream'];

    }
?>

        <form action="code.php" method="POST">
            <div class="container">
            <?php if(!$stream==null) {?>
            <div class="form-group">
                <label>Stream </label>
                <input type="text" name="stream" value="<?php echo $stream; ?>" class="form-control"  readonly>
            </div>
            <?php } ?>
            <div class="row">
            <div class="col-6">            
            <div class="form-group">
                <label>Student ID </label>
                <input type="number" name="st_id" value="<?php echo $sid; ?>" class="form-control"  readonly>
            </div>
            <div class="form-group">
                <label>Student Name</label>
                <input type="text" name="st_name" value="<?php echo $sname ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Total Fee</label>
                <input type="number" name="t_fee"  class="form-control">
            </div>
            </div>
            <div class="col-6">
            <div class="form-group">
                <label>Standard</label>
                <input type="number" name="Std" class="form-control" value="<?php echo $std ?>" readonly>
            </div>
            <div class="form-group">
                <label>Medium</label>
                <input type="text" name="medium" value="<?php echo $medium ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Paid Fee</label>
                <input type="text" name="p_fee"  class="form-control">
            </div>
            </div>
            </div>

            <a href="newStudent.php" class="btn btn-danger"> CANCEL </a>
            <button type="submit" name="addFeebtn" class="btn btn-primary"> Add Fee</button>
            </div>
            </div>
        </form>

</div>
</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>