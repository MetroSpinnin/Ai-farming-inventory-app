
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
            <a class="nav-link" href="./overview.php"><font color="white">Overview</font></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <font color="white">General Docs</font>
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="getting-started.html">Introduction</a>
              <a class="dropdown-item" href="getting-started.html#quick-start">Quick start</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="intro py-8 bg-primary position-relative text-white">
    <div class="bg-overlay-primary">
      <img src="img/8.jpg" class="img-fluid img-cover" alt="AiNitro inventory management system" />
    </div>
    <div class="intro-content mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6 align-self-center">
            <h2 class="display-4 mb-3">Ai farming<br/>Inventory system.</h2>
            <p class="lead mb-4" align="justify"><small>AiNitro inventory machine learning management software for farmers is built on PHP and Python NLP and serves the need for increasing productivity in farms by helping them not to run out of important farm materials whilst providing them with skills through ML automation to aid in productivity.</small></p>
          </div><!-- /.col-md-6 -->
          <div class="col-md-5 ml-auto">
            <div class="card">
              <div class="card-body text-dark">
                <!-- Power the form using PHP -->
                <?php 

                /*
                Require the database connection which
                would power up all the variables involved
                and then create a connection between the 
                frontend and backend.
                */
                require_once("databaseconn.php");

                /*
                Then create variables that would return
                errors if the form was not filled completely
                it should throw errors and also the valid ones.
                */

                $usernameerr = $emailerr = $passworderr = $countryerr = "";
                $username = $email = $password = $country = "";

                /*
                Create the function that would sanitize details
                of the user for maximum security, it should use
                the openssl_encrypt method of PHP.
                */
                function sanitize_ainitro_input($data)
                {
                  $data = stripslashes($data);
                  $data = trim($data);
                  $data = htmlspecialchars($data);
                  return $data;
                }
                define("UA", "This is a secure text to be encrypted");
                $key_used = md5("UA");
                $ainitro_encrypt_method = "AES-256-CBC";

                /*
                Then check if the form isset and then
                automate the form to carry details to the
                database for adequate and proper use.
                */

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                  if(empty($_POST["username"])){
                    $usernameerr = "Please your username is needed";
                  } else
                   {
                    $username = sanitize_ainitro_input($_POST["username"]);
                    $username = mysqli_real_escape_string($conn, $username);
                  }

                  if(empty($_POST["email"])){
                    $emailerr = "Please your email address is required";
                  } else
                  {
                    $email = sanitize_ainitro_input($_POST["email"]);
                    $email = mysqli_real_escape_string($conn,$email);
                  }

                  if(empty($_POST["password"])){
                    $passworderr = "Please your password would be needed";
                  } else 
                  {
                    $password = sanitize_ainitro_input($_POST["password"]);
                    $password = mysqli_real_escape_string($conn,$password);
                  }

                  if(empty($_POST["country"])){
                    $countryerr = "Can you please tell us your country?";
                  } else
                  {
                    $country = sanitize_ainitro_input($_POST["country"]);
                    $country = mysqli_real_escape_string($conn,$country);
                  }

                  /*
                  Query the database and the connection to
                  check the details which were input by the
                  user and to take necessary actions by ins
                  --erting into the database where valid.
                  */
                  $query_to_insert_db = "INSERT INTO `tbl_ai_farm`(username,email,password,country) VALUES('$username','$email','$password','$country')";

                  /*
                  Check that the database has the correct
                  and right connection to proceed with the
                  actions
                  */

                  $check_conn_db = mysqli_query($conn,$query_to_insert_db) or die(mysqli_connect_error());

                  /*
                  If the necessary conditions are satisfied
                  then insert details into the database for
                  adequate use.
                  */

                  if($check_conn_db){
                    echo "<font color='red'>". $_POST["username"]. "</font> You have been successfully registered and your details have been stored, you are required to <a href='./login.php'> Login </a> and initialize a project management scheme which would aid you to make the necessary plans needed for your farm to be productive and also to enable the system run an analysis on your information to provide you with necessary information."; 
                  } else 
                  {
                    echo "Registration not successful";
                  }
                } else {

                ?>
                <form action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="country" id="country" placeholder="your country">
                  </div>
                  <input type="submit" class="btn btn-successi btn-block btn-lg mb-2" value="Sign up">
                  <div class="text-center">
                    <small>Already have an account? <a href="login.php">Sign in</a></small>
                  </div>
                </form>
                <?php } ?>
              </div>
            </div>
          </div><!-- /.col-md-6 -->
        </div>
      </div>
    </div>
  </div>