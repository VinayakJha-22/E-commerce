<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php
$error = "";
if(isset ($_POST['signin'])){
    
$user_email = $_POST['user_email'];
$user_name = $_POST['user_name'];
$user_phone = $_POST['user_phone'];
$user_password = $_POST['user_password'];
$confirm_password = $_POST['confirm_password'];  
    
    $query = "SELECT * FROM users WHERE user_email = '$user_email' ";
    $result = mysqli_query($connection,$query);
    
    if(mysqli_num_rows($result) > 0){
        $error = '<div class="alert alert-danger" role="alert">Email already taken !</div>';  
    }
    elseif (filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL) === false) {
         $error =  '<div class="alert alert-danger" role="alert">Enter valid Email !</div>'; 
    }
    
    elseif(!empty($user_email) && !empty($user_name) && !empty($user_password) &&!empty($confirm_password)&& !empty($user_phone) && $user_password == $confirm_password){
$user_email = mysqli_real_escape_string($connection, $user_email);
$user_name = mysqli_real_escape_string($connection, $user_name);
$user_password = mysqli_real_escape_string($connection, $user_password);
$confirm_password = mysqli_real_escape_string($connection, $confirm_password);
$user_phone = mysqli_real_escape_string($connection, $user_phone);
$token = rand(100000,999999);
        
$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));      

$query = "INSERT INTO users (user_email, user_name, user_phone, user_password, token) ";
$query .= "VALUES('{$user_email}', '{$user_name}', '{$user_phone}', '{$user_password}', $token ) ";
$add_user_query = mysqli_query($connection,$query);

if(!$add_user_query){
die("QUERY FAILED". mysqli_error($connection));
}else{
    if(isset($_GET['id'])){
        $id = $_GET['id'];
echo "<script>window.location.href='welcome_mail.php?user=$user_email&pass=$user_password&id=$id'</script>";
    }else{
    
echo "<script>window.location.href='welcome_mail.php?user=$user_email&pass=$user_password'</script>";
}
}
    }elseif($user_password !== $confirm_password){
     $error =  '<div class="alert alert-danger" role="alert">Password do not match!</div>';   
    }

        else{
        $error =  '<div class="alert alert-danger" role="alert">Fields cannot be empty!</div>';
    }
}
?>

<div class="signup">
    <div class="container">
        <div class="row all-alogn-center">
            <div class="col-xl-6">
        <h1>New user ?</h1>
       <h2>Sign up</h2>
       <br>
        <div id="error"><?php echo $error; ?></div>
       <form method="post">
  <div class="form-group">
    <label for="email" class="black">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="user_email">
    <small id="emailHelp" class="form-text black">We'll never share your email with anyone else.</small>
  </div>
   <div class="form-group">
    <label for="name" class="black">Your Name</label>
    <input id="name" type="name" class="form-control" name="user_name">
  </div>
  <div class="form-group">
    <label for="name" class="black">Phone number</label>
    <input id="number" type="name" class="form-control" name="user_phone" maxlength="10">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="black">Password</label>
    <input id="user_password" type="password" class="form-control" name="user_password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="black">Confirm Password</label>
    <input type="password" class="form-control" name="confirm_password" placeholder="Password" id="confirm_password">
    <div id="message"></div>
  </div>
  <button type="submit" class="button" name="signin">Sign in</button>
</form>
    <br>
     <h4>Already a user<a href="login.php" class="black"> Log In</a></h4>
            </div>
            <div class="col-sm-6">
                <?php include "svg1.php" ?>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
$('#user_password, #confirm_password').on('keyup', function () {
  if ($('#user_password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
});
     $("form").submit(function(e){
				
				
				
				var error = "";
         			
				if ($("#email").val() == ""){
                    e.preventDefault();
					error += "The Email Field is required<br>";
				}
				if ($("#name").val() == ""){
                    e.preventDefault();
					error += "The Subject Field is required<br>";
				}
				if ($("#number").val() == ""){
                    e.preventDefault();
					error += "The Phone Field is required<br>";
				}
                if ($("#user_password").val() == ""){
                    e.preventDefault();
					error += "The Password Field is required<br>";
				}
                if ($("#confirm_password").val() == ""){
                    e.preventDefault();
					error += "The Confirm Password Field is required<br>";
				}
				if(error != "") {
                    e.preventDefault();
						$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form :</strong><p>' + error + '</div>');
				}
     });

</script>

<?php include "includes/footer.php"; ?>