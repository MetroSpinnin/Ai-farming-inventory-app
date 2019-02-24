<!-- include the header file here -->
<?php require_once("embed/header2.php");?>

  <main class="main" role="main">
    <div class="bg-white py-7">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <div class="row">
              <div class="col-md-6 ml-auto">
                <p class="lead text-dark" align="justify"><small>In the AiNitro Machine learning inventory enterprise software, the farmers get registered on the platform and then fill up the required details which are necessary,the ui is so simplified that even a non-literate can handle, after the registration these details are processed for analysis.Please it should be ensured that correct details are input for proper processing to avoid analysing fake data.<br/><br/>Refer to our <a href="overview.php"> Overview</a> to get Details on how we operate.</small></p>
              </div><br/>
              <div class="col-md-6 mr-auto">
               <!-- Power the form using PHP -->
                <?php 

                /*
                Require the database connection which
                would power up all the variables involved
                and then create a connection between the 
                frontend and backend.
                */
                #require_once("databaseconn.php");

                /*
                Then create variables that would return
                errors if the form was not filled completely
                it should throw errors and also the valid ones.
                */

                $producterr = $initialerr = $finalerr = $costerr = $priorityerr =  "";
                $product = $initial = $final = $cost = $priority = "";

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
                  if(empty($_POST["product"])){
                    $producterr = "Please your product is needed";
                  } else
                   {
                    $product = sanitize_ainitro_input($_POST["product"]);
                    $product = mysqli_real_escape_string($conn, $product);
                  }

                  if(empty($_POST["initial"])){
                    $initialerr = "Please your initial address is required";
                  } else
                  {
                    $initial = sanitize_ainitro_input($_POST["initial"]);
                    $initial = mysqli_real_escape_string($conn,$initial);
                  }

                  if(empty($_POST["final"])){
                    $finalerr = "Please your final would be needed";
                  } else 
                  {
                    $final = sanitize_ainitro_input($_POST["final"]);
                    $final = mysqli_real_escape_string($conn,$final);
                  }

                  if(empty($_POST["cost"])){
                    $costerr = "Can you please tell us your cost?";
                  } else
                  {
                    $cost = sanitize_ainitro_input($_POST["cost"]);
                    $cost = mysqli_real_escape_string($conn,$cost);
                  }
                  if(empty($_POST["priority"])){
                    $priorityerr = "Can you please tell us your priority?";
                  } else
                  {
                    $priority = sanitize_ainitro_input($_POST["priority"]);
                    $priority = mysqli_real_escape_string($conn,$priority);
                  }

                  /*
                  Query the database and the connection to
                  check the details which were input by the
                  user and to take necessary actions by ins
                  --erting into the database where valid.
                  */
                  $query_to_insert_db = "INSERT INTO `tbl_assets`(product,initial,final,cost,priority) VALUES('$product','$initial','$final','$cost','$priority')";

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
                    $_SESSION["product"] = $product;
                    header("Location:initialize.php");
                  } else 
                  {
                    echo "Registration not successful";
                  }
                } else {

                ?>
                <form action="" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="product" id="product" placeholder="Enter the name of an asset">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="initial" id="initial" placeholder="Enter the initial quantity of this asset">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="final" id="final" placeholder="Enter the remaining quantity">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="cost" id="cost" placeholder="Is the product cost significant? yes or no">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="priority" id="priority" placeholder="Priority: High or low">
                  </div>
                  <input type="submit" class="btn btn-successi btn-block btn-lg mb-2" value="Analyse">
                  </form>

                  <?php }?>
              </div>
            </div>
          </div>
          <!-- end of platform -->

        </div>
       
        </div><!-- /.row -->
      </div>
    </div>


 <!-- include the footer file here -->
 <?php require_once("embed/footer.php");?>