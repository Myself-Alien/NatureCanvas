<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="assets\img\favicon.ico" type="image/x-icon" />
    <link href="assets\css\style.css" rel="stylesheet">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</head>

<body class="login_main">
    <div class="col-md-4 offset-md-4 text-center pt-4">
        <h1 class="logo login_top_text">Nature's Canvas</h1>
        <div class="login_wrapper p-5">
            <h2>Login Area</h2>
            <form action="login_action.php" method="post">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="login_email" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="login_password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <p class="login_btn">
                    <input type="Submit" class="btn btn-primary green_btn" name="login_btn">
                    <input type="reset" class="btn btn-secondary green_btn">
                </p>
            </form>
        </div>
    </div>
</body>

</html>