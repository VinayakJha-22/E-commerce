<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php
if(isset($_GET['id'])){
    $book_id = $_GET['id'];
    
    $query = "SELECT * FROM book WHERE book_id = $book_id ";
    $select_book_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($select_book_query)){
        $book_name = $row['book_name'];
        $book_author = $row['book_author'];
        $availability = $row['book_available'];
        $no_of_books = $row['book_no'];
        $delivery = $row['book_delivery'];
        $price = $row['book_price'];
        $image1 = $row['book_image1'];
        $image2 = $row['book_image2'];
        $image3 = $row['book_image3'];
        $book_pages = $row['book_pages'];
        $description = $row['description'];
    }
}
?>
<?php   
    $msg_added = "";
    if(isset($_POST['add_to_cart'])){
        
        $duration = $_POST['duration'];
        
       if(isset($_SESSION['id'])){
        $user_id = $_SESSION['id'];
        $email = $_SESSION['email'];
        $id = $_GET['id'];
        $qry = "SELECT * FROM book WHERE book_id = $id ";
        $select_query = (mysqli_query($connection,$qry));
        while($row = mysqli_fetch_array($select_query)){
            $name = $row['book_name'];
            $price = $row['book_price'];
            $image = $row['book_image1'];
        }
        $qry2 = "SELECT * FROM cart WHERE user_id = $user_id ";
        $result = mysqli_query($connection,$qry2);   
        if(mysqli_num_rows($result) == 1){
        $msg_added = '<div class="alert alert-warning" role="alert">As per our library rules you cannot order more than 1 book at a time.</div>';  
        }else{
           
          $qry1 = "INSERT INTO cart (user_id, email, image, book_name, book_price, book_pages, book_author, duration, book_id) ";
        $qry1 .= "VALUES ($user_id, '{$email}', '{$image}', '{$name}', $price, '{$book_pages}', '{$book_author}', '{$duration}', $book_id)";
        $add_to_cart = mysqli_query($connection,$qry1);
           if(!$add_to_cart){
               die("QUERY FAILED".mysqli_error($connection));
           }else{  
               echo "<script>window.location.href='cart.php'</script>";
             $msg_added = '<div class="alert alert-success" role="alert">Item added to Cart</div>';
           }
            }
           
    }else{
           header("Location: login.php?id=$book_id");
       }
    }
?> 
<div class="block">
</div>
<div class="details">
<div class="container">
    <div class="row app-align-center">
       <div class="col-xl-8">
        <h3><strong class="white">Book name: </strong><?php echo $book_name; ?></h3>
        <h3><strong class="white">Author: </strong><?php echo $book_author; ?></h3>
        </div>
    </div>
</div>
</div>
<div class="product">
    <div class="container">
        <div class="row app-align-center">
            <div class="col-xl-6">
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="images/<?php echo $image1; ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/<?php echo $image2; ?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="images/<?php echo $image3; ?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
<?php 
if($no_of_books != 0){

?>
            </div>
            <div class="col-sm-6">
             <h2>Availability</h2>
             <h5 class="black"><?php echo $no_of_books; ?> book(s) <?php echo $availability; ?> Order Now!</h5>   
             <br>
             <h2>Price</h2>
             <h5 class="black">Rs <?php echo $price; ?>/day</h5>
             <h6>Pages: <?php echo $book_pages; ?></h6>
             <h2>Delivery</h2>
             <h5 class="black">On time <?php echo $delivery; ?> days delivery</h5>
             <h5 class="black">At your doorstep</h5> 
             <br>
             <form method="post">
                 <div class="form-group">
                 <input class="form-control" name="duration" min="7" type="number" value="7">
                 <short>Days</short>
                 </div>
                 <p class="black" style="font-size:12px;">Minimum days will be 7</p>
                <button class="button" type="submit" name="add_to_cart"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                </form>
<?php
}else{
?>
        </div>
            <div class="col-sm-6">
             <h2>Availability</h2>
             <h5 class="black"><?php echo $availability; ?> Coming Soon!</h5>   
             <br>
             <h2>Price</h2>
             <h5 class="black">Rs <?php echo $price; ?>/day</h5>
             <h6>Pages: <?php echo $book_pages; ?></h6>
             <h2>Delivery</h2>
             <h5 class="black">At your doorstep</h5> 
             <br>
             <form method="post">
                 <div class="form-group">
                 <input class="form-control" name="duration" min="7" type="number" value="7">
                 <short>Days</short>
                 </div>
                 <p class="black" style="font-size:12px;">Minimum days will be 7</p>
                <button class="button"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                </form>
<?php
}
?>
             
             
                <?php echo $msg_added; ?>
            </div>
        </div>
    </div>
</div>
<div class="details">
<div class="container">
<h1>Description</h1>
<p style="font-size:20px;"><?php echo $description; ?></p>
</div>
</div>

<?php include "includes/footer.php"; ?>