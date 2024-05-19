<?php
  include('includes/connect.php');
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
              <a class="nav-link" href="/"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"
                ><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total Price: 100/-</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 d-flex">
            <input
              class="form-control mr-sm-2 mx-1"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button
              class="btn btn-outline-light gap-2 my-2 my-sm-0"
              type="submit"
            >
              Search
            </button>
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
    <div class="row">
      <div class="col-md-10">
        <!-- products -->
        <div class="row mx-1">
          <div class="col-md-4 mb-2 ">
            <div class="card">
              <img
                class="card-img-top p-3"
                src="https://th.bing.com/th/id/R.434e7a8d73bb3c61e67ec5972df8e95f?rik=lKf3j8ewsG5iKw&riu=http%3a%2f%2fbrain-images.cdn.dixons.com%2f3%2f1%2f09949613%2fu_09949613.jpg&ehk=4jfO6SX7%2bXjgaLrmPeDgXxrPZWH4Kr6fOh6vt3MjRlw%3d&risl=&pid=ImgRaw&r=0"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-info">Add to card</a>
                <a href="#" class="btn btn-secondary">View more</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2 ">
            <div class="card">
              <img
                class="card-img-top p-3"
                src="https://th.bing.com/th/id/OIP.-3G3SS8PpMdrseC3MeVPXwHaHa?rs=1&pid=ImgDetMain"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-info">Add to card</a>
                <a href="#" class="btn btn-secondary">View more</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-2 ">
            <div class="card">
              <img
                class="card-img-top p-3"
                src="https://www.ikea.com/in/en/images/products/malm-bed-frame-high-white-stained-oak-veneer-luroey__0637598_pe698416_s5.jpg?f=xl"
                alt="Card image cap"
              />
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
                <a href="#" class="btn btn-info">Add to card</a>
                <a href="#" class="btn btn-secondary">View more</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-2 bg-secondary p-0">
        <!-- brands to be displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Delivery brands</h4></a>
          </li>
          
          <?php
            $select_brands="Select * from `mystore`.`brands`";
            $result_brands=mysqli_query($conn,$select_brands);
            while($row_data=mysqli_fetch_assoc($result_brands)){
              $brand_title=$row_data['brand_title'];
              $brand_id=$row_data['brand_id'];
              echo "<li class='nav-item'>
              <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
            </li>";
            }
          ?>
        </ul>
        <!-- Categories to be displayed -->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-info ">
            <a href="#" class="nav-link text-light "><h4>Categories</h4></a>
          </li>
          
          <?php
            $select_categories="Select * from `mystore`.`categories`";
            $result_categories=mysqli_query($conn,$select_categories);
            while($row_data=mysqli_fetch_assoc($result_categories)){
              $category_title=$row_data['category_title'];
              $category_id=$row_data['category_id'];
              echo "<li class='nav-item'>
              <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
            </li>";
            }
          ?>
        </ul>
      </div>
    </div>
    <!-- Footer -->
    <div class="bg-info p-3 text-center ">
      <p>All rights reserved @2024-Rudraksha Pawar</p>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
