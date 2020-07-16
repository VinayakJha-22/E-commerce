<?php include "db.php" ?>
<?php
if(isset($_GET['id'])){
    $o_id = $_GET['id'];
    $email = $_GET['email'];
              $order_status = "returned";
               $query2 = "UPDATE placed_orders SET order_status = '{$order_status}' WHERE o_id = $o_id ";
               $update_status_query = mysqli_query($connection,$query2);
               
               echo "<script>window.location.href='send_return_mail.php?email=$email'</script>";
}
?>