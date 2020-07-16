<?php include "db.php" ?>
 <?php 

 if(isset($_GET['email'])){
        $email = $_GET['email'];
        $message = $_GET['message'];
        $order = $_GET['order'];
     
        $query = "INSERT INTO user_notification (order_id, email, message) ";
        $query .= "VALUES ('{$order}', '{$email}', '{$message}') ";
        $select_status_query = mysqli_query($connection, $query);
       echo "<script>window.location.href='orders.php'</script>";   
 }

?>