
<h3 class="text-center text-success">All Orders</h3>
<table class="table table-ordered mt-5">
    <thead class="bg-info">
        <tr>
            <th class="bg-info">No</th>
            <th class="bg-info">Due Amount</th>
            <th class="bg-info">Invoice no</th>
            <th class="bg-info">Total products</th>
            <th class="bg-info">Order Date</th>
            <th class="bg-info">Status</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_GET['list_orders'])){
            $select_query="select * from `user_orders`";
            $result_query=mysqli_query($conn,$select_query);
            $num=1;
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows>0){
                while($row=mysqli_fetch_assoc($result_query)){
                    $due_amount=$row["due_amount"];
                    $invoice_number=$row["invoice_number"];
                    $total_products=$row["total_products"];
                    $order_date=$row["order_date"];
                    $order_status=$row["order_status"];
                    $order_id=$row["order_id"];
                echo "<tr>
                <th class='bg-secondary'>$num</th>
                <th class='bg-secondary'>$due_amount/-</th>
                <th class='bg-secondary'>$invoice_number</th>
                <th class='bg-secondary'>$total_products</th>
                <th class='bg-secondary'>$order_date</th>
                <th class='bg-secondary'>$order_status</th>
                <td class='bg-secondary text-light'><a href='index.php?delete_order_id=$order_id'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                $num+=1;
            }
            }else{
                echo "<h3 class='text-center my-4 mx-0'>You have no  orders</h3>";
            }
        }
        ?>
    </tbody>
</table>