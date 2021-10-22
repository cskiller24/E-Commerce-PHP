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
    <?php include("header.php") ?>

    <div class="d-flex justify-content-center align-items-center mt-4">
        <div class="card bg-warning rounded-3">
            <div class="card rounded-3 m-4 p-3 text-center">
                <div class="card-body">
                    <div class="card-text"><i class="fas fa-user fa-8x"></i></div>
                    <div class="card-title mt-3"><h2>Admin</h2></div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#changePassword">
                    Change Password
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Change Admin Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <input type="password" name="currentPassword" required placeholder="Currrent Admin Password" class="form-control mb-3">
                                <input type="password" name="currentPassword" required placeholder="New Admin Password" class="form-control mb-3">
                                <input type="password" name="currentPassword" required placeholder="New Admin Password" class="form-control">
                        </div>
                        <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Submit" class="btn btn-warning">
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>