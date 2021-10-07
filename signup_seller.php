<?php
session_start();
include "dbconnection.php";
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $seller_id = uniqid();
  $seller_email = $_POST["email"];
  $seller_contactNumber = $_POST["contactNum"];
  $seller_name = $_POST["fullName"];
  $seller_password = $_POST["password"];
  $confirmPass = $_POST["confirmPass"];

  if (
    !empty($seller_name) &&
    !empty($seller_email) &&
    !empty($seller_contactNumber) &&
    !empty($seller_password) &&
    !empty($confirmPass)
  ) {
    if ($seller_password === $confirmPass) {
      $checkEmail = check_emailSeller($conn, $seller_email);

      if ($checkEmail == "noEmail") {
        $seller_password = md5($seller_password);
        $query = "INSERT INTO sellers (seller_id, seller_email, seller_contactNumber, seller_name, seller_password) VALUES ('$seller_id','$seller_email','$seller_contactNumber','$seller_name','$seller_password')";

        mysqli_query($conn, $query);
        header("Location: login_seller.php");
        die();
      } else {
        echo "duplicate email";
      }
    } else {
      echo "Password does not match";
    }
  } else {
    echo "Enter Information";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Seller Register</title>
</head>
<body>
    <form method="post">
        <label for="fullName">Full Name</label>
        <input type="text" name = "fullName" required>
        <label for="email">Email</label>
        <input type="text" name = "email" required> 
        <label for="contactNum">Contact Number</label>
        <input type="text" name = "contactNum" required>
        <label for="password">Password</label>
        <input type="password" name = "password" required>
        <label for="confirmPass">Confirm Password</label>
        <input type="password" name = "confirmPass" required>
        <input type="submit" value="Sign Up">
    </form>
    <a href="login_seller.php">Login</a>
    <a href="signup_buyer.php">Become a Buyer</a>
</body>
</html>