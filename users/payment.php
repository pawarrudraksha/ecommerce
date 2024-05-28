<?php
 include('../includes/connect.php');
 include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce : Payment</title>
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
    <?php
      $user_ip=getIPAddress();
      $get_user="Select * from `user_table` where user_ip='$user_ip'";
      $result=mysqli_query($conn,$get_user);
      $user_id=mysqli_fetch_assoc($result)["user_id"];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class=" d-flex flex-column justify-content-center mx-1">
            <a href="https://www.paypal.com"><h3>Pay online</h3></a>
            <a href="order.php?user_id=<?php echo $user_id ?>"><h3>Pay offline</h3></a>
        </div>
    </div>
</body>
</html>