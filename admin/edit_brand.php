<?php
    if(isset($_GET['edit_brand_id'])){
        $brand_id=$_GET['edit_brand_id'];
        $select_query="Select * from `brands` where brand_id=$brand_id";
        $result_query=mysqli_query($conn,$select_query);
        $brand_title=mysqli_fetch_assoc($result_query)['brand_title'];
    }
    if(isset($_POST["update_brand"])){
        $brand_title=$_POST['brand_title'];
        $update_query="Update  `brands` set brand_title='$brand_title'  where brand_id=$brand_id";
        $result_update_query=mysqli_query($conn,$update_query);
        if($result_update_query){
            echo "<script>alert('Updated brand')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label"></label>
            <input type="text"  name="brand_title" id="brand_title" class="form-control" required value="<?php echo $brand_title?>">
        </div>
        <input type="submit" name="update_brand" value="Update Brand" class="btn btn-info px-3">

    </form>
</div>