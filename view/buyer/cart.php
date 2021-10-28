<?php 
    session_start();
    //**Check Login */
    if(!isset($_SESSION['buyer_id'])){
        header("Location: login_register.php");    
    }
    include("../../classes/buyer/cart.class.php");
    $cart_list = $cart_lists;

    //**RESPONSES */
    $cart_response = "";
    if(isset($_GET['cart']) && $_GET['cart'] == "addS"){
        $cart_response = "Successfully Added Cart";
    }
    if(isset($_GET['cart']) && $_GET['cart'] == "addF"){
        $cart_response = "Something Went Wrong Please Try Again";
    }
    if(isset($_GET['cart']) && $_GET['cart'] == "minusS"){
        $cart_response = "Successfully Decrease Cart";
    }
    if(isset($_GET['cart']) && $_GET['cart'] == "minusF"){
        $cart_response = "Something Went Wrong Please Try Again";
    }
    if(isset($_GET['cart']) && $_GET['cart'] == "removeS"){
        $cart_response = "Successfully Remove Cart";
    }
    if(isset($_GET['cart']) && $_GET['cart'] == "removeF"){
        $cart_response = "Something Went Wrong Please Try Again";
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
    <link rel="stylesheet" href="style/cart.css">
    <title>Demo Store | Cart</title>
</head>
<body>
<?php include("header.php");?>
<h1 class="text-center mt-3"><?= $cart_response ?></h1>
    <?php if($cart_lists){?>
    <div class="products my-4">
        <?php foreach($cart_lists as $cart){ ?>
        <div class="product m-2 card p-3 border-dark">
            <img src="<?= $cart['product_image'] ?>" alt="Product">
            <div class="card-body">
                <div class="card-header">
                    <div class="card-title text-center"><?= $cart['product_name'] ?></div>
                </div>
                <div class="card-text text-center">Quantity: <?= $cart['amount'] ?></div>
                <div class="a-links">
                    <a href="cart.php?action=minus&pid=<?= $cart['product_id'] ?>&bid=<?= $cart['buyer_id'] ?>&sid=<?= $cart['seller_id'] ?>&amount=<?= $cart['amount'] ?>" class="btn btn-dark card-text mt-3"><i class="fas fa-minus"></i></a>
                    <a href="cart.php?action=add&pid=<?= $cart['product_id'] ?>&bid=<?= $cart['buyer_id'] ?>&sid=<?= $cart['seller_id'] ?>&amount=<?= $cart['amount'] ?>" class="btn btn-dark card-text mt-3"><i class="fas fa-plus"></i></a>
                </div>
                <div class="remove-button">
                    <a href="cart.php?action=remove&pid=<?= $cart['product_id'] ?>&bid=<?= $cart['buyer_id'] ?>&sid=<?= $cart['seller_id'] ?>" class="btn btn-outline-dark card-text mt-2 btn-remove">Remove</a>
                    <a href="view.php?pid=<?= $cart['product_id'] ?>" class="btn btn-outline-dark card-text mt-2 btn-remove mx-1">View</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="container">
        <div class="button d-flex justify-content-center">
            <a href="checkout.php" class="btn btn-dark py-3 h1" id="checkout"> <i class="far fa-credit-card" ></i> Checkout all Items</a>
        </div>
    </div>
    <?php }
        else{
            echo "<h1 class='text-center mt-5'>NO CARTS SHOWN</h1>";
        }
    ?>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>