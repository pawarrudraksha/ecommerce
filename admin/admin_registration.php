<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  if(isset($_POST["user_register"])){
    $admin_name=$_POST["admin_name"];
    $admin_email=$_POST["admin_email"];
    $admin_password=$_POST["admin_password"];
    $admin_confirm_password=$_POST["admin_confirm_password"];
    if($admin_name=='' or $admin_email=='' or $admin_password=='' or $admin_confirm_password==''){
        echo "<script>alert('please fill all fields')</script>";
        exit();
    }
    else{
        $select_query="SELECT * FROM  `admin_table` where `admin_name`='$admin_name' or `admin_email`='$admin_email'";
        $result_check_query=mysqli_query($conn,$select_query);
        $no_of_rows=mysqli_num_rows($result_check_query);
        if($no_of_rows>0){
            echo "<script>alert('User with username and email already exists')</script>";
        }
        else if($admin_password!=$admin_confirm_password){
            echo "<script>alert('Passwords don't match')</script>";
        }
        else{
            $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
            $user_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password');";
            $result_query=mysqli_query($conn,$user_query);
            if($result_query){
                session_start();
                $_SESSION['admin_username']=$admin_name;
                echo "<script>alert('Registration successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
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
    <title>Admin Registration</title>
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
        <h1 class="text-center">Admin Registration</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label">
                    Username
                </label>
                <input type="text" name="admin_name" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
            </div>
            <!-- Email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="admin_email" class="form-label">
                    Email
                </label>
                <input type="text" name="admin_email" id="admin_email" class="form-control" placeholder="Enter Email" autocomplete="off" required>
            </div>
         
         
            
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="admin_password" class="form-label">
                   Password
                </label>
                <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="EnterPassword" autocomplete="off" required>
            </div>
            
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="admin_confirm_password" class="form-label">
                    Confirm Password
                </label>
                <input type="password" name="admin_confirm_password" id="admin_confirm_password" class="form-control" placeholder="Enter Confirm Password" autocomplete="off" required>
            </div>
            
         
            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="user_register" class="btn btn-info mb-3 px-3" value="Register" >
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="admin_login.php"> Login</a></p>
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