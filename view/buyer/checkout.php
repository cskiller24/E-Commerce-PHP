<?php 
    session_start();
    //**Checking if the Buyer is Logged in */
    if(!isset($_SESSION['buyer_id'])){
        header("Location: login_register.php");
        exit();
    }
    
    include("../../classes/buyer/checkout.class.php");
    $total = 0;
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
    <link rel="stylesheet" href="style/about.css">
    <title>Demo Store | About</title>
</head>
<body>
    <?php include("header.php"); ?>
    <?php if($transaction_result){?>
    <div class="container">
        <div class="table-responsive mt-5">
            <table class="table text-center align-middle table-striped">
                <thead class="table-dark fw-bold">
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Amount</td>
                    <td>Total Amount</td>
                </thead>
                <tbody>
            <?php foreach($transaction_result as $transaction){?>
                    <tr>
                        <td><?= $transaction['product_name'] ?></td>
                        <td><?= $transaction['product_price'] ?></td>
                        <td><?= $transaction['amount'] ?></td>
                        <td><?= $total_price = $transaction['product_price']*$transaction['amount'] ?></td>
                    </tr>
            <?php $total = $total + $total_price; } ?>
                    <tr>
                        <td colspan="3" class="table-dark fw-bold">Total Price</td>
                        <td  class="table-dark fw-bold"><?= $total ?></td>
                    </tr>
                </tbody>
                
            </table>
        </div>
        <div class="form card p-5 border border-dark mt-3">
            <h2 class="text-center">Delivery Details</h2>
            <form action="../../classes/buyer/checkout-forms.class.php" method="post">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
                    <div class="gcash-cod d-flex justify-content-center">
                        <div class="form-check m-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="COD" value="Cash On Delivery" required>
                            <label class="form-check-label" for="flexRadioDefault1" id="COD2">
                                Cash On Delivery
                            </label>
                        </div>
                        <div class="form-check m-3">
                            <input class="form-check-input" type="radio" name="payment_method" id="GCASH" value="GCASH">
                            <label class="form-check-label" for="flexRadioDefault2" id="GCASH2">
                                GCASH
                            </label>
                        </div>
                    </div>
                <input type="hidden" name="all_products" value="<?php echo(serialize($transaction_result)) ?>">
                <input type="submit" value="Submit" name="submit" class="btn btn-dark w-100">
            </form>
        </div>
    </div>
    <?php } 
        else{
            echo "<h1 class='text-center mt-5'>No Transactions</h1>";
        }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>