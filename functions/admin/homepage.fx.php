<?php
    function getListofBuyers($conn){
        $params = "SELECT * FROM buyers";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result; 
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function getListofSellers($conn){
        $params = "SELECT * FROM sellers";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            return $result; 
            exit();
        }
        else{
            return false;
            exit();
        }
    }

    function getAdminPassword($conn){
        $params = "SELECT admin_password FROM admin";
        $query = mysqli_query($conn, $params);
        if($query && mysqli_num_rows($query) > 0){
            $result = mysqli_fetch_assoc($query);
            return $result;
            exit();
        }
        else{
            return false;
            exit();
        }
    }


    function deleteSeller($conn, $seller_id){
        $products = getSellerProducts($conn, $seller_id);
        var_dump($products);
        if($products){
            foreach($products as $product){
                $path = "../../view/seller/".$product['image'];
                unlink($path);
            }

            deleteCart($conn, $seller_id);
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

    function deleteBuyer($conn, $buyer_id){
        $params = "DELETE FROM buyers WHERE buyer_id = '$buyer_id'";
        $query = mysqli_query($conn, $params);
        return $query;
        exit();
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

    function deleteCart($conn, $seller_id){
        $params = "DELETE FROM cart WHERE seller_id = '$seller_id'";
        mysqli_query($conn, $params);
    }

    function updateTransactions($conn, $seller_id){
        $params = "UPDATE transactions SET status = 'Product Deleted' WHERE seller_id = '$seller_id'";
        mysqli_query($conn, $params);
    }


