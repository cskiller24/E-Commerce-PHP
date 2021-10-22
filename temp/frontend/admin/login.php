<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>    
    <link rel="stylesheet" href="style/admin-login.css">
    <title>Demo Store | Admin Login</title>
    
</head>
<body>
    <div class="global d-flex justify-content-center align-items-center">
        <div class="card login-form text-center">
            <div class="card-body">
                <div class="card-text mb-5">
                    <h1>Admin</h1>
                    <i class="fas fa-user fa-5x"></i>
                </div>
                <form action="" method="post">
                <div class="card-text mb-3">
                    <label for="username" class="form-label">Admin Username</label>
                    <input type="text" name="username" placeholder="Enter Username" class="form-control" class="input" required>
                </div>
                <div class="card-text mb-4">
                    <label for="password" class="form-label">Admin Password</label>
                    <input type="password" name="password" placeholder="Enter Password" class="form-control" class="input" required>
                </div>
                    <input type="submit" value="Submit" class="btn btn-warning btn-block w-100 mb-4">
                    <div class="d-flex flex-warp">
                        <a href="../buyer/login_register.php" class="text-decoration-none mx-2 link-warning">Login as Buyer</a>
                        <a href="../seller/login_register.php" class="text-decoration-none mx-2 link-warning    ">Login as Seller</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>