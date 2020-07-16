<?php include "includes/header.php" ?>
<?php include "includes/nav.php" ?>
<?php
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $book = $_GET['book'];
        
        $qury1 = "SELECT * FROM book WHERE book_id = $book";
        $resul1 = mysqli_query($connection,$qury1);
        
        while($row = mysqli_fetch_array($resul1)){
            $book_no = $row['book_no'];
            $book_no = $book_no - 1;    
        }
    if($book_no != 0){
    $qury = "UPDATE book SET book_no = $book_no WHERE book_id = $book ";
    $resul = mysqli_query($connection,$qury);
    if(!$resul){
        die("QUERY FAILED".mysqli_error($connection));
    }else{
      echo "<script>window.location.href='order_success.php?order_id=$order_id'</script>";  
    }
    }
    if($book_no == 0){
    $qury = "UPDATE book SET book_no = $book_no, book_available = 'not available' WHERE book_id = $book ";
    $resul = mysqli_query($connection,$qury);
    if(!$resul){
        die("QUERY FAILED".mysqli_error($connection));
    }else{
      echo "<script>window.location.href='order_success.php?order_id=$order_id'</script>";  
    }
    }
    }
?>
<?php include "includes/footer.php" ?>