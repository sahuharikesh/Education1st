<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<?php    
if(isset($_POST['edit_txt_btn']))
    {?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> EDIT ABOUT TEXT! </h6>
</div>
<div class="card-body">
<?php

    if(isset($_POST['edit_txt_btn']))
    {
        $id = $_POST['edit_txt_id'];
        
        $query = "SELECT * FROM about WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>

        <form action="code.php" method="POST">

            <input type="hidden" name="update_text_id" value="<?php echo $row['id'] ?>">

            <div class="form-group">
                <i class="fa fa-book "></i><label for="text"  >&nbsp;ENTER TEXT</label>
                <textarea type="text" class="form-control" rows="8"   name="updated_text" autocomplete="off"  required><?php echo $row['text'] ?></textarea>
          </div>

            <a href="about.php" class="btn btn-danger"> CANCEL </a>
            <button type="submit" name="update_text_btn" class="btn btn-primary"> Update </button>

        </form>
        <?php
        }
    }
?>
</div>
</div>
</div>
<?php
 }
 else
 {?>

<!-- Update About Images -->
<div class="container-fluid">
<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">UPDATE ABOUT IMAGES!</h6>
</div>
<div class="card-body">
<?php

    if(isset($_POST['ed_img_btn']))
    {
        $id = $_POST['ed_img_id'];
        
        $query = "SELECT * FROM aboutimg WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);

        foreach($query_run as $row)
        {
            ?>

        <form action="code.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="update_img_id" value="<?php echo $row['id'] ?>">


            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="update_about_img" id="about_img" class="form-control" required>
            </div>

            <a href="about.php" class="btn btn-danger"> CANCEL </a>
            <button type="submit" name="update_img_btn" class="btn btn-primary"> Update </button>

        </form>
        <?php
        }
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