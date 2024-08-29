<?php
    function DisplayCartItems(){
        global $db;
        global $buyerId;
        $selectCartItems = "SELECT * FROM cart WHERE buyerId='$buyerId'";
        $runSelectCartItems = mysqli_query($db, $selectCartItems);
        while($fetchCartItems = mysqli_fetch_array($runSelectCartItems)){
            $productId = $fetchCartItems['productId'];
            $selectItems = "SELECT * FROM products WHERE productId='$productId'";
            $runSelectItems = mysqli_query($db, $selectItems);
            $fetchItemData = mysqli_fetch_array($runSelectItems);
            $productTitle = $fetchItemData['productTitle'];
            $productImg = $fetchItemData['photo'];
            echo"
                    <li class='list-group-item d-flex justify-content-between align-items-start'>
                        <div class='ms-2 me-auto'>
                            <div class='fw-bold'>
                                <img src='products/$productImg' height='50' class='border rounded' alt='$productTitle' />
                                $productTitle
                            </div>
                        </div>
                        <form method='post'>
                            <input type='hidden' name='cartItemDelete' value='$productId' />
                            <button type='submit' name='removeBtn' class='btn btn-danger'>Remove</button>
                        </form>
                    </li>
            ";
        }
        if(isset($_POST['removeBtn'])){
            $productId = $_POST['cartItemDelete'];
            $removeItem = "DELETE FROM `cart` WHERE productId='$productId'";
            $runRemoveItem = mysqli_query($db, $removeItem);
            if($runRemoveItem){
                echo"
                    <script>
                        window.alert('Item Deleted Successfully!');
                    </script>
                ";  
            }else{
                echo"
                    <script>
                        window.alert('ERROR: Item can't be deleted');
                    </script>
                ";  
            }   
        }
    }
?>