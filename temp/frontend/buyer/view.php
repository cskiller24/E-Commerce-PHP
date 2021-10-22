<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <link rel="stylesheet" href="style/view.css">
    <title>Demo Store | View Product</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="mt-5 container">
        <div class="card border-dark bg-dark d-flex justify-content-evenly flex-row flex-wrap p-3">
            <div class="card image d-flex align-items-center m-2 border border-warning border-2 p-2">
                <img src="../../product-image/index.jpg" alt="">
            </div>
            <div class="card details m-2 border border-warning border-2 text-center">
                <div class="card-header">
                    <h1>Product Item</h1>
                </div>
                <div class="card-body">
                    <div class="product-details">
                        <div class="me-3 fw-bold">Price</div>
                        <div class="fw-bold margins"><h4>500 PHP</h4></div>
                    </div>
                    <div class="product-details">
                        <div class="me-3 fw-bold text-center">Detail</div>
                        <div class="details-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum, libero qui ad quibusdam modi in vero at asperiores tempora rem!</div>
                    </div>
                </div>
                <a href="#" class="btn btn-dark w-100 btn-block py-2">Add to Cart</a>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>