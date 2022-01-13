<?php
include('security.php');
 
// CODE FOR FACULTY ADD
if(isset($_POST['save_faculty']))
{
    $name = $_POST['faculty_name'];
    $designation = $_POST['faculty_designation'];
    $description = $_POST['faculty_description'];
    $images = $_FILES["faculty_image"]['name'];

    $img_types = array('image/jpg','image/png','image/jpeg');
    $validate_img_extension= in_array($_FILES["faculty_image"]['type'],$img_types);
    if($validate_img_extension)
    {

    if(file_exists("upload/".$_FILES["faculty_image"]['name']))
    {
    $store = $_FILES["faculty_image"]["name"];
    $_SESSION['status'] = "Image already exists. $store";
    header('Location: faculty.php');   
    }
    else
    {
    $query = "INSERT INTO faculty (`name`,`design`,`descrip`,`images`) VALUES ('$name','$designation','$description','$images')";
    $query_run = mysqli_query($connection, $query);
 

    if($query_run)
    {
        move_uploaded_file($_FILES["faculty_image"]["tmp_name"], "upload/".$_FILES["faculty_image"]['name']);
        $_SESSION['status'] = "Faculty Added";
        $_SESSION['status_code'] = "success";
        header('Location: faculty.php');
    }
    else 
    {
        $_SESSION['status'] = "Admin Profile Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: faculty.php');  
    }

    }
    }
    else
    {
        $_SESSION['status'] = " Only JPG,JPEG and PNG image are allowed";
        header('Location: faculty.php'); 
    }
    
}

// CODE FOR FACULTY EDIT
if(isset($_POST['faculty_updatebtn']))
{
    $edit_id = $_POST['edit_id'];
    $edit_name = $_POST['edit_name'];
    $edit_designation = $_POST['edit_designation'];
    $edit_description = $_POST['edit_description'];
    $edit_images = $_FILES["edit_faculty_image"]['name'];

    // $img_types = array('image/jpg','image/png','image/jpeg');
    // $validate_img_extension= in_array($_FILES["edit_faculty_image"]['type'], $img_types);
    // if($validate_img_extension)
    // {

    $facul_query = "SELECT * FROM faculty WHERE id='$edit_id' ";
    $facul_query_run = mysqli_query($connection, $facul_query);
    $image_data='';
    foreach($facul_query_run as $fa_row)
    {
        if($edit_images == NULL){
            //update with existing images
            $image_data = $fa_row['images'];
            // echo($image_data);

        }
        else
        {
            //update with new image and delete old image
            if($img_path = "upload/".$fa_row['images']){
                unlink($img_path);
                $image_data=$edit_images;
            }
        }
    }

    $query = "UPDATE faculty SET name='$edit_name', design='$edit_designation', descrip='$edit_description', images ='$image_data' WHERE id='$edit_id'";
    $query_run = mysqli_query($connection, $query);
 

    if($query_run)
    {
        if($edit_images == NULL)
        {
            $_SESSION['status'] = "Faculty updated with existing images";
            $_SESSION['status_code'] = "warning";
            header('Location: faculty.php'); 
        }
        else
        {
        move_uploaded_file($_FILES["edit_faculty_image"]["tmp_name"], "upload/".$_FILES["edit_faculty_image"]['name']);
        $_SESSION['status'] = "Faculty Updated";
        $_SESSION['status_code'] = "success";
        header('Location: faculty.php');
        }
    }
    else 
    {
        $_SESSION['status'] = "Faculty Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: faculty.php');  
    }
// }
// else
// {
//     $_SESSION['status'] = " Only JPG,JPEG and PNG image are allowed";
//     header('Location: faculty.php'); 
// }
}

// Code for delete faculty
if(isset($_POST['fac_delete_btn']))
{
    $id = $_POST['delete_id'];
    $del_facul_query = "SELECT * FROM faculty WHERE id='$id' ";
    $facul_query_run = mysqli_query($connection, $del_facul_query);
 
    foreach($facul_query_run as $fa_row)
    {
    // delete old image
        if($img_path = "upload/".$fa_row['images']){
            unlink($img_path);
        }

    $query = "DELETE FROM faculty WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: faculty.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: faculty.php'); 
    }    
}
}

