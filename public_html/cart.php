<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>


<?php
       if(isset($_SESSION['name'])){
           $id = $_SESSION['id'];
           $name = $_SESSION['name'];
           $email = $_SESSION['email'];
           $phone = $_SESSION['phone'];
           
           ?>
<div class="cart">
 <div class="container">
    <div class="col-xl-12 patch4">
      <h5>Name   : <?php echo $name; ?></h5>
      <h5>User Id: <?php echo $id;?></h5>
      <h5>User Email: <?php echo $email;?></h5>
      <h5>User Phone: <?php echo $phone;?></h5>
    </div>
    
<?php
           
           $query = "SELECT * FROM cart WHERE user_id = $id ";
           $select_book = mysqli_query($connection,$query);
           while($row = mysqli_fetch_array($select_book)){
               
               $cart_id = $row['cart_id'];
               $book_name = $row['book_name'];
               $book_page = $row['book_pages'];
               $book_author = $row['book_author'];
               $book_price = $row['book_price'];
               $duration = $row['duration'];
               $image = $row['image'];
?>               

   <div class="row app-align-center">
    <div class="col-xl-8 patch5">
       <a style="margin:20px;" class="black" href="remove_item.php?source=<?php echo $cart_id;?>">Remove Item</a>
        <img style="width:30%;" src="images/<?php echo $image; ?>" alt="">
       <h4>Book  : <?php echo $book_name ?></h4> 
       <h4>Author: <?php echo $book_author?></h4> 
       <br>
       <h4>Pages : <?php echo $book_page?></h4>
       <h4>Price : Rs. <?php echo $book_price?>/day</h4>
    </div>
    <div class="col-sm-3 patch6">
       <h5>Item : <?php echo $book_name?></h5>
       <h5>Price : Rs. <?php echo $book_price?>/day</h5>
       <h5>Duration : <?php echo $duration?></h5>
       <br>
       <?php $amount = $book_price*$duration ;?>
       <h5>Amount: Rs. <?php echo $amount; ?>/-</h5>
    </div>
    </div>
<?php               
           }
       }
?>   
<button class="button" onclick="document.location='check.php'" type="submit">Checkout</button>
 </div>
</div>
<?php include "includes/footer.php"; ?>