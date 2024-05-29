<?php
    if(isset($_GET['delete_order_id'])){
        $order_id=$_GET["delete_order_id"];
        $delete_query="Delete from `orders` where order_id=$order_id";
        $delete_result=mysqli_query($conn,$delete_query);
        if($delete_result){
            echo "<script>alert('Order deleted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }    
    }
?>