<?php 
session_start();
include('admin/database/dbconfig.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Education1st</title>    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="cs_style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-sm  navbar-dark fixed-top" >
<div class="container">
<b class="margin"><a class="navbar-brand" href="#"><i class="fas fa-book-open ">&nbsp;EDUCATION 1'st</i></a></b>

<button class="navbar-toggler navBtn" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse topnav " id="collapsibleNavbar" >
<ul class="navbar-nav " >
  <li class="nav-item ">
    <a class="nav-link active" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#about">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#student">Toppers</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#contact">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#teacher">Teachers</a>
  </li>
</ul>
</div>

</div>
</nav>
  <br>
  <!-- header Section -->
<div class="hero-image">
<div class="hero-text" style="text-shadow:5px 5px 5px black;"><i>
  <!-- <h1 style="font-size:60px">Welcome</h1> -->
  <h2 style="font-size:75px">Education 1'st</h2>
</i>
<h6>Your bright future starts here..!</h6><br>

  <button class="btn px-4" style="border-radius:50px" data-bs-toggle="modal" data-bs-target="#myModal">Join Now</button>
</div>
</div>

<!-- The Modal -->
<div class="modal" id="myModal">
<?php include('Student/addStudent.php') ?> 
</div>
<!-- about Section -->
<section id="about">
  <div class="shadow-lg">
<b><h2 class=" text-center ">About Us</h2><hr class="w-25 mx-auto "></b><br>
<div class="container ">
  <div class="row">
  <div class="col-lg-5 col-md-5 col-12">
    <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel" data-interval="10">
<!-- The slideshow/carousel -->
<div class="carousel-inner">
<?php        
          $sql = "SELECT * FROM `aboutimg`";
          $result= $connection->query($sql);
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
               echo ($row['status']=="1"?"<div class='carousel-item active'>":"<div class='carousel-item' >") ;
               echo '<img src="admin/upload/'.$row["images"].'" alt="Image1"  class="d-block" style="width:100%">
                     </div>';

              }
          }
      ?>
</div>
</div>

</div>
    <div class="col-lg-7 col-md-7 col-12 text-center pb-3">
    <?php        
          $sql = "SELECT * FROM `about`";
          $result= $connection->query($sql);
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo'<p>'.$row['text'].'</p>';
              }   
          }
      ?>
    <p></p>
    <button type="submit" class="btn btn-outline-primary">Read More..</button>
      </div>
  </div>
</div> 
</div>
</section >
<!-- Student section -->
<section id="student">
    <div class="style-txt">
        <h1>TOPPER</h1>
        <p>Our Toppers of Current Year!</p><hr class="w-25 mx-auto ">
    </div>  
<div class="container">
<h5 class="text-primary">You can do it, join us if you want to.. <a href="#"><i class="far fa-hand-point-up"></i></a></h5>
      <div class="row text-center ">
      <?php
          $sql = "SELECT * FROM `topper` ORDER BY s_name LIMIT 8";
          $result= $connection->query($sql);
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
              echo '<div class="col-md-3 col-sm-6 my-3 my-md-0 zoom" >
                    <form action="" method="post">
                    <div class="card shadow  mt-3">
                    <div>
                    <img src="admin/upload/'.$row["images"].'" alt="Image1" class="img-fluid card-img-top">
                    </div>
                    <div class="card-body">
                    <p class="card-title">'.$row["s_name"].'</p>
                    <h5 class="">'.$row["board"].': '.$row["percent"].'%</h5> 
                    <button class="btn btn-outline-primary btn-sm">View More</button>
                    </div>
                    </div>
                    </form>
                    </div> ';
              }
          }
      ?>
      </div>
</div>
</section>
<!-- contact us -->
<section id="contact" >
<b><h2 class="pt-5 text-center ">Contact Us</h2><hr class="w-25 mx-auto pt-3"></b>
<div class="cont-image py-3">
<?php include('Student/contact.php') ?> 
</div>
</section>
  <!-- Teacher section -->
  <section id="teacher">
  <div class="shadow-lg">
<b><h2 class=" text-center ">Our Teachers</h2><hr class="w-25 mx-auto pb-3"></b>
<div class="container">
      <div class="row text-center ">
      <?php        
          $sql = "SELECT * FROM `faculty` ORDER BY name LIMIT 8";
          $result= $connection->query($sql);
          if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
              echo '<div class="col-md-3 col-sm-6 my-3 my-md-0">
                    <div class="zoom">
                    <img src="admin/upload/'.$row["images"].'" alt="Image1" class="facultyImg shadow">
                    </div>
                    <h5 class="card-title mt-3">'.$row["name"].'</h5>
                    <p class="">Qualification:&nbsp;'.$row["design"].'</p> 
                    <p class="text-primary">'.$row["descrip"].'</p> 
                    </div> ';
              }
          }
      ?>
      </div>
