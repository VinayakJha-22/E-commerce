<?php session_start(); ?>

<?php 
if(isset($_SESSION['email'])){

        $_SESSION['id'] = null;
        $_SESSION['email'] = null;
        $_SESSION['name'] = null;
        
        echo "<script>window.location.href='index.php'</script>";
        
}
    
?>