<?php 
include('../admin/security.php'); 

if(isset($_REQUEST['rSignup'])){
    if(($_REQUEST['sName'] == "")||($_REQUEST['sEmail'] == "")||($_REQUEST['sMobile'] == "")||($_REQUEST['fName'] == "")||
    ($_REQUEST['fMobile'] == "")||($_REQUEST['std'] == "")||($_REQUEST['address'] == "")||($_REQUEST['medium'] == "")){
        $regmsg1 = '<div class="alert alert-warning mt-2" role="alert">All Fields are Required</div>';
    }else
    {  
$sql = "SELECT email  FROM newstudent WHERE email ='".$_REQUEST['sEmail']."'  limit 1";
$result= $connection->query($sql);
if($result->num_rows ==1){
    $regmsg1 = '<div class="alert alert-primary mt-2" role="alert">User is Already Registered</div>';
}else{
$sName=$_REQUEST['sName'];
$sEmail=$_REQUEST['sEmail'];
$sMobile=$_REQUEST['sMobile'];
$fName=$_REQUEST['fName'];
$fMobile=$_REQUEST['fMobile'];
$std=$_REQUEST['std'];
$address=$_REQUEST['address'];
$medium=$_REQUEST['medium'];
$stream=$_REQUEST['stream'];
$sql= "INSERT INTO `newstudent`(`S_name`, `S_mobile`, `email`, `F_name`, `F_mobile`, `Std`, `Address`, `medium`,`add_status`,`stream`) VALUES ('$sName','$sMobile','$sEmail','$fName','$fMobile','$std','$address','$medium','no','$stream')";
if($connection->query($sql) == TRUE)
{
    $_SESSION['status'] = "Details saved Successfully!";
    $_SESSION['status_code'] = "success";
    $_SESSION['sEmail'] = $sEmail;
    header('Location: ../index.php'); 
}else{
    $_SESSION['status'] = "Faild to save Details!";
    $_SESSION['status_code'] = "error";
    header('Location: faculty.php'); 
}
}
}
}
?>