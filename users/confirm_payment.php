<?php
  include('../includes/connect.php');
  session_start();
  if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_query="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($conn,$select_query);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $due_amount=$row_fetch['due_amount'];
  }
  if(isset($_POST['confirm_payment']) and isset($_POST['payment_mode'])){
    $payment_mode=$_POST['payment_mode'];
    $insert_query="Insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values($order_id,$invoice_number,$due_amount,'$payment_mode')";
    $result=mysqli_query($conn,$insert_query);
    if($result){
        $update_query="Update `user_orders` set order_status='complete' where order_id=$order_id";
        $result_update=mysqli_query($conn,$update_query);
        echo "<script>alert('Payment successful')</script>";
        echo  "<script>window.open('profile.php?my_orders','_self')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce:Payment</title>
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
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" disabled  value="<?php echo $invoice_number?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount" class="text-light">Amount</label>
                <input type="text" id="amount" class="form-control w-50 m-auto" name="amount" value="<?php echo $due_amount?>" disabled>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Cash on delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm Payment" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>

