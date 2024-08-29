<?php
    session_start();
    session_regenerate_id(true);
    include 'src/db/db.php';
    include 'src/fun/authentication.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Heritage Centre | REGISTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="src/css/home.css" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-md-4"></div>
            <div class="col-sm-12 col-lg-4 col-md-4 border shadow-sm p-3 bg-white">
                <h2>Register</h2>
                <p>for HERITAGE CENTER</p>
                <form method="post">
                    <div class="mb-3">
                        <input type="text" required="required" name="registerFullname" class="form-control form-control-lg" autocomplete="off" placeholder="Fullname" />
                    </div>
                    <div class="mb-3">
                        <input type="phone" required="required" name="registerPhone" class="form-control form-control-lg" autocomplete="off" placeholder="Phone Number" />
                    </div>
                    <div class="mb-3">
                        <input type="email" required="required" name="registerEmail" class="form-control form-control-lg" autocomplete="off" placeholder="Email Address" />
                    </div>
                    <div class="mb-3">
                        <textarea name="registerAddress" placeholder="Your Address" class="form-control form-control-lg"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="password" required="required" name="registerPassword" class="form-control form-control-lg" placeholder="Password" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-lg w-100" name="registerBtn">Register</button>
                    </div>
                </form>
                <hr>
                <p>Already registered? <a class="text-decoration-none" href="login.php">Log in</a></p>
            </div>
            <div class="col-sm-12 col-lg-4 col-md-4"></div>
        </div>
    </div>
    <?php
        buyerRegister();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>