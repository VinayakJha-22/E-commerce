<?php include "includes/header.php"?>

    <div id="wrapper">
     <?php
     if(isset($_SESSION['id'])){
         $id = $_SESSION['id'];
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
           <table class="table table-tableboard table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Book Image</th>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Book Author</th>
                                <th>Book Genre</th>
                                <th>Edit Book</th>
                            </tr>
                        </thead>
                    <tbody> 
      
<?php
    if(isset($_SESSION['id'])){
        $admin_id = $_SESSION['id'];
        
        $query = "SELECT * FROM book";
        $select_user = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_user)){
            
            $id = $row['book_id'];
            $name = $row['book_name'];
            $image = $row['book_image1'];
            $genre = $row['book_genre'];
            $author = $row['book_author'];
            
             
        echo "<tr>";
        echo "<td><img style='height:5%;' src='../images/$image'></td>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$author</td>";
        echo "<td>$genre</td>";
        echo "<td><a href='edit_books.php?id=$id'>Edit</a></td>";
        echo "</tr>";
   
        }
    }
?>
               </tbody>
           </table>
               
    </div>  
     </div>
    </div> 
</div>
   <?php include "includes/footer.php" ?>