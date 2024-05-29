<?php
    if(isset($_GET["delete_product_id"])){
        $product_id=$_GET["delete_product_id"];
        $delete_query="Delete  from `products` where product_id=$product_id";
        $delete_result=mysqli_query($conn,$delete_query);
        if($delete_result){
            echo "<script>alert('Product deleted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>