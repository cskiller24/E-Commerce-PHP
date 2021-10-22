<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/view-product.css">

    <title>Demo Store | View Product</title>
</head>
<body>
    <?php include("header.php");?>

    <div class="container mt-4">
        <div class="card seller-content bg-warning p-4">
            <div class="card product-image">
                <img src="../../product-image/index.jpg" alt="Image">
            </div>
            <div class="card product-details">
                <div class="card-header text-center">
                    <h2>Product Name</h2>
                </div>
                <div class="p-3">
                    <div class="card-boy d-flex mb-2">
                        <div class="card-text fw-bold">Seller Name: </div>
                        <div class="card-text mx-3">Cedy Cadayong</div>
                    </div>
                    <div class="card-boy d-flex">
                        <div class="card-text fw-bold">Details: </div>
                        <div class="card-text mx-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates modi velit tempora amet vero autem perferendis sit doloremque possimus quidem, nisi illum? Odio qui perspiciatis quam impedit possimus laboriosam ipsam praesentium culpa tempore commodi laudantium quaerat quibusdam expedita quo quia fuga, eos optio accusamus quisquam consequatur magnam deserunt molestias tempora?</div>
                    </div>
                    <div class="card-boy d-flex">
                        <div class="card-text fw-bold me-3">Price:</div>
                        <div class="card-text mx-3">500 PHP</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>