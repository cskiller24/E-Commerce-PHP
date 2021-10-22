<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/nav.css">
    <title>Demo Store | Settings</title>
</head>
<body>
    <?php include("header.php"); ?>
    <h1 class="text-center mt-5">SELLER INFORMATION</h1>
    <div class="d-flex justify-content-center mt-3">
        <div class="card p-3 border rounded-3 border-danger text-center">
            <i class="fas fa-user fa-6x my-3"></i>
            <div class="mb-3"><h2>Cedy Cadayong Malubay</h2></div>
            <div class="mb-3">
                <div class="fw-bold">Email</div>
                <div>cadayongcs@gmail.com</div>
            </div>
            <div class="mb-3">
                <div class="fw-bold">Contact Number</div>
                <div>09281476264</div>
            </div>
            <div class="actions">
                <button type="button" class="btn btn-danger btn-block w-100 mb-2" data-bs-toggle="modal" data-bs-target="#edit">
                    Edit Details
                </button>
                <button type="button" class="btn btn-danger btn-block w-100" data-bs-toggle="modal" data-bs-target="#changePassword">
                    Change Password
                </button>
            </div>
        </div>
    </div>

    <!-- Edit SELLER DETAILS MODAL -->
    <div class="modal fade" id="changePassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="password" name="password" class="form-control mb-3" placeholder="Current Password" required>
                    <input type="password" name="newPassword" class="form-control mb-3" placeholder="New Password" required>
                    <input type="password" name="newPasswordConfirm" class="form-control" placeholder="Confirm New Password" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Submit" class="btn btn-danger">
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- CHANGE PASSWORD -->
    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Seller</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <input type="email" name="email" id="" class="form-control mb-3" placeholder="Email Address" required>
                    <input type="text" name="contact_number" id="" class="form-control mb-3" placeholder="Contact Number" required pattern="[0-9]{11}" maxlength="11">
                    <input type="password" name="password" id="" class="form-control" placeholder="Current Password" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" value="Submit" class="btn btn-danger">
                </form>
            </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>