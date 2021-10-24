<?php 
    session_start();
    //**CHECKING IF THE SELLER IS ALREADY LOGGED IN */
    if(!isset($_SESSION['seller_id'])){
        header("Location: login_register.php");
        exit();
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/nav.css">
    <link rel="stylesheet" href="style/add-product.css">
    <title>Demo Store | Add Product</title>
</head>
<body>
    <?php include("header.php"); ?>

    <?php if($product){?>
    <div class="global bg-danger rounded-3 border container mt-5 p-3 frame">
        <form action="../../classes/seller/edit.class.php" method="post" enctype="multipart/form-data">
            <div class="d-flex flex-wrap">
                <div class="image mx-3 card p-3">
                    <img id="previewFrame" src="<?php echo $product['image'];?>">
                    <input type="hidden" name="current_image" class="form-control" value="<?php echo $product['image']?>">
                    <input type="hidden" name="id" class="form-control" value="<?php echo $product['product_id']?>">
                    <input type="file" name="product_image" class="form-control" id="Tmp" onchange="previewImage(event)">
                </div>
                <div class="details mx-3 card p-3 fw-bold">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="product_name" required placeholder="Enter Product Name" class="form-control" value="<?php echo $product['product_name']?>">
                    </div>
                    <div class="mb-3">
                        <label for="details" class="form-label">Details</label>
                        <textarea type="text" name="details" required placeholder="Enter Product Details" class="form-control"><?php echo $product['product_detail']?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" name="price" required placeholder="Enter Product Name" class="form-control" value="<?php echo $product['price']?>">
                    </div>
                    <input type="submit" value="Submit" class="btn btn-danger btn-block w-100" name="submit">
                </div>
            </div>
        </form>
    </div>
    <?php }
    else echo "<h1 class='text-center mt-5'>No Product To Edit</h1>";
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        function previewImage(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("previewFrame");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
</body>
</html>