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
                <a class="gen" href="rent.php?genre=crime"><h5>Crime</h5></a>
                <a class="gen" href="rent.php?genre=selfhelp"><h5>Self help</h5></a>
                <a class="gen" href="rent.php?genre=indianmythology"><h5>Indian Mythology</h5></a>
                <a class="gen" href="rent.php?genre=horror"><h5>Horror</h5></a>
            </div>
            <div class="patch2">
                <h4 class="yellow">If you don't find your choice</h4>
                <form method="post">
                   <div class="form-group">
                    <label style="font-size:15px;" for="add_category">Add your genre, book or author here</label>
                    <input type="text" class="form-control" name="add_category" placeholder="Add Category">
                    <small id="emailHelp" class="form-text black"><?php echo $success; ?></small>
                    </div>
                    <button type="submit" name="add" class="btn btn-outline-warning">Add !</button>
                </form>
            </div>
            </div>
            <div class="col-sm-8">
<?php 
if(isset($_GET['genre'])){
    
     $genre = $_GET['genre']; 
     $query = "SELECT * FROM book WHERE book_genre LIKE '%$genre%' ";
    $select_book_query = mysqli_query($connection,$query);
 if(!$select_book_query){
     die("QUERY FAILED".mysqli_error($connection));
 }else{
    while($row = mysqli_fetch_array($select_book_query)){
        
        $book_name = $row['book_name'];
        $available = $row['book_available'];
        $no_of_books = $row['book_no'];
        $book_id = $row['book_id'];
        $book_image = $row['book_image1'];
        $price = $row['book_price'];
        
?>
   
                <div class="patch1">
                <a class="drop" href="product.php?id=<?php echo $book_id;?>"><img style="width:20%;" id="iii" src="images/<?php echo $book_image; ?>" alt="">
                <h4>&nbsp; <?php echo $book_name; ?></h4>
                <h5>&nbsp; <?php echo $available;?></h5>
                <h6 style="text-align:right;">Price: Rs<?php echo $price; ?>/day</h6>
                </a>
                </div>         
                             
<?php 
    }
    }
}else{

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    else {
        $page = "";
    }
    
    if($page == "" || $page ==1){
        $page_1 = 0;
    }else{
        $page_1 = ($page * 7)- 7;
    }
                
 $select_post_count = "SELECT * FROM book";
 $find_count = mysqli_query($connection,$select_post_count);
    $count = mysqli_num_rows($find_count);
                
   $count = ceil($count/7);
    
    
    
 $query = "SELECT * FROM book ORDER by priority ASC LIMIT $page_1,7";
 $select_book_query = mysqli_query($connection,$query);
 if(!$select_book_query){
     die("QUERY FAILED".mysqli_error($connection));
 }else{
    while($row = mysqli_fetch_array($select_book_query)){
        
        $book_name = $row['book_name'];
        $available = $row['book_available'];
        $no_of_books = $row['book_no'];
        $book_id = $row['book_id'];
        $book_image = $row['book_image1'];
        $price = $row['book_price'];
                
                ?>

                  <div class="patch1">
                <a class="drop" href="product.php?id=<?php echo $book_id;?>"><img id="iii" src="images/<?php echo $book_image; ?>" alt="">
                <h4>&nbsp; <?php echo $book_name; ?></h4>
                <h5>&nbsp; <?php echo $available;?></h5>
                <h6 style="text-align:right;">Price: Rs<?php echo $price; ?>/day</h6>
                </a>
                </div>
 <?php
    }
 }
 }
?>
           
            </div>
        </div>
        <div style="margin-left:40%;">
        <nav  aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            
            for($i = 1; $i <= $count; $i++){
                echo "<li class='page-item'><a style='color:#ffcc00;'class='page-link' href='rent.php?page={$i}'>{$i}</a></li>";
            }
            
            ?>
        </ul>
           </nav>
           </div>
    </div>
</div>
<?php include "includes/footer.php" ?>