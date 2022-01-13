<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center">Registration Fee Receipt ! </h5></div>

  <div class="card-body container">
            <div class="table-responsive">
           <?php
            if(isset($_REQUEST['view_btn'])){
                $sid=$_REQUEST['view_s_id'];
                $amt=$_REQUEST['t_amount'];
                $status=$_REQUEST['t_status'];
                $date=$_REQUEST['t_date'];
                $sql = "SELECT * FROM `newstudent` WHERE id='$sid'";

                $result= $connection->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){ ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <tbody>
                <tr >
            <td colspan="2" class="text-center"><h4><b><i class="fas fas fa-book-open"></i>&nbsp;Education 1'st</b></h4></td>
                </tr>       
                <tr>
            <td>Student Name :&nbsp;&nbsp;<?php  echo $row['S_name']; ?></td>
            <td>Student Mobile :&nbsp;&nbsp;<?php  echo $row['S_mobile']; ?></td>
                </tr>
                <tr>
            <td>Father Name :&nbsp;&nbsp;<?php  echo $row['F_name']; ?></td>
            <td>Father Mobile :&nbsp;&nbsp;<?php  echo $row['F_mobile']; ?></td>
                </tr>
                <tr>
            <td>Email :&nbsp;&nbsp;<?php  echo $row['email']; ?></td>
            <td>Standard :&nbsp;&nbsp;<?php  echo $row['Std']; ?></td>
                </tr>
                <tr>
            <td>Medium :&nbsp;&nbsp;<?php  echo $row['medium']; ?></td>
            <td>Home Address :&nbsp;&nbsp;<?php  echo $row['Address'];?></td>
                </tr>
                <tr>
            <td>Payment:&nbsp;&nbsp;<?php  echo $amt; ?></td>
            <td>Transaction Status:&nbsp;&nbsp;<?php  echo $status;?></td>
                </tr>
                <tr>
            <?php if(!$row['stream']==null) {?>
            <td >Stream:&nbsp;&nbsp;<?php  echo ($row['stream']);?></td>
            <td >Date :&nbsp;&nbsp;<?php   echo $date;;?></td>
             <?php }else{?>
            <td colspan="2">Date :&nbsp;&nbsp;<?php   echo $date;?></td>
            <?php }?>
                </tr>
                </tbody>
                </table>
                <p class="text-right"><b>Signed by Prabhakar Vishwakarma !</b><br>
                <img src="img/AuthSign.jpeg" height="50px;" width="160px;" alt="faculty imgage" class="mr-5">
                <h6 class="text-right mr-4"><i>Founder of Education 1'st</i></h6>
                </p>
            <div class="text-center ">
            <form action="" method="post" class="mb-3 mr-3 d-print-none d-inline">
            <button type="submit" name=""  class="btn btn-primary" onClick="window.print()">Print</button>
            </form>
            <form action="transcation.php" method="post" class="mb-3 mr-3 d-print-none d-inline">
            <input type="submit" value="Close" class="btn btn-danger">
            </form>
             </div> 

            </div>
  </div>
</div>

</div>
<?php
     }
    }

 }
?>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php')
?>