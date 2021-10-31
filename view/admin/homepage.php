<?php
session_start();
    //**CHECK IF THE USER IS ALREADY LOGGED IN */
    if(!isset($_SESSION['admin_id'])){
        header("Location: login.php");
        exit();
    }

    if(!isset($_GET['view'])){
        header("Location: homepage.php?view=none");
        exit();
    }

    include("../../classes/admin/homepage.class.php");

    $sellers = $result_seller;
    $buyers = $result_buyer;

    $homepage_response = "";
    if(isset($_GET['password']) && $_GET['password'] == "failed"){
        $homepage_response = "Password Does Not Match";
    }
    if(isset($_GET['delete']) && $_GET['delete'] == "success"){
        $homepage_response = "Deleted Successfully";
    }
    if(isset($_GET['delete']) && $_GET['delete'] == "failed"){
        $homepage_response = "Error. Please try again";
    }
?>    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="style/homepage.css">
        <title>Demo Shop | Admin</title>


    </head>
    <body>
        <?php include("header.php"); ?>
        <h1 class="text-center mt-5"><?=$homepage_response?></h1>
        <?php if($_GET['view'] == "seller"){?>
        <?php if($sellers == false){
            echo "<h1 class='mt-5 text-center'>There are no registered Sellers</h1>";
        }
        else{?>
        <div class="sellers my-4">
            <?php foreach($sellers as $seller){?>
            <div class="seller card text-wrap m-2 border-danger text-center">
                <i class="fas fa-user fa-5x p-3"></i>
                <div class="card-body">
                    <div class="card-text text-wrap">
                        <h3><?=$seller['seller_name']?></h3>
                    </div>
                    <a class="btn btn-warning btn-block mt-3" href="view-seller.php?sid=<?=$seller['seller_id']?>">
                        View Seller Details
                    </a>
                    <button class="btn btn-warning btn-block mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Seller
                    </button>
                </div>
            </div>
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Delete Seller?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../../classes/admin/homepage.class.php">
                            <input type="hidden" name="seller_id" value="<?=$seller['seller_id']?>">
                            <input type="password" name="adminPassword" placeholder="Enter Password" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-warning" value="Submit" name="seller_submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
        </div>
        <?php }} ?>

        <?php if($_GET['view'] == "buyer"){?>
            <?php if($buyers == false){
            echo "<h1 class='mt-5 text-center'>There are no registered Buyers</h1>";
        }else{
            ?>
        <div class="sellers my-4">
            <?php foreach($buyers as $buyer){?>
            <div class="seller card text-wrap m-2 border-dark text-center">
                <i class="fas fa-user fa-5x p-3"></i>
                <div class="card-body">
                    <div class="card-text text-wrap">
                        <h3><?=$buyer['buyer_name']?></h3>
                    </div>
                    <a class="btn btn-warning btn-block mt-3" href="view-buyer.php?sid=<?=$buyer['buyer_id']?>">
                        View Buyer Details
                    </a>
                    <button class="btn btn-warning btn-block mt-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        Delete Buyer
                    </button>
                </div>
            </div>
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-light">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="staticBackdropLabel">Delete Buyer?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="../../classes/admin/homepage.class.php">
                            <input type="hidden" name="buyer_id" value="<?=$buyer['buyer_id']?>">
                            <input type="password" name="adminPassword" placeholder="Enter Password" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-warning" value="Submit" name="buyer_submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <?php } ?>
        </div>
        <?php }} ?>

        <?php if($_GET['view'] == "none"){
            echo "<h1 class='text-center mt-5'>SELECT SELLER OR BUYER ABOVE</h1>";   
        }?>

        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
    </html>