<?php
    session_start();
    session_regenerate_id(true);
    $sellerId = $_SESSION['sellerId'];
    include '../src/db/db.php';
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
        <div class="col-sm-12 col-lg-4 col-md-4"></div>
            <div class="col-sm-12 col-lg-4 col-md-4 border shadow-sm p-3 bg-white">
                <h4>Add Items</h4>
                <form method="post">
                    <div class="mb-3">
                        <input type="text" required="required" name="productTitle" class="form-control form-control-lg" autocomplete="off" placeholder="Product Title" />
                    </div>
                    <div class="mb-3">
                        <input type="file" name="productImg" class="form-control form-control-lg" />
                    </div>
                    <input type="hidden" value="<?php echo $sellerId;?>" name="sellerId"/>
                    <div class="mb-3">
                        <input type="text" required="required" name="cost" class="form-control form-control-lg" autocomplete="off" placeholder="Cost of Product" />
                    </div>
                    <div class="mb-3">
                        <input type="text" required="required" name="tnp" class="form-control form-control-lg" autocomplete="off" placeholder="Total number of Product" />
                    </div>
                    <div class="mb-3">
                        <textarea name="description" class="form-control form-control-lg" placeholder="Description"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="text" required="required" name="category" class="form-control form-control-lg" autocomplete="off" placeholder="Cost of Product" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-lg btn-primary w-100" name="addBtn">Add Item</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-lg-4 col-md-4"></div>
        </div>
    </div>
    <?php
        if(isset($_POST['addBtn'])){
            $productTitle = $_POST['productTitle'];
            $productImg = $_POST['productImg'];
            $sellerId = $_POST['sellerId'];
            $cost = $_POST['cost'];
            $tnp = $_POST['tnp'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $insertData = "INSERT INTO `products`(`productTitle`, `photo`, `sellerId`, `cost`, `numOfProducts`, `description`, `category`) VALUES ('$productTitle', '$productImg','$sellerId', '$cost', '$tnp', '$description','$category')";
            $runInsert = mysqli_query($db, $insertData);
            if($runInsert){
                echo "
                    <script>
                        window.alert('Data Inserted successfully');
                    </script>
                ";
            }else{
                echo "
                    <script>
                        window.alert('Failed to insert.');
                    </script>
                ";
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>