<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php    
$book_name = "";
$date = date('Y-m-d');
$mod_date = strtotime($date."+ 2 days");
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
    $user_email = $_SESSION['email'];
    $user_name = $_SESSION['name'];
    $user_phone = $_SESSION['phone'];
?>
<div class="cart">
    <div class="container">
       <h2 class="black">Checkout Details :</h2>
        <div class="row app-align-center">
            <div class="col-xl-8 patch4">
                <h3>Your Details</h3>
                <br>
                <h4>Name : <?php echo $user_name; ?></h4>
                <h4>Phone: <?php echo $user_phone; ?></h4>
                <h4>Email: <?php echo $user_email; ?></h4>
                <br>
                
            
<?php
    $count = 0;
    $price = 0;
    $query = "SELECT * FROM cart WHERE user_id = $user_id ";
    $select_cart_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($select_cart_query)){
        $cart_id = $row['cart_id'];
        $cart_image = $row['image'];
        $cart_item = $row['book_name'];
        $cart_price = $row['book_price'];
        $cart_duration = $row['duration'];
        $book_image = $row['image'];
        $amount = $cart_price * $cart_duration;
        $count = $count+1;
        $price = $price + $amount;
        $house = $row['house'];
        $locality = $row['locality'];
        $city = $row['city'];
        $pincode = $row['pincode'];
        $book_id = $row['book_id'];
        $book_name = $book_name."".$row['book_name'];
        
?>
            <div class="patch7">
            <img style="width:20%;" src="images/<?php echo $book_image; ?>">
            <h5>Item no. <?php echo $count; ?> : <?php echo $cart_item; ?></h5>
            <h5>Price: Rs.<?php echo $cart_price; ?>/day</h5>   
            <h5>Duration: <?php echo $cart_duration; ?>days</h5>
            <br>   
            <h5>Amount  : Rs.<?php echo $amount; ?></h5> 
            </div>
<?php    
            
    }            

?>         
              <?php
    if($count != 0){
    ?>         
               <br>
               <h4>Delivery address:</h4>
                <br>
                <h5>House no: <?php echo $house?></h5>
                <h5>Locality: <?php echo $locality?></h5>
                <h5>Pincode : <?php echo  $pincode?></h5>
                <h5>City: <?php echo $city?></h5>  
           
        <?php 
        $address = $house." ".$locality." ".$city." ".$pincode;
    }?>
       </div>
       <?php
        if($count == 0){
       ?>
           <div class="col-sm-4 patch6">
            <div class="alert alert-warning"><h4><i class="far fa-frown"></i> Your cart is empty !</h4></div>  
            </div>   
<?php
            
    }else{ 
            ?>           
                   
            <div class="col-sm-4 patch6">
            <h5>No. of items : <?php echo $count;?></h5>  
            <h5>Date of delivery : <?php echo date("Y-m-d",$mod_date) ?>  </h5>
            <br>  
            <h4>Total Amount : Rs.<?php echo $price; ?></h4>
            <form method="post"> 
            <button type="submit" name="order" class="button1" >Place order</button>  
           </form>
            </div>

            <?php
            
            
            if(isset($_POST['order'])){
                
                $price = $price*100;
                
               $qry = "INSERT INTO temp_order (items, amount, name, phone, email, books, address, book_id, order_days) ";
               $qry .= "VALUES ($count, $price, '{$user_name}', $user_phone, '{$user_email}', '{$book_name}', '{$address}', $book_id, $cart_duration )";
                $add_temp_qry = mysqli_query($connection,$qry);
                if(!$add_temp_qry){
                    die("QUERY FAILED".mysqli_error($connection));
                }else{
                    echo "<script>window.location.href='if_available.php?book=$book_id'</script>";
            }
            }
         }
}
    ?>
        </div>
   
    </div>
</div>



<?php include "includes/footer.php"; ?>