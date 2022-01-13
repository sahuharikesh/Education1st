<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">New Student </h6>
  </div>

  <div class="card-body">

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM newstudent";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Name </th>
                            <th>Email </th>
                            <th>Mobile</th>
                            <th>Father Name</th>
                            <th>Father Mob</th>
                            <th>STD</th>
                            <th>Address</th>
                            <th>Medium</th>
                            <th>Addmission</th>
                            <th>DELETE</th>
                            <th>ADD FEE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                $student_id=$row['id'];
                        ?>
                            <tr>
                                <td><?php  echo  $student_id; ?></td>
                                <td><?php  echo $row['S_name']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['S_mobile']; ?></td>
                                <td><?php  echo $row['F_name']; ?></td>
                                <td><?php  echo $row['F_mobile']; ?></td>
                                <td><?php  echo $row['Std']; ?></td>
                                <td><?php  echo $row['Address']; ?></td>
                                <td><?php  echo $row['medium']; ?></td>
                                <td><?php  echo ($row['add_status']=="yes"?"Confirmed":"Not Confirmed") ?></td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>" >
                                        <button type="submit" name="delete_New_Std" class="btn btn-danger" <?php echo ($row['add_status']=="yes"?"disabled":"")  ?>> DELETE</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="addReceipt.php" method="post">
                                        <input type="hidden" name="s_id" value="<?php echo $row['id']; ?>" >
                                        <input type="hidden" name="Stu_name" value="<?php echo $row['S_name']; ?>" >
                                        <input type="hidden" name="Std" value="<?php echo $row['Std']; ?>" >
                                        <input type="hidden" name="medium" value="<?php echo $row['medium']; ?>" >
                                        <input type="hidden" name="stream" value="<?php echo $row['stream']; ?>" >
                                        <?php        
                                        $sql = "SELECT * FROM fees WHERE sid ='".$student_id."'";
                                        $result= $connection->query($sql);
                                        if($result->num_rows ==1){ ?>
                                        <abbr title="Addmission already Taken!">
                                            <button type="submit" name="add_fee" class="btn btn-success" disabled>Add</button>
                                        </abbr>        
                                        <?php     
                                        }else{ ?>
                                            <button type="submit" name="add_fee" class="btn btn-success" >Add</button>                
                                      <?php 
                                       }
                                    ?>

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
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>