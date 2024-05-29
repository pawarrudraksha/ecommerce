<?php
  include('../includes/connect.php');
  include('../functions/common_function.php');
  if(isset($_POST["user_register"])){
    $admin_name=$_POST["admin_name"];
    $admin_password=$_POST["admin_password"];
    if($admin_name==''  or $admin_password==''){
        echo "<script>alert('please fill all fields')</script>";
        exit();
    }
    else{
        $select_query="SELECT * FROM  `admin_table` where `admin_name`='$admin_name'";
        $result_check_query=mysqli_query($conn,$select_query);
        $no_of_rows=mysqli_num_rows($result_check_query);
        $row_data=mysqli_fetch_assoc($result_check_query);
        if($no_of_rows>0){
            $db_password=$row_data['admin_password'];
            if(password_verify($admin_password,$db_password)){
                session_start();
                $_SESSION['admin_username']=$admin_name;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
                
            }else{
                echo "<script>alert('Invalid credentials')</script>";
            }
        }else{
            echo "<script>alert('User does not exist')</script>";
        }
    }     
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
        <h1 class="text-center">Admin Login</h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label">
                    Username
                </label>
                <input type="text" name="admin_name" id="username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
            </div>     
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="admin_password" class="form-label">
                   Password
                </label>
                <input type="password" name="admin_password" id="admin_password" class="form-control" placeholder="EnterPassword" autocomplete="off" required>
            </div>    
         
            <!-- Submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="user_register" class="btn btn-info mb-3 px-3" value="Login" >
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="admin_regsitration.php"> Login</a></p>
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