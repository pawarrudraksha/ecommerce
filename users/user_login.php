<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  @session_start();
  if(isset($_POST["user_login"])){
    $user_name=$_POST["user_name"];
    $user_password=$_POST["user_password"];
    if($user_name==''   or $user_password==''){
        echo "<script>alert('please fill all fields')</script>";
        exit();
    }else{
        $select_query="Select * from `user_table` where user_name='$user_name'";
        $select_result_query=mysqli_query($conn,$select_query);
        $num_of_rows=mysqli_num_rows($select_result_query);
        if($num_of_rows==0){
            echo "<script>alert('User does not exist')</script>";
        }else{
            $row_data=mysqli_fetch_assoc($select_result_query);
            $user_ip=getIPAddress();
            $cart_query="Select * from `cart_details` where ip_address='$user_ip'";
            $cart_result_query=mysqli_query($conn,$cart_query);
            $num_of_rows_cart=mysqli_num_rows($cart_result_query);
            $db_password=$row_data['user_password'];
            if(password_verify($user_password,$db_password)){
                $_SESSION['username']=$user_name;
                if($num_of_rows_cart==0){
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('./profile.php','_self')</script>";
                }else{
                    echo "<script>alert('Login successful')</script>";
                    echo "<script>window.open('./payment.php','_self')</script>";
                }
            }else{
                echo "<script>alert('Invalid credentials')</script>";
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
    <title>User Login</title>
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
        <h1 class="text-center">User Login</h1>
        <!-- form -->
        <form action="" method="post">
            <!-- Username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label">
                    Username
                </label>
                <input type="text" name="user_name" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_password" class="form-label">
                   Password
                </label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="EnterPassword" autocomplete="off" required>
            </div>
            
          
            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="user_login" class="btn btn-info mb-3 px-3" value="Login" >
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./user_registration.php"> Register</a></p>
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