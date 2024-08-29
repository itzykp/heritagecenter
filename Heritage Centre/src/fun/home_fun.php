<?php
    function fetchCatogry(){
        global $db;
        $selectCatogry = "SELECT * FROM categories ORDER BY 1";
        $runSelectCatogry = mysqli_query($db, $selectCatogry);
        while($fetchSelectCatogry = mysqli_fetch_array($runSelectCatogry)){
            $categoriesName = $fetchSelectCatogry['categoriesName'];
            $categoriesId = $fetchSelectCatogry['categoriesId'];
            echo "
                <li><a class='dropdown-item' href='cat.php?catId=$categoriesId'>$categoriesName</a></li>
            ";
        }
    }

    function userData(){
        global $db;
        if(isset($_SESSION['buyerId'])){
            $buyerId = $_SESSION['buyerId'];
            $selectBuyer = "SELECT * FROM buyer WHERE buyerId='$buyerId'";
            $runSelectBuyer = mysqli_query($db, $selectBuyer);
            $fetchBuyerData = mysqli_fetch_array($runSelectBuyer);
            $buyerName = $fetchBuyerData['fullname'];
            echo "
                <a class='nav-link' href='#'>
                    $buyerName
                </a>
            ";
        }else{
            echo "
                <a class='nav-link' href='login.php'>Not Yet log in?</a>
            ";
        }
    }

    function DisplayProductsHome(){
        global $db;
        $selectProducts = "SELECT * FROM products ORDER BY 1 LIMIT 10";
        $runSelectProducts = mysqli_query($db, $selectProducts);
        while($fetchProducts = mysqli_fetch_array($runSelectProducts)){
            $productId = $fetchProducts['productId'];
            $productTitle = $fetchProducts['productTitle'];
            $productPhoto = $fetchProducts['photo'];
            $sellerId = $fetchProducts['sellerId'];
            $cost = $fetchProducts['cost'];
            $numOfProducts = $fetchProducts['numOfProducts'];
            $productDescription = substr($fetchProducts['description'],0, 120);
            $catogryProduct = $fetchProducts['category'];
            echo "
                <div class='col-3'>
                    <a href='product.php?productId=$productId' style='text-decoration: none; color: #000;'>
                        <div class='card' style='width: 18rem;'>
                            <img height='150' src='products/$productPhoto' class='card-img-top border-bottom' alt='$productTitle' />
                            <div class='card-body'>
                                <h5 class='card-title'>$productTitle</h5>
                                <p class='card-text'>$productDescription...</p>
                                <p class='card-text'><b>Price: ₹$cost</b></p>
                                <div class='d-flex' style='gap:0.5rem;'>
                                    <form method='post'>
                                        <input type='hidden' name='addCartProductIdH' value='$productId' />
                                        <button class='btn btn-primary' name='addCartProductBtn' type='submit'>Add to cart</button>
                                    </form>
                                    <form method='post'>
                                        <input type='hidden' name='buynowH' value='$productId' />
                                        <button class='btn btn-danger' name='buyNowBtn' type='submit'>Buy Now</button>
                                    </form>
                                <div>
                            </div>
                        </div>
                    </a>
                </div>
            ";
        }
    }

    function addToCart(){
        global $db;
        if(isset($_POST['addCartProductBtn'])){
            if(isset($_SESSION['buyerId'])){
                $producId = $_POST['addCartProductIdH'];
                $buyerId = $_SESSION['buyerId'];
                $addToCart = "INSERT INTO `cart`(`productId`, `buyerId`) VALUES ('$producId', '$buyerId')";
                $runAddToCart = mysqli_query($db, $addToCart);
                if($runAddToCart){
                    echo"
                        <script>
                            window.alert('Item added into cart successfully!');
                        </script>
                    ";
                }else{
                    echo"
                        <script>
                            window.alert('ERROR: Can't add item into cart');
                        </script>
                    ";
                }
            }else{
                echo"
                    <script>
                        window.alert('You are not logged in! Please login to add into cart.');
                    </script>
                ";
            }
        }
    }
?>