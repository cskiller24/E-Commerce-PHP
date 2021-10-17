<?php
session_start();
include "dbconnection.php";
include "functions.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $product = getProductDetails($conn, $id);
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_update = $_POST["product-name"];
    $detail_update = $_POST["product-detail"];
    $price_update = $_POST["product-price"];
    $file_update = "product-image/" . $_FILES["product-image"]["name"];

    if (
      !empty($name_update) &&
      !empty($detail_update) &&
      is_numeric($price_update)
    ) {
      if (strlen($_FILES["product-image"]["name"]) != 0) {
        $toSql = "UPDATE product SET product_name = '$name_update', product_detail = '$detail_update', price = '$price_update', image = '$file_update' WHERE product_id = '$id'";
        move_uploaded_file(
          $_FILES["product-image"]["tmp_name"],
          "product-image/" . $_FILES["product-image"]["name"]
        );
        unlink($product["image"]);
        $result = mysqli_query($conn, $toSql);
        if (mysqli_query($conn, $toSql)) {
          header("Location: store_seller.php");
          die();
        } else {
          echo "Error";
        }
      } else {
        $toSql = "UPDATE product SET product_name = '$name_update', product_detail = '$detail_update', price = '$price_update' WHERE product_id = '$id'";
        $result = mysqli_query($conn, $toSql);
        if (mysqli_query($conn, $toSql)) {
          header("Location: store_seller.php");
          die();
        } else {
          echo "Error";
        }
      }
    } else {
      echo "Please Enter Information";
    }
  }
} else {
  header("Location: store_seller.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Edit Product</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <label for="product-name">Title</label>
        <input type="text" name="product-name" value="<?php echo $product[
          "product_name"
        ]; ?>">

        <label for="product-detail">Description</label>
        <input type="text" name="product-detail" value="<?php echo $product[
          "product_detail"
        ]; ?>">

        <label for="product-price">Price</label>
        <input type="text" name="product-price" value="<?php echo $product[
          "price"
        ]; ?>">
        <label for="product-image">Image</label>
        <label for="product-image">Current Image:<img src="<?php echo $product[
          "image"
        ]; ?>"</label>
        <input type="file" name="product-image">

        <input type="submit" name="submit" value="Submit">
        
    </form>

    <a href="store_seller.php">Cancel</a>
</body>
</html>