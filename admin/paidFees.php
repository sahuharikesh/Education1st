<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center">Paid Fee Details</h5>
  </div>

  <div class="card-body">

            <div class="table-responsive">
            <?php
                $query = "SELECT * FROM fees";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Student Id</th>
                            <th>Student name</th>
                            <th>STD</th>
                            <th>medium</th>
                            <th>Stream</th>
                            <th>Total Fees</th>
                            <th>Paid Fees</th>
                            <th>Remaining Fees</th>
                            <th>GENERATE </th>
                            <th>UPDATE</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_remain = 0;
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['sid']; ?></td>
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['std']; ?></td>
                                <td><?php  echo $row['medium']; ?></td>
                                <td><?php  echo $row['stream']; ?></td>
                                <td><?php  echo $row['total_fee']; ?></td>
                                <td><?php  echo $row['paid_fee']; ?></td>
                                <td><?php  echo $row['remain_fee']; ?></td>
                                <td>
                                    <form action="viewReceipt.php" method="post">
                                        <input type="hidden" name="s_view_id"  value="<?php echo $row['sid']; ?>">
                                        <button type="submit" name="Fee_view_btn" class="btn btn-success" >RECEIPT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="updateFee.php" method="post">
                                        <input type="hidden" name="s_view_id"  value="<?php echo $row['sid']; ?>">
                                        <button type="submit" name="Fee_update_btn" class="btn btn-primary" >UPDATE</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                         <input type="hidden" name="delRece_id"  value="<?php echo $row['f_id']; ?>">
                                         <input type="hidden" name="s_id"  value="<?php echo $row['sid']; ?>">
                                        <button type="submit" name="delReceipt" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        
                        $total_remain = $total_remain + (int)$row['remain_fee'];
                        $_SESSION['Total_fee'] =$total_remain ;
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table><hr>
                <p class="m-0 font-weight-bold text-primary text-center">Total Remaining Fees <?php echo  $total_remain; ?></p>        
        </div>
  </div>
</div>
</div>


<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>