<?php
session_start();

//!!TODO AFTER THE SELLER
//**CHECKING IF THE USER IS ALREADY SIGNED IN */
    if(!isset($_SESSION['buyer_id'])){
        header("Location: login_register.php");
        exit();
    }
//**ERROR TRAPPING */
    $cart_response = "";
    if(isset($_GET['cart']) && $_GET['cart'] == "success"){
        $cart_response = "ADDED TO CART";
    }
    if(isset($_GET['cart']) && $_GET['cart'] == "failed"){
        $cart_response = "FAILED";
    }
    if(isset($_GET['checkout']) && $_GET['checkout'] == "success"){
        $cart_response = "Sucessfully Check Out All Items";
    }
    //**PAGINATION */
    if(!isset($_GET['page'])){
        header("Location: homepage.php?page=1");
    }
        include("../../classes/buyer/homepage.class.php");
        
        $pagination = $_SESSION['pagination'];
        $products = $_SESSION['products'];
    

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
    <?php if($products != false){?>
        <h2 class="text-center mt-3"><?php echo $cart_response; ?></h2>
        <div class="products my-4">
            <?php foreach($products as $product){?>
            <div class="product m-2 card p-3 border-dark">
                <img src="<?php echo $product['image']?>" alt="Product">
                <div class="card-body">
                    <div class="card-header">
                        <div class="card-title text-center"><?php echo $product['product_name'] ?></div>
                    </div>
                        <div class="card-text text-center mt-3"><?php echo $product['price'] ?> PHP</div>
                    <div class="a-links">
                        <form action="../../classes/buyer/add-to-cart.class.php" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']?>">
                            <input type="hidden" name="buyer_id" value="<?php echo $_SESSION['buyer_id']?>">
                            <input type="hidden" name="seller_id" value="<?php echo $product['seller_id']?>">
                            <input type="hidden" name="page" value="<?php echo $_GET['page']?>">
                            <input type="submit" value="Add to Cart" name="add-to-cart-homepage" class="btn btn-dark card-text mt-3">
                        </form>
                        <a href="view.php?pid=<?php echo $product['product_id']; ?>" class="btn btn-dark card-text mt-3">View Item</a>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
            <nav class="center text-center">
                <ul class="pagination">
                    <?php for($i = 0; $i < $pagination; $i++){ ?>
                    <li class="page-item"><a class="page-link" href="homepage.php?page=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
                    
                    <?php }?>
                </ul>
            </nav>
    <?php }
    else{
        echo"<h1 class='my-5 text-center'>THERES NO PRODUCT</h1>";
    }?>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>