<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="modal fade" id="faculityModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label>Name </label>
                <input type="text" name="faculty_name" class="form-control" placeholder="Enter name"required>
            </div>
            <div class="form-group">
                <label>Designation</label>
                <input type="text" name="faculty_designation" class="form-control" placeholder="Enter Designation"required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="faculty_description" class="form-control" placeholder="Enter Description"required>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="faculty_image" id="faculity_images" class="form-control" required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save_faculty" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center">Faculties
            <button type="button" class="btn btn-primary float-left" data-toggle="modal" data-target="#faculityModel">
              Add Faculties 
            </button>
    </h5>
  </div>

  <div class="card-body">

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM faculty";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th>Designation</th>
                            <th>Description</th>
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
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['design']; ?></td>
                                <td><?php  echo $row['descrip']; ?></td>
                                <td><?php  echo '<img src="upload/'.$row['images'].'" height="60px;" width="100px;" alt="faculty imgage">'?></td>
                                <td>
                                    <form action="faculty_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="fac_delete_btn" class="btn btn-danger"> DELETE</button>
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