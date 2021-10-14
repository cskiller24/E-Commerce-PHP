<?php
session_start();
    include("dbconnection.php");
    include("functions.php");
    include("cart_functions.php");

    if(isset($_GET['pid']) && isset($_GET['bid']) && isset($_GET['action']) && $_GET['action'] == "add"){
        addToCart($conn, $_GET['pid'], $_GET['bid']);}
    if(isset($_GET['pid']) && isset($_GET['bid']) && isset($_GET['action']) && $_GET['action'] == "minus"){
        decreaseCart($conn, $_GET['pid'], $_GET['bid']);}
    if(isset($_GET['pid']) && isset($_GET['bid']) && isset($_GET['action']) && $_GET['action'] == "remove"){
        removeCart($conn, $_GET['pid'], $_GET['bid']);}

    $buyer_data = checkloginBuyer($conn);
    $buyer_id = $buyer_data['buyer_id'];
    $toSql = "SELECT * FROM cart WHERE buyer_id = '$buyer_id'";
    $result = mysqli_query($conn, $toSql);
    $total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Store | Cart</title>
</head>
<body>  
    <?php if($result && mysqli_num_rows($result) > 0){?>
    <table>
        <tr>
            <th>Title</th>
            <th>Price</th>
            <th>Amount</th> 
            <th>Add</th>
            <th>Minus</th>
            <th>Remove</th>
        </tr>
    <?php while ($cart = mysqli_fetch_assoc($result)){ 
        $product = getProductDetails($conn, $cart['product_id']);?>
            <tr>
                <td><?php echo $product['product_name']?></td>
                <td><?php echo $product['price']?></td>
                <td><?php echo $cart['amount']?></td>
                <td><a href="cart_buyer.php?pid=<?php echo $cart['product_id']?>&bid=<?php echo $cart['buyer_id']?>&action=add">+</a></td>
                <td><a href="cart_buyer.php?pid=<?php echo $cart['product_id']?>&bid=<?php echo $cart['buyer_id']?>&action=minus">-</a></td>
                <td><a href="cart_buyer.php?pid=<?php echo $cart['product_id']?>&bid=<?php echo $cart['buyer_id']?>&action=remove">Remove</a></td>
            </tr>
    <?php $total = $total + ($product['price']*$cart['amount']);}?>
    </table>
    <p><?php echo $total;?></p>

    <form method="post">
        <select name="mode" id="" onchange="this.form.submit()">
        <?php $mode = $_POST['mode']?>
            <option selected disabled value="">Select Payment Method</option>
            <option value="1" <?php if($mode == 1) echo "selected";?>>Cash On Delivery</option>
            <option value="2" <?php if($mode == 2) echo "selected";?>>GCASH</option>
            </select>
    </form>

    <?php if(isset($_POST['mode']) && $mode == 1){ 
            echo "<form method='post'>
                    Cash On Delivery
                    <label for='address'>Address</label>
                    <input type='text' name='address'>
                    <input type='submit' value='Submit' name='COD'>
                    </form>";
        }
        ?>
        <?php if(isset($_POST['mode']) && $mode == 2){
            echo "<form method='post'>
                    GCASH
                    <label for='address'>Address</label>
                    <input type='text' name='address'> 
                    <label for='number'>Number</label>
                    <input type='text' name='number'>
                    <input type='submit' value='Submit' name='GCASH'>
                    </form>";
        }
        ?>
        
    <a href="checkout.php?bid=<?php echo $_SESSION['buyer_id'];?>">Checkout</a>
    <?php }?>
    <a href="store_buyer.php">Continue Shopping</a>
    
</body>
</html>

<?php 
if(isset($_POST['COD'])){
    $address = $_POST['address'];
    $payment_method = "COD";
    $status = "TO SHIP";
    $transaction_id = uniqid();
    foreach($result as $product){
        $product_id = $product['product_id'];
        $buyer_id = $product['buyer_id'];
        $seller_id = $product['seller_id'];
        $amount = $product['amount'];
        $price = getProductDetails($conn, $product_id);
        $price = $price['price'];
        
        $toSql = "INSERT INTO transactions (
            trans_id, 
            product_id, 
            amount,
            payment_method, 
            buyer_id, 
            seller_id,
            price,
            status,
            address)
            VALUES(
            '$transaction_id',
            '$product_id',
            '$amount',
            '$payment_method',
            '$buyer_id',
            '$seller_id',
            '$price',
            '$status',
            '$address')";
            $result = mysqli_query($conn, $toSql);
            if($result){
                $toSql = "DELETE FROM cart WHERE buyer_id = '$buyer_id' AND product_id = '$product_id'";
                $result = mysqli_query($conn, $toSql);
                header("Location: store_buyer.php");
                die();
            }else{echo "ERROR"; die();}
    }        
}
if(isset($_POST['GCASH'])){
    $address = $_POST['address'];
    $contact_number = $_POST['number'];
    $payment_method = "GCASH";
    $status = "TO SHIP";
    $transaction_id = uniqid();
    foreach($result as $product){
        $product_id = $product['product_id'];
        $buyer_id = $product['buyer_id'];
        $seller_id = $product['seller_id'];
        $amount = $product['amount'];
        $price = getProductDetails($conn, $product_id);
        $price = $price['price'];
        
        $toSql = "INSERT INTO transactions (
            trans_id, 
            product_id, 
            amount,
            payment_method, 
            buyer_id, 
            seller_id,
            price,
            status,
            address,
            contact_number)
            VALUES(
            '$transaction_id',
            '$product_id',
            '$amount',
            '$payment_method',
            '$buyer_id',
            '$seller_id',
            '$price',
            '$status',
            '$address',
            '$contact_number')";
            $result = mysqli_query($conn, $toSql);
            if($result){
                $toSql = "DELETE FROM cart WHERE buyer_id = '$buyer_id' AND product_id = '$product_id'";
                $result = mysqli_query($conn, $toSql);
                header("Location: store_buyer.php");
                die();
            }else{echo "ERROR"; die();}
        }
    }
?>