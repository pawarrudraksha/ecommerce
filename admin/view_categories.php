<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class='text-center'>
            <th class="bg-info">No</th>
            <th class="bg-info">Category title</th>
            <th class="bg-info">Edit</th>
            <th class="bg-info">Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
            $select_query="Select * from categories";
            $result_query=mysqli_query($conn,$select_query);
            $s_no=1;
            while($row=mysqli_fetch_assoc($result_query)){
                $category_title=$row["category_title"];
                $category_id=$row["category_id"];
                echo " <tr class='text-center'>
                <td class='bg-secondary'>$s_no</td>
                <td class='bg-secondary'>$category_title</td>
                <td class='bg-secondary text-light'><a href='index.php?edit_category_id=$category_id'><i class='fa-solid fa-pen-to-square'></i></a></td>
                <td class='bg-secondary text-light'><a href='index.php?delete_category_id=$category_id'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                $s_no+=1;
            }
        ?>
    </tbody>
</table>