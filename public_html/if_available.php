<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>
<?php
    if(isset($_GET['book'])){
        $book = $_GET['book'];
    
    $query = "SELECT * FROM book WHERE book_id = $book";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("Query failed".mysqli_error($connection));
    }
    
    while($row = mysqli_fetch_array($result)){
        $avl = $row['book_no'];
    }
    if($avl == 0){
        echo "<script>window.location.href='product.php?id=$book'</script>";
        
    }else{
        echo "<script>window.location.href='confirm_order.php'</script>";
    }
    }
?>
<?php include "includes/footer.php" ?>