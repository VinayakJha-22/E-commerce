<?php


    
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_GET['user']) && isset($_GET['pass'])){
    $user = $_GET['user'];
    $pass = $_GET['pass'];

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
    $mail->setFrom('admin@turnfewpages.com', 'Administration'); 
    $mail->addAddress($user);
    $mail->addReplyTo('info@turnfewpages.com', 'Information');// Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Welcome to Turnfewpages.com';
    $mail->Body    = 'Welcome to Turnfewpages.com the only online library with new bestsellers added everyweek. Check our website and find your choice of reading. <a href="https://turnfewpages.com"> Click here ! </a>';
    $mail->AltBody = 'Welcome to Turnfewpages.com the only online library with new bestsellers added everyweek. Check our website and find your choice of reading. Go to turnfewpages.com';

    $mail->send();
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo "<script>window.location.href='login.php?user=$user&pass=$pass&id=$id'</script>";
    }else{
     echo "<script>window.location.href='login.php?user=$user&pass=$pass'</script>";
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
				
				    
				
			
   
			
}
?>
