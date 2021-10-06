<?php
session_start();
include "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $buyer_email = $_POST["email"];
  $buyer_password = md5($_POST["password"]);

  if (isset($_POST["email"]) && isset($_POST["password"])) {
    $sendQuery = "SELECT * FROM buyers WHERE buyer_email = '$buyer_email' AND buyer_password = '$buyer_password'";
    $result = mysqli_query($conn, $sendQuery);

    if ($result && mysqli_num_rows($result) > 0) {
      $buyer = mysqli_fetch_assoc($result);
      $_SESSION["buyer_id"] = $buyer["buyer_id"];

      header("Location: store_buyer.php");
      die();
    } else {
      echo "Wrong Username or Password";
    }
  } else {
    echo "Please Enter Information";
  }
}
//Check if User is logged in
if (isset($_SESSION["buyer_id"])) {
  header("Location: store_buyer.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Login</title>
</head>
<body>
    <form method="post">
        <label for="Email">Email</label>
        <input type="text" name = "email">

        <label for="password">Password</label>
        <input type="password" name = "password">

        <input type="submit" value = "login">

    </form>

    <a href="signup_buyer.php">Sign Up</a>
    <a href="login_seller.php">Login as Seller</a>
    <a href="login_admin.php">Admin Access</a>
</body>
</html>