</div>
  </div>
</section>
<!-- available  -->
<section>
  <div class="shadow-lg">
<b><h2 class=" text-center " style="color:#4e73df;">Available Now !</h2><hr class="w-25 mx-auto pt-3"></b>
  <div class="container heading text-center ">
    </div>
    <div class="container d-flex justify-content-around align-item-center text-center ">
      <div>
        <h2 class="count"><b>550 </b><span></span></h2>
        <p >Available Students</p>
      </div>
      <div>
        <h2 class="count"><b>20</b></h2><span></span>
        <p>Available Faculty</p>
      </div>     
      <div>
        <h2 class="count"><b>150</b></h2>
        <p>Seats Available</p>
      </div>
      </div>
  </div>
</section>

<!-- footer section -->
<footer class=" text-white" style="background-color: black;">
<div class="container pt-5">
  <div class="row ">
    <div class="col-lg-3 col-md-3 col-12">
    <div>
          <h4>NVIGATION LINK</h4><br>
          <li><a href="#" class="text-white"> HOME</a></li>
          <li><a href="#about" class="text-white">ABOUT</a></li>
          <li><a href="#student" class="text-white">TOPPER</a></li>
          <li><a href="#contact" class="text-white">CONTACT US</a></li>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-12">
    <div>
    <h5 class="fas fa-phone text-white">&nbsp;&nbsp;+91 8422053851</h5><br>
    <h4 class="fa fa-envelope text-white">&nbsp;&nbsp;sahuharikesh1@gmail.com</h4><br><br>
    </div><hr class="text-white">
    <div><h5 >Follow Us</h5></div><br>
      <div class="row">
      <button class="btn  ml-3"><i class="fab fa-facebook"></i></button>&nbsp;
      <button class="btn "><i class="fab fa-youtube"></i></button>&nbsp;
      <button class="btn "><i class="fab fa-twitter"></i></button>&nbsp;
      <button class="btn "><i class="fab fa-google-plus-g"></i></button>
      </div>
    </div>
    <div class="col-lg-5 col-md-5 col-12 text-center">
    <h2 class="pb-2" style="font-size: 20px;color: #fff;"><i class="fas fa-map-marker-alt" >&nbsp;Let's find the location</i>&nbsp;<i class="fas fa-walking"></i></h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3699.931230276649!2d73.00373361485273!3d19.16765718703541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7bf3817e62e47%3A0x5cddd0372e1a7b58!2sNMMC%20School%20Yadav%20Nagar!5e1!3m2!1sen!2sin!4v1634289928622!5m2!1sen!2sin" width="100%" height="300" style="border: 1px;" allowfullscreen="" loading="lazy"></iframe>
    </div>
  </div>
</div>     
<div class="scrolltop float-right">
    <i class="fa fa-arrow-up" onclick="topFunction()" id="myBtn"></i>
  </div> 
<div class=" text-center text-white  p-2 footer-txt" style="background: #4e73df"><p>Copyright &copy;2021 All rights reserverd | Designed by Harikesh </p></div>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="admin/js/sweetalert.min.js"></script>

<?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
    {
    ?>
        <script>
          swal({
            title: "<?php echo $_SESSION['status']?>",
            text: "Confirm the Seat!",
            icon: "<?php echo $_SESSION['status_code']?>",
            buttons: ["Cancel", "Confirm"],
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              swal("Take a registration by paying only Rs 100!", {
                icon: "info",
              }).then(()=>location.href="Student/checkout.php");
            } else {
              swal("You canceled!");
            }
          });
        </script>
    <?php
      unset($_SESSION['status']);
    }

// popup for contact us page
    if(isset($_SESSION['Cont_status']) && $_SESSION['Cont_status'] !='') 
    {
    ?>
        <script>
          swal({
              title: "<?php echo $_SESSION['Cont_status']?>",
              text: "You clicked the button!",
              icon: "<?php echo $_SESSION['Cont_status_code']?>",
              button: "OK",
          });
        </script>

    <?php
      unset($_SESSION['Cont_status']);
    }
?>
<script>
//For Counter
  $('.count').counterUp({
  delay:10,
  time:3000
})

// for scrolltop
mybutton =document.getElementById("myBtn");
window.onscroll = function() {scrollFunction()};
function scrollFunction(){
  // when the user scroll down 20px from the top of the document ,show the button
  if(document.body.scrollTop >20 || document.documentElement.scrollTop > 20){
    mybutton.style.display ="block";

  }else{
    mybutton.style.display ="none";

  }
}
// when the user click on the button ,scroll the top 
function topFunction(){
  document.body.scrollTop = 0;// for safari
  document.documentElement.scrollTop = 0;// for chrome, firefox and opera
}

</script>
</body>
</html>
