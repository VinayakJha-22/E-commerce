<?php include "includes/header.php"?>

    <div id="wrapper">
     <?php
     if(isset($_SESSION['email'])){
         $email = $_SESSION['email'];
         $name = $_SESSION['name'];
?>
    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $name; ?></small>
                        </h1>
                        
                    </div>
                  
                </div>
                <!-- /.row -->

            </div>
    
<?php    
     }else{         
?>    
    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small></small>
                        </h1>
                        
                    </div>
                  
                </div>
                <!-- /.row -->

            </div> 
  <?php
          }
         ?>

    <div class="user"> 
     <div class="container">
       <div class="row app-align-center">
          
<?php
           $message = "";
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
        if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $author = $_POST['author'];
        $genre = $_POST['genre'];
        $tags = $_POST['tags'];
        $price = $_POST['price'];
        $no = $_POST['no'];
        $delivery = $_POST['delivery'];
        $description = $_POST['description'];
        $pages = $_POST['pages'];
        $image1 = $_FILES['image1']['name'];    
        $image1_temp = $_FILES['image1']['tmp_name'];       
        $image2 = $_FILES['image2']['name'];    
        $image2_temp = $_FILES['image2']['tmp_name'];
        $image3 = $_FILES['image3']['name'];    
        $image3_temp = $_FILES['image3']['tmp_name'];    
}      
if(!empty($name) && !empty($author) && !empty($genre) && !empty($tags) && !empty($price) && !empty($pages) && !empty($delivery)){
        $name = mysqli_real_escape_string($connection, $name);    
        $author = mysqli_real_escape_string($connection, $author);    
        $genre = mysqli_real_escape_string($connection, $genre);    
        $tags = mysqli_real_escape_string($connection, $tags);    
        $price = mysqli_real_escape_string($connection, $price);    
        $delivery = mysqli_real_escape_string($connection, $delivery);    
        $pages = mysqli_real_escape_string($connection, $pages);
        $no = mysqli_real_escape_string($connection, $no);
        $description = mysqli_real_escape_string($connection, $description);
   
            move_uploaded_file($image1_temp,"../images/$image1");  
            move_uploaded_file($image2_temp,"../images/$image2");  
            move_uploaded_file($image3_temp,"../images/$image3");  
            
        $query = "INSERT INTO book (book_name, book_genre, book_author, book_pages, book_tags, book_price, book_no, book_delivery, book_image1, book_image2, book_image3, description) ";
        $query .= "VALUES ('{$name}', '{$genre}', '{$author}', $pages, '{$tags}', $price, $no, $delivery, '{$image1}', '{$image2}', '{$image3}', '{$description}' )"; 
        $add_books_query = mysqli_query($connection,$query);
            if(!$add_books_query){
                die("QUERY FAILED".mysqli_error($connection));
            }else{
                $message = '<div class="alert alert-success">Book successfully added to the website';
                 echo "<script>window.location.href='books.php'</script>";
            }
        } 
    }           
           
?>
            
            <h3>ADD books to Website</h3>
            <div id="error"><?php echo  $message; ?></div>
             <form method="post" enctype="multipart/form-data">
                  <div class="form-group">
                  <label for="user_image1">Upload Image 1</label>
                  <input class="form-control" type="file" id="image1" name="image1">
                  </div> 
                  <div class="form-group">
                  <label for="user_image2">Upload Image 2</label>
                  <input class="form-control" type="file" id="image2" name="image2">
                  </div> 
                  <div class="form-group">
                  <label for="user_image3">Upload Image 3</label>
                  <input class="form-control" type="file" id="image3" name="image3">
                  </div>
                  <div class="form-group">
                  <label for="bookname">Book name</label>
                  <input class="form-control" type="text" id="name" name="name">
                  </div>
                  <div class="form-group">
                  <label for="bookauthor">Book Author</label>
                  <input class="form-control" type="text" id="author" name="author">
                  </div>
                  <div class="form-group">
                  <label for="bookgenre">Book Genre</label>
                  <input class="form-control" type="text" id="genre" name="genre">
                  </div>
                  <div class="form-group">
                  <label for="booktags">Book Tags</label>
                  <input class="form-control" type="text" id="tags" name="tags">
                  </div>
                  <div class="form-group">
                  <label for="bookpages">Book Pages</label>
                  <input class="form-control" type="number" id="pages" name="pages">
                  </div>
                  <div class="form-group">
                  <label for="bookprice">Book Price</label>
                  <input class="form-control" type="number" id="price" name="price">
                  </div>
                  <div class="form-group">
                  <label for="no">No of books</label>
                  <input class="form-control" type="number" id="no" name="no">
                  </div>
                  <div class="form-group">
                  <label for="bookdelivery">Book Delivery</label>
                  <input class="form-control" type="number" id="delivery" name="delivery">
                  <short>Enter no of days in delivery</short>
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                  <button class="btn btn-primary" type="submit" name="submit">Submit</button>
             </form>
              
            
               
    </div>  
     </div>
    </div> 
</div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
     $("form").submit(function(e){
				var error = "";
         			
				if ($("#image1").val() == ""){
                    e.preventDefault();
					error += "all Images are required<br>";
                    
				}
                if ($("#image2").val() == ""){
                    e.preventDefault();
					error += "all Images are required<br>";
                    
				}
                if ($("#image3").val() == ""){
                    e.preventDefault();
					error += "all Images are required<br>";
				}
                if ($("#name").val() == ""){
                    e.preventDefault();
					error += "The book name is required<br>";
				}
                 if ($("#author").val() == ""){
                    e.preventDefault();
					error += "The Author name is required<br>";
				}
                 if ($("#genre").val() == ""){
                    e.preventDefault();
					error += "The Genre is required<br>";
				}
                 if ($("#tags").val() == ""){
                    e.preventDefault();
					error += "The Tags are required<br>";
				}
                 if ($("#pages").val() == ""){
                    e.preventDefault();
					error += "The no. of pages required<br>";
				}
                 if ($("#price").val() == ""){
                    e.preventDefault();
					error += "The price is required<br>";
				}
                 if ($("#delivery").val() == ""){
                    e.preventDefault();
					error += "The no of days in delivery are required<br>";
				}
                
				if(error != "") {
                    e.preventDefault();
						$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form :</strong><p>' + error + '</div>');
				}
               
     });
</script>
   <?php include "includes/footer.php" ?>