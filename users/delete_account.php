
<h3 class="text-danger mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
    <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 mx-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 mx-auto" name="back" value="Go back">
        </div>
</form>

<?php
    $user_session=$_SESSION['username'];
    if(isset($_POST["delete"])){
        $delete_query="Delete from `user_table` where user_name='$user_session'";
        $result=mysqli_query($conn,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account deleted')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['back'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
?>