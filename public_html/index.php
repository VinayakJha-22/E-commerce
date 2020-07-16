<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php 
if(isset($_SESSION['name'])){ 
     $star = $_COOKIE["ratedIndex"];

if(isset($_POST['add_review'])){
    $review = $_POST['review'];
   
      
       echo $name = $_SESSION['name'];
       echo $review = mysqli_real_escape_string($connection,$review);
        
       echo $name = $_SESSION['name'];
       echo $review = mysqli_real_escape_string($connection,$review);
        $review_qry = "INSERT INTO review (email, review, stars) ";
        $review_qry .= " VALUES ('$name', '$review', $star)";
        $result_review = mysqli_query($connection,$review_qry);
        if(!$result_review){
            die("QUERY FAILED".mysqli_error($connection));
        }else{
            header("Location: index.php");
        }
       
    }
       
       

    }

?>
<div class="container">
<div class="dlv">
Currently delivering in dwarka subcity,New Delhi only. Coming soon to your region!
</div>
</div>
<div class="banner">
    <div class="jumbotron  JumboHeaderImg">
   <div class="patch col-sm-7"> 
  <h2>What if we tell you,</h2>
  <p class="lead">You can rent books you always wanted to read <br>We bring service at your doorstep, wonder how ?</p>
  <h2><strong>Scroll Down</strong></h2>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>
</div>
<div class="blk1">
  <div class="container">
  <div class="row app-align-center">
   <div class="col-xl-6">
    <h1>Rent bestsellers at the lowest price possible</h1>
    </div>
    <div class="col-sm-6">
        <p>&#9755; Rent Books at the only paperback online library.</p>
        <p>&#9755; We deliver and collect books at your doorstep. </p>
        <p>&#9755; Online payments available to ease your experience.</p>
        <p>&#9755; New books and recommendations everyweek.</p>
        <p>&#9755; Smooth checkout process.</p>
    </div>
    </div>
    </div>
</div>
<div class="stripe">
    <h2>No contact delivery for this corona pandemic</h2>
</div>
<div class="blk1">
<div class="container">
    <div class="row app-align-center">
        <div class="col-xl-6">
           <br><br><br>
           <br><br><br>
            <h1>Safety is our priority</h1>
        </div>
        <div class="col-sm-6">
            <video width="100%" controls>
              <source src="images/Web.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</div>
</div>
<div class="stripe">
    <h2>Featured Bestsellers this week</h2>
    <button type="submit" class="button" onclick="document.location='rent.php'" >Rent a book now!</button>
</div>

<div class="blk2">
<div class="container">
<div class="row app-align-center">
<div class="card-columns">
  <a class="link" href="product.php?id=12">
   <div class="card">
    <img class="card-img-top" src="images/b1.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><strong>Rs 12/day</strong></h5>
      <p class="card-text">Sita: Warrior of Mithila is a fantasy book by Indian author Amish Tripathi which was released on 29 May 2017. It is the second book of the Ram Chandra Series. The Series is a retelling of the most famous epic of India, the Ramayana. Each book in the series focuses on one important character of the Ramayana.</p>
    </div>
  </div>
   </a>
   <a class="link" href="product.php?id=10">
    <div class="card">
    <img class="card-img" src="images/b6.jpg" alt="Card image">
  </div>
  <div class="card p-3 text-right">
    <blockquote class="blockquote mb-0">
     <h5><strong>Rs 15/day</strong></h5>
      <h6>The Subtle Art of Not Giving a Fuck: A Counterintuitive Approach to Living a Good Life is the second book by blogger and author Mark Manson. In it Manson argues that life's struggles give it meaning, and that the mindless positivity of typical self-help books is neither practical nor helpful. It was a bestseller.</h6>
      <footer class="blockquote-footer">
        <small class="text-muted">
          <cite title="Source Title"></cite>
        </small>
      </footer>
    </blockquote>
  </div>
  </a>
  <a class="link" href="product.php?id=14">
  <div class="card">
    <img class="card-img-top" src="images/b2.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><strong>Rs 15/day</strong></h5>
      <p class="card-text">Paulo Coelho's enchanting novel has inspired a devoted following around the world. This story, dazzling in its powerful simplicity and inspiring wisdom, is about an Andalusian shepherd boy named Santiago who travels from his homeland in Spain to the Egyptian desert in search of a treasure buried in the Pyramids. Along the way he meets a Gypsy woman, a man who calls himself</p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div>
  </a>
  <div class="card bg-warning text-white text-center p-3">
    <blockquote class="blockquote mb-0">
      <p>“Fiction” refers to literature created from the imagination. Mysteries, science fiction, romance, fantasy, chick lit, crime thrillers are all fiction genres.</p>
      <footer class="blockquote-footer">
        <small>
         <cite title="Source Title"></cite>
        </small>
      </footer>
    </blockquote>
  </div>
  <a class="link" href="product.php?id=13">
  <div class="card">
    <img class="card-img-top" src="images/b4.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><strong>Rs 12/day</strong></h5>
      <p class="card-text"></p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div>
  </a>
  <a class="link" href="product.php?id=15">
  <div class="card">
    <img class="card-img" src="images/b3.jpg" alt="Card image">
  </div>
  <div class="card p-3 text-right">
    <blockquote class="blockquote mb-0">
     <h5><strong>Rs 12/day</strong></h5>
      <h6>Sherlock Holmes is a fictional private detective created by British author Sir Arthur Conan Doyle. Referring to himself as a "consulting detective" in the stories, Holmes is known for his proficiency with observation, deduction, forensic science, and logical reasoning that borders on the fantastic, which he employs when investigating cases for a wide variety of clients, including Scotland Yard.</h6>
      <footer class="blockquote-footer">
        <small class="text-muted">
        <cite title="Source Title"></cite>
        </small>
      </footer>
    </blockquote>
  </div>
  </a>
  <a class="link" href="product.php?id=9">
