<?php include "db.php"; ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/2baed29462.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet">

    <title>Turn Few Pages</title>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light bg-warning">
  <a class="navbar-brand" href="index.php">Turn Few Pages(delivery)</a>
   <li style="list-style:none;margin-left:10px;"><a style="color:black;text-decoration:none;" href="orders.php">Delivery</a></li>
    <li style="list-style:none;margin-left:10px;"><a style="color:black;text-decoration:none;" href="return_book.php">Returns</a></li>
  <?php
  if(isset($_SESSION['email'])){
  ?>
  <a style="margin:10px;" href="logout.php">Logout</a>
  <?php
  }
  ?>
</nav>