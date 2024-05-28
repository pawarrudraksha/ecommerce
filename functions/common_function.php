<?php
function getProducts(){
  global $conn;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $select_query="Select * from `products` order by rand() limit 0,9";
      $result_query=mysqli_query($conn,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_title=$row["product_title"];
        $product_id=$row["product_id"];
        $product_description=$row["product_description"];
        $product_price=$row["product_price"];
        $first_image=$row["product_image1"];
        echo " <div class='col-md-4 mb-2 '>
        <div class='card'>
        <img
        class='card-img-top p-3'
        src='admin/product_images/$first_image'
        alt='Card image cap'
        />
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>
        $product_description.
        </p>
        <p class='card-text'>
        Price : $product_price/-
        </p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
        </div>
        </div>";
      }
    }
  }
}
function getAllProducts(){
  global $conn;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $select_query="Select * from `products` order by rand()";
      $result_query=mysqli_query($conn,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_title=$row["product_title"];
        $product_id=$row["product_id"];
        $product_description=$row["product_description"];
        $product_price=$row["product_price"];
        $first_image=$row["product_image1"];
        echo " <div class='col-md-4 mb-2 '>
        <div class='card'>
        <img
        class='card-img-top p-3'
        src='admin/product_images/$first_image'
        alt='Card image cap'
        />
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>
        $product_description.
        </p>
        <p class='card-text'>
        Price : $product_price/-
        </p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
        </div>
        </div>";
      }
    }
  }
}
function getProductByCategories(){
  global $conn;
  if(isset($_GET['category'])){
      $category_id=$_GET['category'];
      $select_query="Select * from `products` where category_id=$category_id";
      $result_query=mysqli_query($conn,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_title=$row["product_title"];
        $product_id=$row["product_id"];
        $product_description=$row["product_description"];
        $product_price=$row["product_price"];
        $first_image=$row["product_image1"];
        echo " <div class='col-md-4 mb-2 '>
        <div class='card'>
        <img
        class='card-img-top p-3'
        src='admin/product_images/$first_image'
        alt='Card image cap'
        />
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>
        $product_description.
        </p>
        <p class='card-text'>
        Price : $product_price/-
        </p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
        </div>
        </div>";
      }
  }
}
function getProductByBrands(){
  global $conn;
  if(isset($_GET['brand'])){
      $brand_id=$_GET['brand'];
      $select_query="Select * from `products` where brand_id=$brand_id";
      $result_query=mysqli_query($conn,$select_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_title=$row["product_title"];
        $product_id=$row["product_id"];
        $product_description=$row["product_description"];
        $product_price=$row["product_price"];
        $first_image=$row["product_image1"];
        echo " <div class='col-md-4 mb-2 '>
        <div class='card'>
        <img
        class='card-img-top p-3'
        src='admin/product_images/$first_image'
        alt='Card image cap'
        />
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>
        $product_description.
        </p>
        <p class='card-text'>
        Price : $product_price/-
        </p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
        </div>
        </div>";
      }
  }
}
function searchProducts(){
  global $conn;
  if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
      $search_query="Select * from `products` where product_keywords like '%$search_data_value%'";
      $result_query=mysqli_query($conn,$search_query);
      $num_of_rows=mysqli_num_rows($result_query);
      if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No products found try searching for another keyword</h2>";
      }
      while($row=mysqli_fetch_assoc($result_query)){
        $product_title=$row["product_title"];
        $product_id=$row["product_id"];
        $product_description=$row["product_description"];
        $product_price=$row["product_price"];
        $first_image=$row["product_image1"];
        echo " <div class='col-md-4 mb-2 '>
        <div class='card'>
        <img
        class='card-img-top p-3'
        src='admin/product_images/$first_image'
        alt='Card image cap'
        />
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>
        $product_description.
        </p>
        <p class='card-text'>
        Price : $product_price/-
        </p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
        </div>
        </div>";
      }
  }
}

