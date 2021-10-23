<?php
    session_start();
    //*Check if the seller is already logged in
    if(!isset($_SESSION['seller_id'])){
        header("Location: login_register.php");
        exit();
    }
    include("../../classes/seller/homepage.class.php");
    
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
                    <a href="view.php?pid=<?php echo $product['product_id']; ?>" class="btn btn-danger card-text mt-5">View</a>
                    <button type="button" class="btn btn-danger card-text delete-btn" data-bs-toggle="modal" data-bs-target="#deleteProduct">
                        Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="deleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-danger">
                    </form>
                </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } else echo "<h1 class='mt-5 text-center'>There is No Product</h1>";?>
    
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>