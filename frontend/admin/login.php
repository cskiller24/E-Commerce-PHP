<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/login.css">

    <title>Demo Store | Admin Login</title>
    
</head>
<body>
    <div class="image"></div>
    <div class="global">
        <div class="card login-form">
            <div class="card body">
                <h1 class="card-title text-center mb-5"><i class="fas fa-user-shield"> </i><br>Login</h1>
                <div class="card-text">
                    <form method="post">
                        <div class="form-group text-center">
                            <label for="email" class="mb-2">Admin Username</label>
                            <input type="text" class="form-control form-control-sm mb-3" id="email" name="password">
                        </div>
                        <div class="form-group text-center">
                            <label for="password" class="mb-2">Admin Password</label>
                            <input type="password " class="form-control form-control-sm mb-3" id="password" name="password">
                        </div>
                        <input type="submit" name="submit" class="btn btn-warning btn-block w-100">
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>