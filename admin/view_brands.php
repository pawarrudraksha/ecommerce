<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class='text-center'>
            <th class="bg-info">No</th>
            <th class="bg-info">Brand title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_query="Select * from brands";
            $result_query=mysqli_query($conn,$select_query);
            $s_no=1;
            while($row=mysqli_fetch_assoc($result_query)){
                $brand_title=$row["brand_title"];
                $brand_id=$row["brand_id"];
                echo " <tr class='text-center'>
                <td class='bg-secondary'>$s_no</td>
                <td class='bg-secondary'>$brand_title</td>
                <td class='bg-secondary text-light'><a href='index.php?edit_brand_id=$brand_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td class='bg-secondary text-light'><a href='index.php?delete_brand_id=$brand_id'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                $s_no+=1;
            }
        ?>
    </tbody>
</table>