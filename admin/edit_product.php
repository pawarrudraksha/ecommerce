<?php
    if($_GET['edit_product_id']){
        $product_id=$_GET['edit_product_id'];
        $product_query="Select * from `products` where product_id=$product_id";
        $product_result=mysqli_query($conn,$product_query);
        $row=mysqli_fetch_assoc($product_result);
        $product_title=$row["product_title"];
        $product_description=$row["product_description"];
        $product_keywords=$row["product_keywords"];
        $product_price=$row["product_price"];
        $product_image1=$row["product_image1"];
        $product_image2=$row["product_image2"];
        $product_image3=$row["product_image3"];
        $category_id=$row["category_id"];
        $fetch_category="select * from `categories` where category_id=$category_id";
        $fetch_category_result=mysqli_query($conn,$fetch_category);
        $product_category=mysqli_fetch_assoc($fetch_category_result)["category_title"];
        $brand_id=$row["brand_id"];
        $fetch_brand="select * from `brands` where brand_id=$brand_id";
        $fetch_brand_result=mysqli_query($conn,$fetch_brand);
        $product_brand=mysqli_fetch_assoc($fetch_brand_result)["brand_title"];
    }
   
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">
                Product Title
            </label>
            <input type="text" id="product_title" name="product_title" class="form-control" required value="<?php echo $product_title?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">
                Product Description
            </label>
            <input type="text" id="product_description" name="product_description" class="form-control" required value="<?php echo $product_description?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">
                Product keywords
            </label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required value="<?php echo $product_keywords?>">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">
                Product Category
            </label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_id?>"><?php echo $product_category?></option>
                <?php
                    $select_category="Select * from `categories`";
                    $result_category=mysqli_query($conn,$select_category);
                    while($row=mysqli_fetch_assoc($result_category)){
                        $title=$row['category_title'];
                        $category_id=$row['$category_id'];
                        echo "<option value='$category_id'>$title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brand" class="form-label">
                Product Brand
            </label>
            <select name="product_brand" class="form-select">
                <option value="<?php echo $brand_id?>"><?php echo $product_brand?></option>
                <?php
                    $select_brand="Select * from `brands`";
                    $result_brand=mysqli_query($conn,$select_brand);
                    while($row=mysqli_fetch_assoc($result_brand)){
                        $title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo "<option value='$brand_id'>$title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">
                Product Image1
            </label>
            <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto mx-2">
                <img src="./product_images/<?php echo $product_image1?>" alt="product image" width='100px'>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image2" class="form-label">
                Product Image2
            </label>
            <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto mx-2" >
                <img src="./product_images/<?php echo $product_image2?>" alt="product image" width='100px'>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image3" class="form-label">
                Product Image3
            </label>
            <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto mx-2 w-90 m-auto" >
                <img src="./product_images/<?php echo $product_image3?>" alt="product image" width='100px'>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">
                Product Price
            </label>
            <input type="number" id="product_price" name="product_price" class="form-control" required value="<?php echo $product_price?>">
        </div>
        <div class="w-50 m-auto">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>
    </form>
</div>

<?php
     if(isset($_POST['edit_product'])){
        $product_title=$_POST["product_title"];
        $product_description=$_POST["product_description"];
        $product_keywords=$_POST["product_keywords"];
        $product_price=$_POST["product_price"];
        $image1=$_FILES["product_image1"]["name"];
        $image2=$_FILES["product_image2"]["name"];
        $image3=$_FILES["product_image3"]["name"];
        if($image1!=''){
            $temp_image1=$_FILES["product_image1"]["tmp_name"];
            $product_image1=$image1;
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
        }
        if($image2!=''){
            $temp_image2=$_FILES["product_image2"]["tmp_name"];
            $product_image2=$image2;
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
        }
        if($image3!=''){
            $temp_image3=$_FILES["product_image3"]["tmp_name"];
            $product_image3=$image3;
            move_uploaded_file($temp_image3,"./product_images/$product_image3");
        }
        $category_id=$_POST["product_category"];
        $brand_id=$_POST["product_brand"];
        $update_query="Update `products` set product_title='$product_title',product_description='$product_description',product_price='$product_price',category_id='$category_id',brand_id='$brand_id',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_keywords='$product_keywords' where product_id=$product_id";
        $update_result=mysqli_query($conn,$update_query);
        if($update_result){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>