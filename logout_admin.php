<?php
session_start();

if (isset($_SESSION["admin_id"])) {
  unset($_SESSION["admin_id"]);
  session_unset();
}
header("Location: login_admin.php");
die();
