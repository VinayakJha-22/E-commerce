<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>

<?php
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
     }
     
        if(isset($_POST['update'])){
            
        $house = $_POST['house'];   
        $locality = $_POST['locality'];   
        $pincode = $_POST['pincode'];   
        $city = $_POST['city']; 
        
        
            $house = mysqli_real_escape_string($connection, $house); 
            $locality = mysqli_real_escape_string($connection, $locality); 
            $pincode = mysqli_real_escape_string($connection, $pincode); 
            $city = mysqli_real_escape_string($connection, $city); 
            
        $query = "UPDATE users SET user_house ='{$house}', user_locality='{$locality}', user_city='{$city}', user_pincode=$pincode  ";
        $query .= "WHERE user_id = $id";
        $select_address_query = mysqli_query($connection,$query);
            if(!$select_address_query){
                die("Query Failed".mysqli_error($connection));
            }
            
            
        $query2 = "UPDATE cart SET house = '{$house}', locality = '{$locality}', city = '{$city}', pincode = $pincode ";
        $query2 .= "WHERE user_id = $id"; 
        $my_query = mysqli_query($connection,$query2);   
            if(!$my_query){
                die("Query Failed".mysqli_error($connection));
            }
            echo "<script>window.location.href='checkout.php'</script>";
        }
     
        if(isset($_POST['move'])){
        
        $house = $_POST['house'];   
        $locality = $_POST['locality'];   
        $pincode = $_POST['pincode'];   
        $city = $_POST['city'];    
        
            $house = mysqli_real_escape_string($connection, $house); 
            $locality = mysqli_real_escape_string($connection, $locality); 
            $pincode = mysqli_real_escape_string($connection, $pincode); 
            $city = mysqli_real_escape_string($connection, $city); 
        
            
        $query3 = "UPDATE cart SET house = '{$house}', locality = '{$locality}', city = '{$city}', pincode = $pincode ";
        $query3 .= "WHERE user_id = $id"; 
        $my_add_query = mysqli_query($connection,$query3); 
            if(!$my_add_query){
                die("Query Failed".mysqli_error($connection));
            }
            
            echo "<script>window.location.href='checkout.php'</script>";
        }
     
     
        
 }

?>

<div class="cart">
    <div class="container">
            <form method="post">
        <div class="col-xl-8 patch4">
           <h3>Add Your Address</h3>
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
                <br>
                <p class="yellow" style="font-size:12px;">* To save or update your address click save address and checkout!</p>
                <p class="yellow" style="font-size:12px;">* To deliver at different address fill the form and click move to checkout!</p>
                <button name="update" type="submit" class="button">Save address and checkout</button> <button name="move" type="submit" class="button1">Move to checkout</button>
        </div>
        </form>
    </div>
</div>
<?php include "includes/footer.php"; ?>