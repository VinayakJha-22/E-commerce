<?php include "header.php"?>

    

    <div class="user"> 
     <div class="container">
       <div class="row app-align-center">
           <table class="table table-tableboard table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Book Name(s)</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Payment ID</th>
                                <th>Price</th>
                                <th>Delivery Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    <tbody> 
      
<?php
 if(isset($_SESSION['email'])){
        $query = "SELECT * FROM placed_orders WHERE order_status = 'shipment is ready' OR order_status = 'out for delivery' ORDER BY o_id DESC";
        $select_order = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_order)){
            
            $o_id = $row['o_id'];
            $books = $row['books'];
            $name = $row['name'];
            $phone = $row['phone'];
            $payment_id=$row['payment_id'];
            $price=$row['price'];
            $address = $row['address'];
            $status = $row['order_status'];
            $order_id = "BK".$o_id."PLCD";
             
        echo "<tr>";
        echo "<td>$order_id</td>";
        echo "<td>$books</td>";
        echo "<td>$name</td>";
        echo "<td>$phone</td>";
        echo "<td>$payment_id</td>";
        echo "<td>$price</td>";
        echo "<td>$address</td>";
        if($status == 'shipment is ready'){
        echo "<td><a href='out_for_delivery.php?id=$o_id'>$status</a></td>";
        }
        if($status == 'out for delivery'){
            echo "<td><a href='delivered.php?id=$o_id'>$status</a></td>";    
        }
        echo "</tr>";
   
        }
 }
?>
               </tbody>
           </table>
               
    </div>  
     </div>
    </div> 

   <?php include "footer.php" ?>