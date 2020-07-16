    <nav class="navbar fixed-top navbar-expand-lg" id="custom-nav">
     <a  class="navbar-brand font" href="index.php"><strong><?php include "svg.php" ?>TurnFewPages</strong></a>
     
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon hamburger">&#9776;</span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <div class="navbar-nav mr-auto">
    </div>
    <ul class="navbar-nav">
     <form action="search.php"  method="post" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning my-2 my-sm-0" name="submit" type="submit"><i class="fas fa-search"></i></button>
    </form>
       <li class="nav-item">
        <a class="nav-link" href="rent.php"><strong>LIBRARY</strong></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong><i class="fas fa-shopping-cart"></i></strong>
        </a>
        <div class="dropdown-menu box" aria-labelledby="navbarDropdown"> 
<?php 
    $count = 0;
    $c = 0;     
    if(isset($_SESSION['name'])){
    $email = $_SESSION['email'];
    $user_id = $_SESSION['id'];
    $queryy = "SELECT * FROM cart WHERE user_id = $user_id ";
    $select_cart_details = mysqli_query($connection,$queryy);
    while($row = mysqli_fetch_array($select_cart_details)){
        $img = $row['image'];
        $nm = $row['book_name'];
        $pr = $row['book_price'];
        $count = $count+1;
        
            ?>              
    <a class="dropdown-item" href="cart.php"><img style="width:30%;" src="images/<?php echo $img; ?>" alt=""><?php echo $nm; ?> <br>Rs <?php echo $pr;?>/day</a>
          <div class="dropdown-divider"></div>
          <?php
    } 

       if($count == 0){
           ?>
           <a><div class="alert alert-warning"><i class="far fa-frown"></i> Your cart is empty !</div></a>
           <?php
       }
}else{
         ?>
            <a class="dropdown-item " href="login.php"><div class="alert alert-warning" role="alert">You need to login to see cart</div></a>
         <?php
    }
        ?>
        </div>
      </li>
       <?php if(isset($_SESSION['name'])){
        $name = ($_SESSION['name']);
         $query = "SELECT * FROM user_notification WHERE email = '{$email}' AND status = 1";
                $user_notif_query = mysqli_query($connection,$query);
               $c = mysqli_num_rows($user_notif_query);
    
    ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong><i class="far fa-bell"></i><?php
    if($c != 0){
    ?>
    <span class="badge badgeilight" id="badge"><?php echo $c ; ?></span></strong>
    <?php
}
    ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <?php
                $query = "SELECT * FROM user_notification WHERE email = '{$email}' ORDER BY id DESC LIMIT 10";
                $user_notification_query = mysqli_query($connection,$query);
                if(!$user_notification_query){
                    die("QUERY FAILED". mysqli_error($connection));
                }else{
                    while($row = mysqli_fetch_array($user_notification_query)){
                    $not_id = $row['id'];    
                    $o_id = $row['order_id'];    
                    $cnt = $row['message'];
                    $dt = $row['date'];
                    $st = $row['status'];
                        
                    echo   "<a class='dropdown-item' href='remove_count.php?source_id=$not_id' style='font-size:12px;'>Order: $o_id<br>order $cnt $dt</a>";
                    echo   "<div class='dropdown-divider'></div>";
                            
                    }
                }
                
            
            
            
        ?>
        </div>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <strong><?php echo $name; ?></strong>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item " href="edit_details.php">Edit Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="order.php">My Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item " href="logout.php">Logout</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
<?php    }else{ ?>
        <button onclick="document.location = `login.php`" class="nav-link button"><strong>Login/Signup</strong></button>
<?php } ?>
      </ul>
  </div>
</nav>