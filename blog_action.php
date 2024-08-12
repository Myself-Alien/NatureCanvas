<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Post</title>
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
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
    $img = $_FILES['img']['name']; // Get the image name
    $date = $_POST['date'];

    // Check if the file is an image
    $fileType = $_FILES['img']['type'];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (in_array($fileType, $allowedTypes)) {
        // Move the temp image file to the images/ directory
        if (move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . "/upload/" . $img)) {
            echo "";
        } else {
            echo "File upload failed.";
        }

        $stmt = $conn->prepare("INSERT INTO blog_db (name, title, content, date, img) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $title, $content, $date, $img);

        if ($stmt->execute()) {
            echo "<div class='m-5'>";
            echo "<div class='col-md-6 offset-md-3'>";
            echo "<div class='alert alert-success' role='alert'>";
            echo "Data Sent Successfully!";
            echo "</div>";
            echo "<table class='table table-bordered border-success'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th scope='row'>Name</th>";
            echo "<td>" . htmlspecialchars($name) . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th scope='row'>Blog Title</th>";
            echo "<td>" . htmlspecialchars($title) . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th scope='row'>Blog Description</th>";
            echo "<td>" . htmlspecialchars($content) . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<th scope='row'>Blog Image</th>";
            echo "<td><img src='upload/" . htmlspecialchars($img) . "' alt='Blog Image' style='max-width: 100px;'></td>"; // Display the image
            echo "</tr>";
            echo "<tr>";
            echo "<th scope='row'>Posting Date</th>";
            echo "<td>" . htmlspecialchars($date) . "</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Invalid file type.";
    }

    $stmt->close();
    mysqli_close($conn); // Close the database connection
    header("refresh:8;url=admin.php");
}

?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>