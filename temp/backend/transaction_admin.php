<?php 
session_start();
    include("dbconnection.php");
    include("functions.php");
    include("transaction_function.php");

    $data = checkloginAdmin($conn);

    $result = getAllTransactions($conn);

    if(isset($_GET['action']) && isset($_GET['bid']) && isset($_GET['sid']) && isset($_GET['pid']) && isset($_GET['tid']) && $_GET['action'] == "ship"){
        $result = shippedOrder($conn, $_GET['bid'], $_GET['sid'], $_GET['pid'], $_GET['tid']);
        if($result) header("Location: transaction_admin.php");
        else echo "error";
    }
    if(isset($_GET['action']) && isset($_GET['bid']) && isset($_GET['sid']) && isset($_GET['pid']) && isset($_GET['tid']) && $_GET['action'] == "deliver"){
        $result = deliveredOrder($conn, $_GET['bid'], $_GET['sid'], $_GET['pid'], $_GET['tid']);
        if($result) header("Location: transaction_admin.php");
        else echo "error";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Admin Transactions</title>
</head>
<body>
<?php if(is_array($result)){ ?>
    <table>
        <th>Transaction Id</th>
        <th>Product Name</th>
        <th>Seller Name</th>
        <th>Price</th>
        <th>Buyer Name</th>
        <th>Payment Method</th>
        <th>Status</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Actions</th>
        <?php foreach($result as $transaction){
            $buyer = getBuyerDetails($conn, $transaction['buyer_id']);
            $seller = getSellerDetails($conn, $transaction['seller_id']);
            $product = getProductDetails($conn, $transaction['product_id']);
            $buyer = $buyer['buyer_name'];
            $seller = $seller['seller_name'];
            $product = $product['product_name'];
        ?>
        <tr>
            <td><?php echo $transaction['trans_id'];?></td>
            <td><?php echo $product;?></td>
            <td><?php echo $seller; ?></td>
            <td><?php echo $transaction['price'];?></td>
            <td><?php echo $buyer;?></td>
            <td><?php echo $transaction['payment_method'];?></td>
            <td><?php echo $transaction['status'];?></td>
            <td><?php echo $transaction['address'];?></td>
            <td><?php echo $transaction['contact_number'];?></td>
            <td>
                <?php if($transaction['status'] == 'Packed'){?>
            <a href="transaction_admin.php?action=ship&bid=<?php echo $transaction['buyer_id'];?>&sid=<?php echo $transaction['seller_id'];?>&pid=<?php echo $transaction['product_id'];?>&tid=<?php echo $transaction['trans_id'];?>">Ship Item</a>
                <?php } ?>
                <?php if($transaction['status'] == 'Shipped'){?>
            <a href="transaction_admin.php?action=deliver&bid=<?php echo $transaction['buyer_id'];?>&sid=<?php echo $transaction['seller_id'];?>&pid=<?php echo $transaction['product_id'];?>&tid=<?php echo $transaction['trans_id'];?>">Deliver</a>
                <?php } ?>
                <?php if($transaction['status'] == "Pending Order" || $transaction['status'] == "Delivered"){?>
                    Locked
                <?php } ?>
            </td>
        </tr>
    <?php }}?>
    </table>
    <a href="adminpage.php">Back to Admin   </a>
</body>
</html>