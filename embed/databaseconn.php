<?php 

/*
Add your own details  here
which includes the hosting account
database,username and password
My password field was left empty because
i dont use a password for localhost
*/
$host = "localhost";
$user = "root";
$pass = "";
$database = "ai_farm";

/*
Create the connection to the
database and throw an error if 
not successful.
*/

$conn = mysqli_connect($host,$user,$pass,$database)or die(mysqli_error());

/*
Throw an exception if there
was an error in connecting to
the database.
*/

if(mysqli_connect_errno){
echo ("error connecting to the database" . mysqli_connect_error());
}
?>
