<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center">Transcation Details</h5>
  </div>

  <div class="card-body">

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM transaction";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID </th>
                            <th>Student Id</th>
                            <th>AMOUNT</th>
                            <th>STATUS</th>
                            <th>DATE</th>
                            <th>RECEIPT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                                $student_id=$row['s_id'];
                        ?>
                            <tr>
                                <td><?php  echo $row['tr_id']; ?></td>
                                <td><?php  echo $row['s_id']; ?></td>
                                <td><?php  echo $row['amount']; ?></td>
                                <td><?php  echo $row['status']; ?></td>
                                <td><?php  echo $row['date']; ?></td>
                                <td>
                                    <form action="viewTranscation.php" method="post">
                                        <input type="hidden" name="view_id"  value="<?php echo $row['tr_id']; ?>">
                                        <input type="hidden" name="view_s_id"  value="<?php echo $row['s_id']; ?>">
                                        <input type="hidden" name="t_amount"  value="<?php echo $row['amount']; ?>">
                                        <input type="hidden" name="t_status"  value="<?php echo $row['status']; ?>">
                                        <input type="hidden" name="t_date"  value="<?php echo $row['date']; ?>">
                                        <button type="submit" name="view_btn" class="btn btn-success" >VIEW</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="del_stu_id"  value="<?php echo $row['s_id']; ?>">
                                        <input type="hidden" name="del_rec_id" value="<?php echo $row['tr_id']; ?>">

                                        <?php        
                                        $sql = "SELECT * FROM fees WHERE sid ='".$student_id."'";
                                        $result= $connection->query($sql);
                                        if($result->num_rows ==1){ ?>
                                        <abbr title="Addmission already Taken! You can't delete! ">
                                            <button type="submit" name="delete_Receipt" class="btn btn-danger" disabled> DELETE</button> 
                                        </abbr>       
                                        <?php   
                                          }else{ ?>
                                            <button type="submit" name="delete_Receipt" class="btn btn-danger"> DELETE</button>       
                                            
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