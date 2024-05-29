<?php
    if(isset($_GET['edit_category_id'])){
        $category_id=$_GET['edit_category_id'];
        $select_query="Select * from `categories` where category_id=$category_id";
        $result_query=mysqli_query($conn,$select_query);
        $category_title=mysqli_fetch_assoc($result_query)['category_title'];
    }
    if(isset($_POST["update_category"])){
        $category_title=$_POST['category_title'];
        $update_query="Update  `categories` set category_title='$category_title'  where category_id=$category_id";
        $result_update_query=mysqli_query($conn,$update_query);
        if($result_update_query){
            echo "<script>alert('Updated category')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label"></label>
            <input type="text"  name="category_title" id="category_title" class="form-control" required value="<?php echo $category_title?>">
        </div>
        <input type="submit" name="update_category" value="Update Category" class="btn btn-info px-3">

    </form>
</div>