<?php
session_start();
    include("dbconnection.php");
    include("transaction_function.php");
    include("functions.php");

    $id = checkloginBuyer($conn);
    $id = $id['buyer_id'];

    $data = getTransactionsBuyer($conn, $id); //return array or false

    if(isset($_GET['action']) && isset($_GET['pid']) && $_GET['action'] == "delete"){
        $cancel = cancelOrder($conn, $_SESSION["buyer_id"], $_GET['pid']);
        if(!$cancel) echo "Error";
        else header("Location: transaction_buyer.php");
    }
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
        <table>
            <th>Product Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Status</th>
            <th>Seller Name</th>
            <th>Total</th>
            <th>Transaction Time</th>
            <th>View</th>
            <th>Action</th>
        <?php foreach($data as $transaction){
            $product = getProductDetails($conn, $transaction['product_id']);
            $seller_name = getSellerDetails($conn, $transaction['seller_id']);
            $seller_name = $seller_name['seller_name']; ?>
            <tr>
                <td><?php echo $product['product_name']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $transaction['amount']?></td>
                <td><?php echo $transaction['address']?></td>
                <td><?php echo $transaction['contact_number']?></td>
                <td><?php echo $transaction['status']?></td>
                <td><?php echo $seller_name ?></td>
                <td><?php echo $total = $transaction['amount'] * $product['price']; ?></td>
                <td><?php echo $transaction['transaction_time']?></td>
                <td><a href="view_product.php?id=<?php echo $transaction['product_id']?>">View</a></td>
                <td><?php if($transaction['status']=="Pending Order"){?><a href="transaction_buyer.php?action=delete&pid=<?php echo $transaction['product_id']?>">Cancel</a><?php } else echo "Locked"; ?>
            </tr>
        <?php } ?>
        </table>
    <?php }?>
    <a href="store_buyer.php">Continute Shopping</a>
</body>
</html>