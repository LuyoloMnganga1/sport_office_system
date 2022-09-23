<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$user_mail =$row['student_number']."mywsu.ac.za";
			
			try {
				//Server settings
				$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
				$mail->isSMTP();                                            //Send using SMTP
				$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
				$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				$mail->Username   = 'user@example.com';                     //SMTP username
				$mail->Password   = 'secret';                               //SMTP password
				$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			
				//Recipients
				$mail->setFrom('from@example.com', 'Mailer');
				$mail->addAddress($user_mail, 'Joe User');     //Add a recipient
				$mail->addAddress('ellen@example.com');               //Name is optional
				$mail->addReplyTo('info@example.com', 'Information');
				$mail->addCC('cc@example.com');
				$mail->addBCC('bcc@example.com');
			
				//Attachments
				// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
				// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
			
				//Content
				$mail->isHTML(true);                                  //Set email format to HTML
				$mail->Subject = 'Sport Indemnity Application Rejected';
				$mail->Body    = "Good day ".$row['full_name'].", \n Please be aware that you don't make it for trials of ".$row['sport_code'].".";
				$mail->AltBody = "Good day student, \n Please be aware that you don't make it for your sport code.";
			
				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
?>
