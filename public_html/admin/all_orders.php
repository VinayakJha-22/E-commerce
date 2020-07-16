<?php include "includes/header.php"?>

    

    <div class="user"> 
     <div class="container">
       <div class="row app-align-center">
           <table class="table table-tableboard table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Book</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>payment ID</th>
                                <th>Price</th>
                                <th>Delivery Address</th>
                            </tr>
                        </thead>
                    <tbody> 
      
<?php
 if(isset($_SESSION['email'])){
        $query = "SELECT * FROM placed_orders ORDER BY o_id DESC";
        $select_order = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_order)){
            
            $o_id = $row['o_id'];
            $books = $row['books'];
            $name = $row['name'];
            $phone = $row['phone'];
            $payment_id=$row['payment_id'];
            $price = $row['price'];
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
        echo "</tr>";
   
        }
 }
?>
               </tbody>
           </table>
               
    </div>  
     </div>
    </div> 

   <?php include "includes/footer.php" ?>