<?php
session_start();
    //**Checking if the user is alrady logged in */
    if(isset($_SESSION['buyer_id'])){
        header("Location: homepage.php");
        exit();
    }
    
    $login_response = "";
    $register_response = "";

    //**REGISTER ERROR MESSAGES */
    if(isset($_GET['err']) && $_GET['err'] == "password"){
        $register_response = "Password Does Not Match";
    }
    if(isset($_GET['err']) && $_GET['err'] == "empR"){
        $register_response = "Please Enter Register";
    }
    if(isset($_GET['err']) && $_GET['err'] == "err"){
        $register_response = "Error Register";
    }
    if(isset($_GET['err']) && $_GET['err'] == "email"){
        $register_response = "Email is already exist";
    }
    if(isset($_GET['err']) && $_GET['err'] == "success"){
        $register_response = "Succesfully Registered";
    }

    //**LOGIN ERROR MESSAGES */
    if(isset($_GET['err']) && $_GET['err'] == "invalid"){
        $login_response = "Invalid Username or Password";
    }
    if(isset($_GET['err']) && $_GET['err'] == "emp"){
        $login_response = "Please Enter Email and Password";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../buyer/style/register.css">
    <link rel="stylesheet" href="../buyer/style/login.css">
    <title>Demo Store | Login Register</title>
</head>
<body>
    <div class="global">
        <!-- LOGIN -->
        <div class="card login">
            <div class="card-body text-center">
                <div class="card-title  mb-3"><h1>Register</h1></div>
                <div class="my-3"><?php echo $register_response; ?></div>
                <div class="card-text">
                    <form method="post" action="../../classes/buyer/register.class.php">
                        <div class="mb-3">
                            <label for="Rfullname" class="form-label">Fullname</label>
                            <input type="text" class="form-control" name="Rfullname" required>
                        </div>
                        <div class="mb-3">
                            <label for="Remail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="Remail" required>
                        </div>
                        <div class="mb-3">
                            <label for="RcontactNumber" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="Rcontact_number" required pattern="[0-9]{11}" maxlength="11">
                        </div>
                        <div class="mb-3">
                            <label for="Rpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="Rpassword" required>
                        </div>
                        <div class="mb-3">
                            <label for="RconfirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="Rconfirm_password" required>
                        </div>
                            <input type="submit" name="Rsubmit" value="Rsubmit" class="btn btn-outline-light btn-block w-100">
                    </form>
                </div>      
            </div>
        </div>
        <!-- SIGNUP -->
        <div class="card signup">
            <div class="card-body text-center">
                <div class="card-title mb-4">
                    <h1>Login</h1>
                </div>
                <div class="cart-text">
                    <div class="mb-3 fw-800"><?php echo $login_response ?></div>
                    <form method="post" action="../../classes/buyer/login.class.php">
                        <div class="mb-3">
                            <label for="Lemail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="Lemail" required>
                        </div>
                        <div class="mb-3">
                            <label for="Lpassword" class="form-label">Password</label>                                
                            <input type="password" class="form-control" name="Lpassword" required>
                        </div>
                            <input type="submit" name="submit" value="Submit" class="btn btn-outline-light btn-block w-100 mb-3">
                    </form>
                    <div class="d-flex justify-content-around align-items-center">
                        <a href="../seller/login_register.php" class="seller-link mt-3">Login as Seller</a>
                        <a href="../admin/login.php" class="seller-link mt-3">Login as Admin</a>
                    </div>
               </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>



