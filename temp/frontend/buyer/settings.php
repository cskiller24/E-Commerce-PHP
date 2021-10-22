<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/settings.css">
    <title>Demo Store | Settings</title>
</head>
<body>
    <?php include("header.php")?>
    <h1 class="text-center mt-3">USER INFORMATION</h1>
    <div class="d-flex justify-content-center user-content">
        <div class="card text-center p-3 border-dark rounded-3" id="show">
            <h1><i class="fas fa-user fa-2x"></i></h1>
            <div class="card-title"><div class="card-text h2">CEDY CADAYONG CUARTERO</div></div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="card-text fw-bold">Email</div>
                    <div class="card-text">cadayongcs@gmail.com</div>
                </div>
                <div>
                    <div class="card-text fw-bold">Contact Number</div>
                    <div class="card-text">09281476264</div>
                </div>
            </div>
            <button class="btn btn-dark" id="change">Change Details</button>                
        </div>

        <!-- EDIT INFORMATION -->
        <div class="card text-center p-3 border-dark rounded-3" id="edit">
            <h1><i class="fas fa-user fa-2x"></i></h1>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <labal class="form-label" for="name">Name</labal>
                        <input type="text" class="form-control" value="Cedy Cadayong Cuartero" required>
                    </div>
                    <div class="mb-3">
                        <labal class="form-label" for="email">Email</labal>
                        <input type="email" class="form-control" value="email@yahoo.com" required>
                    </div>
                    <div class="mb-3">
                        <labal class="form-label" for="contact_num">Contact Number</labal>
                        <input type="text" name="contact_num" class="form-control" value="09281476264" required pattern="[0-9]{11}" maxlength="11">
                    </div>
                    <div class="mb-3">
                        <labal class="form-label" for="passwrd">Confirm Password</labal>
                        <input type="password" name="password" class="form-control"  required>
                    </div>
                    <input type="submit" class="btn btn-dark btn-block w-100" value="Submit">
                </form>
                <a href="#" class="btn btn-dark mt-3" id="changePass">Change Password</a>
                <a href="settings.php" class="btn btn-dark mt-3">Cancel</a>
            </div>
        </div>

        <!-- CHANGE PASSWORD -->
        <div class="card text-center p-3 border-dark rounded-3" id="password">
            <h1><i class="fas fa-user fa-2x"></i></h1>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <labal class="form-label" for="name">Current Password</labal>
                        <input type="password" class="form-control" required placeholder="Current Password">
                    </div>
                    <div class="mb-3">
                        <labal class="form-label" for="name">New Password</labal>
                        <input type="password" class="form-control" required placeholder="New Password">
                    </div>
                    <div class="mb-3">
                        <labal class="form-label" for="name">Re-Enter New Password</labal>
                        <input type="password" class="form-control" required placeholder="Re Enter New Password">
                    </div>
                    <input type="submit" class="btn btn-dark btn-block w-100" value="Submit">
                </form>
                <a href="settings.php" class="btn btn-dark mt-3">Cancel</a>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#edit").hide();
    $("#password").hide();
        $("#change").click(function(){
            $("#show").toggle(200);
            $("#edit").toggle(200);
        });
        $("#changePass").click(function(){
            $("#edit").toggle(200);
            $("#password").toggle(200);
        });
</script>

</body>
</html>