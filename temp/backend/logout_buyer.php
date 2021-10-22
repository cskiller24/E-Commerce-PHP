<?php
session_start();

if (isset($_SESSION["buyer_id"])) {
  unset($_SESSION["buyer_id"]);
  session_unset();
}
header("Location: login_buyer.php");
die();
