<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="style/cart.css">
    <title>Demo Store | Cart</title>
</head>
<body>
<?php include("header.php");?>
    <div class="products my-4">
        <?php for($i = 0; $i < 9; $i++){ ?>
        <div class="product m-2 card p-3 border-dark">
            <img src="../../product-image/index.jpg" alt="Product">
            <div class="card-body">
                <div class="card-header">
                    <div class="card-title text-center">PRODUCT 2</div>
                </div>
                <div class="card-text text-center">Quantity: 1</div>
                <div class="a-links">
                    <a href="#" class="btn btn-dark card-text mt-3"><i class="fas fa-minus"></i></a>
                    <a href="#" class="btn btn-dark card-text mt-3"><i class="fas fa-plus"></i></a>
                </div>
                <div class="remove-button">
                    <a href="#" class="btn btn-outline-dark card-text mt-2 btn-remove">Remove</a>
                    <a href="view.php" class="btn btn-outline-dark card-text mt-2 btn-remove mx-1">View</a>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
    <div class="container">
        <div class="button d-flex justify-content-center">
            <button class="btn btn-dark py-3 h1" id="checkout"> <i class="far fa-credit-card" ></i> Checkout all Items</button>
        </div>
    </div>
            
    <div class="card p-3 d-flex flex-column text-center justify-content-center">
        <form method="post" class="d-flex flex-column text-center justify-content-center">
            <div class="form-group">
                <label for="address" id="addressL">Address</label>
                <input type="text"  id="addressI"class="form-control w-50 m-auto mt-2" placeholder="Enter Address Here" name="email" required>
            </div>
            <div class="gcash-cod d-flex justify-content-center">
                <div class="form-check m-3">
                    <input class="form-check-input" type="radio" name="payment-method" id="COD" value="Cash On Delivery" required>
                    <label class="form-check-label" for="flexRadioDefault1" id="COD2">
                        Cash On Delivery
                    </label>
                    </div>
                    <div class="form-check m-3">
                    <input class="form-check-input" type="radio" name="payment-method" id="GCASH" value="GCASH">
                    <label class="form-check-label" for="flexRadioDefault2" id="GCASH2">
                        GCASH
                    </label>
                </div>
            </div>
            <div class="form-group mt-3 d-flex justify-content-center">
                <input type="submit" class="btn btn-dark w-50" id="addressbtn">
            </div>
        </form>
    </div>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $("#addressL").hide();
        $("#addressI").hide();
        $("#addressbtn").hide();
        $("#COD").hide();
        $("#COD2").hide();
        $("#GCASH").hide();
        $("#GCASH2").hide();

        $("#checkout").click(function(){
            $("#addressL").toggle(200);
            $("#addressI").toggle(200);
            $("#addressbtn").toggle(200);
            $("#COD").toggle(200);
            $("#COD2").toggle(200);
            $("#GCASH").toggle(200);
            $("#GCASH2").toggle(200);
            $(document).scrollTop($(document).height());
        });
    </script>
</body>
</html>