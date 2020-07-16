<?php include "db.php"; ?>
<?php
if(isset($_GET['id'])){
    $book_id = $_GET['id'];
    
    $query = "DELETE FROM book WHERE book_id = $book_id ";
    $delete_user = mysqli_query($connection,$query);
    echo "<script>window.location.href='books.php'</script>";
}

?> 