// for registratiom of user and admin
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    $email_query = "SELECT * FROM register WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($password === $cpassword)
        {   
            
            $pass=md5($password);
            $query = "INSERT INTO register (username,email,mobile,password) VALUES ('$username','$email','$mobile','$pass')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: register.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}

// Code for update user
if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $mobile = $_POST['edit_mobile'];
    $password = $_POST['edit_password'];


    $query = "UPDATE register SET username='$username', email='$email', mobile='$mobile', password='$password' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }
}


// Code for delete user
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM register WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: register.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: register.php'); 
    }    
}


// Code for login user
if(isset($_POST['login_btn']))
{
    $email_login = $_POST['emaill']; 
    $password_login = $_POST['passwordd']; 
    $pass=md5($password_login);

    $query = "SELECT * FROM register WHERE email='$email_login' AND password='$pass' LIMIT 1";
    $query_run = mysqli_query($connection, $query);

   if(mysqli_fetch_array($query_run))
   {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
   } 
   else
   {
    $_SESSION['status'] = "Invalid Cradential";
    $_SESSION['status_code'] = "error";
    header('Location: login.php');

   }  
}


// CODE FOR TOPPER ADD
if(isset($_POST['save_topper']))
{
    $name = $_POST['t_name'];
    $board = $_POST['board'];
    $percent = $_POST['percent'];
    $images = $_FILES["t_image"]['name'];

    $img_types = array('image/jpg','image/png','image/jpeg');
    $validate_img_extension= in_array($_FILES["t_image"]['type'],$img_types);
    if($validate_img_extension)
    {

    if(file_exists("upload/".$_FILES["t_image"]['name']))
    {
    $store = $_FILES["t_image"]["name"];
    $_SESSION['status'] = "Image already exists. $store";
    header('Location: topper.php');   
    }
    else
    {
    $query = "INSERT INTO topper (`s_name`,`board`,`percent`,`images`) VALUES ('$name','$board','$percent','$images')";
    $query_run = mysqli_query($connection, $query);
 

    if($query_run)
    {
        move_uploaded_file($_FILES["t_image"]["tmp_name"], "upload/".$_FILES["t_image"]['name']);
        $_SESSION['status'] = "Topper Details Added";
        $_SESSION['status_code'] = "success";
        header('Location: topper.php');
    }
    else 
    {
        $_SESSION['status'] = "Topper Details Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: topper.php');  
    }

    }
    }
    else
    {
        $_SESSION['status'] = " Only JPG,JPEG and PNG image are allowed";
        header('Location: topper.php'); 
    }   
}

// CODE FOR TOPPER EDIT
if(isset($_POST['topper_updatebtn']))
{
    $edit_id = $_POST['edit_id'];
    $edit_t_name = $_POST['edit_t_name'];
    $edit_board = $_POST['edit_board'];
    $edit_percent = $_POST['edit_percent'];
    $edit_images = $_FILES["edit_topper_image"]['name'];

    // $img_types = array('image/jpg','image/png','image/jpeg');
    // $validate_img_extension= in_array($_FILES["edit_topper_image"]['type'],$img_types);
    // if($validate_img_extension)
    // {

    $topper_query = "SELECT * FROM topper WHERE id='$edit_id' ";
    $topper_query_run = mysqli_query($connection, $topper_query);
    $image_data;
    foreach($topper_query_run as $fa_row)
    {
        if($edit_images == NULL){
            //update with existing images
            $image_data = $fa_row['images'];
            // echo($image_data);
        }
        else
        {
            //update with new image and delete old image
            if($img_path = "upload/".$fa_row['images']){
                unlink($img_path);
                $image_data=$edit_images;
            }
        }
    }

    $query = "UPDATE topper SET s_name='$edit_t_name', board='$edit_board', percent='$edit_percent', images ='$image_data' WHERE id='$edit_id'";
    $query_run = mysqli_query($connection, $query);
 

    if($query_run)
    {
        if($edit_images == NULL)
        {
            $_SESSION['status'] = "Topper updated with existing images";
            $_SESSION['status_code'] = "warning";
            header('Location: topper.php'); 
        }
        else
        {
        move_uploaded_file($_FILES["edit_topper_image"]["tmp_name"], "upload/".$_FILES["edit_topper_image"]['name']);
        $_SESSION['status'] = "Topper Updated";
        $_SESSION['status_code'] = "success";
        header('Location: topper.php');
        }
    }
    else 
    {
        $_SESSION['status'] = "Topper Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: topper.php');  
    }
// }
// else
// {
//     $_SESSION['status'] = " Only JPG,JPEG and PNG image are allowed";
//     $_SESSION['status_code'] = "warning";
//     header('Location: topper.php'); 
// }
}

