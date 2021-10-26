<?php 
    session_start();
    //** CHECKING IF THE USER IS ALREADY LOGGED IN */
    if(!isset($_SESSION['buyer_id'])){
        header("Location: login_register.php");
        exit();
    }
    include("../../classes/buyer/view.class.php");

    $product = $_SESSION['view'];

    //**ERROR TRAPPING */
    $cart_response = "";
    if(isset($_GET['cart']) && $_GET['cart'] == "success"){
        $cart_response = "ADDED TO CART";
    }
    if(isset($_GET['cart']) && $_GET['cart'] == "failed"){
        $cart_response = "Something is Wrong Please Try Again";
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
    <title>Demo Store | View Product</title>
</head>
<body>
    <?php include("header.php"); ?>
    <?php if($product != false){?>
    
    <div class="mt-3 container">
        <h1 class="text-center mb-3"><?php echo $cart_response; ?></h1>
        <div class="card border-dark bg-dark d-flex justify-content-evenly flex-row flex-wrap p-3">
            <div class="card image d-flex align-items-center m-2 border border-warning border-2 p-2">
                <img src="<?php echo $product['image'] ?>" alt="">
            </div>
            <div class="card details m-2 border border-warning border-2 text-center">
                <div class="card-header">
                    <h1><?php echo $product['product_name'] ?></h1>
                </div>
                <div class="card-body">
                    <div class="product-details">
                        <div class="me-3 fw-bold">Price</div>
                        <div class="fw-bold margins"><h4><?php echo $product['price'] ?> PHP</h4></div>
                    </div>
                    <div class="product-details">
                        <div class="me-3 fw-bold text-center">Detail</div>
                        <div class="details-text"><?php echo $product['product_detail'] ?></div>
                    </div>
                </div>
                <form action="../../classes/buyer/add-to-cart.class.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                    <input type="hidden" name="seller_id" value="<?php echo $product['seller_id'];?>">
                    <input type="hidden" name="buyer_id" value="<?php echo $_SESSION['buyer_id'];?>">
                    <input type="submit" name="add-to-cart-view" value="Add to Cart" class="btn btn-dark btn-block w-100">
                </form>
            </div>
        </div>
    </div>
    <?php }?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>