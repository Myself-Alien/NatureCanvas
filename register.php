<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register || Nature's Canvas</title>
    <link rel="icon" href="assets\img\favicon.ico" type="image/x-icon" />
    <link href="assets\css\style.css" rel="stylesheet">
    <link href="assets\css\bootstrap.min.css" rel="stylesheet">
    <script src="assets\js\bootstrap.bundle.min.js"></script>
</head>

<body class="login_main">
    <div class="col-md-6 offset-md-3 text-center pt-3">
        <h1 class="logo login_top_text">Nature's Canvas</h1>
        <div class="login_wrapper p-5">
            <h2>Registration Area</h2>
            <form action="register_action.php" method="post">
                <div class="row">
                    <div class="col-md">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="first name" name="fname" required>
                            <label for="floatingInput">First Name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="last name" name="lname" required>
                            <label for="floatingPassword">Last Name</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="email" name="email">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="password" name="pass">
                    <label for="floatingInput">Password</label>
                </div>
                <p class="login_btn">
                    <input type="Submit" class="btn btn-primary green_btn" name="reg_btn">
                    <input type="reset" class="btn btn-secondary green_btn">
                </p>
            </form>
        </div>
    </div>
</body>
</html>