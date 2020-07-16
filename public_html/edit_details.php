<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php
  $mesage = "";
  $message = "";
 if(isset($_SESSION['id'])){
    
     $id = $_SESSION['id'];
     
     
     $query1 = "SELECT * FROM users WHERE user_id = $id";
     $select_add_query = mysqli_query($connection,$query1);
     if(!$select_add_query){
                die("Query Failed".mysqli_error($connection));
            }
     while($row = mysqli_fetch_array($select_add_query)){
         $h = $row['user_house'];
         $l = $row['user_locality'];
         $c = $row['user_city'];
         $p = $row['user_pincode'];
         $db_password = $row['user_password'];
         $email = $row['user_email'];
         $name = $row['user_name'];
         $phone = $row['user_phone'];
     }
      if(isset($_POST['edit'])){
            
        $house = $_POST['house'];   
        $locality = $_POST['locality'];   
        $pincode = $_POST['pincode'];   
        $city = $_POST['city'];
        $user_email = $_POST['email'];
        $user_phone = $_POST['phone'];
        $password = $_POST['password'];  
        
          
        if(password_verify($password,$db_password) ){
            
            $house = mysqli_real_escape_string($connection, $house); 
            $locality = mysqli_real_escape_string($connection, $locality); 
            $pincode = mysqli_real_escape_string($connection, $pincode); 
            $city = mysqli_real_escape_string($connection, $city); 
            $user_email = mysqli_real_escape_string($connection, $user_email); 
            $password = mysqli_real_escape_string($connection, $password); 
            $user_phone = mysqli_real_escape_string($connection, $user_phone); 
            
        $query = "UPDATE users SET user_email='{$user_email}', user_phone='{$user_phone}', user_house ='{$house}', user_locality='{$locality}', user_city='{$city}', user_pincode=$pincode  ";
        $query .= "WHERE user_id = $id";
        $select_address_query = mysqli_query($connection,$query);
            if(!$select_address_query){
                die("Query Failed".mysqli_error($connection));
            }else{
                $message = '<div class="alert alert-success">Your profile was updated successfully ! Please refresh the page</div>';
            }
        }else{
            $mesage = '<div class="alert alert-danger">Enter password to update</div>';
        }
      }
 }
?>
<div class="edit">
    <div class="container">
            <form method="post">
        <div class="col-xl-8 patch4">
             <h2 style="color:#ffcc00;"><strong><?php echo $name; ?></strong></h2>
             <h5> Edit Your Details</h5>
              <div><?php echo $message; ?></div>
               <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" value="<?php echo $email;?>" placeholder="house/flat/plot no.">
                </div>
                <div class="form-group">
                    <label for="house">Mobile no.</label>
                    <input class="form-control" type="text" name="phone" value="<?php echo $phone;?>" placeholder="house/flat/plot no.">
                </div>
               <br>
               <h3>Your Address</h3>
               <br>
                <div class="form-group">
                    <label for="house">House no.</label>
                    <input class="form-control" type="text" name="house" value="<?php echo $h;?>" placeholder="house/flat/plot no.">
                </div>
                <div class="form-group">
                    <label for="locality">Locality</label>
                    <textarea class="form-control" name="locality" placeholder="block/colony/apartment/subcity/sector" rows="3"><?php echo $l ; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="pincode">Pincode</label>
                    <input class="form-control" value="<?php echo $p ?>" type="text" name="pincode">
                </div>
                <div class="form-group">
                  <label for="city">City</label>
                   <input class="form-control" name="city" value="<?php echo $c; ?>" type="text" list="cars" />
                    <datalist id="cars">
                      <option>New Delhi</option>
                      <option>Noida</option>
                      <option>Gurugram</option>
                    </datalist>
                </div>
                 <div class="form-group">
                    <label for="password">Password</label>
                    <div id="error"><?php echo $mesage; ?></div>
                    <p style="font-size:12px;">* Enter your password to update details</p>
                    <input class="form-control" id="password" type="password" name="password">
                </div>
                <br>
                <button name="edit" type="submit" class="button">Update</button>
        </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
     $("form").submit(function(e){
				var error = "";
         		if ($("#password").val() == ""){
                    e.preventDefault();
					error += "The Password Field is required<br>";
				}
				if(error != "") {
                    e.preventDefault();
						$("#error").html('<div class="alert alert-danger" role="alert">' + error + '</div>');
				}
               
     });
</script>
<?php include "includes/footer.php"; ?>