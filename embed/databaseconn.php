<?php 

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

if(!$conn)
{
	echo "error in connection";
}
?>