// Code for delete topper
if(isset($_POST['topper_delete_btn']))
{
    $id = $_POST['delete_t_id'];
    $del_facul_query = "SELECT * FROM topper WHERE id='$id' ";
    $facul_query_run = mysqli_query($connection, $del_facul_query);
 
    foreach($facul_query_run as $fa_row)
    {
    // delete old image
        if($img_path = "upload/".$fa_row['images']){
            unlink($img_path);
        }

    $query = "DELETE FROM topper WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: topper.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: topper.php'); 
    }    
}
}


// Code for delete new Student
if(isset($_POST['delete_New_Std']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM newstudent WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: newStudent.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: newStudent.php'); 
    }    
}


// Code for delete Regitration Receipt
if(isset($_POST['delete_Receipt']))
{
    $stu_id = $_POST['del_stu_id'];
    $rec_id = $_POST['del_rec_id'];

    $query = "DELETE FROM transaction WHERE tr_id='$rec_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $query1="DELETE FROM `newstudent` WHERE id='$stu_id'";
        mysqli_query($connection, $query1);
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: transcation.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: transcation.php'); 
    }    
}

// Code for Add fee deteals
if(isset($_POST['addFeebtn']))
{
    $st_id = $_POST['st_id'];
    $st_name = $_POST['st_name'];
    $Std = $_POST['Std'];
    $medium = $_POST['medium'];
    $stream = $_POST['stream'];
    $t_fee = $_POST['t_fee'];
    $p_fee = $_POST['p_fee'];
    $r_fee = ($t_fee - $p_fee);
    
 
    
    $sql = "SELECT sid FROM fees WHERE sid ='".$_POST['st_id']."'  limit 1";
    $result= $connection->query($sql);
    if($result->num_rows ==1){
        $_SESSION['status'] = "You have Already Added Fees !";
        $_SESSION['status_code'] = "info";
        header('Location: paidFees.php'); 
    }else{
    

        $query = "INSERT INTO `fees`(`sid`, `name`, `std`, `medium`, `total_fee`, `paid_fee`, `remain_fee`, `date`, `stream`) VALUES ('$st_id','$st_name','$Std','$medium','$t_fee','$p_fee','$r_fee',NOW(),'$stream')";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            $_SESSION['status'] = "Fee Added Successfully!";
            $_SESSION['status_code'] = "success";
            header('Location: paidFees.php'); 
        }
        else
        {
            $_SESSION['status'] = "Fee Not Added!";       
            $_SESSION['status_code'] = "error";
            header('Location: paidFees.php'); 
        }
    }    
}

//code for update fees details
if(isset($_POST['update_fee']))
{
    $s_id = $_POST['update_id'];
    $p_fee = $_POST['update_paid'];
    $r_fee = $_POST['update_remain'];
    $nr_fee = ($r_fee - $p_fee);
    $date=

    $query = "UPDATE fees SET paid_fee='$p_fee', remain_fee=' $nr_fee', date= NOW() WHERE sid='$s_id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: paidFees.php'); 
    }else{
        $_SESSION['status'] = "Fee Not Updated!";       
        $_SESSION['status_code'] = "error";
        header('Location: paidFees.php'); 
    }
}

// Code for delete The Receipt
if(isset($_POST['delReceipt']))
{
    $id = $_POST['delRece_id'];
    $sid = $_POST['s_id'];

    $query = "DELETE FROM fees WHERE f_id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $query1 = "DELETE FROM newstudent WHERE id='$sid' ";
        mysqli_query($connection, $query1);

        $query2 = "DELETE FROM transaction WHERE s_id='$sid' ";
        mysqli_query($connection, $query2);

        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: paidFees.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: paidFees.php'); 
    }    
}

