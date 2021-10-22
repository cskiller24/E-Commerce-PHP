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
            <div class="card login">
                <div class="card-body text-center">
                    <div class="card-title  mb-3"><h1>Register</h1></div>
                    <h3><?php $result;?></h2>
                    <div class="card-text">
                        <form method="post">
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
                                <input type="text" class="form-control" name="RcontactNumber" required pattern="[0-9]{11}" maxlength="11">
                            </div>
                            <div class="mb-3">
                                <label for="Rpassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="Rpassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="RconfirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="RconfirmPassword" required>
                            </div>
                            <input type="submit" name="Rsubmit" value="Submit" class="btn btn-outline-light btn-block w-100">
                        </form>
                    </div>      
                </div>
            </div>
            <div class="card signup">
                <div class="card-body text-center">
                    <div class="card-title mb-4">
                        <h1>Login</h1>
                    </div>
                    <div class="cart-text">
                        <form method="post">
                            <div class="mb-3">
                                <label for="Lemail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="Lemail" required>
                            </div>
                            <div class="mb-3">
                                <label for="Lpassword" class="form-label">Password</label>
                                <input type="password" class="form-control" name="Lpassword" required>
                            </div>
                                <input type="submit" name="Lsubmit" value="Submit" class="btn btn-outline-light btn-block w-100 mb-3">
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



