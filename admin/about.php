<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About Text</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
       <div class="modal-body">
       <div class="form-group">
                <i class="fa fa-book "></i><label for="text"  >&nbsp;ENTER TEXT</label>
                <textarea type="text" class="form-control" rows="8"  placeholder=" Type Text Here...." name="text" autocomplete="off"  required></textarea>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="saveText" class="btn btn-primary">Save</button>
        </div>
      </form>
   </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center">ABOUT US
            <button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#addadminprofile">
              Text <i class="fa fa-plus "></i>
            </button>
    </h5>
  </div>

  <div class="card-body">

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM about";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th>ABOUT TEXT</th>
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
                                <td><?php  echo $row['text']; ?></td>
                                <td>
                                <form action="editAbout.php" method="post">
                                        <input type="hidden" name="edit_txt_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_txt_btn" class="btn btn-success">UPDATE</button>
                                    </form><hr>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="del_txt_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="del_txt_btn" class="btn btn-danger"> DELETE</button>
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


<!-- code for image -->

<div class="modal fade" id="addImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add About Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
       <div class="modal-body">
       <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="about_image" id="about_images" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="saveImg" class="btn btn-primary">Save</button>
        </div>
      </form>
   </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center">ABOUT IMAGES
            <button type="button" class="btn btn-primary float-left btn-sm" data-toggle="modal" data-target="#addImages">
              IMAGES <i class="fa fa-plus "></i>
            </button>
    </h5>
  </div>

  <div class="card-body">

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM aboutimg";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">

                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>                                
                                <td><?php  echo '<img src="upload/'.$row['images'].'" height="100px;" width="70%;" alt="faculty imgage">'?><hr>
                                <div class="row ml-5">&nbsp;&nbsp;&nbsp;
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="del_img_id" value="<?php echo $row['id']; ?>">
                                        <?php if($row['status']=="1"){ ?>
                                          <abbr title="Frist Image can not be Delete ,Only you can Change it!">
                                            <button type="submit" name="del_img_btn" class="btn btn-danger btn-sm" disabled> DELETE</button>
                                          </abbr> 
                                           <?php }else{ ?>
                                            <button type="submit" name="del_img_btn" class="btn btn-danger btn-sm"> DELETE</button>
                                            <?php } ?>
                                        
                                    </form>&nbsp;
                                    <form action="editAbout.php" method="post">
                                        <input type="hidden" name="ed_img_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="ed_img_btn" class="btn btn-success btn-sm">UPDATE</button>
                                    </form>
                                </div>
                                </td>    
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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>