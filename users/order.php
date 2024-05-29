<?php
    include('../includes/connect.php');
    include('../functions/common_function.php');
    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
    }
    $ip_address=getIPAddress();
    $total_price=returnTotalCartPrice();
    $invoice_no=mt_rand();
    $status="incomplete";
    $quantity=getTotalQuantity();
    
    $order_insert_query = "INSERT INTO `user_orders` (user_id, due_amount, invoice_number, total_products, order_status) VALUES ('$user_id', '$total_price', '$invoice_no', '$quantity', '$status')";

    $order_result_query=mysqli_query($conn,$order_insert_query);
    // skipped pending orders insertion
    if($order_result_query){
        echo "<script>Order placed successfully</script>";
        echo "<script>window.open('profile.php','_self')</script>";
        $select_from_cart="select * from `cart_details` where ip_address='$ip_address'";
        $select_result=mysqli_query($conn,$select_from_cart);
        while($row=mysqli_fetch_assoc($select_result)){
            $product_id=$row["product_id"];
            $product_tally=$row["quantity"];
            $insert_tally="Insert into `product_tally`(product_id,product_tally) values($product_id,$product_tally)";
            $result_tally=mysqli_query($conn,$insert_tally);
        }
        $cart_clear_query="delete from `cart_details` where ip_address='$ip_address'";
        $cart_clear_result=mysqli_query($conn,$cart_clear_query);
    }else{
        echo "<script>Order not placed </script>";
    }
?>