<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<div class="track">
       <div class="container">
        <div class="row app-align-center">
<?php 
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    
    $query = "SELECT * FROM placed_orders WHERE email = '{$email}' ORDER BY o_id DESC";
    $select_order_query = mysqli_query($connection, $query);
    
    $r = mysqli_num_rows($select_order_query);
    if($r == 0){
        echo '<div style="font-size:30px;text-align:center;" class="col-xl-12 alert alert-warning"><i class="far fa-sad-tear"></i> You have no orders</div>';
    }
    
    while($row = mysqli_fetch_array($select_order_query)){
            $order_id = $row['o_id'];
            $payment_id = $row['payment_id'];
            $books = $row['books'];
            $items = $row['items'];
            $price = $row['price'];
            $status = $row['order_status'];
            $order_id = "BK".$order_id."PLCD";

?>
    
            <div class="col-xl-4 patch8">
               <h6>Payment ID  : <?php echo $payment_id ;?></h6> 
               <h6>Item Price: Rs. <?php echo $price ;?>/-</h6>
               <h6>Item(s) : <?php echo $items ;?></h6> 
               <h6>Book(s) : <?php echo $books;?></h6> 
            </div>
            <div class="col-sm-8 patch8">
            <h5>Order ID : <?php echo $order_id ;?></h5>
            <?php
                if($status == "placed"){
?>      
           <div class="progress">
  <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 10%"></div>
</div>
         <br>
          <div class="alert alert-warning">* Your Order is placed !</div>
           <?php
                                          }
            ?>
            <?php
                if($status == "cancelled"){
?>      
           <div class="progress">
  <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
         <br>
          <div class="alert alert-danger">* Your Order is Cancelled !</div>
           <?php
                                          }
            ?>
<?php
                if($status == "confirmed"){
?>      
           <div class="progress">
  <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%"></div>
</div>
         <br>
          <div class="alert alert-warning">* Your Order is confirmed !</div>
           <?php
                                          }
            ?>
<?php
                if($status == "shipment is ready"){
?>      
           <div class="progress">
  <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
</div>
          <br>
           <div class="alert alert-warning">* Your Order is confirmed !</div>
           <div class="alert alert-warning">* Your shipment is ready  !</div>
           <?php
                                          }
            ?>
<?php
                if($status == "out for delivery"){
?>      
           <div class="progress">
  <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
</div>
          <br>
           <div class="alert alert-warning">* Your Order is confirmed !</div>
           <div class="alert alert-warning">* Your shipment is ready  !</div>
           <div class="alert alert-warning">* Your Order is out for delivery !</div>
           <?php
                                          }
            ?> 
<?php
                if($status == "delivered"){
?>      
           <div class="progress">
  <div class="progress-bar bg-success progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
         <br> 
          <div class="alert alert-warning">* Your Order is confirmed !</div>
           <div class="alert alert-warning">* Your shipment is ready  !</div>
           <div class="alert alert-warning">* Your Order is out for delivery !</div>
           <div class="alert alert-success">* Your Order is delivered !</div>
           <?php
                                          }
            ?>                                   
            </div>  
           
    <?php } 
}?>
 </div>
        </div>
    </div>
<?php include "includes/footer.php"; ?>