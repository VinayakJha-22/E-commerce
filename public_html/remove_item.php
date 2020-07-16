<?php include "db.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if(isset($_GET['source'])){
    
    $cart_id = $_GET['source'];
    $query = "DELETE FROM cart WHERE cart_id = $cart_id ";
    $remove_item_query = mysqli_query($connection,$query);
    if(!$remove_item_query){
        die("Query failed".mysql_error($connection));
    }else{
        echo "<script>window.location.href='cart.php'</script>";
    }
    
}
?>