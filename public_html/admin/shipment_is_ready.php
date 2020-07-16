<?php include "includes/header.php"?>

<?php
           $message = '';
    if(isset($_GET['id'])){
        $o_id = $_GET['id'];
        $query = "SELECT * FROM placed_orders WHERE o_id = $o_id ";
        $select_status_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_array($select_status_query)){
            $status = $row['order_status'];
            $email = $row['email'];
            $name = $row['name']; 
            $order_id = "BK".$o_id."PLCD";
        }
        
    
           
?>
            
<div class="delivery">
<div class="container">
<div id="error"><?php echo $message; ?></div>
            <form method="post">
   <div class="col-xl-6">
    <div class="form-group">
     <h1><?php echo $order_id ?></h1>
      <label for="orderid">Order ID</label>
      <input class="form-control" value="<?php echo $o_id; ?>" name="order_id" type="number" id="order_id"> 
      <short>Enter only the number between the alphabets</short> 
    </div>
    </div>
    <div class="col-sm-6">
        <button name="shipment_is_ready" class="btn btn-warning">Shipment is ready</button>
    </div>
</form>
<?php
           
           if(isset($_POST['shipment_is_ready'])){
               $order_status = "shipment is ready";
               $query2 = "UPDATE placed_orders SET order_status = '{$order_status}' WHERE o_id = $o_id ";
               $update_status_query = mysqli_query($connection,$query2);
               
               echo "<script>window.location.href='orders.php'</script>";
               }
           }
    
   ?>


</div>
</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
     $("form").submit(function(e){
				var error = "";
         			
				if ($("#order_id").val() == ""){
                    e.preventDefault();
					error += "Order ID is required<br>";
                    
				}
                
				if(error != "") {
                    e.preventDefault();
						$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There is a error in your form :</strong><p>' + error + '</div>');
				}
               
     });
</script>
<?php include "includes/footer.php"; ?>
