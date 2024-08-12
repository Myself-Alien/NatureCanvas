<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="icon" href="assets\img\favicon.ico" type="image/x-icon" />
    <link href="assets\css\style.css" rel="stylesheet">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['sub'])) {
    $name = $_POST['bname'];
    $title = $_POST['title'];
    $content = $_POST['dec'];
    $img = $_POST['img'];
    $date = $_POST['date'];
}
$stmt = $conn->prepare("INSERT INTO blog_db (name, title, content, date) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $title, $content, $date);

if ($stmt->execute()) {
    echo "<div class='m-5'>";
    echo "<div class='col-md-6 offset-md-3'>";
        echo "<table class='table table-bordered border-success'>";
            echo "<tbody>";
                echo "<tr>";
                    echo "<th scope='row'>Name</th>";
                    echo "<td>". $name ."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th scope='row'>Blog Title</th>";
                    echo "<td>". $title ."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th scope='row'>Blog Description</th>";
                    echo "<td>". $content ."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th scope='row'>Blog Image</th>";
                    echo "<td>". $img ."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<th scope='row'>Posting Date</th>";
                    echo "<td>". $date ."</td>";
                echo "</tr>";
            echo "</tbody>";
            echo "<div class='alert alert-success' role='alert'>";
            echo "Data Send Successfully!";
            echo "</div>";
            echo "</table>";
            echo"</div>";
            echo"</div>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
header( "refresh:8;url=admin.php" );
?>
</body>
</html>