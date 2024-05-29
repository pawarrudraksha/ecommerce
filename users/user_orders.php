<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $username=$_SESSION['username'];
        $user_query="select * from `user_table` where user_name='$username'";
        $result_query=mysqli_query($conn,$user_query);
        $user_id=mysqli_fetch_assoc($result_query)['user_id']
    ?>
    <h3 class="text-success">My Orders</h3>
    <table class="table table-bordered mt-5">
    <thead>
        <tr >
            <th class="bg-info">No</th>
            <th class="bg-info">Due Amount</th>
            <th class="bg-info">Total products</th>
            <th class="bg-info">Invoice no</th>
            <th class="bg-info">Date</th>
            <th class="bg-info">Complete/Incomplete</th>
            <th class="bg-info">Status</th>
        </tr>
    </thead>
    <tbody class="text-light">
        <?php
            $order_query="select * from `user_orders` where user_id=$user_id";
            $order_result=mysqli_query($conn,$order_query);
            while($row=mysqli_fetch_assoc($order_result)){
                $number=1;
                $order_id=$row["order_id"];
                $due_amount=$row["due_amount"];
                $total_products=$row["total_products"];
                $order_date=$row["order_date"];
                $order_status=$row["order_status"];
                $invoice_no=$row["invoice_number"];
                echo "<tr>
                <td class='bg-secondary'>$number</td>
                <td class='bg-secondary'>$due_amount</td>
                <td class='bg-secondary'>$total_products</td>
                <td class='bg-secondary'>$invoice_no</td>
                <td class='bg-secondary'>$order_date</td>
                <td class='bg-secondary'>$order_status</td>"
                ?>

                <?php
                    if($order_status=='incomplete'){
                        echo "<td class='bg-secondary'><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm Payment</a></td>";
                    }else{
                        echo "<td class='bg-secondary text-light'>Paid</td>";
                    }
                    echo "</tr>";
                    $number+=1;
                }
                    
                ?>


    </tbody>
    </table>
</body>
</html>