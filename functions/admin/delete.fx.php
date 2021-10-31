<?php
    //**MADE A SEPARATE FILE FOR IT IS COMPLEX AND TOO MUCH WORK */
    
    function deleteSeller($conn, $seller_id){
        $products = getSellerProducts($conn, $seller_id);
        var_dump($products);
        if($products){
            //**REMOVING ALL THE IMAGE IN IMAGE FOLDER */
            foreach($products as $product){
                $path = "../../view/seller/".$product['image'];
                unlink($path);
            }
            //**REMOVE CARTS REMOVE ALL PRODUCTS AND UPDATE TRANSACTIONS */
            deleteCartSeller($conn, $seller_id);
            updateTransactions($conn, $seller_id);
            deleteProduct($conn, $seller_id);

            $params = "DELETE FROM sellers WHERE seller_id = '$seller_id'";
            $query = mysqli_query($conn, $params);
            return $query;
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function getSellerProducts($conn, $seller_id){
        $params = "SELECT * FROM product WHERE seller_id = '$seller_id'";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0 ){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result;
        }
        else{
            return false;
        }
    }

    function deleteProduct($conn, $seller_id){
        $params = "DELETE FROM product WHERE seller_id = '$seller_id'";
        mysqli_query($conn, $params);
    }

    function deleteCartSeller($conn, $seller_id){
        $params = "DELETE FROM cart WHERE seller_id = '$seller_id'";
        mysqli_query($conn, $params);
    }

    function updateTransactions($conn, $seller_id){
        $params = "UPDATE transactions SET status = 'Product Deleted', seller_id = 'Seller Deleted' WHERE seller_id = '$seller_id'";
        mysqli_query($conn, $params);
    }

    //**DELETE BUYER SECTION */
    function deleteBuyer($conn, $buyer_id){
        deleteCartBuyer($conn, $buyer_id);
        updateBuyerTransactions($conn, $buyer_id);
        $params = "DELETE FROM buyers WHERE buyer_id = '$buyer_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
    }

    function deleteCartBuyer($conn, $buyer_id){
        $params = "DELETE FROM cart WHERE buyer_id = '$buyer_id'";
        mysqli_query($conn, $params);
    }

    function updateBuyerTransactions($conn, $buyer_id){
        $params = "UPDATE transactions SET status = 'Buyer Deleted', buyer_id = 'Buyer Deleted' WHERE buyer_id = '$buyer_id'";
        mysqli_query($conn, $params);
    }