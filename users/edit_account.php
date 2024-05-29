
<?php
    $row=getUserDetails();
    if(isset($_POST["user_update"])){
        $user_id=$row['user_id'];
        $user_name=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_mobile=$_POST['user_mobile'];
        $user_address=$_POST['user_address'];
        $user_image=$_FILES["user_image"]['name'];
        $temp_image=$_FILES["user_image"]['tmp_name'];   
        
        echo $temp_image; 
        if($user_address!='' and $user_email!='' and $user_name!='' and $user_mobile!=''){
            move_uploaded_file($temp_image,"./user_images/$user_image");
            $update_query='';
            if($user_image!=''){
                $update_query="Update `user_table` set user_name='$user_name',user_email='$user_email',user_mobile='$user_mobile',user_image='$user_image',user_address='$user_address' where user_id=$user_id";
            }else{
                $update_query="Update `user_table` set user_name='$user_name',user_email='$user_email',user_mobile='$user_mobile',user_address='$user_address' where user_id=$user_id";
            }
            $result_query=mysqli_query($conn,$update_query);
            if($result_query){
                $_SESSION['username']=$user_name;
                echo "<script>alert('Updated profile successfully')</script>";
                echo "<script>window.open('profile.php?#','_self')</script>";
            }else{
                echo "<script>alert('Failure')</script>";
            }
        }else{
            echo "<script>alert('Failure')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <style>
        .edit_image{
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h3 class="text-success">
        Edit account
    </h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_name" value="<?php echo $row["user_name"]?>">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" name="user_email" value="<?php echo $row["user_email"]?>">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto"  name="user_image">
            <img src="./user_images/<?php echo $row["user_image"]?>" alt="user image" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address" value="<?php echo $row["user_address"]?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobile" value="<?php echo $row["user_mobile"]?>">
        </div>
        <input type="submit" class="bg-info py-2 px-3 border-0 mb-2" name="user_update" value="Update">
    </form>
</body>
</html>