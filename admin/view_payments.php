
<h3 class="text-center text-success">All Orders</h3>
<table class="table table-ordered mt-5">
    <thead class="bg-info">
        <tr>
            <th class="bg-info">No</th>
            <th class="bg-info">Invoice no</th>
            <th class="bg-info">Amount</th>
            <th class="bg-info">Payment mode</th>
            <th class="bg-info">Order Date</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_GET['view_payments'])){
            $select_query="select * from `user_payments`";
            $result_query=mysqli_query($conn,$select_query);
            $num=1;
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows>0){
                while($row=mysqli_fetch_assoc($result_query)){
                    $amount=$row["amount"];
                    $invoice_number=$row["invoice_number"];
                    $payment_mode=$row["payment_mode"];
                    $date=$row["date"];
                    $order_id=$row["order_id"];
                    $payment_id=$row["payment_id"];
                echo "<tr>
                <th class='bg-secondary'>$num</th>
                <th class='bg-secondary'>$invoice_number</th>
                <th class='bg-secondary'>$amount/-</th>
                <th class='bg-secondary'>$payment_mode</th>
                <th class='bg-secondary'>$date</th>
                <td class='bg-secondary text-light'><a href='index.php?delete_payment_id=$payment_id'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                $num+=1;
            }
            }else{
                echo "<h3 class='text-center my-4 mx-0'>You haven't made a payment yet</h3>";
            }
        }
        ?>
    </tbody>
</table>