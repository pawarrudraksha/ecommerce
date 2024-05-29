<?php
    if(isset($_GET['delete_brand_id'])){
        $brand_id=$_GET["delete_brand_id"];
        $delete_query="Delete from `brands` where brand_id=$brand_id";
        $delete_result=mysqli_query($conn,$delete_query);
        if($delete_result){
            echo "<script>alert('Brand deleted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }    
    }
?>