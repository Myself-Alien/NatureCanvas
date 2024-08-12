<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "firstdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn === false) {
    die("Error: Not connect" . mysqli_connect_error());
}

$sql = "SELECT * FROM blog_db ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nature Blog</title>
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Logo Area Start-->
    <div class="container-fluid gx-0 top_pen pb-2 pt-1">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <h1 class="logo">Nature's Canvas</h1>
                </div>
                <div class="col-md">
                    <div class="form-check form-switch dark_switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" onclick="myFunction()">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Dark Mode</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Area Start-->
    <div class="container-fluid g-0">
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container mt-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 main_menu">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Wildlife</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Animal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reptile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mammal</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-warning" id="topbtn" type="">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
    <!-- Main Blog Post Area Start-->
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='container'>";
            echo "<div class='row mt-3'>";
            echo "<div class='card card_noborder'>";
            echo "<div class='row g-0'>";
            echo "<div class='col-md-4 blog_img'>";
            echo "<img src='upload/" . htmlspecialchars($row['img']) . "' class='img-fluid rounded-start' alt='Image' />";
            echo '</div>';
            echo "<div class='col-md-8'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title myDiv'>" . ($row['title']) . "</h5>"; // Corrected class usage

            echo "<div class='d-flex flex-row mb-1'>";
            echo "<div class='p-1 blog_icons myDiv'>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>";
            echo "<path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z' />"
                . "</svg>";
            echo "<label class='myDiv'>" . ($row['name']) . "</label>"
                . "</div>";
            echo "<div class='p-1 blog_icons'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-calendar4-event' viewBox='0 0 16 16'>";
            echo "<path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z' />";
            echo "<path d='M11 7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z' />"
                . "</svg>";
            echo "<label class='myDiv'>" . ($row['date']) . "</label>" . "</div>"
                . "</div>";
            echo "<p class='card-text myDiv'>" . ($row['content']) . "</p>"; // Corrected class usage
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    include("footer.php");
    ?>
    <script>
        // Function to toggle dark mode and change font color for multiple divs
        function myFunction() {
            var element = document.body;
            var myDivs = document.querySelectorAll('.myDiv');

            // Toggle dark mode class
            element.classList.toggle("dark-mode");

            // Change font color based on dark mode status
            if (element.classList.contains("dark-mode")) {
                myDivs.forEach(function(div) {
                    div.style.color = '#fff'; // Change font color in dark mode
                });
            } else {
                myDivs.forEach(function(div) {
                    div.style.color = ''; // Change font color in light mode
                });
            }
        }

        // No need to add an event listener here since the onclick is already in the input
    </script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
