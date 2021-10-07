<?php
session_start();
include "dbconnection.php";
include "functions.php";

$seller_data = checkloginSeller($conn);

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $seller_password = $seller_data["seller_password"];
  $productImage = getProductDetails($conn, $id);
  $productImage = $productImage["image"];

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = md5($_POST["password"]);
    if ($password == $seller_password) {
      $toSql = "DELETE FROM product WHERE product_id = '$id'";
      unlink($productImage);
      if (mysqli_query($conn, $toSql)) {
        header("Location: store_seller.php");
        die();
      } else {
        echo "error deleting the product";
      }
    } else {
      echo "Wrong Password";
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
    <title>Demo Store | Delete</title>
</head>
<body>
    <form method="post">
        <p>Are you sure you want to Delete your product?</p>
        <label for="password">Enter Password</label>
        <input type="password" name="password">
        <input type="submit" value="Delete Product">
    </form>
</body>
</html>