<?php
    function buyerLogin(){
        global $db;
        if(isset($_POST['loginBtn'])){
            $buyerEmail = mysqli_real_escape_string($db, $_POST['loginEmail']);
            $buyerPassword = md5(sha1($_POST['loginPassword']));
            $selectBuyer = "SELECT * FROM buyer WHERE email='$buyerEmail' AND password='$buyerPassword'";
            $runSelectBuyer = mysqli_query($db, $selectBuyer);
            $buyerId = mysqli_fetch_array($runSelectBuyer)['buyerId'];
            $numBuyers = mysqli_num_rows($runSelectBuyer);
            if($numBuyers == 1){
                $_SESSION['buyerId'] = $buyerId;
                header('location: index.php');
            }else{
                echo"
                    <script>
                        window.alert('Entered Email address or Password is incorrect!');
                    </script>
                ";
            }
        }
    }
    function buyerRegister(){
        global $db;
        if(isset($_POST['registerBtn'])){
            $fullname = mysqli_real_escape_string($db, $_POST['registerFullname']);
            $phone = mysqli_real_escape_string($db, $_POST['registerPhone']);
            $email = mysqli_real_escape_string($db, $_POST['registerEmail']);
            $address = mysqli_real_escape_string($db, $_POST['registerAddress']);
            $password = md5(sha1($_POST['registerPassword']));
            $insertBuyer = "INSERT INTO `buyer`(`fullname`, `phone`, `email`, `address`, `password`, `isVerified`) VALUES ('$fullname', '$phone','$email','$address','$password','false')";
            $runInsertBuyer = mysqli_query($db, $insertBuyer);
            if($runInsertBuyer){
                echo"
                    <script>
                        window.alert('Congratulations, You have been registered successfully!');
                    </script>
                ";
            }else{
                echo"
                    <script>
                        window.alert('ERROR: Can't register, please try again!');
                    </script>
                ";
            }
        }
    }
?>