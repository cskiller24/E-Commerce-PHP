<?php

function checkloginBuyer($conn)
{
  if (isset($_SESSION["buyer_id"])) {
    $id = $_SESSION["buyer_id"];
    $query = "select * from buyers where buyer_id = '$id' limit 1";
    $seller_data = mysqli_query($conn, $query);

    if ($seller_data && mysqli_num_rows($seller_data) > 0) {
      $buyer_data = mysqli_fetch_assoc($seller_data);
      return $buyer_data;
    }
    else{echo "wow";}
  }
  else{header("Location: login_buyer.php");
    die();}
}

function checkloginSeller($conn)
{
  if (isset($_SESSION["seller_id"])) {
    $id = $_SESSION["seller_id"];
    $query = "select * from sellers where seller_id = '$id' limit 1";
    $seller_data = mysqli_query($conn, $query);

    if ($seller_data && mysqli_num_rows($seller_data) > 0) {
      $seller_data = mysqli_fetch_assoc($seller_data);
      return $seller_data;
    }
  }
  else{header("Location: login_seller.php");
    die();}
}


function checkloginAdmin($conn)
{
  if (isset($_SESSION["admin_id"])) {
    $id = $_SESSION["admin_id"];
    $query = "select * from admin where admin_id = '$id' limit 1";
    $seller_data = mysqli_query($conn, $query);

    if ($seller_data && mysqli_num_rows($seller_data) > 0) {
      $seller_data = mysqli_fetch_assoc($seller_data);
      return $seller_data;

    }
  }
  else{header("Location: login_admin.php");
    die();}
}

function check_emailBuyer($conn, $buyer_email)
{
  $checkEmail = "SELECT buyer_email FROM buyers WHERE buyer_email = '$buyer_email'";
  $checkEmailResult = mysqli_query($conn, $checkEmail);

  if ($checkEmailResult && mysqli_num_rows($checkEmailResult) > 0) {
    return $check_email = "hasEmail";
  } else {
    return $check_email = "noEmail";
  }
  die();
}

function check_emailSeller($conn, $seller_email)
{
  $checkEmail = "SELECT seller_email FROM sellers WHERE seller_email = '$seller_email'";
  $checkEmailResult = mysqli_query($conn, $checkEmail);

  if ($checkEmailResult && mysqli_num_rows($checkEmailResult) > 0) {
    return $check_email = "hasEmail";
  } else {
    return $check_email = "noEmail";
  }
  die();
}

function getProductDetails($conn,$id)
{
  $productDetails = "SELECT * FROM product WHERE product_id = '$id'";
  $productResult = mysqli_query($conn ,$productDetails);
  $productResult = mysqli_fetch_assoc($productResult);
  return $productResult;
}

