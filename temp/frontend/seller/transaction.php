<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Demo Store | Transactions</title>
</head>
<body>
    <?php include("header.php");?>

    <div class="container mt-5">
        <div class="table-responsive ">
            <table class="table text-center align-middle table-striped table-hover">
                <thead class="table-dark align-middle">
                    <td>Transaction ID</td>
                    <td>Product Name</td>
                    <td>Price</td>
                    <td>Amount</td>
                    <td>Address</td>
                    <td>Contact Number</td>
                    <td>Payment Method</td>
                    <td>Status</td>
                    <td>Buyer Name</td>
                    <td>Total</td>
                    <td>Action</td>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < 10; $i++){?>
                    <tr>
                        <td>12345534234</td>
                        <td>Nuttella</td>
                        <td>500 PHP</td>
                        <td>30</td>
                        <td>246 L. Garcia St. Bo. Puso Punta Sta. Ana Manila</td>
                        <td>09281476264</td>
                        <td>Cash on Delivery</td>
                        <td>Pending Order</td>
                        <td>Juan Dela cruz</td>
                        <td>7500 PHP</td>
                        <td><a href="#" class="btn btn-danger">Pack</a></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>