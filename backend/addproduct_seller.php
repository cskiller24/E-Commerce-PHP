<?php
session_start();    
    include("dbconnection.php");
    include("functions.php");
    $seller_data = checkloginSeller($conn);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $seller_id = $seller_data['seller_id'];
        $product_id = uniqid();
        $product_name = $_POST['name'];
        $product_details = $_POST['details'];
        $price = $_POST['price'];
        $amount = $_POST['amount'];
        $image = "product-image/".$_FILES['image']['name'];

        if( !empty($product_name) &&
            !empty($product_details) &&
            !empty($price) &&
            is_numeric($price) &&
            strlen($_FILES['image']['name'] != 0)
        ){
            //Move upload folder in file
            move_uploaded_file($_FILES['image']['tmp_name'],"product-image/".$_FILES["image"]["name"]);

            $toSQL = "INSERT INTO product (product_id, product_name, product_detail, seller_id, price, image) VALUES ('$product_id','$product_name','$product_details','$seller_id','$price','$image')";

            mysqli_query($conn, $toSQL);

            header("Location: store_seller.php");
            die;

        }else{echo"Please enter information";}
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Add Product</title>
</head>
<body>
    <form method="post" enctype = "multipart/form-data">
        <label for="name">Product name</label>
        <input type="text" name="name">
        <label for="detail">Product Detail</label>
        <textarea name="details" rows="3"></textarea>
        <label for="price">Price</label>
        <input type="text" name="price">
        <label for="image">Image</label>
        <input type="file" name="image">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>