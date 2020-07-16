<?php include "includes/header.php"; ?>
<?php include "includes/nav.php";?>
<?php 
$success = "";
if(isset($_POST['add'])){
    if($_POST['add_category'] == ""){
        $success = '<div class="alert alert-danger" role="alert">Please write some recommendation !</div>';
    }
    else{
    $category = $_POST['add_category'];
    $query1 = "INSERT INTO recommendation (category) ";
    $query1 .= "VALUES ('{$category}')";
    $add_category_query = mysqli_query($connection,$query1);
    if(!$add_category_query){
        die("Query Failed".mysqli_error($connection));
    }else{
        $success = '<div class="alert alert-success" role="alert">Your recommendation will be added soon!</div>';
    }
        }
    }
?>
<div class="rent">
       <div class="container">
        <div class="row app-align-center">
            <div class="col-xl-4">
            <div class="patch2">
                <h3 class="yellow">Genre</h3>
                <a class="gen" href="rent.php?genre=fiction"><h5>Fiction</h5></a>
                <a class="gen" href="rent.php?genre=thriller"><h5>Thriller</h5></a>
                <a class="gen" href="rent.php?genre=sci_fi"><h5>Sci-fi</h5></a>
                <a class="gen" href="rent.php?genre=self_help"><h5>Self help</h5></a>
                <a class="gen" href="rent.php?genre=indain_mythology"><h5>Indian Mythology</h5></a>
                 <a class="gen" href="rent.php?genre=biography"><h5>Biography</h5></a>
                <a class="gen" href="rent.php?genre=romance"><h5>Romance</h5></a>
                <a class="gen" href="rent.php?genre=spiritual"><h5>Spiritual</h5></a>
            </div>
            <div class="patch2">
                <h4 class="yellow">If you don't find your choice</h4>
                <form method="post">
                   <div class="form-group">
                    <label style="font-size:15px;" for="add_category">Add your genre, book or author here !</label>
                    <input type="text" class="form-control" name="add_category" placeholder="Add Category">
                    <small id="emailHelp" class="form-text black"><?php echo $success; ?></small>
                    </div>
                    <button type="submit" name="add" class="btn btn-outline-warning">Add !</button>
                </form>
            </div>
            </div>
            <div class="col-sm-8">
<?php 
    if(isset($_POST['submit'])){ 
        $search = $_POST['search'];
 $query = "SELECT * FROM book WHERE book_tags LIKE '%$search%' ";
 $select_book_query = mysqli_query($connection,$query);
        
 if(!$select_book_query){
     die("QUERY FAILED".mysqli_error($connection));
 }else{
     
     $r = mysqli_num_rows($select_book_query);
     if($r == 0){
         echo '<div class="alert alert-danger" role="alert">No result(s) found !</div>';
     }else{
     
         echo '<div class="alert alert-warning" role="alert">Here are some result(s) !</div>';
         
    while($row = mysqli_fetch_array($select_book_query)){
        
       
        
        $book_name = $row['book_name'];
        $available = $row['book_available'];
        $no_of_books = $row['book_no'];
        $book_id = $row['book_id'];
        $book_image = $row['book_image1'];
        $price = $row['book_price'];
                
                ?>

                  <div class="patch1">
                <a class="drop" href="product.php?id=<?php echo $book_id;?>"><img style="width:20%;" src="images/<?php echo $book_image; ?>" alt="">
                <h4>&nbsp; <?php echo $book_name; ?></h4>
                <h5>&nbsp; <?php echo $available;?></h5>
                <h6 style="text-align:right;">Price: Rs<?php echo $price; ?>/day</h6>
                </a>
                </div>
 <?php
    }
    }
 }
        }
?>
            </div>
        </div>
    </div>
</div>
<?php include "includes/footer.php" ?>