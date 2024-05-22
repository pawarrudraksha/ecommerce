<?php
  include('includes/connect.php');
  include('functions/common_function.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ECommmerce</title>
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
    <link rel="stylesheet" href="style.css" />
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
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"
                ><i class="fa-solid fa-cart-shopping"></i><sup>
                <?php
                    getNoOfCartItems();
                  ?></sup></a
              >
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">
              Total Price: 
              <?php
                getTotalCartPrice()
              ?>
              /-
            </a>

            </li>
          </ul>
          <form
            class="form-inline my-2 my-lg-0 d-flex"
            action="search_product.php"
            method="get"
          >
            <input
              class="form-control mr-sm-2 mx-1"
              type="search"
              placeholder="Search"
              aria-label="Search"
              name="search_data"
            />
            <input
              type="submit"
              value="Search"
              class="btn btn-outline-light"
              name="search_data_product"
            />
          </form>
        </div>
      </nav>
    </div>
    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
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
    <div class="row px-1">
      <div class="col-md-10">
        <!-- products -->
        <div class="row mx-1">
        
         
          <?php
            getProductDetail();
            getProductByCategories();
            getProductByBrands();
          ?>
          <!-- row-end -->
        </div>
        <!-- col end -->
      </div>
      <div class="col-md-2 bg-secondary p-0">
        <!-- brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Delivery brands</h4></a>
          </li>

          <?php
           getBrands()
          ?>
        </ul>
        <!-- Categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
          </li>

          <?php
            getCategories()
          ?>
        </ul>
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
