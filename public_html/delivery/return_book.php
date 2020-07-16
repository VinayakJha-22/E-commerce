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
                                <th>Return date(Y-M-D)</th>
                                <th>Delivery Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    <tbody> 
      
<?php
 if(isset($_SESSION['email'])){
        $query = "SELECT * FROM placed_orders WHERE order_status = 'delivered' ORDER BY o_id DESC";
        $select_order = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_order)){
            
            $o_id = $row['o_id'];
            $books = $row['books'];
            $name = $row['name'];
            $phone = $row['phone'];
            $payment_id=$row['payment_id'];
            $email = $row['email'];
            $price=$row['price'];
            $address = $row['address'];
            $status = $row['order_status'];
            $return_date = $row['return_date'];
            $order_id = "BK".$o_id."PLCD";
             
        echo "<tr>";
        echo "<td>$order_id</td>";
        echo "<td>$books</td>";
        echo "<td>$name</td>";
        echo "<td>$phone</td>";
        echo "<td>$return_date</td>";
        echo "<td>$address</td>";
        echo "<td><a href='return.php?id=$o_id&email=$email'>Return</a></td>";
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