<?php
session_start();
include "dbconnection.php";
include "functions.php";

$seller_data = checkloginSeller($conn);
$seller_id = $seller_data["seller_id"];

$query = "SELECT * FROM product WHERE seller_id = '$seller_id'";

$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Seller</title>
</head>
<body>
    <!-- // TODO: List of Products  -->
    <?php while ($product = mysqli_fetch_assoc($result)) { ?>
     <div class='container'>
        <p><?php echo $product["product_name"]; ?></p>
        <img src="<?php echo $product["image"]; ?>" alt='image'>
        <p>PRICE:<?php echo $product["price"]; ?></p>
        <a href="edit_product.php?id=<?php echo $product[
          "product_id"
        ]; ?>">Edit</a>
        <a href="delete_product.php?id=<?php echo $product[
          "product_id"
        ]; ?>">Delete</a>
    </div>
    <?php } ?>

    <a href="addproduct_seller.php">Add a product</a>
    <a href="logout_seller.php">Logout</a>

</body>
</html>