//code for about us

if(isset($_POST['saveText']))
{
    $text = $_POST['text'];

    $query = "INSERT INTO about (text) VALUES ('$text')";
    $query_run = mysqli_query($connection, $query);
    
    if($query_run)
    {
        
        $_SESSION['status'] = "Txt Added";
        $_SESSION['status_code'] = "success";
        header('Location: about.php');
    }
    else 
    {
        $_SESSION['status'] = "Text Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: about.php');  
    }

}

// Code for delete About text
if(isset($_POST['del_txt_btn']))
{
    $id = $_POST['del_txt_id'];

    $query = "DELETE FROM about WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: about.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: about.php'); 
    }    
}

// CODE FOR ABOUT IMAGE ADD
if(isset($_POST['saveImg']))
{
 
    $images = $_FILES["about_image"]['name'];

    $img_types = array('image/jpg','image/png','image/jpeg');
    $validate_img_extension= in_array($_FILES["about_image"]['type'],$img_types);
    if($validate_img_extension)
    {

    if(file_exists("upload/".$_FILES["about_image"]['name']))
    {
    $store = $_FILES["about_image"]["name"];
    $_SESSION['status'] = "Image already exists. $store";
    header('Location: about.php');   
    }
    else
    {
    $query = "INSERT INTO aboutImg (`images`) VALUES ('$images')";
    $query_run = mysqli_query($connection, $query);
 

    if($query_run)
    {
        move_uploaded_file($_FILES["about_image"]["tmp_name"], "upload/".$_FILES["about_image"]['name']);
        $_SESSION['status'] = "About Image Added";
        $_SESSION['status_code'] = "success";
        header('Location: about.php');
    }
    else 
    {
        $_SESSION['status'] = "About Image Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: about.php');  
    }

    }
    }
    else
    {
        $_SESSION['status'] = " Only JPG,JPEG and PNG image are allowed";
        header('Location: about.php'); 
    }
    
}

// Code for delete about images
if(isset($_POST['del_img_btn']))
{
    $id = $_POST['del_img_id'];
    $del_facul_query = "SELECT * FROM aboutimg WHERE id='$id' ";
    $facul_query_run = mysqli_query($connection, $del_facul_query);
 
    foreach($facul_query_run as $fa_row)
    {
    // delete old image
        if($img_path = "upload/".$fa_row['images']){
            unlink($img_path);
        }

    $query = "DELETE FROM aboutimg WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: about.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: about.php'); 
    }    
}
}

//code for update about text details
if(isset($_POST['update_text_btn']))
{
    $id = $_POST['update_text_id'];
    $newTxt = $_POST['updated_text'];


    $query = "UPDATE about SET text='$newTxt' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: about.php'); 
    }else{
        $_SESSION['status'] = "Text Not Updated!";       
        $_SESSION['status_code'] = "error";
        header('Location: about.php'); 
    }
}

// CODE FOR FACULTY EDIT
if(isset($_POST['update_img_btn']))
{
    $img_id = $_POST['update_img_id'];
    $update_img = $_FILES["update_about_img"]['name'];



    $about_query = "SELECT * FROM aboutimg WHERE id='$img_id' ";
    $about_query_run = mysqli_query($connection, $about_query);
    $img_data='';
    foreach($about_query_run as $ab_row)
    {
       //update with new image and delete old image
            if($img_path = "upload/".$ab_row['images']){
                unlink($img_path);
                $img_data=$update_img;
            }
    }

    $query = "UPDATE aboutimg SET images ='$img_data' WHERE id='$img_id'";
    $query_run = mysqli_query($connection, $query);
 

    if($query_run)
    {
        move_uploaded_file($_FILES["update_about_img"]["tmp_name"], "upload/".$_FILES["update_about_img"]['name']);
        $_SESSION['status'] = "About Image Updated";
        $_SESSION['status_code'] = "success";
        header('Location: about.php');
    }
    else 
    {
        $_SESSION['status'] = "About Image Not Updated";
        $_SESSION['status_code'] = "error";
        header('Location: about.php');  
    }
}
?>
