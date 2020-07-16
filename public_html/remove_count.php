<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>

<?php
    
   if(isset($_GET['source_id'])){
                        
                        $id = $_GET['source_id'];
                        $n_query = "UPDATE user_notification SET status = 0 WHERE id = $id ";
                        $n_select_query = mysqli_query($connection,$n_query);
       
       echo "<script>window.location.href='order.php'</script>";
                    }
        
        
    
    
?>

<?php include "includes/footer.php" ?>