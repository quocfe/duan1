<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

  
class Sentmail  {
  public function sent ($user_mail, $user_fullname , $subject, $body) {
      $mail = new PHPMailer(true);
            try {
        $mail->SMTPDebug = 0;                     
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '47factory.qtv@gmail.com';                     
        $mail->Password   ='bwbxrestpkqpzqza';                               
        $mail->SMTPSecure = 'tls';            
        $mail->Port       = 587;                                  
        //Recipients
        $mail->setFrom('47factory.qtv@gmail.com', 'Admin 43 factory');
        $mail->addAddress($user_mail, $user_fullname);     

        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $success = 'Mật khẩu mới đã được gửi tới mail của bạn! Vui lòng kiểm tra mail';
        echo '<script> alert("'.$success.'") </script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
  }
}