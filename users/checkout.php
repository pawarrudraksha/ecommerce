<?php
  include('../includes/connect.php');
  @session_start();
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
    <link rel="stylesheet" href="../style.css" />
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
              <a class="nav-link" href="../index.php"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <?php
                if(isset($_SESSION['username'])){
                  echo "<a class='nav-link' href='./profile.php'>Register</a>
                  ";
                }else{
                  echo "<a class='nav-link' href='./user_registration.php'>Register</a>
                  ";
                }
              ?>            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
           
        </div>
      </nav>
    </div>
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
                  echo "<a class='nav-link' href='./user_login.php'>Login</a>";
                }else{
                  echo "<a class='nav-link' href='./user_logout.php'>Logout</a>";
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
    <div class="row px-1">
      <div class="col-md-12">
        <!-- products -->
        <div class="row mx-1">
            <?php
              if(!isset($_SESSION['username'])){
                    include("./user_login.php");
                }else{
                    include("./payment.php");
                }
            ?>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <?php include("../includes/footer.php") ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
