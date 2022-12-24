<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>User Id</th>
            <th>User Name</th>
            <th>User Image</th>
            <th>User Email</th>
            <th>User Address</th>
            <th>User Mobile</th>
            
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        
        <?php
        
            $select_user="select * from `user_table`";
            $result_user=mysqli_query($con,$select_user);
            $number=1;
            while($row_product=mysqli_fetch_array($result_user))
            {
                $user_id=$row_product['user_id'];
                $user_name=$row_product['username'];
                $user_email=$row_product['user_email'];
                $user_image1=$row_product['user_image'];
                $user_mobile=$row_product['user_mobile'];
                $user_address=$row_product['user_address'];
                echo 
                "
                <tr class=' text-center'>
                <td>$number</td>
            <td>$user_id</td>
            <td>$user_name</td>";
            ?>
            <td><img src="../user_area/user_images/<?php echo $user_image1 ?>" alt="" height="100px" width="100px"> </td>
            <?php
            echo "
            <td>$user_email</td>
            <td>$user_address</td>
            <td>$user_mobile</td>";
            ?>
            
            

            
            
            <td><a href='index.php?delete_users=<?php echo $user_id  ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            <?php
            echo "
            </tr>";
            $number++;
                
                



            }
            ?>

        

            
        
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_products" class="text-light text-decoration-none"></a> No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_users=<?php echo $user_id  ?>'  class=" text-light text-decoration-none"  > Yes</a></button>
      </div> 
    </div>
  </div>
</div>