function getBrands(){
  global $conn;
  $select_brands="Select * from `brands`";
  $result_brands=mysqli_query($conn,$select_brands);
  while($row_data=mysqli_fetch_assoc($result_brands)){
    $brand_title=$row_data['brand_title'];
    $brand_id=$row_data['brand_id'];
    echo "<li class='nav-item'>
    <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
  </li>";
  }
}

function getCategories(){
  global $conn;
  $select_categories="Select * from `categories`";
  $result_categories=mysqli_query($conn,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
      $category_title=$row_data['category_title'];
      $category_id=$row_data['category_id'];
      echo "<li class='nav-item'>
      <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
      </li>";
    }
}

function getProductDetail(){
  global $conn;
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
      $product_id=$_GET['product_id'];
      $select_query="Select * from `products` where product_id=$product_id";
      $result_query=mysqli_query($conn,$select_query);
      while($row=mysqli_fetch_assoc($result_query)){
        $product_title=$row["product_title"];
        $product_id=$row["product_id"];
        $product_description=$row["product_description"];
        $product_price=$row["product_price"];
        $product_image1=$row["product_image1"];
        $product_image2=$row["product_image2"];
        $product_image3=$row["product_image3"];
        echo " <div class='col-md-4 mb-2 '>
        <div class='card'>
        <img
        class='card-img-top p-3'
        src='admin/product_images/$product_image1'
        alt='Card image cap'
        />
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>
        $product_description.
        </p>
        <p class='card-text'>
        Price : $product_price/-
        </p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
        <a href='index.php' class='btn btn-secondary'>Go Home</a>
        </div>
        </div>
        </div>
        <div class='col-md-8'>
        <div class='row'>
          <div class='col-md-12'>
            <h4 class='text-center text-info mb-5'>
              Related Products
            </h4>
          </div>
          <div class='col-md-6'>
          <img
            class='card-img-top'
            src='admin/product_images/$product_image2'
            alt='Card image cap'
          />
          </div>
          <div class='col-md-6'>
          <img
            class='card-img-top'
            src='admin/product_images/$product_image3'
            alt='Card image cap'
          />
          </div>
        </div>
      </div>
        ";
      }
    }
    }
  }
}

function getIPAddress() {  
  //whether ip is from the share internet  
  if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
    $ip = $_SERVER['HTTP_CLIENT_IP'];  
  }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
  }  
  //whether ip is from the remote address  
  else{  
  $ip = $_SERVER['REMOTE_ADDR'];  
  }  
  return $ip;  
}

// cart
function addToCart(){
  if(isset($_GET['add_to_cart'])){
    global $conn;
    $ip=getIPAddress();
    $product_id=$_GET['add_to_cart'];
    $select_query="Select * from `cart_details` where ip_address='$ip' and product_id=$product_id";
    $result_query=mysqli_query($conn,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('This item is already present inside cart')</script/>";
      echo "<script>window.open('index.php','_self')</script>";
    }else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values($product_id,'$ip',1)";
      $result_query=mysqli_query($conn,$insert_query);
      echo "<script>alert('Item added to cart ')</script/>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

// no of cart items
function getNoOfCartItems(){
  global $conn;
  $ip=getIPAddress();
  $select_query="Select * from `cart_details` where ip_address='$ip'";
  $result_query=mysqli_query($conn,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  echo $num_of_rows;
}

// total cart price
function getTotalCartPrice(){
  global $conn;
  $ip = getIPAddress();
  $total = 0;
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip';";
  $result = mysqli_query($conn, $cart_query);

  while($row = mysqli_fetch_assoc($result)){
    $quantity=$row["quantity"];
    $product_id = $row["product_id"];
    $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
    $result_products = mysqli_query($conn, $select_products);
    if ($product_row = mysqli_fetch_assoc($result_products)){
      $product_price = $product_row['product_price'];
      $total += $product_price*$quantity;
    }
  }
  echo $total;
}

?>