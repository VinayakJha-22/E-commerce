<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php
$message="";
if(isset($_GET['email']) && isset($_GET['token'])) {
    $email = $_GET['email'];
    $token = $_GET['token'];

$query = "SELECT * FROM users WHERE user_email = '{$email}' AND token = $token ";
$result = mysqli_query($connection,$query);
if($result){
    if(isset($_POST['submit'])){
    
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
if( !empty($password) &&!empty($confirm_password) && $password == $confirm_password){        
$password = mysqli_real_escape_string($connection, $password);
$confirm_password = mysqli_real_escape_string($connection, $confirm_password);
$tokn = rand(100000,999999);
        
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));   
        
   $query1 = "UPDATE users SET user_password = '{$password}', token = $tokn";
   $result1 = mysqli_query($connection,$query1);
    if(!$result1){
        die("Query Failed".mysqli_error($connection));
    }else{
        echo "<script>window.location.href='login.php'</script>";
    }
       
    }else{
    $message = '<div class = "alert alert-danger">Something wrong with the password!<div>';
}
}
}else{
    $message = '<div class = "alert alert-danger">Invalid request!<div>';
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
                    <h2><i class="fas fa-lock"></i> Reset Password </h2>
                    <div id="error"><?php echo $message; ?></div>
                    <div class="form-group">
                         <label for="password"><i class="fas fa-key"></i> Password </label>
                         <input type="password" name="password" id="password" class="form-control">
                     </div>
                     <div class="form-group">
                         <label for="password2"><i class="fas fa-key"></i> Confirm Password </label>
                         <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                     </div>
                     <button class="btn btn-outline-warning" type="submit" name="submit">Reset Password</button>
                 </div>
                 <div class="col-sm-6">
                     <?php include "svg1.php"; ?>
                 </div>
               </div>
            </form>
            </div>
          </div>

<?php include "includes/footer.php"; ?>