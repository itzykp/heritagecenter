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
    <title>Heritage Centre | LOG IN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="src/css/home.css" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 col-lg-4 col-md-4"></div>
            <div class="col-sm-12 col-lg-4 col-md-4 border shadow-sm p-3 bg-white">
                <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" height="80" class="d-block mx-auto rounded mb-3" alt="USER IMG" />
                <form method="post">
                    <div class="mb-3">
                        <input type="email" required="required" name="loginEmail" class="form-control form-control-lg" autocomplete="off" placeholder="Email Address" />
                    </div>
                    <div class="mb-3">
                        <input type="password" required="required" name="loginPassword" class="form-control form-control-lg" autocomplete="off" placeholder="Password" />
                    </div>
                    <div class="mb-2">
                        <button type="submit" name="loginBtn" class="btn w-100 btn-lg btn-primary">Log in</button>
                    </div>
                </form>
                <hr>
                <p>Not yet registered? <a class="text-decoration-none" href="register.php">Register</a></p>
            </div>
            <div class="col-sm-12 col-lg-4 col-md-4"></div>
        </div>
    </div>
    <?php
        buyerLogin();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>