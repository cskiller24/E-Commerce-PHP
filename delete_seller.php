<?php
session_start();
include "dbconnection.php";
include "functions.php";

$admin_data = checkLoginAdmin($conn);
$seller_data = getSellerDetails($conn, $_GET["id"]);

if(isset($_GET["id"])){
    $id = $_GET["id"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $password = md5($_POST["password"]);
        if($admin_data["admin_password"]==$password){
            $toSql = "DELETE FROM sellers WHERE seller_id = '$id'";
            if(mysqli_query($conn, $toSql)){
                header("Location: adminpage.php");
                die();
            }else{echo "ERROR DELETING INFORMATION";}
        }
        else{echo "Wrong Password";}
    }
}
else(header("Location: adminpage.php"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Admin Page</title>
</head>
<body>
        <div class="container">
            <p>Seller ID: <?php echo $seller_data["seller_id"]; ?></p>
            <p>Seller Name: <?php echo $seller_data["seller_name"]; ?></p>
            <p>Email: <?php echo $seller_data["seller_email"]; ?> </p>
            <p>Contact Number: <?php echo $seller_data["seller_contactNumber"]; ?> </p>
            <p>Registered Date: <?php echo $seller_data["registered_date"]; ?> </p>
        </div> 

        <form method="post">
            <label for="password">Enter Password to Delete</label>
            <input type="password" name="password">
            <input type="submit" value="Delete Seller" placeholder="Password">
        </form>

        <a href="adminpage.php">Back to Admin Page</a>
</body>
</html>