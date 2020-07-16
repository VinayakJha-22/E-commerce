<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<div class="success">

<?php
if(isset($_POST['razorpay_payment_id'])){
$payment_id = $_POST['razorpay_payment_id'];
$order_id = $_POST['razorpay_order_id'];
}
if(isset($_GET['order_id'])){
    $payment_id = $_GET['order_id'];
    $order_id = $_GET['pay_id'];
}
if(isset($_GET['email'])){
    $date = date('Y-m-d');
    
    $email = $_GET['email'];
    $query = "SELECT * FROM temp_order WHERE email = '$email'";
    $select_temp_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($select_temp_query)){
        $items = $row['items'];
        $amount = $row['amount'];
        $cus_name = $row['name'];
        $cus_email = $row['email'];
        $cus_phone = $row['phone'];
        $books = $row['books'];
        $book_id = $row['book_id'];
        $address = $row['address'];
        $amount = $amount/100;
        $duration = $row['order_days'];
        $duration = $duration + 2;
        $mod_date = strtotime($date."+ $duration days");
        $return_date = date("Y-m-d",$mod_date);
    
    }
    
 if(isset($_SESSION['email'])){   
    $query1 = "INSERT INTO placed_orders (order_id, payment_id, name, email, phone, items, books, price, address, return_date) VALUES ('{$order_id}', '{$payment_id}', '{$cus_name}', '{$cus_email}', $cus_phone, $items, '{$books}', $amount, '{$address}', '{$return_date}')";
    $insert_order_query = mysqli_query($connection,$query1);
     if(!$insert_order_query){
            die("QUERY FAILED".mysqli_error($connection));
        }
 }
    
echo "Please wait ! Your order is being processed...";
if(isset($_POST['razorpay_payment_id'])){
$sql = "INSERT INTO payment (payment_id, order_id, signature_hash ) VALUES ('".$_POST['razorpay_payment_id']."', '".$_POST['razorpay_order_id']."', '".$_POST['razorpay_signature']."')";
$add_order_query = mysqli_query($connection,$sql);
if(!$add_order_query){
    die("QUERY FAILED".mysqli_error($connection));
}else{
         echo "<script>window.location.href='send_mail.php?order_id=$order_id&email=$email&book=$book_id'</script>";
}
}
echo "<script>window.location.href='send_mail.php?order_id=$order_id&email=$email&book=$book_id'</script>";
  }  
?> 
</div>

<?php include "includes/footer.php"; ?>