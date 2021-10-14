<?php
    include("dbconnection.php");
    include("transaction_function.php");
    
    $data = getTransactionsBuyer($conn, $id); //return array or false
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Transactions</title>
</head>
<body>
    
    <?php if($data != false){ ?>

        <?php foreach($data as $transaction){?>
            if($transaction['status'] == "To Ship")
        <?php }

    }?>
    <a href="store_buyer.php">Continute Shopping</a>
</body>
</html>