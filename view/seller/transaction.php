<?php 
    session_start();
    if(!isset($_SESSION['seller_id'])){
        header("Location; login_register.php");
        exit();
    }
    include("../../classes/seller/transaction.class.php");

    $transactions = $result;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./style/nav.css">
    <title>Demo Store | Transactions</title>
</head>
<body>
    <?php include("header.php");?>
    <?php if($transactions){?>
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
                    <?php foreach($transactions as $transaction){
                        $total = $transaction['price'] * $transaction['amount'];
                        $action = "";
                        switch ($transaction['status']){
                            case "Pending Order":
                                $action = "<a href='../../classes/seller/transaction-action.class.php?action=pack&sid={$transaction['seller_id']}&bid={$transaction['buyer_id']}&pid={$transaction['product_id']}' class='btn btn-danger'>Pack</a>";
                                break;
                            default:
                                $action = "<p class='btn btn-secondary'>Disabled</p>";
                                break;
                        }
                    ?>
                    <tr>
                        <td><?=$transaction['trans_id']?></td>
                        <td><?=$transaction['product_name']?></td>
                        <td><?=$transaction['price']?> PHP</td>
                        <td><?=$transaction['amount']?></td>
                        <td><?=$transaction['address']?></td>
                        <td><?=$transaction['contact_number']?></td>
                        <td><?=$transaction['payment_method']?></td>
                        <td><?=$transaction['status']?></td>
                        <td><?=$transaction['buyer_name']?></td>
                        <td><?=$total?> PHP</td>
                        <td><?=$action?></td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <?php }
        else{
            echo "<h1 class='mt-5 text-center'>THERE ARE NO TRANSACTIONS</h1>";
        }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>