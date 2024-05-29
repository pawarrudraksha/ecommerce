<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  if(isset($_POST["user_register"])){
    $user_name=$_POST["user_name"];
    $user_email=$_POST["user_email"];
    $user_mobile=$_POST["user_mobile"];
    $user_address=$_POST["user_address"];
    $user_password=$_POST["user_password"];
    $user_confirm_password=$_POST["user_confirm_password"];
    $user_image=$_FILES["user_image"]['name'];
    $temp_image1=$_FILES["user_image"]['tmp_name'];
    $user_ip=getIPAddress();
    if($user_name=='' or $user_email=='' or $user_mobile==''  or $user_password=='' or $user_address=='' or $user_image==''){
        echo "<script>alert('please fill all fields')</script>";
        exit();
    }
    else{
        $select_query="SELECT * FROM   `user_table` where `user_name`='$user_name' or `user_email`='$user_email'";
        $result_check_query=mysqli_query($conn,$select_query);
        $no_of_rows=mysqli_num_rows($result_check_query);
        if($no_of_rows>0){
            echo "<script>alert('User with username and email already exists')</script>";
        }
        else if($user_password!=$user_confirm_password){
            echo "<script>alert('Passwords don't match')</script>";
        }
        else{
            $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
            move_uploaded_file($temp_image1,"./user_images/$user_image");
            $user_query = "INSERT INTO `user_table` (user_name, user_email, user_address,user_mobile,user_ip,user_image, user_password) VALUES ('$user_name', '$user_email', '$user_address', '$user_mobile' , '$user_ip' ,'$user_image', '$hash_password');";
            $result_query=mysqli_query($conn,$user_query);
            if($result_query){
                echo "<script>alert('Registration successful')</script>";
            }
            $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
            $result_cart=mysqli_query($conn,$select_cart_items);
            $rows_count=mysqli_num_rows($result_cart);
            session_start();
            $_SESSION['username']=$user_name;
            if($rows_count>0){
                echo "<script>alert('You have items in your cart')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }else{
                echo "<script>window.open('../index.php','_self')</script>";
            }
        }
    }     
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../style.css" />
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">User Registration</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label">
                    Username
                </label>
                <input type="text" name="user_name" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
            </div>
            <!-- Email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_email" class="form-label">
                    Email
                </label>
                <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter Email" autocomplete="off" required>
            </div>
         
         
             <!-- Image1 -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_image" class="form-label">
                    Select your avatar
                </label>
                <input type="file" name="user_image" id="user_image" class="form-control"  autocomplete="off" required>
            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_password" class="form-label">
                   Password
                </label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="EnterPassword" autocomplete="off" required>
            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_confirm_password" class="form-label">
                    Confirm Password
                </label>
                <input type="password" name="user_confirm_password" id="user_confirm_password" class="form-control" placeholder="Enter Confirm Password" autocomplete="off" required>
            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_address" class="form-label">
                    Address
                </label>
                <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter Address" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_mobile" class="form-label">
                    Phone No
                </label>
                <input type="text" name="user_mobile" id="user_mobile" class="form-control" placeholder="Enter Phone No" autocomplete="off" required>
            </div>
            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="user_register" class="btn btn-info mb-3 px-3" value="Register" >
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="user_login.php"> Login</a></p>
            </div>
        </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
</body>
</html>