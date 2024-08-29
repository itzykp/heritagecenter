<?php
    session_start();
    session_regenerate_id(false);
    include 'src/db/db.php';
    include 'src/fun/cartDisplay.php';
    if(!isset($_SESSION['buyerId'])){
        header('location: index.php');
    }else{
        $buyerId = $_SESSION['buyerId'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Heritage Centre | HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="src/css/home.css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3"></div>
            <div class="col-sm-12 col-md-4 col-lg-6 p-4 border shadow-sm">
                <a class="text-decoration-none" href="index.php"><- Back to Home</a>
                <br>
                <h4>Your Cart items</h4>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3"></div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-4 col-lg-3"></div>
            <div class="col-sm-12 col-md-4 col-lg-6">
                <ol class="list-group list-group-numbered">
                    <?php
                        $catId = $_GET['catId'];
                        $selectCat = "SELECT * FROM products WHERE category=$catId";
                        $run = mysqli_query($db, $selectCat);
                        while($fetchProduct = mysqli_fetch_array($run)){
                            $productname = $fetchProduct['productTitle'];
                            $cost = $fetchProduct['cost'];
                            echo"
                                $productname <br>
                                $cost
                            ";
                        }
                    ?>
                </ol>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>