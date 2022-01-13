<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="faculityModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Topper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label>Name </label>
                <input type="text" name="t_name" class="form-control" placeholder="Enter name"required>
            </div>
            <div class="form-group">
                <label>Board/University</label>
                <input type="text" name="board" class="form-control" placeholder="Enter Board/University"required>
            </div>
            <div class="form-group">
                <label>Percentage</label>
                <input type="text" name="percent" class="form-control" placeholder="Enter Percentage"required>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="t_image" id="faculity_images" class="form-control" required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save_topper" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center">TOPPER
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#faculityModel">
              Add Topper
            </button>
    </h5>
  </div>

  <div class="card-body">

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM topper";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th>Board</th>
                            <th>Percent</th>
                            <th>Image</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['s_name']; ?></td>
                                <td><?php  echo $row['board']; ?></td>
                                <td><?php  echo $row['percent']; ?></td>
                                <td><?php  echo '<img src="upload/'.$row['images'].'" height="60px;" width="100px;" alt="faculty imgage">'?></a></td>
                                <td>
                                    <form action="topper_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_t_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="topper_delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>

            </div>
  </div>
</div>

</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>