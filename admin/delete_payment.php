<?php
    if(isset($_GET['delete_payment_id'])){
        $payment_id=$_GET["delete_payment_id"];
        $delete_query="Delete from `user_payments` where payment_id=$payment_id";
        $delete_result=mysqli_query($conn,$delete_query);
        if($delete_result){
            echo "<script>alert('Payment deleted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }    
    }
?>