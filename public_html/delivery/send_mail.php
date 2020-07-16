<?php


    
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_GET['email'])){
   
    $email = $_GET['email'];
    $status = $_GET['order'];
    $order_id = $_GET['order_id'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
                                                                // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.privateemail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = 'ssl';       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       =  465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@turnfewpages.com', 'Turnfewpages'); 
    $mail->addAddress($email);
    $mail->addReplyTo('info@turnfewpages.com', 'Information');// Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Order Delivered';
    $mail->Body    = 'Congrats! Finally the package is in your hands, We hope you enjoy the book as much as we enjoy your company with Turnfewpages.com. Happy reading! Your renting period will start from tomorrow.';
    $mail->AltBody = 'Congrats! Finally the package is in your hands, We hope you enjoy the book as much as we enjoy your company with Turnfewpages.com. Happy reading! Your renting period will start from tomorrow.';

    $mail->send();
     echo "<script>window.location.href='orders.php'</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
				
				    
				
			
   
			
}
?>
