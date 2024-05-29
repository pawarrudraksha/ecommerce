<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ECommmerce-Cart details</title>
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
    <link rel="stylesheet" href="./style.css" />
  </head>
  <body>
    <!-- navbar -->
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-info p-2">
        <img
          src="https://th.bing.com/th/id/OIP.vBmeNfhXI1Sue8fAfAmKWAAAAA?rs=1&pid=ImgDetMain"
          alt=""
          class="logo"
        />
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <?php
                if(isset($_SESSION['username'])){
                  echo "<a class='nav-link' href='./users/profile.php'>My Account</a>
                  ";
                }else{
                  echo "<a class='nav-link' href='./users/user_registration.php'>Register</a>
                  ";
                }
              ?>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"
                ><i class="fa-solid fa-cart-shopping"></i><sup>
                  <?php
                    getNoOfCartItems();
                  ?>
                </sup></a
              >
           
          </ul>
        </div>
      </nav>
    </div>
    <?php 
      addToCart();
    ?>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
      <li class="nav-item">
              <?php
               if(!isset($_SESSION['username'])){
                  echo "<a class='nav-link' href='#'>Welcome Guest</a>";
                }else{
                  echo "<a class='nav-link' href='#'>Welcome ".$_SESSION["username"]."</a>";
                }
              ?>
            </li>
            <li class="nav-item">
             <?php
               if(!isset($_SESSION['username'])){
                  echo "<a class='nav-link' href='./users/user_login.php'>Login</a>";
                }else{
                  echo "<a class='nav-link' href='./users/user_logout.php'>Logout</a>";
                }
              ?>
            </li>
      </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">
        Communication is at heart of e-commerce and community
      </p>
    </div>

    <!-- fourth child -->
    <div class="container">
        <div class="row">
            <form action=""  method="post">
            <table class="table table-bordered text-center">
                
                <tbody>
                    <!-- fetch cart items -->
                    <?php
                        $ip = getIPAddress();
                        $total = 0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip';";
                        $result = mysqli_query($conn, $cart_query);
                      
                        $no_of_items_in_cart=mysqli_num_rows($result);
                        if($no_of_items_in_cart){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";
                        while($row = mysqli_fetch_assoc($result)){
                          $product_id = $row["product_id"];
                          $select_products = "SELECT * FROM `products` WHERE product_id=$product_id";
                          $result_products = mysqli_query($conn, $select_products);
                          if ($product_row = mysqli_fetch_assoc($result_products)){
                            $product_price = $product_row['product_price'];
                            $product_title = $product_row['product_title'];
                            $product_img = $product_row['product_image1'];
                            $product_price = $product_row['product_price'];
                            $total += $product_price;
                          }
                        }
                        ?>
                        <tr>
                        <td>
                            <?php
                                echo $product_title;
                            ?>
                        </td>
                        <td>
                            <img src="./admin/product_images/<?php echo $product_img?>" alt="image" width="50px" height="50px">`
                        </td>
                        <td><input type="text"name="qty" class="form-input w-50"></td>
                        <?php
                            $ip=getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $qty=$_POST['qty'];
                                $update_query="update `cart_details` set quantity=$qty where ip_address='$ip'";
                                $result_qty=mysqli_query($conn,$update_query);
                            }
                        ?>
                        <td><?php
                                echo "$product_price/-";
                            ?></td>
                        <td><input type="checkbox" name="removeitem[]"
                        value="<?php echo $product_id?>"></td>
                        <td>
                            <input class="bg-info px-3 py-2 border-0" type="submit" name="update_cart" value="Update cart"/>
                            <input class="bg-info px-3 py-2 border-0" type="submit" name="remove_cart" value="Remove from cart"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php }else{
            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
        }?>

            <!-- subtotal -->
            
            <div class="d-flex mb-3">
                <?php
                    $ip = getIPAddress();
                    $total = 0;
                    $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$ip';";
                    $result = mysqli_query($conn, $cart_query);
                    $no_of_items_in_cart=mysqli_num_rows($result);
                  if ($no_of_items_in_cart > 0) {
                      echo "<h4 class='px-3 d-flex align-items-center'>Subtotal:<strong class='text-info'>";
                      echo getTotalCartPrice(); 
                      echo "/-</strong></h4>
                            <a href='index.php'>
                                <input type='submit' name='continue_shopping' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3'>
                            </a>
                            <button class='bg-secondary px-3 py-2 border-0 text-light'>
                                <a href='users/checkout.php' class='text-light text-decoration-none'>Checkout</a>
                            </button>";
                  }
                  else{
                        echo "<a href='index.php'>
                        <input type='submit' name='continue_shopping' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3'>
                        </a>";   
                    }
                    if(isset($_POST['continue_shopping'])){
                        echo  "<script>window.open('index.php','_self')</script>";
                    }
                ?>

            </div>
            </form>
            <!-- function to remove item -->
            <?php
                function remove_cart_item(){
                    global $conn;
                    if(isset($_POST['remove_cart'])){
                        foreach($_POST['removeitem']  as $remove_id){
                            echo $remove_id;
                            $delete_query="delete from `cart_details` where product_id=$remove_id";
                            $result_remove=mysqli_query($conn,$delete_query);
                            if($result_remove){
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }
               echo $remove_item=remove_cart_item();
            ?>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./includes/footer.php") ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
