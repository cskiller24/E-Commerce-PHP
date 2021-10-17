<?php 
    session_start();
    include("dbconnection.php");
    include("functions.php");
    include("transaction_function.php");

    $id = checkloginSeller($conn);
    $id = $id['seller_id'];

    $data = getTransactionsSeller($conn, $id);

    if(isset($_GET['action']) && isset($_GET['pid']) && isset($_GET['tid']) && $_GET['action'] == "packed"){
        $cancel = packedOrder($conn, $_SESSION["seller_id"], $_GET['pid'], $_GET['tid']);
        if(!$cancel)echo "Error"; 
        else header("Location: transaction_seller.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Seller Transactions</title>
</head>
<body>
    <?php if($data != false){?>
        <table>
            <th>Product Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Status</th>
            <th>Buyer Name</th>
            <th>Total</th>
            <th>Transcation Time</th>
            <th>Action</th>
            <?php foreach($data as $transaction){
                $buyer_name = getBuyerDetails($conn, $transaction['buyer_id']);
                $buyer_name = $buyer_name['buyer_name'];
                $product = getProductDetails($conn, $transaction['product_id']);?>

                <tr>
                    <td><?php echo $product['product_name']?></td>
                    <td><?php echo $product['price']?></td>
                    <td><?php echo $transaction['amount']?></td>
                    <td><?php echo $transaction['address']?></td>
                    <td><?php echo $transaction['contact_number']?></td>
                    <td><?php echo $transaction['status']?></td>
                    <td><?php echo $buyer_name?></td>
                    <td><?php echo $transaction['amount']*$product['price']?></td>
                    <td><?php echo $transaction['transaction_time']?></td>
                    <?php if($transaction['status'] == "Pending Order"){?>
                        <a href="transaction_seller.php?action=packed&pid=<?php echo $transaction['product_id'];?>&tid=<?php echo $transaction['trans_id'];?>">Packed</a><?php } else echo "Locked"?></td>
                </tr>
            <?php } ?>
        </table>
    <?php }?>
    <a href="store_seller.php">Continue Shopping</a>
</body>
</html>