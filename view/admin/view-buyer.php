<?php 
    session_start();
    //**CHECK LOGIN */
    if(!isset($_SESSION['admin_id'])){
        header("Location: login.php");
        exit();
    }
    include("../../classes/admin/view-buyer.class.php");
    $buyer = $result;

    //**RESPONSE */
    $delete_response = "";
    if(isset($_GET['password']) && $_GET['password'] == "invalid"){
        $delete_response = "Password Does Not Match";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="style/view.css">
    <title>Demo Store | View</title>
</head>
<body>
    <?php include('header.php');?>
    <h1 class="text-center mt-5"><?=$delete_response?></h1>
    <?php if($buyer){?>
    <div class="container mt-3 bg-dark border-4 p-3">
        <div class="card seller-information bg-dark border-0 d-flex justify-content-evenly flex-row flex-wrap mt-3">
            <div class="card p-2 seller-image">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <i class="fas fa-user fa-9x"></i>
                </div>
            </div>
            <div class="card p-2 seller-details">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title h3 text-center"><?=$buyer['buyer_name']?></div>
                    </div>
                    <div class="email d-flex flex-wrap mb-2">
                        <div class="card-text mx-3 fw-bold">Email</div>
                        <div class="card-text"><?=$buyer['buyer_email']?></div>
                    </div>
                    <div class="contact_number d-flex flex-wrap mb-2">
                        <div class="card-text mx-3 fw-bold">Contact Number</div>
                        <div class="card-text"><?=$buyer['buyer_contactNumber']?></div>
                    </div>
                    <div class="contact_number d-flex flex-wrap">
                        <div class="card-text mx-3 fw-bold">Registered Date</div>
                        <div class="card-text"><?=$buyer['registered_date']?></div>
                    </div>
                </div>

                <!-- Delete Seller -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Delete Buyer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Delete Seller?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../../classes/admin/view-buyer.class.php" method="post">
                        <input type="hidden" name="buyer_id" value="<?=$buyer['buyer_id']?>">
                        <input type="password" name="password" placeholder="Enter Password to Confirm" class="form-control" required>    
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" value="Submit" class="btn btn-dark" name="submit">
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php } 
        else{
            echo "<h1 class='text-center mt-5'>Error: Please Try Again</h1>";
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>