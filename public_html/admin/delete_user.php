<?php include "db.php"; ?>
<?php
if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    
    $query = "DELETE FROM users WHERE user_id = $user_id ";
    $delete_user = mysqli_query($connection,$query);
    echo "<script>window.location.href='user.php'</script>";
}

?> 