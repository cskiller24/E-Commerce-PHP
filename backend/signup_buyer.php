<?php
session_start();
include "dbconnection.php";
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $buyer_id = uniqid();
  $buyer_email = $_POST["email"];
  $buyer_contactNumber = $_POST["contactNum"];
  $buyer_name = $_POST["fullName"];
  $buyer_password = $_POST["password"];
  $confirmPass = $_POST["confirmPass"];

  if (
    !empty($buyer_name) &&
    !empty($buyer_email) &&
    !empty($buyer_contactNumber) &&
    !empty($buyer_password) &&
    !empty($confirmPass)
  ) {
    if ($buyer_password === $confirmPass) {
      $checkEmail = check_emailBuyer($conn, $buyer_email);

      if ($checkEmail == "noEmail") {
        $buyer_password = md5($buyer_password);
        $query = "INSERT INTO buyers (buyer_id, buyer_email, buyer_contactNumber, buyer_name, buyer_password) VALUES ('$buyer_id','$buyer_email','$buyer_contactNumber','$buyer_name','$buyer_password')";

        mysqli_query($conn, $query);
        header("Location: login.php");
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
    <title>Demo Store | Register </title>
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

    <a href="login_buyer.php">Login</a>
    <a href="signup_seller.php">Become a Seller</a>
</body>
</html>