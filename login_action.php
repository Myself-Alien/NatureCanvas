<?php
"<link href='assets\css\style.css' rel='stylesheet'>"
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//if($conn === false)
//{
//    die("ERROR:" . mysqli_connect_error());
//}
//else 
//{
//    echo "Connection Successful!";
//}
if(isset($_POST['login_btn']))
{
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    $sql = "SELECT * FROM reg WHERE email = '$login_email' AND pass = '$login_password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        header("Location:admin.php");
       exit();
    }
    else
    {
        echo "<div class='center_warnning'>";
        echo "<p style='color:red;position:absolute;font-weight:600;top:20%;left:40%;height:230px;width:250px;'>"."ERROR:Invalid Email or Password". "</p>";
        echo "</div>";
    }
}
mysqli_close($conn);
?>