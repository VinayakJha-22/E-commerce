<?php


    
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $email = $_GET['email'];
    $book = $_GET['book'];
    


// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
                                                                // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.privateemail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@turnfewpages.com';                     // SMTP username
    $mail->Password   = 'v7503604816';                               // SMTP password
    $mail->SMTPSecure = 'ssl';       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       =  465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('admin@turnfewpages.com', 'Administration');
    $mail->addAddress('vinayakjha22@gmail.com'); 
    $mail->addAddress($email);
    $mail->addReplyTo('info@turnfewpages.com', 'Information');// Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Order Placed';
    $mail->Body    = 'Thank you for placing order with us. You can track your order in My order menu on our website <a href="https://turnfewpages.com"> Click here ! </a>';
    $mail->AltBody = 'Thank you for placing order with us. You can track your order in My order menu on our website';

    $mail->send();
     echo "<script>window.location.href='change_status.php?order_id=$order_id&book=$book'</script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
				
				    
				
			
   
			
}


?>
			