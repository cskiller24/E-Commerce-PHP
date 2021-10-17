<?php
session_start();

if (isset($_SESSION["seller_id"])) {
  unset($_SESSION["seller_id"]);
  session_unset();
}
header("Location: login_seller.php");
die();
