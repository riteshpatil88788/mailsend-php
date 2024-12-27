<?php
// echo "bbbbb"; 

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\SMTP; 

use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/PHPMailer.php";

require "PHPMailer/src/SMTP.php";

require "PHPMailer/src/Exception.php";
// echo "aaaaaa"; die();
session_start();
            // print_r($_POST);exit();
            
            ///////////////// 12/04/2023 ///////////////////
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $sub = $_POST['message'];

            
            
$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->Host = 'mail.amcomprotech.com';
 
$mail->SMTPAuth = true;

$mail->Username = 'info@amcomprotech.com';

$mail->Password = 'Amcompro%448';

$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

$mail->Port = 465;


// email setting

$mail->setFrom('info@amcomprotech.com');

$mail->addAddress('info@amcomprotech.com');


$message= 'Dear:'. $name ."<br>".'Email:'. $email ."<br>".'Phone:'.$phone."<br>".'Message:'.$sub ;


//Content

$mail->isHTML(true);

$mail->Subject = 'Contact';

$mail->Body = $message;

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
if($captcha == $_SESSION['CODE']){

     try {
         $result = $mail->send();
         if($result) {   
                echo "success";  
            } else {
                 echo "Error";
            }
}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
    
    
            
            
}


        ?>