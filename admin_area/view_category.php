<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Category Id</th>
            <th>Product Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $select_category="select * from categories";
    $result_category=mysqli_query($con,$select_category);
    $number=1;
    while($row_data=mysqli_fetch_array($result_category))
    {
        $categories_id=$row_data['categories_id'];
        $categories_title=$row_data['categories_title'];
    


    ?>


        <tr class=' text-center'>
            <td><?php echo $number  ?></td>
            <td><?php echo $categories_id  ?></td>
            <td><?php echo $categories_title  ?></td>
            
            <td><a href='index.php?edit_cate=<?php echo $categories_id  ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a> </td>
            
            <td><a href='index.php?delete_cate=<?php echo $categories_id  ?>'type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_category" class="text-light text-decoration-none"></a> No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_cate=<?php echo $categories_id  ?>'  class=" text-light text-decoration-none"  > Yes</a></button>
      </div> 
    </div>
  </div>
</div>