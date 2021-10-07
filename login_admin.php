<?php
session_start();
include "dbconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user = $_POST["user"];
  $password = md5($_POST["password"]);

  if (isset($_POST["user"]) && isset($_POST["password"])) {
    $sendQuery = "SELECT * FROM admin WHERE admin_user = '$user' AND admin_password = '$password'";
    $result = mysqli_query($conn, $sendQuery);

    if ($result && mysqli_num_rows($result) > 0) {
      $admin = mysqli_fetch_assoc($result);
      $_SESSION["admin_id"] = $admin["id"];

      header("Location: adminpage.php");
      die();
    } else {
      echo "Wrong Username or Password";
    }
  } else {
    echo "Please Enter Information";
  }
}

if (isset($_SESSION["admin_id"])) {
  header("Location: adminpage.php");
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
        <label for="user">Username</label>
        <input type="text" name = "user">

        <label for="password">Password</label>
        <input type="password" name = "password">

        <input type="submit" value = "login">

    </form>

    <a href="login_buyer.php">Return to buyer section</a>
    <a href="login_seller.php">Return to seller section</a>
</body>
</html>