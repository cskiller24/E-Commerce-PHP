<?php
    //TODO: ADD TO CART
    session_start();
    include("dbconnection.php");
    include("functions.php");
    include("cart_functions.php");

    $buyer_data = checkloginBuyer($conn);

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $product = getProductDetails($conn, $id);

    }else{header("Location: store_buyer.php");}

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])){
        $cart = addToCart($conn, $id, $buyer_data['buyer_id']);

        if($cart == "SUCCESS"){
            echo"SUCCESS";
        }else{echo"FAILED";}
    }   

?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="product">
        <p><?php echo($product['product_name']); ?></p>
        <img src="<?php echo($product['image']); ?>" alt="image">
        <p>Details: <?php echo($product['product_detail']); ?></p>
        <p>PHP:<?php echo($product['price']); ?></p>
        <p>Amount:<?php echo($product['amount']); ?></p>
    </div>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo($product['product_id']); ?>">
            <input type="submit" value="Add to Cart">
        </form>
        <a href="store_buyer.php">Continue Shopping</a>
</body>
</html>