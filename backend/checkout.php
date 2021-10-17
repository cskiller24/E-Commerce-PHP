<?php
    session_start();
    include("dbconnection.php");
    include("functions.php");
    include("cart_functions.php");

    if(isset($_GET['bid'])){
        $id = $_GET['bid'];
        $toSql = "SELECT * FROM cart WHERE buyer_id = '$id'";
        $result = mysqli_query($conn, $toSql);
        if($result && mysqli_num_rows($result) > 0 ){
            $total = 0;
            while($row = mysqli_fetch_assoc($result)){
                $price = getProductDetails($conn, $row['product_id']);
                $total = $total + ($price['price']*$row['amount']);
            }
        }
        else(header("Location: store_buyer.php"));
    }else(header("Location:cart_buyer.php"));  
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
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Demo Store | Checkout</title>
    </head>
    <body>
        <form method="post">
            <select name="mode" id="" onchange="this.form.submit()">
            <?php $mode = $_POST['mode']?>
                <option selected disabled value="">Select Payment Method</option>
                <option value="1" <?php if($mode == 1) echo "selected";?>>Cash On Delivery</option>
                <option value="2" <?php if($mode == 2) echo "selected";?>>GCASH</option>
            </select>
        </form>
    </body>
    </html>
</body>
</html>