<?php
    session_start();
    //*Check if the seller is already logged in
    if(!isset($_SESSION['seller_id'])){
        header("Location: login_register.php");
        exit();
    }
    include("../../classes/seller/homepage.class.php");

    $response = "";
    //**ERROR TRAPPING DELETE*/
    if(isset($_GET['delete']) && $_GET['delete']=="err"){
        $response = "Error occured try again";
    }
    if(isset($_GET['delete']) && $_GET['delete']=="seller"){
        $response = "Error occured try again (seller)";
    }
    if(isset($_GET['delete']) && $_GET['delete']=="password"){
        $response = "Wrong Password";
    }
    if(isset($_GET['delete']) && $_GET['delete']=="success"){
        $response = "Successfully Deleted Product";
    }
    //**ERROR TRAPPING EDIT*/
    if(isset($_GET['edit']) && $_GET['edit']=="emp"){
        $response = "Empty Edit Details";
    }
    if(isset($_GET['edit']) && $_GET['edit']=="price"){
        $response = "Price Must Be Numeric";
    }
    if(isset($_GET['edit']) && $_GET['edit']=="ext"){
        $response = "Error File Extension";
    }
    if(isset($_GET['edit']) && $_GET['edit']=="failed"){
        $response = "Error Edit";
    }
    if(isset($_GET['edit']) && $_GET['edit']=="success"){
        $response = "Edit Sucessfull";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Shop | Seller</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/product.css">

</head>
<body>
    <?php include("header.php"); ?>

    <?php if($_SESSION['product_seller']){?>
    <div class="text-center h1 mt-3"><?php echo $response; ?></div>
    <div class="products my-4">
        <?php foreach($_SESSION['product_seller'] as $product){?>
        <div class="product m-2 card p-3 border-danger">
            <img src="<?php echo $product['image']; ?>" alt="Product">
            <div class="card-body">
                <div class="card-header">
                    <div class="card-title text-center fw-bold"><?php echo $product['product_name']; ?></div>
                </div>
                <div class="card-text text-center">
                    <div><?php echo $product['price']; ?> PHP</div>
                </div>
                <div class="a-links">
                    <a href="view.php?pid=<?php echo $product['product_id']; ?>" class="btn btn-danger card-text mt-5 w-100">View</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } else echo "<h1 class='mt-5 text-center'>There is No Product</h1>";?>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>