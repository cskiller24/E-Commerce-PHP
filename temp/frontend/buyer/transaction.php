<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Demo Store | Transaction</title>
</head>
<body>
    <?php include("header.php"); ?>
    <div class="container mt-3 table-responsive">
        <table class="table text-center">
            <thead class="table-dark align-middle">
                <td>Transaction ID</td>
                <td>Product Name</td>
                <td>Price</td>
                <td>Amount</td>
                <td>Address</td>
                <td>Contact Number</td>
                <td>Payment Method</td>
                <td>Status</td>
                <td>Seller Name</td>
                <td>Total</td>
                <td>Action</td>
            </thead>
            <tbody>
                <?php for($i = 0; $i < 9; $i++){ ?>
                    <tr class="align-middle <?php if(($i%2)==0){echo "table-warning";}?>">
                        <td>12353423</td>
                        <td>Nuttella</td>
                        <td>50</td>
                        <td>5</td>
                        <td>246 L. Garcia St. Bo Puso Sta. Ana Manila</td>
                        <td>09281476264</td>
                        <td>Cash on Delivery</td>
                        <td>Pending Order</td>
                        <td>John</td>
                        <td>500</td>
                        <td>Cancel</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>