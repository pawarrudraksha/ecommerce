<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECommmerce:View Products</title>
</head>
<body>
    <h3 class="text-center text-success">All products</h3> 
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th class="bg-info">Product Id</th>
                <th class="bg-info">Product Title</th>
                <th class="bg-info">Product Image</th>
                <th class="bg-info">Product Price</th>
                <th class="bg-info">Total Sold</th>
                <th class="bg-info">Status</th>
                <th class="bg-info">Edit</th>
                <th class="bg-info">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $select_query="Select * from `products`";
                $result_query=mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $total_sold=0;
                    $number=1;
                    $product_id=$row["product_id"];
                    $product_title=$row["product_title"];
                    $product_image=$row["product_image1"];
                    $product_price=$row["product_price"];
                    $status=$row["status"];
                    $select_from_orders="Select * from `products_tally` where product_id=$product_id";
                    $result_tally=mysqli_query($conn,$select_from_orders);
                    if($values=mysqli_fetch_assoc($result_tally)){
                        $total_sold=$values["product_tally"];
                    }
                    echo " <tr class='text-center text-light'>
                    <td class='bg-secondary text-light'>$number</td>
                    <td class='bg-secondary text-light'>$product_title</td>
                    <td class='bg-secondary text-light'>
                        <img src='./product_images/$product_image' alt='' class='product_img' width='100px'>
                    </td>
                    <td class='bg-secondary text-light'>$product_price/-</td>
                    <td class='bg-secondary text-light'>$total_sold</td>
                    <td class='bg-secondary text-light'>$status</td>
                    <td class='bg-secondary text-light'><a href='index.php?edit_product_id=$product_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td class='bg-secondary text-light'><a href='index.php?delete_product_id=$product_id'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                $number++;
                }
            ?>
           
        </tbody>
    </table>
</body>
</html>