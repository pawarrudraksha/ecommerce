<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECommmerce:View Users</title>
</head>
<body>
    <h3 class="text-center text-success">All users</h3> 
    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th class="bg-info">No</th>
                <th class="bg-info">Username</th>
                <th class="bg-info">User Image</th>
                <th class="bg-info">User address</th>
                <th class="bg-info">User mobile</th>
                <th class="bg-info">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $select_query="Select * from `user_table`";
                $result_query=mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $total_sold=0;
                    $number=1;
                    $user_id=$row["user_id"];
                    $user_name=$row["user_name"];
                    $user_image=$row["user_image"];
                    $user_mobile=$row["user_mobile"];
                    $user_address=$row["user_address"];
                    echo " <tr class='text-center text-light'>
                    <td class='bg-secondary text-light'>$number</td>
                    <td class='bg-secondary text-light'>$user_name</td>
                    <td class='bg-secondary text-light'>
                        <img src='../users/user_images/$user_image' alt='' class='user_img' width='100px'>
                    </td>
                    <td class='bg-secondary text-light'>$user_address</td>
                    <td class='bg-secondary text-light'>$user_mobile</td>
                    <td class='bg-secondary text-light'><a href='index.php?delete_user_id=$user_id'><i class='fa-solid fa-trash'></i></a></td>
                </tr>";
                $number++;
                }
            ?>
           
        </tbody>
    </table>
</body>
</html>