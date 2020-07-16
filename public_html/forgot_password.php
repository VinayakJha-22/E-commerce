<?php use PHPMailer\PHPMailer\PHPMailer; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$message = "";
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    
    $query = "SELECT * FROM users WHERE user_email = '{$email}'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) == 1){
        
        while($row = mysqli_fetch_array($result)){
            $token = $row['token'];
        }
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


try {
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.privateemail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@turnfewpages.com';                     // SMTP username
    $mail->Password   = 'v7503604816';                               // SMTP password
    $mail->SMTPSecure = 'ssl';       // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       =  465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above


    //Recipients
    $mail->setFrom('admin@turnfewpages.com', 'Administration');
    $mail->addAddress($email);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Set Password';
    $mail->Body    = 'Change your password Copy this url "https://turnfewpages.com/reset_password.php?email='.$email.'&token='.$token.'" or <a href= "https://turnfewpages.com/reset_password.php?email='.$email.'&token='.$token.'"> Click here<a>';
    $mail->AltBody = "if you don't see the link write us at info@turnfewpages.com" ;

    $mail->send();
    $message = '<div class="alert alert-success">Email has been sent, check spam folder also</div>';
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}
?>
<div class="forgot">
<div class="container">
<form method="post">
	<div class="row">
                
                 <div class="col-xl-6">
                   <br>
                   <br>
                   <br>
                   <br>
                    <h2><i class="fas fa-lock"></i> Forgot Password ?</h2>
                    <div id="error"><?php echo $message; ?></div>
                    
                     <div class="form-group">
                         <label for="email"><i class="fas fa-envelope"></i> Enter Your Email</label>
                         <input type="email" name="email" id="email" class="form-control">
                     </div>
                     <button class="btn btn-outline-warning" type="submit" name="submit">Get Email</button>
                 </div>
                 <div class="col-sm-6">
                     <?php include "svg1.php"; ?>
                 </div>
               </div>
            </form>
            </div>
          </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
     $("form").submit(function(e){
				var error = "";
         			
				if ($("#email").val() == ""){
                    e.preventDefault();
					error += "The Email Field is required<br>";
                }
				if(error != "") {
                    e.preventDefault();
						$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form :</strong><p>' + error + '</div>');
				}
     });
</script>
<?php include "includes/footer.php"; ?>