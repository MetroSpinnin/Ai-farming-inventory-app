<!-- include the header file here -->
<?php session_start(); require_once("embed/header1.php");?>

  <main class="main" role="main">
    <div class="bg-white py-7">
      <div class="container">
        <div class="row">
          <div class="col-md-8 mx-auto">
            <div class="row">
              <div class="col-md-12 mr-auto">
                <?php

                /*
                require the database connection
                to proceed with the authentication
                of the form
                */

                require_once("embed/databaseconn.php");

                /*
                Then initialize the error and sanitizing
                functions that would sanitize user input
                and also throw exceptions where necessary.
                */

                $usernameerr = $passworderr = "";
                $username = $password = "";

                function sanitize_login_input($data){
                  $data = trim($data);
                  $data = htmlspecialchars($data);
                  $data = stripslashes($data);
                  return $data;
                }
                
                /*
                Using the php cryptographic function below for
                secure login to aid core protection for user input
                please note that this was not used, but can be applied
                                
                define (UA, "This is a freaking secure text");
                $key  = md5(UA);
                $ainitro_encryption_method = AES-256-CBC;
                $variable_to_be_used = $thevariableyouneedtoencrypt;
                openssl_encrypt($variable_to_be_used, $ainitro_encryption_method,$key); 
                
                */

                /* 
                Then check that the correct details have been
                put in by the user and then return the data
                from the database
                */
                if($_SERVER["REQUEST_METHOD"]=="POST"){
                  if(empty($_POST["username"])){
                    $usernameerr = "Please input your username";
                  } else
                  {
                    $username = sanitize_login_input($_POST["username"]);
                    $username = mysqli_real_escape_string($conn,$username);
                  }

                  if(empty($_POST["password"])){
                    $passworderr = "Please use a valid password";
                  } else 
                  {
                    $password = sanitize_login_input($_POST["password"]);
                    $password = mysqli_real_escape_string($conn,$password);
                  }

                  /*
                  Query the database connection and then
                  return the expected results
                  */
                  $query_login_db = "SELECT id FROM `tbl_ai_farm` WHERE username = '$username' and password = '$password'";

                  /*
                  Check that there is a valid connection
                  to the database
                  */

                  $check_database_conn = mysqli_query($conn,$query_login_db) or die(mysqli_error());

                  /*
                  Check the number of rows that should
                  be displayed, these details should return
                  only one row per user.
                  */

                  $check_num_rows = mysqli_num_rows($check_database_conn);

                  /*
                  If the number of rows returned are valid
                  then automatically pull data from the 
                  database
                  */

                  if($check_num_rows == 1){
                    $_SESSION['username'] = $username;
                    header("Location:profile.php");
                  } else{
                    echo "Wrong username or password Please try again";
                  }
                } else {
                ?>
                  <form action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                  </div>
                  <input type="submit" class="btn btn-successi btn-block btn-lg mb-2" value="Login">
                  <div class="text-center">
                    <small>Don't have an account? <a href="index.php">Sign up</a></small>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div>
          
        </div>
       
        </div><!-- /.row -->
      </div>
    </div>


 <!-- include the footer file here -->
 <?php require_once("embed/footer.php");?>
