<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php if(isset($_POST['cod'])){
    
    $tkn = rand(1000,9999);
    $order_id = "TFP".$tkn."ODR";
    $pay_id = "TFP".$tkn."PAY";
    
    echo "<script>window.location.href='success.php?order_id=$order_id&email=$email&pay_id=$pay_id'</script>";

}?>
 <div class="success">
                          <div class="container">
                               <table class="table table-tableboard table-hover table-dark">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Items</th>
                                <th>Books</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                    <tbody> 
<?php 
require_once 'razorpay-php/Razorpay.php';
use Razorpay\Api\Api;


$KeyId = '';
$secretKey = '';    
$api = new Api($KeyId, $secretKey);

if(isset($_SESSION['id'])){
    $email = $_SESSION['email'];
    $query = "SELECT * FROM temp_order WHERE email = '$email'";
    $select_tempOrder_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($select_tempOrder_query)){
        $name = $row['name'];
        $phone = $row['phone'];
        $items = $row['items'];
        $amount = $row['amount'];
        $books = $row['books'];
        $price = $amount/100;
        
        
        echo "<tr>";
        echo "<td>$email</td>";
        echo "<td>$phone</td>";
        echo "<td>$items</td>";
        echo "<td>$books</td>";
        echo "<td>$price</td>";
        echo "</tr>";
    }
}
$order  = $api->order->create([
  'receipt'         => 'order_rcptid_11',
  'amount'          => $amount, // amount in the smallest currency unit
  'currency'        => 'INR',// <a href="https://razorpay.freshdesk.com/support/solutions/articles/11000065530-what-currencies-does-razorpay-support" target="_blank">See the list of supported currencies</a>.)
  'payment_capture' =>  '0'
]);
?>
</tbody>
                        </table>
                        <br>
<div class="container payment">
<form method="post">    
    <button style="margin-bottom:10px;" type="submit" name="cod">Cash on Delivery</button>
</form>
<form action="success.php?email=<?php echo $email;?>" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="" // Enter the Key ID generated from the Dashboard
    data-amount="<?php echo $amount  ?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    data-currency="INR"
    data-order_id="<?php echo $order->id ?>"//This is a sample Order ID. Pass the `id` obtained in the response of the previous step.
    data-buttontext="Pay Now!"
    data-name="Turnfewpages"
    data-description="Rent a book"
    data-image=""
    data-prefill.name="<?php echo $name ; ?>"
    data-prefill.email="<?php echo $email ; ?>"
    data-prefill.contact="<?php echo $phone ; ?>"
    data-theme.color="#ffcc00"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>
</div>
</div>
</div>
<?php include "includes/footer.php"; ?>