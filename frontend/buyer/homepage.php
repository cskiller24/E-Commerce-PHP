<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Shop | Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="../buyer/style/product.css">

</head>
<body>
    <?php include("header.php"); ?>
    <div class="products my-4">
        <?php for($i = 0; $i < 4; $i++){ ?>
        <div class="product m-2 card p-3 border-dark">
            <img src="../../product-image/index.jpg" alt="Product">
            <div class="card-body">
                <div class="card-header">
                    <div class="card-title text-center">PRODUCT 2</div>
                </div>
                <div class="a-links">
                    <a href="#" class="btn btn-dark card-text mt-5">Add to Cart</a>
                    <a href="view.php" class="btn btn-dark card-text mt-5">View Item</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
        <nav class="center text-center">
        <ul class="pagination">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#2">1</a></li>
            <li class="page-item active">
            <a class="page-link" href="#"2>2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#3">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Next</a>
            </li>
        </ul>
        </nav>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>