<?php require_once("auth.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AiNitro Inventory Management system</title>

  <link href="css/robust.css" rel="stylesheet">
  <style type="text/css">
@font-face
{
  font-family: all;
  src:url('font/JosefinSans-Regular.woff')format('woff');
 }
*
{
  font-family:all;
}
.btn-successi
{
  background:#da2f18db;
  color: #fff;
}
.alink
{
  border-bottom-style: 1px dotted #da2f18db;
  border-bottom-width: 2px;
}
</style>
</head>
<body>

  <nav class="navbar navbar-lg navbar-expand-lg navbar-transparant navbar-dark navbar-absolute w-100">
    <div class="container">
      <a class="navbar-brand" href="./index.php"><img src="./img/Ainitro.png" width="100%"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><font color="white">Logout</font></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <font color="white">Initialize farm management</font>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="initialize.php">Quick start</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- call in an async form the users data from the database -->
  <?php
  /*
  Require the database file and then
  call to initialize the database connection
  */
  require_once("embed/databaseconn.php");

  /*
  Call the user's detail from the 
  row where it resides
  */

  $query_user_details = "SELECT product, initial,final,cost,priority FROM `tbl_assets` WHERE product = '".$_SESSION['product']."'";

  /*
  Query the connection files to 
  create a connection between the database
  and the files
  */

  $conn_query_to_database = mysqli_query($conn,$query_user_details);

  /*
  Now this is done return the results in
  an associative array
  */
  $return_assoc_array = mysqli_fetch_array($conn_query_to_database);
  if($return_assoc_array){
  ?>

  <div class="intro py-8 bg-primary position-relative text-white">
    <div class="bg-overlay-primary">
      <img src="img/8.jpg" class="img-fluid img-cover" alt="AiNitro inventory management system" />
    </div>
    <div class="intro-content mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center">
            <h1 class="display-4 mb-3"><?php echo ucfirst($_SESSION["product"]); ?> added</h1>
            <p class="lead mb-4" align="justify"><small>You have updated your inventory space and the details are displayed below with the results and further instructions to follow.</small></p>
          </div><!-- /.col-md-6 -->
          <div class="col-md-5 ml-auto">
          <img src="img/dev.svg" width="100%">
          </div><!-- /.col-md-6 -->
        </div>
      </div>
    </div>
  </div>
  <?php } ?>