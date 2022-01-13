<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submitMail'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sahuharikesh1@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Sahu@12345'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('sahuharikesh1@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('sahuharikesh0@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'You have received an email from Education1st !';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Subject: $subject <br>Message : $message</h3>";

    $mail->send();
  
            $_SESSION['Cont_status'] = "Thank you for contacting us.";
            $_SESSION['Cont_status_code'] = "success";
            header('Location: ../index.php');
  } catch (Exception $e){
            $_SESSION['Cont_status'] = "Message not Sent! ";
            $_SESSION['Cont_status_code'] = "error";
            header('Location: ../index.php');
  }
}
?>
