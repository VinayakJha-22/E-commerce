<?php include "includes/header.php"?>


<?php 
if(isset($_SESSION['email'])){
   echo "<script>window.location.href='orders.php'</script>"; 
}else{

$error = "";
if(isset($_POST['login'])){
    
$email = $_POST['email'];
$password = $_POST['password'];
    
    
$email = mysqli_real_escape_string($connection,$email);
$password = mysqli_real_escape_string($connection,$password);
    
    
 if(!empty($email) || !empty($password)){
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
         $error = '<div class="alert alert-danger" role="alert">Enter valid Email !</div>'; 
    }else{
    
$query = "SELECT * FROM admin WHERE admin_email = '{$email}' ";
$select_user_query = mysqli_query($connection,$query);
if(!$select_user_query){
    die("QUERY FAILED". mysqli_error($connection));
}

    while($row = mysqli_fetch_assoc($select_user_query)){
       $db_id = $row['admin_id'];
       $db_name = $row['admin_name'];
       $db_email = $row['admin_email'];
       $db_password = $row['admin_password'];
       
    }
    
//    $password = crypt($password, $db_password);
    
    if(password_verify($password,$db_password) ){
        $_SESSION['id'] = $db_id;
        $_SESSION['email'] = $db_email;
        $_SESSION['name'] = $db_name;

        echo "<script>window.location.href='orders.php'</script>";
        
        
    }else{
       $error = '<div class="alert alert-danger" role="alert">Wrong Password, Try again !</div>';
    }
    }
    
}else{
     $error = '<div class="alert alert-danger" role="alert">Feilds cannot be empty !</div>';
    }
    }
}
?>

<div class="login">
    <div class="container">
        <div class="row all-alogn-center">
            <div class="col-xl-6">
       <h2>Login</h2>
       <br>
       <div id="error"><?php echo $error; ?></div>
       <form method="post">
  <div class="form-group">
    <label class="black">Email address</label>
    <input id="email" name="email" type="email" class="form-control" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label class="black">Password</label>
    <input id="password" name="password" type="password" class="form-control" placeholder="Password">
  </div>

  <button name="login" type="submit" class="btn btn-warning">Login</button>
      </form>
    <br>
            </div>
        </div>
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
                if ($("#password").val() == ""){
                    e.preventDefault();
					error += "The Password Field is required<br>";
				}
				if(error != "") {
                    e.preventDefault();
						$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form :</strong><p>' + error + '</div>');
				}
               
     });
</script>
<?php include "includes/footer.php"; ?>