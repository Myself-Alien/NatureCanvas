<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstdb";
$conn = mysqli_connect("localhost", "root", "", "firstdb");

//if($conn === false)
//{
//    die("error:" .mysqli_connect_error());
//}
//else 
//{
//    echo "Connection Successful!";
//}

if(isset($_POST['reg_btn']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //echo $fname. $lname. $email. $pass;
}

$sql = "INSERT INTO reg VALUES ('$fname', '$lname', '$email', '$pass')";
if(mysqli_query($conn, $sql))
{
    
    echo "Registration Successful!";
}
else
{
    echo "Error" .mysqli_error($conn);
}
mysqli_close($conn);
header( "refresh:5;url=login.php" );
?>