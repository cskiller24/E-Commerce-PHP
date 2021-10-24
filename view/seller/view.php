<?php 
    session_start();
    //**CHECK IF THE SELLER IS LOGGED IN */
    if(!isset($_SESSION['seller_id'])){
        header("Location: login_register.php");
    }
    include("../../classes/seller/view.class.php");
    $product = $_SESSION['view'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/view.css">
    <title>Demo Store | View Product</title>
</head>
<body>
    <?php include("header.php"); ?>
    <?php if($product){?>
    <div class="mt-5 container">
        <div class="card border-danger bg-danger d-flex justify-content-evenly flex-row flex-wrap p-3">
            <div class="card image d-flex align-items-center m-2 border border-light border-2 p-2">
                <img src="<?php echo $product['image']; ?>" alt="">
            </div>
            <div class="card details m-2 border border-light border-2 text-center">
                <div class="card-header">
                    <h1><?php echo $product['product_name']; ?></h1>
                </div>
                <div class="card-body">
                    <div class="product-details">
                        <div class="me-3 fw-bold">Price</div>
                        <div class="fw-bold margins"><h4><?php echo $product['price']; ?> PHP</h4></div>
                    </div>
                    <div class="product-details">
                        <div class="me-3 fw-bold text-center">Detail</div>
                        <div class="details-text"><?php echo $product['product_detail']; ?></div>
                    </div>
                    <div class="product-actions">
                        <a href="edit.php?pid=<?php echo $product['product_id']; ?>" class="btn btn-danger product-btn">Edit Product</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProduct">
                            Delete Product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="deleteProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../classes/seller/delete.class.php" method="post">
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                        <input type="hidden" name="seller_id" value="<?php echo $_SESSION['seller_id']; ?>">
                        <input type="hidden" name="image" value="<?php echo $product['image']; ?>">
                        <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" name="submit" class="btn btn-danger">
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php }
        else{
            echo "<h1 class='mt-5 text-center'>There's An Error Viewing A Product</h1>";
        }
    ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>