<div class="card">
    <img class="card-img-top" src="images/b5.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><strong>Rs 12/day</strong></h5>
      <p class="card-text">The Girl on the Train is a 2015 psychological thriller novel by British author Paula Hawkins that gives narratives from three different women about relationship troubles and binge drinking.</p>
      <p class="card-text"><small class="text-muted"></small></p>
    </div>
  </div>
</a>
</div>
</div>
</div>
<div class="container">
   <div class="col-al-4 ra"><h3>Recently added</h3></div>
    <div class="cd">
    <div class="card-deck">
    
  <div class="card">
    <img src="images/b11.jpg" class="card-img-top" alt="...">
    <div class="card-body">
     <a class="link" href="product.php?id=29"><h5 class="card-title">The monk who sold his ferrari</h5> </a>
    </div>
  </div>
       
  
  <div class="card">
    <img src="images/b12.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <a class="link" href="product.php?id=26"><h5 class="card-title">Dark places</h5></a>
    </div>
  </div>
        
  
  <div class="card">
    <img src="images/b9.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <a class="link" href="product.php?id=24"><h5 class="card-title">Eleven minutes</h5></a>
    </div>
  </div>
        
</div>
    </div>
</div>

<div class="container">
   <div class="col-al-4 ra"><h3>Coming soon . . .</h3></div>
    <div class="cd">
    <div class="card-deck">
  <div class="card">
    <img src="images/b10.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Dune</h5>
      <h6>Frank Herbert</h6>
    </div>
  </div>
  <div class="card">
    <img src="images/b7.jpg" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">The oath of the vayuputras</h5>
      <h6>Amish</h6>
    </div>
  </div>
</div>
    </div>
</div>
<div class="container">
   <div class="col-al-4 ra"><h3>Customer reviews</h3></div> 
</div>

<?php if(isset($_SESSION['email'])){
    ?>


<div class="review">
<form method="post">
<div class="container">
    
   <div class="row" style="padding:10px;">
    <div style="background-color:black; text-align:center; padding:20px;" class="col-xl-4">
        <i class="fas fa-star fa-2x" data-index="0"></i>
        <i class="fas fa-star fa-2x" data-index="1"></i>
        <i class="fas fa-star fa-2x" data-index="2"></i>
        <i class="fas fa-star fa-2x" data-index="3"></i>
        <i class="fas fa-star fa-2x" data-index="4"></i>
    </div>
    <div class="col-xl-8">
       <div class="form-group">
           <div id="error"></div>
       <label for="review">Add Review</label>
        <textarea class="form-control" name="review" id="review" cols="30" rows="3"></textarea>
        </div>
        <button class="button" type="submit" name="add_review">Add !</button>
    </div>
    </div>
</div>
    </form>
</div>
<?php
}
    ?>
<?php
    $select_review = "SELECT * FROM review ORDER BY id DESC";
    $result_select_review = mysqli_query($connection,$select_review);
    if(mysqli_num_rows($result_select_review) == 0){
?>
<div class="container">
    <div class="col-xl-6" style="margin:20px;padding:10px;">
        <h1>No reviews Yet</h1>
    </div>
    </div>

<?php
    }
    
    while($row = mysqli_fetch_array($result_select_review)){
        
        $name = $row['email'];
        $stars = $row['stars'];
        $review = $row['review'];
 
?>

<div class="review">
<form method="post">
<div class="container">
        <div class="col-al-4 ra"></div>
   <div class="row" style="padding:10px;">
    <div style="text-align:center; padding:20px;" class="col-xl-4">
        
<?php        
   for($i = 0; $i <= $stars; $i++){
 ?>
 
 &#9733;
 
 <?php
}
?>
      
    </div>
    <div class="col-xl-8" style="text-align:center;">
        <p><?php echo $name; ?></p>
       <p><?php echo $review; ?></p>
    </div>
    </div>
</div>
    </form>
</div>    
<?php
    }
?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    
    var ratedIndex = -1;
    
$(document).ready(function(){
    resetStar();
    
    if(localStorage.getItem('ratedIndex') != null)
        setStar(parseInt(localStorage.getItem('ratedIndex')));
    
    $('.fa-star').on('click', function(){
       
        ratedIndex = parseInt($(this).data('index'));
        setCookie("ratedIndex", ratedIndex, 7)
        
        
    });
    
    
   $('.fa-star').mouseover(function(){
      resetStar(); 
       
       var currentIndex = parseInt($(this).data('index'));
       setStar(currentIndex);
       
   }); 
    
    $('.fa-star').mouseleave(function(){
      resetStar();
        if(ratedIndex != -1)
            setStar(ratedIndex);
           
        
   });
       function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
    
    function setStar(max){
        
         for (var i = 0 ; i <= max; i++)
           $('.fa-star:eq('+i+')').css('color','#ffcc00');
    }
    
    function resetStar(){
        $('.fa-star').css('color', 'white');
    }
});    
    $("form").submit(function(e){
				var error = "";
         			
				if ($("#review").val() == ""){
                    e.preventDefault();
					error += "The Field cannot be empty !<br>";
                    
				}
				if(error != "") {
                    e.preventDefault();
						$("#error").html('<div class="alert alert-danger" role="alert">' + error + '</div>');
				}
               
     });   
</script>
<?php include "includes/footer.php"; ?>