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
                                <th>User Id</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th>Delete User</th>
                            </tr>
                        </thead>
                    <tbody> 
      
<?php
    if(isset($_SESSION['id'])){
        $admin_id = $_SESSION['id'];
        
        $query = "SELECT * FROM users";
        $select_user = mysqli_query($connection,$query);
        
        while($row = mysqli_fetch_array($select_user)){
            
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $user_phone = $row['user_phone'];
            
             
        echo "<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_email</td>";
        echo "<td>$user_phone</td>";
        echo "<td><a href='delete_user.php?id=$user_id'>Delete</a></td>";
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