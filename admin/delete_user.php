<?php
    if(isset($_GET['delete_user_id'])){
        $user_id=$_GET["delete_user_id"];
        $delete_query="Delete from `user_table` where user_id=$user_id";
        $delete_result=mysqli_query($conn,$delete_query);
        if($delete_result){
            echo "<script>alert('User deleted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }    
    }
?>