<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>

                      <div class="success">
                         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Precaution in this corona pandemic.</h4>
            </div>
            <div class="modal-body">
              <h5>For your own safety!</h5>
               <p>* Don't use your saliva to turn pages.</p> 
               <p>* Wash your hands before and after the use of books.</p> 
               <p>* Take care of the book as it's your own.</p> 
               <p>* You will be given 48 hours relaxation on return of books </p> 
               <p>* For property damage the fine is equal to the amount of book you ordered. </p> 
            </div>
        <div class="modal-footer">

        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
        </div>
    </div>
</div>
                          <div class="container">
                               <table class="table table-tableboard table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Payment ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Items</th>
                                <th>Books</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                    <tbody> 



<?php

    if(isset($_GET['order_id'])){
        
        $order_id = $_GET['order_id'];
        
    if(isset($_SESSION['id'])){
       $email = $_SESSION['email']; 
    $query = "DELETE FROM temp_order WHERE email = '$email'";
    $delete_temp_query = mysqli_query($connection,$query);
         if(!$delete_temp_query){
            die("QUERY FAILED".mysqli_error($connection));
        }
        
    $query2 = "DELETE FROM cart WHERE email = '$email'";
    $delete_cart_query = mysqli_query($connection,$query2);
         if(!$delete_cart_query){
            die("QUERY FAILED".mysqli_error($connection));
        }
        
    $query3 = "SELECT * FROM placed_orders WHERE order_id = '$order_id' ";
    $select_order_query = mysqli_query($connection,$query3);
        if(!$select_order_query){
            die("QUERY FAILED".mysqli_error($connection));
        }
        while($row = mysqli_fetch_array($select_order_query)){
            
            $order_id = $row['o_id'];
            $payment_id = $row['payment_id'];
            $email = $row['email'];
            $phone = $row['phone'];
            $items = $row['items'];
            $books = $row['books'];
            $price = $row['price'];
            $date = $row['delivery_date'];
            $order_id = "BK".$order_id."PLCD";

           
                   
                                  
        echo "<tr>";
        echo "<td>$order_id</td>";
        echo "<td>$payment_id</td>";
        echo "<td>$email</td>";
        echo "<td>$phone</td>";
        echo "<td>$items</td>";
        echo "<td>$books</td>";
        echo "<td>Rs. $price/-</td>";
        echo "<td>$date</td>";
        echo "</tr>";
                              
                                        
            
        }
     
        
    }
        
        
    }
?>
</tbody>
                        </table>
                        <br>
                        <div style="float: left;">
                         <img style="width:30%;" src="images/payment.gif" alt="">
                         <h1>Order Successfully Placed</h1>
                         <button onclick="document.location='order.php'" class="button">Track Order</button>
                         </div>
                          </div>
                      </div>
                      
<?php include "includes/footer.php" ?>