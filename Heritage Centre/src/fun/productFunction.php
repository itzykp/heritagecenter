<?php
    function fetchProductData(){
        global $db;
        $productId = $_GET['productId'];
        $selectProducts = "SELECT * FROM products WHERE productId='$productId'";
        $runSelectProducts = mysqli_query($db, $selectProducts);
        $fetchProduct = mysqli_fetch_array($runSelectProducts);
        $productTitle = $fetchProduct['productTitle'];
        $productPhoto = $fetchProduct['photo'];
        $sellerId = $fetchProduct['sellerId'];
        $cost = $fetchProduct['cost'];
        $numOfProducts = $fetchProduct['numOfProducts'];
        $productDescription = $fetchProduct['description'];
        $catogryProduct = $fetchProduct['category'];
        echo"
            <div>
                <img src='products/$productPhoto' width='100%' class='shadow-lg border rounded' height='300px' />
            </div>
            <h3 class='mt-2'>$productTitle</h3>
            <p><b>Price: ₹$cost</b></p>
            <div class='d-flex' style='gap: 0.5rem;'>
                <form method='post'>
                    <input type='hidden' name='addCartProductIdH' value='$productId' />
                    <button class='btn btn-primary btn-lg' name='addCartProductBtn' type='submit'>Add to cart</button>
                </form>
                <form method='post'>
                    <input type='hidden' name='buynowH' value='$productId' />
                    <button class='btn btn-danger btn-lg' name='buyNowBtn' type='submit'>Buy Now</button>
                </form>
            </div>
            <div class='mt-3'>
                <p>$productDescription</p>
            </div>
        ";
        echo "<h3>Review's and Feedbacks</h3>";
        $selectReviews = "SELECT * FROM reviews WHERE productId='$productId'";
        $runReview = mysqli_query($db, $selectReviews);
        while($fetchReviews = mysqli_fetch_array($runReview)){
            $points = $fetchReviews['stars'];
            $buyerId = $fetchReviews['buyerId'];
            $feedback = $fetchReviews['feedback'];
            echo"
                <div class='container border shadow-sm p-3'>
                    User Id: <b>$buyerId</b> <br>
                   Stars: <b>$points/5</b>
                   <p>$feedback</p>
                <div>
            ";
        }
    }
?>