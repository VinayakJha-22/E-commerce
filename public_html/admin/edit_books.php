<?php include "includes/header.php"; ?>
   <?php
    if(isset($_GET['id'])){
        
        $book_id = $_GET['id'];
        
        $query = "SELECT * FROM book WHERE book_id = $book_id";
        $result = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($result)){
            $name = $row['book_name'];
            $price = $row['book_price'];
            $pages = $row['book_pages'];
            $no_of_books = $row['book_no'];
            $availability = $row['book_available'];
            $image = $row['book_image1'];
        }
        
    }
?>

<?php

if(isset($_POST['update'])){
    $price = $_POST['price'];
    $pages = $_POST['page'];
    $no_of_books = $_POST['book'];
    $avaibility = $_POST['available'];
    
    $query1 = "UPDATE book SET book_price = $price, book_pages = $pages, book_no = $no_of_books, book_available = '$avaibility' WHERE book_id = $book_id";
    $result1 = mysqli_query($connection,$query1);
    if(!$result1){
        die("QUERY FAILED".mysqli_error($connection));
    }else{
        header("Location: books.php");
    }
}

?>

<h1><?php echo $name; ?></h1>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
         <img style="max-width:100%;" src="../images/<?php echo $image; ?>" alt="">   
        </div>
        <div class="col-sm-6">
            <form method="post">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" value="<?php echo $price;?>" class="form-control" type="number">
                </div>
                <div class="form-group">
                    <label for="pages">Pages</label>
                    <input name="page" value="<?php echo $pages ?>" class="form-control" type="number">
                </div>
                <div class="form-group">
                    <label for="books">No. of books</label>
                    <input name="book" value="<?php echo $no_of_books ?>" class="form-control" type="number">
                </div>
                <div class="form-group">
                    <label for="">Availablity</label>
                   <input class="form-control" name="available" value="<?php echo $availability; ?>" type="text" list="cars" />
                    <datalist id="cars">
                      <option>available</option>
                      <option>not available</option>
                    </datalist>
                </div>
                <button class="btn btn-warning" type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</div>