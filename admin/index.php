<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
      <a href="./register.php">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                
                $query = "SELECT id FROM register ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h6> Total Admin: '.$row.'</h6>';
            ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
      <a href="./paidFees.php">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Student!</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php

                $query = "SELECT * FROM fees";
                $query_run = mysqli_query($connection, $query);
                $total_remain = 0;
                if(mysqli_num_rows($query_run) > 0)        
                {
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                      $total_remain = $total_remain + (int)$row['remain_fee'];
                    }
                  }
                  echo '<h6>Pending Fees: '.$total_remain.'</h6>';

              ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
      <a href="./faculty.php">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Faculty !</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                
                $query = "SELECT id FROM faculty ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h6> Total Faculty: '.$row.'</h6>';
            ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
        </a>
      </div>
    </div>


    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
      <a href="./newStudent.php">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 "> Student!</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
              <?php
                
                $query = "SELECT id FROM newstudent ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h6> New Student: '.$row.'</h6>';
            ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </a>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>