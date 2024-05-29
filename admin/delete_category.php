<?php
    if(isset($_GET['delete_category_id'])){
        $category_id=$_GET["delete_category_id"];
        $delete_query="Delete from `categories` where category_id=$category_id";
        $delete_result=mysqli_query($conn,$delete_query);
        if($delete_result){
            echo "<script>alert('Category deleted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }    
    }
?>