<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php

if(isset($_SESSION['email'])){
    
    $email = $_SESSION['email'];
    
    $query = "SELECT * FROM temp_order WHERE email = '{$email}'";
    $result = mysqli_query($connection,$query);
    
    if(mysqli_num_rows($result) > 0){
        
        $query2 = "DELETE FROM temp_order WHERE email = '{$email}'";
        $result2 = mysqli_query($connection,$query2);
        echo "<script>window.location.href='add_address.php'</script>";
        
        
    }else{
        echo "<script>window.location.href='add_address.php'</script>";
    }
    
}

?>
<?php include "includes/footer.php"; ?>