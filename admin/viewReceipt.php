<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary text-center"> Fee Receipt ! </h5></div>

  <div class="card-body mx-5">
            <div class="table-responsive">
           <?php
            if(isset($_REQUEST['Fee_view_btn'])){
                $sid=$_REQUEST['s_view_id'];
                $sql = "SELECT * FROM `fees` WHERE sid='$sid'";

                $result= $connection->query($sql);
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <tbody>
                <tr >
            <td colspan="2" class="text-center"><h4><b><i class="fas fas fa-book-open"></i>&nbsp;Education 1'st</b></h4></td>
                </tr>
                <tr >
            <td colspan="2">Receipt Number:&nbsp;&nbsp;<?php  echo $row['f_id']; ?></td>
                </tr>
                <tr>
            <td>Student ID :&nbsp;&nbsp;<?php  echo $row['sid']; ?></td>
            <td>Student Name :&nbsp;&nbsp;<?php  echo $row['name']; ?></td>
                </tr>
                <tr>
            <td>Standard :&nbsp;&nbsp;<?php  echo $row['std']; ?></td>
            <td>Medium :&nbsp;&nbsp;<?php  echo $row['medium']; ?></td>
                </tr>
                <tr>
            <td>Paid Fee :&nbsp;&nbsp;<?php  echo $row['paid_fee']; ?></td>        
            <td>Pending Fee :&nbsp;&nbsp;<?php  echo $row['remain_fee']; ?></td>
                </tr>
                <tr>
            <?php if(!$row['stream']==null) {?>
            <td >Stream:&nbsp;&nbsp;<?php  echo ($row['stream']);?></td>
            <td >Date :&nbsp;&nbsp;<?php  echo ($row['date']);?></td>
             <?php }else{?>
            <td colspan="2">Date :&nbsp;&nbsp;<?php  echo ($row['date']);?></td>
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
            <form action="paidFees.php" method="post" class="mb-3 mr-3 d-print-none d-inline">
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