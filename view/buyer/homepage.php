<?php
session_start();

//!!TODO AFTER THE SELLER
//**CHECKING IF THE USER IS ALREADY SIGNED IN */
    if(!isset($_SESSION['buyer_id'])){
        header("Location: login_register.php");
        exit();
    }
//**PAGINATION */
    if(!isset($_GET['page'])){
        header("Location: homepage.php?page=1");
    }

    include("../../classes/buyer/homepage.class.php");

    if($_SESSION['products'] == false){
        $product = false;
    }
    else{
        $product = $_SESSION['products'];
        var_dump($product);
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
    <link rel="stylesheet" href="style/product.css">
    <title>Demo Shop | Store</title>

</head>
<body>
    <?php include("header.php"); ?>
    <?php if($product){?>
        <div class="products my-4">
            <div class="product m-2 card p-3 border-dark">
                <img src="../../product-image/index.jpg" alt="Product">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title text-center">PRODUCT 2</div>
                    </div>
                    <div class="a-links">
                        <a href="#" class="btn btn-dark card-text mt-5">Add to Cart</a>
                        <a href="view.php" class="btn btn-dark card-text mt-5">View Item</a>
                    </div>
                </div>
            </div>
        </div>
            <nav class="center text-center">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#2">1</a></li>
                    <li class="page-item active">
                    <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#3">3</a></li>
                </ul>
            </nav>
    <?php }
    else{
        echo"<h1 class='my-5 text-center'>THERES NO PRODUCT</h1>";
    }?>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>