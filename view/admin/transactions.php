<?php
    session_start();
    //**CHECK ADMIN LOGIN */
    if(!isset($_SESSION['admin_id'])){
        header("Location: login.php");
        exit();
    }
    include("../../classes/admin/transactions.class.php");
    $transactions = $result;

    //**RESPONSES */
    $transaction_action = "";
    if(isset($_GET['ship']) && $_GET['ship'] == "success"){
        $transaction_action = "Sucessfully Ship the Product";
    }
    if(isset($_GET['ship']) && $_GET['ship'] == "failed"){
        $transaction_action = "Error Please Try Again";
    }
    if(isset($_GET['deliver']) && $_GET['deliver'] == "success"){
        $transaction_action = "Sucessfully Delivered the Product";
    }
    if(isset($_GET['deliver']) && $_GET['deliver'] == "failed"){
        $transaction_action = "Sucessfully Delivered the Product";
    }
?>

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
    <?php include("header.php"); ?>
    <?php if($transactions){?>
    <h1 class="text-center mt-5"><?=$transaction_action?></h1>
    <div class="table-responsive m-5">
        <table class="table align-middle text-center table-striped">
            <thead class="table-dark">
                <td>Transaction ID</td>
                <td>Product Name</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total Price</td>
                <td>Buyer Name</td>
                <td>Seller Name</td>
                <td>Status</td>
                <td>Address</td>
                <td>Contact Number</td>
                <td>Payment Method</td>
                <td>Action</td>
            </thead>
            <tbody>
                <?php foreach($transactions as $transaction){
                    $total = $transaction['amount'] * $transaction['price'];
                    switch ($transaction['status']){
                        case "Packed":
                            $action = "<a href='../../classes/admin/transaction-actions.class.php?action=ship&pid={$transaction['product_id']}&sid={$transaction['seller_id']}&bid={$transaction['buyer_id']}' class='btn btn-warning'>Ship</a>";
                            break;
                        case "Shipped":
                            $action = "<a href='../../classes/admin/transaction-actions.class.php?action=deliver&pid={$transaction['product_id']}&sid={$transaction['seller_id']}&bid={$transaction['buyer_id']}' class='btn btn-warning'>Deliver</a>";
                            break;
                        default:
                            $action ="<p class='btn btn-secondary'>Disabled</p>";
                            break;
                    }    
                ?>
                    <tr>
                        <td><?=$transaction['trans_id']?></td>
                        <td><?=$transaction['product_name']?></td>
                        <td><?=$transaction['price']?></td>
                        <td><?=$transaction['amount']?></td>
                        <td><?=$total?></td>
                        <td><?=$transaction['buyer_name']?></td>
                        <td><?=$transaction['seller_name']?></td>
                        <td><?=$transaction['status']?></td>
                        <td><?=$transaction['address']?></td>
                        <td><?=$transaction['contact_number']?></td>
                        <td><?=$transaction['payment_method']?></td>
                        <td><?=$action?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php }
        else{
            echo "<h1 class='text-center mt-5'>No Transactions Available</h1>";
        }
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>